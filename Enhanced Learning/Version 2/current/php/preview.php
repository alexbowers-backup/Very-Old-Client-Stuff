<?php
	$root = '../../';
    require($root.'lib/config.php');
	require($root.'lib/functions.php');
	
	
?><!DOCTYPE html>
<html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>My Account | <?=$config['system']['company_name'];?></title>

<!-- CSS FILES START -->
<link rel="stylesheet" href="http://twitter.github.com/bootstrap/assets/css/bootstrap.css" />
<link rel="stylesheet" href="<?=$root;?>style.css" media="screen" /> 

<link rel="stylesheet" href="<?=$root;?>lib/css/flexslider.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?=$root;?>lib/css/prettyPhoto.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?=$root;?>lib/css/black.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?=$root;?>lib/css/css-buttons.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?=$root;?>lib/css/jquery.countdown.css" type="text/css" media="screen" />
<link href='http://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Pontano+Sans' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="http://angularjs.org/google-code-prettify/prettify.css" type="text/css" media="screen" />
<link rel="stylesheet" href="style.css" media="screen" />
<!-- CSS FILES END -->

<link rel="shortcut icon" href="<?=$root;?>images/favicon.ico" />

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
<script src="http://twitter.github.com/bootstrap/assets/js/bootstrap-tooltip.js" type="text/javascript"></script>
<script src="http://twitter.github.com/bootstrap/assets/js/bootstrap-popover.js" type="text/javascript"></script>
<script src="http://twitter.github.com/bootstrap/assets/js/bootstrap-dropdown.js" type="text/javascript"></script>
<script src="http://twitter.github.com/bootstrap/assets/js/bootstrap-tab.js" type="text/javascript"></script>
<script type="text/javascript" src="http://twitter.github.com/bootstrap/assets/js/google-code-prettify/prettify.js"></script>
<script>
	$(document).ready(function(){
		$('[rel=popover]').each(function(){
			var content = $(this).attr('data-content');
			var title = $(this).attr('data-original-title');
			$(this).popover({
				placement: 'right',
				title: title,
				content: content
			});
		});
	});
</script>
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

<body onload="prettyPrint();">

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
                <li><strong><a href="<?=$root;?>current">Current Competitions</A></strong></li>
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
      	<div class="two_thirds">
			<div class="tabbable">
					<ul class="nav nav-tabs">
                        <li><a href="#code1" data-toggle="tab">Index.html</a></li>
                        <li><a href="#code2" data-toggle="tab">Home.php</a></li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">CSS<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#" data-toggle="tab">home.css</a></li>
                                <li><a href="#" data-toggle="tab">style.css</a></li>
                            </ul>
                        </li>
                    </ul>
					<div id="m1">
						<pre class="prettyprint linenums"><code class="language-html">&lt;!doctype html&gt;
&lt;html&gt;
	&lt;head&gt;
		&lt;title&gt;<code style="background-color: rgb(153, 194, 255);" data-original-title="title" class="nocode" rel="popover" data-content="Sets the title at the top of the page">The Title</code>&lt;/title&gt;
		&lt;script src=&quot;http://example.com/&quot; type=&quot;text/javascript&quot;&gt;&lt;/script&gt;
    &lt;/head&gt;
    &lt;body&gt;
    	&lt;div class=&quot;container&quot;&gt;
    		&lt;p&gt;Hello World&lt;/p&gt;
        &lt;/div&gt;
    &lt;/body&gt;
&lt;/html&gt;
        </code></pre>
					</div>
				</div>
            </div>
	  </section> 
	</div>
    <!-- WRAPPER END (RIGHT CONTENT PART) -->
</div> 
<!-- CONTAINER END (ENTIRE SITE) -->

</body>
</html>