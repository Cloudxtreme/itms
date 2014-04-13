<?php
class CImageUtil
{
public static function genTextPNG($text, $size=20, $font='arial.ttf') {
	// Set the content-type
	header('Content-Type: image/png');
	$tw = strlen($text) * $size + 20;
	$th = $size + 20;
	// Create the image
	$im = imagecreatetruecolor($tw, $th);
	// Create some colors
	$white = imagecolorallocate($im, 255, 255, 255);
	$black = imagecolorallocate($im, 0, 0, 0);
	imagefilledrectangle($im, 0, 0, $tw-1, $th-1, $white);
	// Replace path by your own font path
	$fontn = dirname(__FILE__) . '/'. $font;
	// Add the text
	imagettftext($im, $size, 0, 10, $size, $black, $fontn, $text);
	// Using imagepng() results in clearer text compared with imagejpeg()
	imagepng($im);
	imagedestroy($im);
}
}
?>
