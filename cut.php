<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>jQuery.getJSON demo</title>
    <style>
    body { font-size:18px; }
    </style>
    <script srcv="http://code.jquery.com/jquery-1.10.2.js"></script>
</head>

<body>
    
    <?php
        //图片裁剪
        function cut($filename, $x, $y, $width, $height){
            $back= imagecreatefromjpeg($filename);
            $cuting = imagecreatetruecolor($width,$height);
            imagecopyresampled($cuting,$back,0,0,$x,$y,$width,$height,$width,$height);
            imagejpeg($cuting,"build/img_cut.jpg");
            imagedestroy($cuting);
            imagedestroy($back);
            echo "裁剪完毕";
        }
        cut("src/img.jpg",50,50,200,200);
    ?>


</body>

</html>
