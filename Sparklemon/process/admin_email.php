<?php
/*
**	admin_email.php
**
**	sends an administrator email
*/

require("../php/settings.php");
require("../php/postmark.php");
include("../php/check_admin.php");

$user_id=$_POST['user'];
$subject=$_POST['subject'];
$message=$_POST['message'];

$query=mysql_query("SELECT * FROM accounts WHERE id='$user_id' LIMIT 1");
$row=mysql_fetch_array($query);
$f_name=$row['first_name'];
$l_name=$row['last_name'];
$email=$row['email'];

Mail_Postmark::compose()
->addTo($email,$f_name." ".$l_name)
->subject("Spark Lemon ".$subject)
->messagePlain($message)
->send();

header("Location: ../admin/index.php");

?>