<?php
/*
** watermark.php
** Creates watermarked image from image file
*/

$image = 'http://c360958.r58.cf2.rackcdn.com/68313_ca68f6cf457ae3950ff96880c6296d18.jpg';
if (isset($_GET['img'])) { $image = $_GET['img']; }


function add_watermark($image) {
	$overlay = 'http://sparklemon.com/php/watermark.png';
	
	$w_offset = 0;
	$h_offset = 0;
	
	$extension = strtolower(substr($image, strrpos($image, ".") +1));
	
	switch ($extension)
	{
		case 'jpg':
		$background = imagecreatefromjpeg($image);
		break;
		case 'jpeg':
		$background = imagecreatefromjpeg($image);
		break;
		case 'png':
		$background = imagecreatefrompng($image);
		break;
		default:
		die("Image type not supported");
	}
	
	$base_width = imagesx($background);
	$base_height = imagesy($background);
	imagealphablending($background, true);
	
	$overlay = imagecreatefrompng($overlay);

	imagesettile($background, $overlay);

	// Make the image repeat
	imagefilledrectangle($background, 0, 0, $base_width, $base_height, IMG_COLOR_TILED);
	header('Content-type: image/png');
	imagepng($background);
}

echo add_watermark($image);

?>
