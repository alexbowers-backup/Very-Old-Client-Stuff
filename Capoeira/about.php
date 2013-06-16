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

  <title>about</title>
 <meta name="description" content="associacao de capoeira lapinha has been stablished in london, how we came to london, " />
<meta name="keywords" content="capoeria,associacao, london, philosophy, master carlos,teach,class,kids, childen,instruments,  brazil, sport, martial, art, culture, language, support, " />
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
               <li><a href="home.php">HOME</a></li>
               <li><a href="classes.php">CLASSES</a></li>
               <li><a href="gallery.php">GALLERY</a></li>
               <li><a href="store.php">STORE</a></li>
               <li><a class="active" href="about.php">ABOUT US</a></li>
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
            
            <div id="contactFormContainer">
        <div id="contactForm">
        	<div class="loader"></div>
			<div class="bar"></div>
            <form action="mail.php" class="contactForm" name="cform" method="post">
                <p>Talk to me about anything. If you&rsquo;d like to work with me, or <br />even if you just need a hug, I&rsquo;ll get back to you shortly.</p>
                <div class="input_boxes">
                    <p><label for="name">Name</label><span class="name-missing">Please enter your name</span><br />
                    <input id="name" type="text" value="" name="name" /></p>
                    <p><label for="e-mail">E-mail</label><span class="email-missing">Please enter a valid e-mail</span><br />
                    <input id="e-mail" type="text" value="" name="email" /></p>
                    <p><label for="message">Message</label><span class="message-missing">Say something!</span><br />
                    <textarea id="message" rows="" cols="" name="message"></textarea></p>
                 </div>   
                 <input class="submit" type="submit" name="submit" value="Submit Form" onfocus="this.blur()"  />
            </form>
      </div>
      <div class="contact"></div>    
        </div><!--! end of #contactFormContainer--> 
         </div>
         <div class="grid_3">
            &nbsp;
         </div>
         <div id="banner" class="grid_9"></div>
    </header>
    <div id="main" role="main" >
    <div id="backgroundPopup"></div> 
       <div id="sidebar" class="grid_3">
          
             <ul class="sidemenu">

  					<li><a href="contact-info.php" >Contact Information</a></li>
  					<li><a href="contact-cs.php" >Customer Service</a></li>
  					<li><a href="payment.php" >Payment</a></li>
  					<li><a href="shipinfo.php" >Shipping Information</a></li>

				</ul>          
          
       </div> <!--! end of #side-menu -->

       <div id="content" class="grid_9" >
			<h3>ABOUT US</h3>
				<p>Associacao de Capoeria Lapinha was established in London in 2005 by Master Carlos otherwise known as Master Carlao. 
His teaching methods have portaide an authentic approach and have taken Capoeira back to its roots in Sao Paoulo where Master Carlos developed his art.
</p>
				<p>At Associacao de Capoeria Lapinha we develop fitness, strength, discipline of the mind and body. We will teach you that Capoeira has many different variations and many similarities to one’s experience in day to day life and ultimately you will make the decision as to what you would like to get from Capoeira.</p>
 				<p>We will teach you the philosophy, history, music, martial art, creative expression and most of all how to play Capoeira.
Capoeira will help build confidence and provide a positive focus constructively for the way youngsters as well as adults spend their time and energy. </p> 

		<h4>Be aware for more update will be available through our website.</h4>
		<div id="salve"><h3>SALVE BRASIL</h3></div> 
       
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
