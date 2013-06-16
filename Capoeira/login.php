<?php
  require('user.class.php');
 if($user::is_logged_in() === true){
    if($user::is_admin($_SESSION['uid'])){
      header('Location: admin.php');
    }
  header('Location: index.php');
}
  if(isset($_GET['process'])){
  		$email = mysql_real_escape_string($_POST['email']);
  		$password = mysql_real_escape_string($_POST['password']);
      if(isset($_POST['password_reset'])){
        $email = mysql_real_escape_string($_POST['email']);
        if(empty($email)){
          $error[] = "Please enter the email address you wish to recover the password for";
        } else {
           if($user::check_user_exists($email) === true){
        $user::password_reset($email);
       $error[] = "You have been emailed a new password";
         } else {
            $error[] = "That user doesn't exist";
         }
        }
      } else {
  		if($user::check_user_exists($email) === true){
  			if($user::check_login_details($email,$password) === true){
  				$uid = $user::get_user_id($email,$password);
  				$user::login($uid);
                                if($user::is_admin($uid)){
                                  header('Location: admin.php');
                                } else {
                                  header('Location: index.php');
                                }
  			} else {
  				$error[] = "The password you entered doesn't match our records.";
  			}
  		} else {
  			$error[] = "That user doesn't exist";
  		}
    }

  }
 
  ?><!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">

  <!-- Use the .htaccess and remove these lines to avoid edge case issues.
       More info: h5bp.com/b/378 -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>login</title>
  <meta name="description" content="">
  <meta name="author" content="" >

  <!-- Mobile viewport optimized: j.mp/bplateviewport -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Place favicon.ico and apple-touch-icon.png in the root directory: mathiasbynens.be/notes/touch-icons -->

  <!-- CSS: implied media="all" -->
  <link rel="stylesheet" href="css/960.css"/>
  <link rel="stylesheet" href="css/menu.css"/>
  <link rel="stylesheet" href="css/style.css">


  <!-- More ideas for your <head> here: h5bp.com/docs/#head-Tips -->

  <!-- All JavaScript at the bottom, except for Modernizr and Respond.
       Modernizr enables HTML5 elements & feature detects; Respond is a polyfill for min/max-width CSS3 Media Queries
       For optimal performance, use a custom Modernizr build: www.modernizr.com/download/ -->
  <script src="js/libs/modernizr-2.0.min.js"></script>
  <script src="js/libs/respond.min.js"></script> 
  

</head>

<body>

       <div id="container" class="container_12">
    <header class="grid_12">
      <div id="logo">
         <h1>Associacao de Capoeira Lapinha</h1>
      </div>
      <div class="lavalamp dark">
            <ul>
               <li><a href="home.php">HOME</a></li>
               <li><a href="classes.php">CLASSES</a></li>
               <li><a href="gallery.php">GALLERY</a></li>
               <li><a href="store.php">STORE</a></li>
               <li><a href="about.php">ABOUT US</a></li>
               <li><a href="contact.php">CONTACT</a></li>
               <?php
                  if($user::is_logged_in() === true){
                  	?>
                  	<li><a href="profile.php">PROFILE</a><li>
                  	<li><a href="logout.php">LOGOUT</a><li>
                  	<?php
                  } else {
                  	?>
                  	<li><a href="login.php" class="active">LOGIN</a></li>
              		<li><a href="register.php">REGISTER</a><li>
                  	<?php
                  }
                ?>
              
              
            </ul>
         </div>
         <div class="grid_3">
            &nbsp
         </div>
         <div id="banner" class="grid_9"></div>
    </header>
    <div id="main" role="main" >
       <div id="sidebar" class="grid_3">
          
             <ul class="sidemenu">
             	 <li><a href="index.php">Home</a></li>
                <li><a href="news.php">News</a></li>
                <li><a href="graduation.php">Graduation</a></li>
                <li><a href="history.php">History</a></li>
             </ul>
          
       </div> <!--! end of #side-menu -->

       <div id="content" class="grid_9" >
          <h3>LOGIN TO CAPOEIRA</h3>
          <?php
	          if(isset($error)){
	          	foreach($error as $err){
	          		echo $err . '</br >';
	          	}
	          }
          	?>
         <form method="post" action="login.php?process">
            <formset>
                <label for="email">Email: </label><input  type="email" name="email" placeholder="Enter Email Here" required id="email" /><br />
                <label for="password">Password: </label><input pattern=".{5,}" title="Please enter 5 or more characters" type="password" name="password" placeholder="Enter Password Here" id="password" /></br>
                <input type="submit" value="Login" />&nbsp;<input type="submit" name="password_reset" value="Reset Password"/>
            </formset>
         </form>
       </div> <!--! end of #content -->

    </div><!--! end of #main  -->
    <footer class="grid_12">
      <div class="grid_6 alpha"><p>© 2011 Associacao de Capoeira Lapinha/ Website
design by T.Matias</p></div>
		<div id="footer-menu" class="grid_6 omega">
		<ul>
			<li><a href="termsandconditions.php">Terms
&amp; Conditions</a></li>		
			<li><a href="about.php">About Us</a></li>
		</ul>
		</div>
    </footer>
  </div> <!--! end of #container -->


  <!-- JavaScript at the bottom for fast page loading -->

  <!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/libs/jquery-1.6.2.min.js"><\/script>')</script>


  <!-- scripts concatenated and minified via ant build script-->
  <script src="js/plugins.js"></script>
  <script src="js/script.js"></script>
   <!-- end scripts-->

	
  <!-- mathiasbynens.be/notes/async-analytics-snippet Change UA-XXXXX-X to be your site's ID -->
  <script>
    var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview'],['_trackPageLoadTime']];
    (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
    g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
    s.parentNode.insertBefore(g,s)}(document,'script'));
  </script>


  <!-- Prompt IE 6 users to install Chrome Frame. Remove this if you want to support IE 6.
       chromium.org/developers/how-tos/chrome-frame-getting-started -->
  <!--[if lt IE 7 ]>
    <script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
    <script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
  <![endif]-->
  
</body>
</html>
