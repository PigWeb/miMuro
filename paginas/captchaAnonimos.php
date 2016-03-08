<?php
header("Content-type: image/png");
session_start();
$string = substr(str_shuffle(md5(microtime())),0,5); //con microtime obtengo 32 caracteres random, con subtr ,0,5 lo limito a 5 caracteres y cn srt_shuffle hago que el string sea más random todavia
$captcha = imagecreatefrompng("../img/captchafondo.png");
//$colorlineas = imagecolorallocate($captcha,22,86,165); //color azul
$colorletras = imagecolorallocate($captcha,22,86,165); //color azul para que sea blanco 255,255,255
//imageline($captcha,55,0,20,40,$lineas);
//imageline($captcha,0,0,65,15,$lineas);
//imageline($captcha,40,0,84,24,$lineas);
//imageline($captcha,0,10,90,38,$lineas);
imagestring($captcha,10,30,10, $string, $colorletras);
$_SESSION['CAPTCHA'] = $string;
imagepng($captcha);
imagedestroy($captcha);

?>
