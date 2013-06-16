<?php
	
    require('lib/config.php');
	require('lib/functions.php');
	
?><!DOCTYPE html>
<html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Home | <?=$config['system']['company_name'];?></title>

<!-- CSS FILES START -->
<link rel="stylesheet" href="style.css" media="screen" /> 
<link rel="stylesheet" href="lib/css/flexslider.css" type="text/css" media="screen" />
<link rel="stylesheet" href="lib/css/black.css" type="text/css" media="screen" />

<link href='http://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Pontano+Sans' rel='stylesheet' type='text/css'>
<!-- CSS FILES END -->

<link rel="shortcut icon" href="images/favicon.ico" />

<!-- JS FILES START -->
<script src="lib/js/jquery-1.7.2.min.js" type="text/javascript"></script> 
<script src="lib/js/jquery.tools.min.js" type="text/javascript"></script> 
<script src="lib/js/jquery.flexslider-min.js" type="text/javascript"></script> 
<script src="lib/js/jquery.easing.1.3.js" type="text/javascript"></script> 
<script src="lib/js/jquery.cookie.js" type="text/javascript"></script> 
<script src="lib/js/hoverIntent.js" type="text/javascript"></script> 
<script src="lib/js/modernizr.custom.80028.js" type="text/javascript"></script>
<script src="lib/js/dcjqaccordion.js" type="text/javascript"></script> 
<script src="lib/js/mixed.js" type="text/javascript"></script> 
<!--<script>
	if(screen.availWidth > 1024){
		$(document).ready(function(){
			
			$('#note').text("Kudos on the big screen. We're working to improve the design for you as we speak.");
		});
	}
</script>-->
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
	<div id="note"></div>
	<!-- MENU SECTION START (LEFT SIDEBAR) -->
    <section id="menu">
    
    	<!-- HEADER START -->
    	<header>
        

            <a id="logo" href="<?=$config['system']['company_website_url'];?>">
            	<img src="images/logo_100.png" alt="<?=$config['system']['company_name'];?> logo" />
            </a>
            
        </header>
        <!-- HEADER END -->
        
        <!-- NAVIGATION MENU START -->
        <nav>
            <ul id="menu_list">
                <li class="current-menu-item"><a href="">Home</a></li>
                <li>
                    <a href="my">My Account</a>
                    <ul class="sub-menu">
                    	<?php
							if(logged_in()){
						?>
                        <li><a href="my/credits">{0} Credits</a></li>
                        <li><a href="my/competitions">{0} Enrollments</a></li>
                        <li><a href="my/logout">Log Out</a></li>
                        <?php } else {
							echo '<li><a href="my/login">Login / Register</a></li>';
						} ?>
                    </ul>
                </li>          
                <hr />
                <li><strong><A href="current">Current Competitions</A></strong></li>
                <li>
                    <a href="current/php">PHP</a>
                    <ul class="sub-menu">
                        <li><a href="current/php/1">Comp 1</a></li>
                        <li><a href="current/php/2">Comp 2</a></li>
                    </ul>                
                </li>
                <li>
                    <a href="current/jquery">jQuery</a>
                    <ul class="sub-menu">
                        <li><a href="current/jquery/1">Comp 1</a></li>
                        <li><a href="current/jquery/2">Comp 2</a></li>
                    </ul>                
                </li>
                <li>
                    <a href="current/html">HTML</a>
                    <ul class="sub-menu">
                        <li><a href="current/html/1">Comp 1</a></li>
                        <li><a href="current/html/2">Comp 2</a></li>
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
                <h2 class="main_title">Welcome<?=(isset($_SESSION['uname']))? ' '.$_SESSION['uname'] : '';?>, it's competition time!</h2>
               
            </hgroup>        
                      
            <div class="one">
            	<h3>
                	There are two types of competitions:
                </h3>
            </div>                      
            <div class="one_half">
                <h3>Free</h3>
                <p>Free ones are often for experience, but also can have good rewards. So keep a look out for those ones!</p>
                
            </div>   
            <div class="one_half">
                <h3>Paid</h3>
                <p>Generally, paid ones have better rewards. But, you have to place a wager down on how you think you will do.</p>
            </div>                    
            <div class="one">
            	<p>Once you have entered a competition, you do not have to submit code; however we do not issue refunds unfortunately.</p>
                <p>The prize can be chosen from several different options, such as winner takes all, to a breakdown, to a set prize. Any extra the competition author can do what he likes with.</p>
                <p>Once a competition finishes, the competition author will mark all the submitted pieces, please keep in mind that this does take time. We will do our best to keep you informed, however don't worry. Before a competition can go live, the author must place the prize in an escrow fund, so the winner will get paid.</p>
            </div>
        </section> 
        <!-- CONTENT SECTION END -->  
          
	</div>
    <!-- WRAPPER END (RIGHT CONTENT PART) -->
</div> 
<!-- CONTAINER END (ENTIRE SITE) -->

</body>
</html>