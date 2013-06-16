<?php
session_start();
mysql_connect('localhost','root','EaUkcsWxeckN');
mysql_select_db('EnhancedLearning');
$acc_type = 1;

if(!isset($_GET['crawler'])){
  if(isset($_SESSION['id'])){
   $query =  mysql_query("SELECT `session`.`user_id`,`users`.`acc_type` FROM `session`,`users` WHERE `users`.`user_id` = `session`.`user_id` AND `session`.`session_code` = '".mysql_real_escape_string($_SESSION['id'])."'");
    if(mysql_num_rows($query) == 0) {
      unset($_SESSION['id']);
      if($_SERVER['PHP_SELF'] != '/index.php'){
        header('Location: http://zando.co.uk/index.php');
      }
    }
    $row = mysql_fetch_assoc($query);
    $user_id = $row['user_id'];
    $acc_type = $row['acc_type'];
    if($_SERVER['PHP_SELF'] == '/index.php') {
      header('Location: assignment-current.php?normal');
    }
  } else {
   if($_SERVER['PHP_SELF'] != '/index.php'){
        header('Location: http://zando.co.uk/index.php');
      }
  } 
} else {
  $user_id = 1;
}
?>
<html>
<!--[if lt IE 7 ]> <html lang="fr" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="fr" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="fr" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="fr" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="fr" class="no-js">
<!--<![endif]-->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Zando | Enhanced Learning</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="/assets/css/bootstrap.css" type="text/css" media="screen, projection" />
<!-- Main CSS -->
<link rel="stylesheet" href="/assets/css/main.css" type="text/css" media="screen, projection" />

<!-- jQuery -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script src="/assets/js/bootstrap.js"></script>

</head>
<body>
<div id="top">
  <div class="container">
    <div id="navbar" class="navbar navbar-static">
      <div class="navbar-transparent">
        <div class="container">
          <ul class="nav">
            <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">Assignments <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="assignment-current.php?novice">Novice</a></li>
                <li><a href="assignment-current.php?easy">Easy</a></li>
                <li><a href="assignment-current.php?normal">Normal</a></li>
                 <li><a href="assignment-current.php?moderate">Moderate</a></li>
                  <li><a href="assignment-current.php?hard">Hard</a></li>
                   <li><a href="assignment-current.php?impossible">Impossible</a></li>
                <li class="divider"></li>
                <li><a href="assignment-entered.php">Entered Assignments</a></li>
                <li><a href="assignment-past.php">Past Assignments</a></li>
              </ul>
            </li>
            <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">League Tables <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="league-table.php?novice">Novice</a></li>
                <li><a href="league-table.php?easy">Easy</a></li>
                <li><a href="league-table.php?normal">Normal</a></li>
                 <li><a href="league-table.php?moderate">Moderate</a></li>
                  <li><a href="league-table.php?hard">Hard</a></li>
                   <li><a href="league-table.php?impossible">Impossible</a></li>
                <li class="divider"></li>
                <li><a href="league-table.php">Overall</a></li>
              </ul>
            </li>
          </ul>
          <ul class="nav pull-right">
            <li id="fat-menu" class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">My Account <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#"><i class="icon-user"></i>Profile</a></li>
                <li><a href="#"><i class="icon-cog"></i>Settings</a></li>
                <?php
                if($acc_type == 2){
                  echo '<li><a href="#"><i class="icon-exclamation-sign"></i>Admin Panel</a></li>';
                }?>
                <li><a href="my-submissions.php"><i class="icon-file"></i>My Submissions</a></li>
                <li class="divider"></li>
                <li><a href="#"><i class="icon-lock"></i>Logout</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<!--/#top-->
<div id="front">
  <div class="container">
    <div class="row">
      <div class="span12">
        <div class="makesense center">
          <h3>Enhance Your Learning</h3>
          <h5>Setup by Alex Bowers</h5>
        </div>
      </div>
    </div>
  </div>
</div>