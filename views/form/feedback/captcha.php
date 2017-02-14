<?php

$image_x=150;//размер изображения
$image_y=40;
$min_angle=-30;//угол наклона
$max_angle=30;
$min_size=14;//размер шрифта
$max_size=18;
$fonts = array('ONYX.TTF', 'ITCKRIST.TTF', 'VINERITC.TTF');//разные шрифты
$chars = '23456789';//набор символов
$length = mt_rand(4, 4);//длина капчи
$captcha = '';
for ($i =0; $i < $length; $i++)
{
    $captcha .= $chars[mt_rand(0,strlen($chars)-1)];//формируем капчу
}
$_COOKIE["captcha"]=$captcha;//заносим в cookie


$cookie = $captcha;
$cookietime = time()+120; // Можно указать любое другое время
setcookie("captcha", $cookie, $cookietime);


$im = imagecreatetruecolor($image_x, $image_y);
$background = imagecolorallocate ($im, rand(150, 250), rand(150, 250), rand(150, 250));
imagefill($im, 0,0, $background);

$step=round($image_x/(strlen($captcha)+2));
$sx=0;
for($i=0;$i<strlen($captcha);$i++)
{
    $letter=$captcha[$i];
    $sx += $step + (rand(-round($step/5),round($step/5)));
    $sy=$image_y-round($image_y/3)+rand(-round($image_y/5),round($image_y/5));
    $sa=rand($min_angle,$max_angle);
    $ss=rand($min_size,$max_size);
    $sf=$fonts[rand(0,count($fonts)-1)];
    $sc=imagecolorallocate($im, rand(0, 150), 0, rand(0, 150));
    imagettftext($im, $ss, $sa, $sx, $sy, $sc, $sf, $letter);
}
header("Content-type: image/png");


imagepng($im);
imagedestroy($im);
?>