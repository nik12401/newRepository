<?php
header ("Content-type: image/png");
$im = imagecreatetruecolor(320, 240);
$ink = imagecolorallocate($im, 255, 255, 255);

imagepolygon($im, Array(
	100,100,
	120,180,
	210,160,
	), 3, $ink);

imagepng($im);
imagedestroy($im);
?>