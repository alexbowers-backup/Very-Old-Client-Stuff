<?php
header('Content-type: text/css');
if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start(); 
// ^ GZIP
//echo file_get_contents("master.css");
include("master.css");
?>