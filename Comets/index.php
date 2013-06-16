<?php
	require_once('includes/connect.php');
	require_once('process/user.class.php');
	$user = new User();
?>
<html>
	<head>
			<link rel="stylesheet" href="css/reset.css" />
			<link rel="stylesheet" href="css/style.css" />
			<title>The Comets</title>
	</head>
	<body>
		<div id="container">
			<div id="main">
				<h1>The Comets</h1>
				<h2>About The Comets</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec auctor convallis lacus nec consectetur. Phasellus erat nibh, volutpat in dictum et, aliquet a lectus. Nam sed orci at nulla pulvinar convallis. Vestibulum sit amet justo orci. Ut at magna sit amet quam malesuada blandit eget et sapien. Vestibulum sit amet molestie magna. Curabitur vestibulum lacus in magna dictum vulputate. Proin dui tellus, interdum nec sagittis ut, convallis sed nisl. Curabitur et orci magna. Nam sagittis suscipit rhoncus. Integer leo urna, porttitor vestibulum eleifend sed, porta quis enim. Nam at imperdiet lectus. Aenean suscipit malesuada odio. Vivamus sit amet ipsum at purus dignissim eleifend ac eget turpis. Mauris justo ante, aliquam et faucibus vitae, lacinia ut velit.</p><br /> <hr />
				<h2>More about us</h2>
				<p>Suspendisse ultrices hendrerit turpis, sagittis interdum metus sollicitudin condimentum. In sem velit, malesuada ut placerat a, euismod vitae lorem. Aliquam erat volutpat. Cras et nibh sem, quis venenatis leo. Nullam eget feugiat enim. Nunc lacinia posuere lacus eget luctus. Donec vel ligula elementum urna condimentum cursus vitae in elit. Sed nisl purus, varius in rutrum at, elementum ut mauris. Nunc vel dolor quam. Suspendisse potenti. Nunc imperdiet pulvinar libero, a consequat dolor lobortis vitae.</p>
			</div>
			<div id="sidebar">
				<h1>Menu</h1>
				<?php include('sidebar.php'); ?>
			</div>
		</div>
	</body>
</html>
