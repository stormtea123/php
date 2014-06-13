<?php
    //等比例缩放
    function thumb($filename, $width=200, $height=200){
        list($width_orig,$height_orig) = getimagesize($filename);
        if($width && ($width_orig<$height_orig)){
            $width=($heigth/$height_orig)*$width_orig;
        } else {
            $height=($width/$width_orig)*$height_orig;
        }
        //创建一个真彩色图像
        $image_p=imagecreatetruecolor($width,$height);
        $image = imagecreatefromjpeg($filename);
        imagecopyresampled($image_p,$image,0,0,0,0,$width,$height,$width_orig,$height_orig);
        imagejpeg($image_p,"build/img_thumb.jpg",100);
        imagedestroy($image_p);
        imagedestroy($image);
    }
    thumb("src/img.jpg",100,100);
?>
