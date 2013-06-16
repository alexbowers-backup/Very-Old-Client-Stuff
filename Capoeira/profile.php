<?php
  require('user.class.php');
  if($user::is_logged_in() !== true){
    header('Location: index.php');
  }
  if(isset($_GET['process'])){
        $username = mysql_real_escape_string($_POST['username']);
        $first_name = mysql_real_escape_string($_POST['first_name']);
        $last_name = mysql_real_escape_string($_POST['last_name']);
        $dob = mysql_real_escape_string($_POST['dob']);
        $graduation = mysql_real_escape_string($_POST['graduation']);
        $group_name = mysql_real_escape_string($_POST['group_name']);
        $master_name = mysql_real_escape_string($_POST['master_name']);
        $bio = mysql_real_escape_string($_POST['bio']);

        if(isset($_FILES['pic']['name']) && $_FILES['pic']['name']){
                  if(!$_FILES['pic']['error']){
                    $contents = file_get_contents($_FILES['pic']['tmp_name']);
                    $file = base64_encode($contents);
                  } else {
                    $errors[] = "Image uploaded wasn't valid";
                    $errors[] = "Image error: " . $_FILES['pic']['error'];
                  }
                } else {
                  $file = null;
                }
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
            if(strlen($username) >= 20){
              $errors[] = "Username must be shoter than 20 characters";
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
          if(empty($errors)){
          $user::update_user($_SESSION['uid'],$first_name,$last_name,$dob,$graduation,$group_name,$master_name,$bio,$file,$username);
            $errors[] = "Updated Details";
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
               <li><a class="active" href="home.php">HOME</a></li>
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
        <?php
          if(!empty($errors)){
            echo '<ul>';
            foreach($errors as $error){
              echo '<li>' . $error . '</li>';
            }
            echo '</ul>';
          }
          ?>
        <?php
            $uid = (int)$_SESSION['uid'];
            $query = mysql_query('SELECT * FROM `members` WHERE `id` = '.$uid.' LIMIT 1');
            $result = mysql_fetch_assoc($query);
        ?>
        <?php
        if(!empty($result['profile_pic'])){?>
         Your profile picture: <div style="width:100px;height:100px;overflow:hidden"><img src="data:image/png;base64, <?=$result['profile_pic'];?>" /></div>
       <?php } ?>
        <form action="profile.php?process" method="post" enctype="multipart/form-data">
           <formset>
                <label for="username">Username: </label><input  type="text" pattern=".{3,10}"  name="username" placeholder="Enter Username" value="<?=$result['username'];?>" required id="username" /><br />
                <label for="first_name">First Name: </label><input  type="text" pattern=".{3,10}"  name="first_name" placeholder="Enter First Name" value="<?=$result['first_name'];?>" required id="first_name" /><br />
                <label for="last_name">Last Name: </label><input  type="text"pattern=".{3,10}" name="last_name" placeholder="Enter Last Name"  value="<?=$result['last_name'];?>" required id="last_name" /><br />
                <label for="dob">Date of Birth: </label><input  type="date" name="dob" placeholder="YYYY-MM-DD"  value="<?=$result['dob'];?>"required id="dob" /><br />
                <label for="graduation">Graduation: </label><input  autocomplete="off" type="text" pattern=".{3,25}" name="graduation" placeholder="Black Belt"  value="<?=$result['graduation'];?>" required id="graduation" /><br />
                <label for="group_name">Capoeira Group Name: </label><input autocomplete="off" type="text" pattern=".{3,25}" name="group_name" placeholder="Enter Capoeira Group Name"  value="<?=$result['group_name'];?>"required id="group_name" /><br />
                <label for="master_name">Master Name: </label><input  autocomplete="off" type="text" pattern=".{3,25}" name="master_name" placeholder="Enter Master Name"  value="<?=$result['master_name'];?>" required id="master_name" /><br />
                <label for="bio">Biography: </label><textarea name="bio" id="bio" placeholder="Optional Biography"><?=$result['bio'];?></textarea><br />
                <label for="pic">Profile Picture: </label><input type="file" name="pic" accept="image/*" /><br/>
                <input type="submit" value="Update User Details" />
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
