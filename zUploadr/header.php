<?php
	$website_URL = "http://zuploadr.com";
    session_start();
    include_once('functions.php');
    require_once('class.user.php');
    if(is_logged_in()){
        $user = new user($_SESSION['uid']);
        $userType = $user::getUserType();
    } else {
        $userType = 'Guest';
    }
    if(!isset($root)){
        $root = 'http://zuploadr.com/';
    }
?>
<!doctype html>
<html lang="en">
	<head>
    	<title><?=$config['website_name'];?></title>
        <link href="<?=$root;?>lib/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=$root;?>lib/css/bootstrap-responsive.min.css" type="text/css" rel="stylesheet"/>
        <script src="<?=$root;?>lib/js/jquery-1.7.2.min.js"></script>
        <script src="<?=$root;?>lib/js/bootstrap.min.js"></script>
        <script src="<?=$root;?>lib/js/bootstrap-tab.js"></script>
        <script src="<?=$root;?>lib/js/bootstrap-dropdown.js"></script>
        <script src="<?=$root;?>lib/js/bootstrap-collapse.js"></script>
        <script src="<?=$root;?>lib/js/bootstrap-transition.js"></script>
        <script src="<?=$root;?>lib/js/bootstrap-alert.js"></script>
        <script type="text/javascript" src="http://www.google.com/jsapi"></script>
        <script type="text/javascript">
          var _gaq = _gaq || [];
          _gaq.push(['_setAccount', 'UA-33867485-1']);
          _gaq.push(['_setDomainName', 'zuploadr.com']);
          _gaq.push(['_trackPageview']);

          (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
          })();

        </script>
	</head>
    <body>
    <div class="navbar navbar-fixed-top">
                <div class="navbar-inner">
                    <div class="container">
                        <ul class="nav">
                            <li>
                                <a class="brand" href="<?=$website_URL;?>"><?=$config['website_name'];?></a>
                            </li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown">Account <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                	<li class="nav-header">Type - <?=$userType;?></li>
                                    <?php 
                                        if(is_logged_in()){
                                            echo '<li><a href="'.$root.'account/upgrade"><i class="icon-chevron-up"></i> Upgrade</a></li>
                                                <li><a href="'.$root.'account/upgrade/why.php"><i class="icon-info-sign"></i> Why Upgrade?</a></li>
                                            	<li class="divider"></li>
                                                <li><a href="'.$root.'account/logout.php"><i class="icon-off"></i> Logout</a></li>';
                                        } else {
                                            echo '<li><a href="'.$root.'account/login.php"><i class="icon-user"></i> Login / Register</a></li>';
                                        }
                                    ?>
                                </ul>
                            </li>
                            <?php
                                if(is_logged_in()){
                            ?>
                                    <li class="dropdown">
                                    	<a class="dropdown-toggle" data-toggle="dropdown" href="#">Messages <span class="badge badge-important">1</span><b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                       		<li><a href="<?=$root;?>messages/new.php"><i class="icon-pencil"></i> Create New</a></li>
                                        	<li><a href="<?=$root;?>messages/inbox"><i class="icon-inbox"></i> Inbox</a></li>
                                            <li><a href="<?=$root;?>messages/sent"><i class="icon-envelope"></i> Sent</a></li>
                                            <li class="divider"></li>
                                            <li><a href="<?=$root;?>messages/info.php"><i class="icon-info-sign"></i> Notification Info</a></li>
                                        </ul>
                                    </li>
                            <?php
                                }
                            ?>
                            <li>
                            	<a class="dropdown-toggle" data-toggle="dropdown" href="#">DMCA</a>
                            </li>
                            
                        </ul>
                        	<form class="navbar-form pull-right" method="get" action="<?=$root;?>search.php">
                            	<input type="search" class="search-query" placeholder="Search" />
                            </form>
                    </div>
                </div>
            </div>