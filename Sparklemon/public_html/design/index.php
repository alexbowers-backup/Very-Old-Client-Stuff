<!DOCTYPE html>
<html>
<head>
	<meta charset=utf-8 />
	<title>GDM</title>
	<link rel="stylesheet" type="text/css" media="screen" href="css/master.css" />
	<link rel="stylesheet" type="text/css" media="screen" href="css/nivo-slider.css" />
	<script type="text/javascript" src="../js/jquery-1.4.2.min.js"></script>
	<script type="text/javascript" src="../js/jquery.nivo.slider.pack.js"></script>
	<script type="text/javascript"> 
	$(window).load(function() {
		$('#slider').nivoSlider({
			effect:'fade',
			animSpeed:500,
			pauseTime:4000,
			directionNav:true,
			controlNav:false,
			keyboardNav:false,
			pauseOnHover:true
		});
	});
	</script>
</head>
<body>
<div id="header">
    <div id="nav"><ul>
        <li>Number 1</li>
        <li>Number 2</li>
        <li>Number 3</li>
    </ul></div>
    <a href="#" id="title">GDM</a>
</div>
<div id="container">
<div id="box_featured">
	<div id="slider" class="nivoSlider"> 
		<img src="../images/featured_image1.png" alt="Featured" />
		<img src="../images/featured_image2.png" alt="Featured" />
	</div>
</div>
<h1>Hello?</h1>
<p>Does this thing work?</p>
<p><a href="#"><img src="../images/button_TEST.png" alt="Click Here" onMouseOver="this.src='../images/button_TEST_d.png'" onMouseOut="this.src='../images/button_TEST.png'" /></a> &lt; Image button example, soon to be CSS to work with <em>all text</em></p>
<p><button type="button">Click Here</button> &lt; <em>Completely</em> CSS, but won't look the same on older browsers...</p>
<p><a class="button" href="#">Click Here! Click Here! Click Here! Click Here!</a> &lt; The one above is an actual <em>&lt;button&gt;</em>, but this one is an anchor (link).</p>
</div>
<div id="footer">&copy; <?php echo date("Y"); ?> Us</div>

</body>
</html>