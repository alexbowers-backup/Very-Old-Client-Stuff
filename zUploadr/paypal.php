<?php
	include('setting.php');
	// database connect
	$req = 'cmd=_notify-validate';
	foreach ($_POST as $key => $value) {
		$value = urlencode(stripslashes($value));
		$req .= "$key=$value";
	}
	
	$header = "POST /cgi-bin/webscr HTTP/1.0\r\n";
	$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
	$header .= "Content-Length: " . strlen($req) . "\r\n\r\n";
	
	$fp = fsockopen('ssl://www.paypal.com',443, $errno, $errstr, 30);
	
	if(!$fp) {
		// http error
	} else {
		fputs ($fp, $header . $req);
		while(!feof($fp)){
			$res = fgets($fp, 1024);
			if(strcmp($res, "VERIFIED") == 0) {
				$payment_from = "paypal";
				$payment_email = $_POST['payer_email'];
				
			} elseif(strcmp($res, "INVALID") == 0) {
				// INVALID PAYMENT
			}
		}
	}