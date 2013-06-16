<?php
	$root = '../../../';
    require('<?=$root;?>lib/config.php');
	require('<?=$root;?>lib/functions.php');
	
	if(!logged_in()){
		header("Location: http://zando.co.uk");	
	}
	
?><!DOCTYPE html>
<html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width; initial-scale=1.0">

<title>My Past Competitions | <?=$config['system']['company_name'];?></title>

<!-- CSS FILES START -->
<link rel="stylesheet" href="<?=$root;?>style.css" media="screen" /> 
<link rel="stylesheet" href="<?=$root;?>lib/css/flexslider.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?=$root;?>lib/css/prettyPhoto.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?=$root;?>lib/css/black.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?=$root;?>lib/css/css-buttons.css" type="text/css" media="screen" />

<link href='http://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Pontano+Sans' rel='stylesheet' type='text/css'>
<!-- CSS FILES END -->

<link rel="shortcut icon" href="<?=$root;?>my/images/favicon.ico" />

<!-- JS FILES START -->
<script src="<?=$root;?>lib/js/jquery-1.7.2.min.js" type="text/javascript"></script> 
<script src="<?=$root;?>lib/js/jquery.tools.min.js" type="text/javascript"></script> 
<script src="<?=$root;?>lib/js/jquery.prettyPhoto.js" type="text/javascript"></script> 
<script src="<?=$root;?>lib/js/jquery.flexslider-min.js" type="text/javascript"></script> 
<script src="<?=$root;?>lib/js/jquery.easing.1.3.js" type="text/javascript"></script> 
<script src="<?=$root;?>lib/js/jquery.cookie.js" type="text/javascript"></script> 
<script src="<?=$root;?>lib/js/hoverIntent.js" type="text/javascript"></script> 
<script src="<?=$root;?>lib/js/dcjqaccordion.js" type="text/javascript"></script> 
<script src="<?=$root;?>lib/js/mixed.js" type="text/javascript"></script> 
<!-- JS FILES END -->

<!--[if lt IE 9]>
	<link rel="stylesheet" type="text/css" href="lib/css/style_ie.css" />
    <script src="lib/js/modernizr.custom.js" type="text/javascript"></script> 
<![endif]--> 
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-32522991-1']);
  _gaq.push(['_setDomainName', 'zando.co.uk']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

</head>

<body>

<!-- CONTAINER START (ENTIRE SITE WRAPPER) -->
<div id="container">

	<!-- MENU SECTION START (LEFT SIDEBAR) -->
    <section id="menu">
    
    	<!-- HEADER START -->
    	<header>
        
            <div id="logo_highlight"></div>

            <a id="logo" href="<?=$config['system']['company_website_url'];?>">
            	<img src="<?=$root;?>images/logo_100.png" alt="<?=$config['system']['company_name'];?> logo" />
            </a>
            
        </header>
        <!-- HEADER END -->
        
        <!-- NAVIGATION MENU START -->
        <nav>
            <ul id="menu_list">
                <li><a href="../..">Home</a></li>
                <li class="current-menu-item">
                    <a href="<?=$root;?>my">My Account</a>
                    <ul class="sub-menu">
                    <?php
							if(logged_in()){
						?>
                        <li><a href="<?=$root;?>my/credits">{0} Credits</a></li>
                        <li><a href="<?=$root;?>my/competitions">{0} Enrollments</a></li>
                        <li><a href="<?=$root;?>my/logout">Log Out</a></li>
						<?php } else {
							echo '<li><a href="my/login">Login / Register</a></li>';
						} ?>
                    </ul>
                </li>          
                <hr />
                <li><strong><A href="<?=$root;?>current">Current Competitions</A></strong></li>
                <li>
                    <a href="<?=$root;?>current/php">PHP</a>
                    <ul class="sub-menu">
                        <li><a href="<?=$root;?>current/php/1">Comp 1</a></li>
                        <li><a href="<?=$root;?>current/php/2">Comp 2</a></li>
                        
                    </ul>                
                </li>
                <li>
                    <a href="<?=$root;?>current/jquery">jQuery</a>
                    <ul class="sub-menu">
                        <li><a href="<?=$root;?>current/jquery/1">Comp 1</a></li>
                        <li><a href="<?=$root;?>current/jquery/2">Comp 2</a></li>
                    </ul>                
                </li>
                <li>
                    <a href="<?=$root;?>current/html">HTML</a>
                    <ul class="sub-menu">
                        <li><a href="<?=$root;?>current/html/1">Comp 1</a></li>
                        <li><a href="<?=$root;?>current/html/2">Comp 2</a></li>
                    </ul>                
                </li>
            </ul>
        </nav>
        <!-- NAVIGATION MENU END -->
         <div id="copyright_info">
         	<span class="white"><?=$config['system']['copyright_info'];?></span>
         </div>
	</section>
	<!-- MENU SECTION END (LEFT SIDEBAR) -->
    
    <div id="wrapper">
      
        <!-- CONTENT SECTION START -->    	
        <section class="content">
        	<hgroup class="one">
            	<h2 class="main_title">My current competitions</h2>
                <h3 class="subtitle">All of your enrollments are listed here, and your results will be also.</h3>
            </hgroup>
                                  
            <div class="one_half">
            	<h3>PHP</h3>
                <ul>
                	<li class="yes">Read Prelim</li>
                    <li class="yes">Submitted Code</li>
                    <li class="no">Received score</li>
                </ul>
                <p>Currently being marked</p>
                <p>Time Taken:</p>
                <p>02 : 15 : 22</p>
                <p>HH : MM : SS</p>
                <p><small>Time is calculated from when you started reading the prelim</small></p>
                <p>Count Down Timer</p>
                <!-- Will allow cancelation, counts down from 5 minutes to 0. At 0, no more submissions allowed -->
                <p>05 : 00</p>
                <button class="large square button black">Submit Code</button>
            </div>
            <div class="one_half">
            	<h3>jQuery</h3>
                <ul>
                	<li class="yes">Read Prelim</li>
                    <li class="yes">Submitted Code</li>
                    <li class="no">Received score</li>
                </ul>
                <p>Currently being marked</p>
                <p>Time Taken:</p>
                <p>02 : 15 : 22</p>
                <p>HH : MM : SS</p>
                <p><small>Time is calculated from when you started reading the prelim</small></p>
                <p>Count Down Timer</p>
                <!-- Will allow cancelation, counts down from 5 minutes to 0. At 0, no more submissions allowed -->
                <p>05 : 00</p>
                <button class="large square button black">Submit Code</button>
            </div>
            <div class="one_half">
            	<h3>JavaScript</h3>
                <ul>
                	<li class="yes">Read Prelim</li>
                    <li class="yes">Submitted Code</li>
                    <li class="no">Received score</li>
                </ul>
                <p>Currently being marked</p>
                <p>Time Taken:</p>
                <p>02 : 15 : 22</p>
                <p>HH : MM : SS</p>
                <p><small>Time is calculated from when you started reading the prelim</small></p>
                <p>Count Down Timer</p>
                <!-- Will allow cancelation, counts down from 5 minutes to 0. At 0, no more submissions allowed -->
                <p>05 : 00</p>
                <button class="large square button black">Submit Code</button>
            </div>
            <div class="one_half">
            	<h3>VB.NET</h3>
                <ul>
                	<li class="yes">Read Prelim</li>
                    <li class="yes">Submitted Code</li>
                    <li class="no">Received score</li>
                </ul>
                <p>Currently being marked</p>
                <p>Time Taken:</p>
                <p>02 : 15 : 22</p>
                <p>HH : MM : SS</p>
                <p><small>Time is calculated from when you started reading the prelim</small></p>
                <p>Count Down Timer</p>
                <!-- Will allow cancelation, counts down from 5 minutes to 0. At 0, no more submissions allowed -->
                <p>05 : 00</p>
                <button class="large square button black">Submit Code</button>
            </div>
            <div class="one_half">
            	<h3>HTML</h3>
                <ul>
                	<li class="yes">Read Prelim</li>
                    <li class="yes">Submitted Code</li>
                    <li class="no">Received score</li>
                </ul>
                <p>Currently being marked</p>
                <p>Time Taken:</p>
                <p>02 : 15 : 22</p>
                <p>HH : MM : SS</p>
                <p><small>Time is calculated from when you started reading the prelim</small></p>
                <p>Count Down Timer</p>
                <!-- Will allow cancelation, counts down from 5 minutes to 0. At 0, no more submissions allowed -->
                <p>05 : 00</p>
                <button class="large square button black">Submit Code</button>
            </div>
        </section> 
        <!-- CONTENT SECTION END -->  
          
	</div>
    <!-- WRAPPER END (RIGHT CONTENT PART) -->
</div> 
<!-- CONTAINER END (ENTIRE SITE) -->

</body>
</html>