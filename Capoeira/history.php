<?php
  require('user.class.php');
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

  <title>history</title>
 <meta name="description" content="Capoeria history will talk about the capoeira backgroung " />
<meta name="keywords" content="capoeria, brazil, sport, martial, art, culture, language, slave, pastinha, mestre, master, angola,regional, ladainha " />
<meta name="author" content="master carlos" />


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
         <div class="float-right">
             <img src="img/berimbau.jpg" />
          </div>
          <h3>CAPOEIRA HISTORY</h3>
         <p>The emergence of Capoeira in Brazil was due to the conditions under which slaves were forced to live, conditions that often died. A led them to African culture undergoes changes due to the new reality and all revolt of a people will belonging for shaping freedom, then there is a fight in capoeira dance form that a dream come true called freedom. </p>
			 <h4>In truth what is Capoeira??</h4>
         <p>It said the Master Pastinha, "Capoeira Angola is, first of all struggle and violent struggle." It is important that aspect is emphasized, since the current consensus among the laity and the people who practice it in error, consider the Capoeira is a dance form or just folklore for tourists. Of course, among serious practitioners in their only simulated and Capoeira becomes a physical and menta exercise. violence of their attacks, however, leaves no room for middle ground, or throw up Capoeira 'for real', with its serious consequences or just a simulated game.  The possibility of considering it is lacking sports rules, and who does so do not really know Capoeira.</p>
       
       
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
