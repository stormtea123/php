<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>jQuery.getJSON demo</title>
    <style>
    body { font-size:18px; }
    </style>
</head>
<body>
    
    <?php
        //图片水印
        function watermark($filename,$water){
            list($b_w,$b_h) = getimagesize($filename);
            list($w_w,$w_h) = getimagesize($water);
            $posX = rand(0,($b_w-$w_w));
            $posY = rand(0,($b_h - $w_h));

            $back = imagecreatefromjpeg($filename);
            $water = imagecreatefrompng($water);
            imagecopy($back, $water, $posX, $posY,0,0,$w_w,$w_h);
            imagejpeg($back,"build/img_mark.jpg");
            imagedestroy($back);
            imagedestroy($water);
        }
        watermark("src/img.jpg","src/logo.png")

    ?>


</body>

</html>
