<?php
  require('user.class.php');

  if(isset($_GET['process'])){
      $username = mysql_real_escape_string($_POST['username']);
      	$email = mysql_real_escape_string($_POST['email']);
      	$first_name = mysql_real_escape_string($_POST['first_name']);
      	$last_name = mysql_real_escape_string($_POST['last_name']);
      	$dob = mysql_real_escape_string($_POST['dob']);
      	$graduation = mysql_real_escape_string($_POST['graduation']);
      	$group_name = mysql_real_escape_string($_POST['group_name']);
      	$master_name = mysql_real_escape_string($_POST['master_name']);
      	$bio = mysql_real_escape_string($_POST['bio']);
      	$password = mysql_real_escape_string($_POST['password']);
      	$password2 = mysql_real_escape_string($_POST['password2']);

      	if($user::check_user_exists($email) === true){
      		$errors[] = "This user already exists!";
      	} else {
      		if(empty($first_name)){
      			$errors[] = "Please enter a first name";
      		} else {
      			if(strlen($first_name) <= 3){
      				$errors[] = "First name must be longer than 3 characters";
      			}
      			if(strlen($first_name) >= 10){
      				$errors[] = "First name must be shoter than 10 characters";
      			}
      		}
          if(empty($username)){
            $errors[] = "Please enter a username";
          } else {
            if(strlen($username) <= 3){
              $errors[] = " Username must be longer than 3 characters";
            }
            if(strlen($username) >= 10){
              $errors[] = "Username must be shoter than 10 characters";
            }
          }
      		if(empty($last_name)){
      			$errors[] = "Please enter a last name";
      		} else {
      			if(strlen($last_name) <= 3){
      				$errors[] = "Last name must be longer than 3 characters";
      			}
      			if(strlen($last_name) >= 10){
      				$errors[] = "Last name must be shoter than 10 characters";
      			}
      		}
      		if(empty($dob)){
      			$errors[] = "Please enter your DOB";
      		}
      		if(empty($graduation)){
      			$errors[] = "Please enter a graduation type";
      		}
      		if(empty($group_name)){
      			$errors[] = "Please enter a group name";
      		} else {
      			if(strlen($group_name) <= 3) {
      				$errors[] = "Group Name should be 3 or more characters";
      			}
      			if(strlen($group_name) >= 25){
      				$errors[] = "Group Name should be less than 25 characters";
      			}
      		}
                if(isset($_FILES['pic']['name']) && $_FILES['pic']['name']){
                  if(!$_FILES['pic']['error']){
                    $contents = file_get_contents($_FILES['pic']['tmp_name']);
                    $file = base64_encode($contents);
                  } else {
                    $errors[] = "Image uploaded wasn't valid";
                  }
                } else {
                  $file = "";
                }
      		if(empty($master_name)){
      			$errors[] = "Please enter a group name";
      		} else {
      			if(strlen($master_name) <= 3) {
      				$errors[] = "Master Name should be 3 or more characters";
      			}
      			if(strlen($master_name) >= 25){
      				$errors[] = "Master Name should be less than 25 characters";
      			}
      		}
      		if($password !== $password2){
      			$errors[] = "The passwords don't match";
      		} else {
      			if(strlen($password) < 5){
      				$errors[] = "The password must be over 5 characters long";
      			}
      		}
      		if(empty($errors)){
                        $code = uniqid('',true);
      			$user::register($first_name,$last_name,$email,$dob,$graduation,$group_name,$master_name,$password,$bio,$code,$file);
                        echo mysql_error();
                        $user::send_activation_code($email,$code);
      			header('Location: login.php');
      		}
      	}
if($user::is_logged_in() === true){
  header('Location: index.php');
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

  <title>home</title>
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
                  	<li><a href="login.php">LOGIN</a></li>
              		<li><a href="register.php" class="active">REGISTER</a><li>
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
            if(isset($errors)){
              foreach($errors as $err){
                echo $err . '</br >';
              }
            }
            ?>
         <form method="post" action="register.php?process" enctype="multipart/form-data">
            <formset>
          	<label for="email">Email: </label><input  type="email" name="email" placeholder="Enter Email Here" required id="email" /><br />
                <label for="username">Username: </label><input type="username" name="username" placeholder="Please enter a username here" required id="username" /></br />
                <label for="first_name">First Name: </label><input  type="text" pattern=".{3,10}"  name="first_name" placeholder="Enter First Name" required id="first_name" /><br />
                <label for="last_name">Last Name: </label><input  type="text"pattern=".{3,10}" name="last_name" placeholder="Enter Last Name" required id="last_name" /><br />
                <label for="dob">Date of Birth: </label><input  type="date" name="dob" placeholder="YYYY-MM-DD" required id="dob" /><br />
                <label for="graduation">Graduation: </label><input  autocomplete="off" type="text" name="graduation" placeholder="Black Belt" required id="graduation" /><br />
                <label for="group_name">Capoeira Group Name: </label><input autocomplete="off" type="text" pattern=".{3,25}" name="group_name" placeholder="Enter Capoeira Group Name" required id="group_name" /><br />
                <label for="master_name">Master Name: </label><input  autocomplete="off" type="text" pattern=".{3,25}" name="master_name" placeholder="Enter Master Name" required id="master_name" /><br />
                <label for="password">Password: </label><input pattern=".{5,}" title="Please enter 5 or more characters" type="password" name="password" placeholder="Enter Password Here" required id="password" /></br>
                <label for="password2">Password Confirm: </label><input pattern=".{5,}" title="Please enter 5 or more characters" type="password" name="password2" placeholder="Confirm Password Here" required id="password2" /><br />
                <label for="bio">Biography: </label><textarea name="bio" id="bio" placeholder="Optional Biography"></textarea><br />
                <label for="pic">Profile Picture: </label><input type="file" name="pic" accept="image/*" />
                <input type="submit" value="Register" />
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
