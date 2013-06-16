<?php
	if (isset($_GET['balance'])) {
		$balance = $_GET['balance'];
	}
	else {
		$balance = 5;
	}
	if ($balance < 15) {
		$bar_height = 55 + ($balance*16); // every $5 is 80 pixels
		$button_style = 'disabled';
		$button_link = '#';
	}
	else {
		$bar_height = 368;
		$button_style = 'enabled';
		$button_link = '#fakelink';
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Request Payment</title>
<style type="text/css">
	body {
		background: #EEE;
		font: 11pt/15.6pt Frutiger, "Frutiger Linotype", Univers, Calibri, "Gill Sans", "Gill Sans MT", "Myriad Pro", Myriad, "DejaVu Sans Condensed", "Liberation Sans", "Nimbus Sans L", Tahoma, Geneva, "Helvetica Neue", Helvetica, Arial, "sans serif";
	}
	h1 {
		font-size: 13pt;
	}
	@font-face {
		font-family: 'OtariBold-Limited';
		src: url('http://sparklemon.com/css/type/Otari-Bold-Limited-webfont.eot');
		src: url('http://sparklemon.com/css/type/Otari-Bold-Limited-webfont.otf') format('opentype'), local('☺'), url('http://sparklemon.com/css/type/Otari-Bold-Limited-webfont.woff') format('woff'), url('http://sparklemon.com/css/type/Otari-Bold-Limited-webfont.ttf') format('truetype'), url('http://sparklemon.com/css/type/Otari-Bold-Limited-webfont.svg#webfont') format('svg');
		font-weight: normal;
		font-style: normal;
	}
	p {
		margin: 0;
		padding: 0;
	}
	.code {
		font-size: 10pt;
		font-family: "Courier New", Courier, monospace;
	}
</style>
<link href="style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
<!--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.11/jquery-ui.min.js"></script>-->
</head>
<body>
	<h1>Payment Sandbox</h1>
	<p>Balance: $<?php echo number_format($balance,2); ?><br />
    (use <span class="code">?balance=X</span> in the URL to test)</p>
    <div id="payment-side">
    	<h2>Balance</h2>
        <div id="overlay"></div>
        <div id="bar"></div> <!-- style="height: <?php echo $bar_height; ?>px;" -->
        <a id="request-button" class="disabled" href="<?php echo $button_link; ?>">request payment</a> <!-- class="<?php echo $button_style; ?>" -->
        <h3>$<?php echo number_format($balance,2); ?></h3>
    </div>
    <script type="text/javascript">
		$(window).load(function(){  
			$('#bar').css('display','block');
			$('#payment-side').css('background','#e8e8e8');
			$('#bar').animate({ height: <?php echo $bar_height; ?> }, 1500, function() {
				<?php if ($button_style != 'disabled') : ?>
					$('#request-button').removeClass('disabled').addClass('enabled');
				<?php endif; ?>
 			});
		});
    </script>
</body>
</html>