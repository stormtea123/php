<?php
    if(!(isset($_COOKIE['isLogin'])&& $_COOKIE["isLogin"]=="1")){
        header("Location:login.php");
        exit;
    }
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>链接数据库</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
    echo '你好'.$_COOKIE["username"];
?>
<p><a href="login.php?action=logout">退出</a></p>
<p><a href="download.php">下载图片</a></p>
</body>

</html>
