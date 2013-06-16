<?PHP

header( "Content-type: application/x-javascript" );

if ( ( isset( $_COOKIE['key'] ) ) && ( isset( $_GET['key'] ) && ( $_COOKIE['key'] == $_GET['key'] ) ) ) {
	setcookie( 'opted', '1', time() + 31622400 /* 1 year */ );
}

?>