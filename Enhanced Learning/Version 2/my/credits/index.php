<?php
	$root = '../../';
    require($root.'lib/config.php');
	require($root.'lib/functions.php');
	
	if(!logged_in()){
		header("Location: http://zando.co.uk");	
	}
	
?><!DOCTYPE html>
<html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width; initial-scale=1.0">

<title>My Credits | <?=$config['system']['company_name'];?></title>

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
       
            <a id="logo" href="<?=$config['system']['company_website_url'];?>">
            	<img src="<?=$root;?>images/logo_100.png" alt="<?=$config['system']['company_name'];?> logo" />
            </a>
            
        </header>
        <!-- HEADER END -->
        
        <!-- NAVIGATION MENU START -->
        <nav>
            <ul id="menu_list">
                <li><a href="<?=$root;?>">Home</a></li>
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
							echo '<li><a href="'.$root.'my/login">Login / Register</a></li>';
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
                <h2 class="main_title">It's all about me.</h2>
            </hgroup>        
                      
                                  
            <div class="one">
                <h3>Credits</h3>
                <p>Unfortunately, not everything in life is free. Fortunately, some of the competitions here are. Credits are what you use to pay for a competition. You can topup, and cashout with credits.</p><p> <strong>Please note that you cash out 95% of your credits.</strong> We keep 5% to keep our service running.</p>
            </div>   
            <div class="one_half">
            	<h3>Top up</h3>
                <p>Each credit is equivalent to $2.00.</p>
                <p>Click the button below then change the quantity to get more credits</p>
            </div>                                     
            <div class="one_half">
            	<h3>Cash Out</h3>
                <p>Credits can be cashed out twice a month.</p>
                <p>On the 15th and the <span class="title" title="When month permits. February will be on 28th or 29th depending on year">30th</span>, we will send money out to you via PayPal.</p>
                <p>Unfortunately, PayPal is currently the only method we use for payments. We are looking into other options, but there are none available at this moment.</p>
                <p>A cash out request can be made at any point, however the <span class="title" title="Eg. If you were to request cash out on the 14th after Midnight GMT, then your payment would be processed on the 30th instead.">deadline is 24 hours before the next payment day for if you wish to receive it on that date.</span></p>
            </div>
            <div class="one_half">
            <a class="square medium black button " href="#"><span>1 Credit<small class="price">$2.00</small></span></a>
            </div>
            <div class="one_half">
            <a href="cashout" class="black button square large"><span>Request a Cash Out</span></a>
            </div>
        </section> 
        <!-- CONTENT SECTION END -->  
          
	</div>
    <!-- WRAPPER END (RIGHT CONTENT PART) -->
</div> 
<!-- CONTAINER END (ENTIRE SITE) -->

</body>
</html>