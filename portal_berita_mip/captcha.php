<?php
session_start();

$chars = 'ABCDEFGHJKMNOPQRSTUVWXYZabcdefghjkmnopqrstuvwxyz';
$captcha = substr(str_shuffle($chars), 0, 4);

$_SESSION['captcha'] = $captcha;

header('Content-type: image/png');
$image = imagecreate(100, 40);

$bg = imagecolorallocate($image, 240, 240, 240);
$text_color = imagecolorallocate($image, 0, 0, 0);

imagestring($image, 5, 25, 10, $captcha, $text_color);

imagepng($image);
imagedestroy($image);
