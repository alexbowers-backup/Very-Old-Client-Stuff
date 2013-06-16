<?PHP

header( "Content-type: application/x-javascript" );

// Has the user opted in yet?
if ( isset( $_COOKIE['opted'] ) ) {

	// Set the expiry in to the future
	header( "Cache-Control: max-age=23716800, public" /* 9 months */ );
	header( "Expires: " . date( "D, d M Y H:i:s e", time() + 23716800 ) );

	// Add one year to the clock
	setcookie( 'opted', '1', time() + 31622400 /* 1 year */ );

}
else {

	// Don't cache this
	header( "Cache-Control: no-cache, must-revalidate");
	header( "Expires: Sat, 01 Jan 2000 00:00:00 GMT");

	// Create the security key and set the cookie
	if ( isset( $_COOKIE['key'] ) ) {
		$theKey = $_COOKIE['key'];
	}
	else {
		$theKey = openssl_random_pseudo_bytes(16);
		setcookie( 'key', $theKey );
	}
	$url = 'http://' . $_SERVER["SERVER_NAME"] . dirname( $_SERVER["REQUEST_URI"] ) . "/agree.js?key=" . urlencode( $theKey );

	// Get the colour
	
	if ( isset( $_GET['template'] ) ) {
		$template = urlencode( $_GET['template'] );
	}
	else  {
		$template = 'gray';
	}
	
	?>
	function cccom_accept2()
	{
		var js = document.createElement( "script" );
		js.type = "text/javascript";
		js.src = "<?PHP echo $url; ?>";
		document.body.appendChild(js);
	}
	<?php readfile( 'cc.js' ); ?>	
	
	// Set the load with the theme colour here

	if ( window.attachEvent ) {
		window.attachEvent( 'onload', function() { createDiv("<?php echo $template; ?>") } )
	}
	else if ( window.addEventListener ) {
		window.addEventListener( 'load', function() { createDiv("<?php echo $template; ?>") }, false );
	}
	else {
		var oldHandler = window.onload;
		window.onload = function() {
			if (typeof oldHandler == 'function') {
				oldHandler();
			}
			createDiv("<?php echo $template; ?>");
		};
	};

	<?php
	}

?>