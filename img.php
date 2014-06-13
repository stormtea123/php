<?php
    header("Content-type:image/png");
    //创建一个彩色图像
    $width = 336;
    $height = 280;
    $im = imagecreatetruecolor($width, $height);
    $white = imagecolorallocate($im, 255, 255, 255);
    imagecolortransparent($im,$white);
    $grey = imagecolorallocate($im, 200, 200, 200);
    $black = imagecolorallocate($im, 0, 0, 0);
    //绘制矩形并填充
    imagefilledrectangle($im, 0, 0, 336, 280, $white);
    $string = $width.'x'.$height;
    $font = 'src/Oswald-Regular.ttf';
    //字体大小
    $fontSize = 40;

    $fontWidth = imagefontwidth ( $fontSize );
    $fontHeight = imagefontheight ( $fontSize );

    $textWidth = $fontWidth * strlen ( $string );

    $x = ceil ( ($width - $textWidth) / 2 );//计算文字的水平位置
    $textHeight = $fontHeight;
    $y = ceil(($height - $textHeight) / 2);//计算文字的垂直位置

    //imageString($im, 3, 28, 70, $string, $black);
    imagettftext($im, $fontSize, 0, $x, $y, $black, $font, $string);
    //输出png
    imagepng($im);

    imagedestroy($im);
?>