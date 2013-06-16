<?php
/* snippet for listening to IPN */

require("../php/settings.php");
require("../php/sql_sanitize.php");
require("../php/postmark.php");

if (!isset($_POST['payment_status']))
{
	echo "Error processing request.";
	exit;
}

// read the post from PayPal system and add 'cmd'
$req = 'cmd=_notify-validate';
foreach ($_POST as $key => $value) {
	$value = urlencode(stripslashes($value));
	$req .= "&$key=$value";
}
// post to paypal for validation
$header = "POST /cgi-bin/webscr HTTP/1.0\r\n";
$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
$header .= "Content-Length: " . strlen($req) . "\r\n\r\n";

$valid=0;

$fp = fsockopen ('ssl://www.paypal.com', 443, $errno, $errstr, 30);
//$fp = fsockopen ('ssl://www.sandbox.paypal.com', 443, $errno, $errstr, 30);

if (!$fp) {
	$file = "ipndata.txt";
	$fh = fopen($file, 'a');
	fwrite($fh, "Error sending for validation.");
	fclose($fh);
} else {
	fputs ($fp, $header . $req);
	while (!feof($fp)) {
		$res = fgets ($fp, 1024);
		if (strcmp ($res, "VERIFIED") == 0) {
			// PAYMENT VALIDATED & VERIFIED!
			$time = time();
			$valid = 1;
						
			/*$file = "ipndata.txt";
			$fh = fopen($file, 'a');
			fwrite($fh, "Valid!\n\n");
			fwrite($fh, "Email: ".$_POST['payer_email']);
			fwrite($fh, "\nName: ".$_POST['first_name']." ".$_POST['last_name']);
			fwrite($fh, "\nReceiver: ".$_POST['receiver_id']." (".$_POST['receiver_email'].")");
			fwrite($fh, "\n\n".$req."\n\n");
			fclose($fh);*/
			
					$f_name = sql_sanitize($_POST['first_name']);
					$l_name = sql_sanitize($_POST['last_name']);
					$buyer_id = sql_sanitize($_POST['payer_id']);
					$seller_id = sql_sanitize($_POST['receiver_id']);
					$amount = sql_sanitize($_POST['mc_gross']);
					$email = sql_sanitize($_POST['payer_email']);
					
					$query = mysql_query("SELECT * FROM accounts WHERE email='$email' LIMIT 1");
					
					if (mysql_num_rows($query)!=1)
					{
						//ERROR EMAIL UNKNOWN
						$to      = 'contact@sparklemon.com';
						$subject = 'Invalid Payment';
						$message = '
						
			Although a payment has been made, the user\'s email is unknown.  Please add the payment manually.
			
			Buyer Email: '.$email.'
						';
						
						mail($to, $subject, $message, $headers);
						Mail_Postmark::compose()
						->addTo($to,'Sparklemon Admins')
						->subject($subject)
						->messagePlain($message)
						->send();
					}
					else
					{
						$row = mysql_fetch_array($query);
						$userid = $row['id'];
						
						if ($valid) {
							$new_credits = $amount + $row['credits'];
							mysql_query("UPDATE accounts SET credits='$new_credits' WHERE email='$email'");
						}
					}
					
					mysql_query("INSERT INTO transactions (time, valid, email, first_name, last_name, sellerid, buyerid, userid, amount) VALUES ('$time', '$valid', '$email', '$f_name', '$l_name', '$seller_id', '$buyer_id', '$userid', '$amount')") or die(mysql_error());
		}
		else if (strcmp ($res, "INVALID") == 0) {
			$time = time();
			
			$f_name = sql_sanitize($_POST['first_name']);
			$l_name = sql_sanitize($_POST['last_name']);
			$buyer_id = sql_sanitize($_POST['payer_id']);
			$seller_id = sql_sanitize($_POST['receiver_id']);
			$amount = sql_sanitize($_POST['mc_gross']);
			$email = sql_sanitize($_POST['payer_email']);
			
			// PAYMENT INVALID
			$valid = 0;
			
			$to      = 'contact@sparklemon.com';
			$subject = 'Invalid Payment';
			$message = '
					
			Although a payment has been made, it appears to be invalid.
			Please verify the payment manually.
			
			Buyer Email: '.sql_sanitize($_POST['payer_email']).'
			';
			
			Mail_Postmark::compose()
			->addTo($to,'Sparklemon Admins')
			->subject($subject)
			->messagePlain($message)
			->send();
			/*$file = "ipndata.txt";
			$fh = fopen($file, 'a');
			fwrite($fh, "INVALID! D:\n\n");
			fclose($fh);*/
			mysql_query("INSERT INTO transactions (time, valid, email, first_name, last_name, sellerid, buyerid, userid, amount) VALUES ('$time', '$valid', '$email', '$f_name', '$l_name', '$seller_id', '$buyer_id', '$userid', '$amount')") or die(mysql_error());
		}
	}
	
	fclose ($fp);
}
?>