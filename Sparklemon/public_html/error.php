<?php
//include('php/cookie_login.php');
$page_title = "Error";
require('header.php');
echo '<h1>Ooops...</h1><p>We didn\'t manage to find the page you\'re looking for. Want to go <a href="javascript:history.go(-1)">back</a>?</p>';

require('footer.php');
?>