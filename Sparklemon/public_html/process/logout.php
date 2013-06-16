<?php
/*
**	logout.php
**	Clears login cookie and unsets session data
*/
require("../php/settings.php");

unset($_SESSION['email']);
setcookie("auth","",time()-1,"/",".sparklemon.com");
header("Location: ../index.php");
?>