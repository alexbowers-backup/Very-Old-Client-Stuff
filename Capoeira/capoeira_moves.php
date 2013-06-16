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

  <title>capoeira_moves</title>
 <meta name="description" content="Capoeria moviments all give any person, a freedom and the ability to selfdefece " />
<meta name="keywords" content="capoeria, move, moviments, ginga, esquiva, cocorinha,teach,class,kids, childen,instruments, brazil, sport, martial, art, culture, language, support, " />
<meta name="author" content="master carlos" />

  <!-- Mobile viewport optimized: j.mp/bplateviewport -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Place favicon.ico and apple-touch-icon.png in the root directory: mathiasbynens.be/notes/touch-icons -->

  <!-- CSS: implied media="all" -->
  <link rel="stylesheet" href="css/960.css"/>
  <link rel="stylesheet" href="css/menu.css"/>
  <link rel="stylesheet" href="css/nivo-slider.css"/>
  <link rel="stylesheet" href="css/style.css">


  <!-- More ideas for your <head> here: h5bp.com/docs/#head-Tips -->

  <!-- All JavaScript at the bottom, except for Modernizr and Respond.
       Modernizr enables HTML5 elements & feature detects; Respond is a polyfill for min/max-width CSS3 Media Queries
       For optimal performance, use a custom Modernizr build: www.modernizr.com/download/ -->
  <script src="js/libs/modernizr-2.0.min.js"></script>
  <script src="js/libs/respond.min.js"></script>
  <script src="js/lavalamp.js" type="text/javascript"></script>  
  

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
               <li><a class="active" href="classes.php">CLASSES</a></li>
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
  <li><a href="classes.php" target="_top">Children Classes
    </a></li>
  <li><a href="adults_classes.php" target="_top">Adults Classes
    </a></li>
  <li><a href="capoeira_moves.php" target="_top">Capoeira Moves</a></li>
             </ul>
          
       </div> <!--! end of #side-menu -->

       <div id="content" class="grid_9" >
      
          <h3>CAPOEIRA MOVIMENTS</h3>
          
         	<p>This website is not meant to be "Learn how to do capoeira online" but to truly ecourange you to try it out. If you realy interested to learn contact us or try to find a group near you, or at least someone who knows  capoeira who can train and learn with.
</p>
				<h4>Ginga (Jin-gah)</h4>
				<div id="slider">
					<img src="img/ginga_anim.gif" alt="" />				
				</div>
				<p>The ginga is capoeira basic's "stance". The ginga is a form of personal expression and style, and one should try to always be in ginga while playing capoeira (unless doing move of course). </p>
				
				<h4>Meia Lua de Frente</h4>
				<div id="slider">
					<img src="img/passape.gif" alt="" />				
				</div>
				<p>Meia Lua de frente is an outside to inside circular kick done while facing forward. It's like the opposite of queixada. </p>
				
				<h4>Queixada (Kay-sha-da)</h4>
				<div id="slider">
					<img src="img/queixada_anim.gif" alt="" />				
				</div>
				<p>This is an outside to inside kick, similar to armada but with no spin. The twisting of the body before the kick should generate the moviment needed for you leg to fly up and around in the circular motion. This is a great setup for kick combinations.</p>
				
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
