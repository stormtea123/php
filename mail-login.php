<?php
    header("Content-Type: text/html; charset=utf-8");
    session_start();
    require "connect.inc.php";
    //创建mail数据表
    // create table mail(
    //     id int(11) unsigned NOT NULL auto_increment,
    //     uid mediumint(8) unsigned NOT NULL　DEFAULT '0',
    //     mailtitle varchar(20) NOT NULL default '',
    //     maildt int(10) unsigned not null default '10',
    //     primary key (id)
    // );

    //LOAD DATA LOCAL INFILE 'C:/wamp/www/Dropbox/php/src/mail.txt' INTO TABLE mail
    //LINES TERMINATED BY '\r\n';
    //LOAD DATA LOCAL INFILE 'C:/wamp/www/Dropbox/php/src/user.txt' INTO TABLE user
    //LINES TERMINATED BY '\r\n';
    if(isset($_POST['sub'])) {
        echo '已经取到了sub<br>';
        $stmt = $pdo->prepare("SELECT id,username FROM user WHERE username=? and userpwd=?");
        $stmt-> execute(array($_POST["username"], md5($_POST["password"])));
        //echo md5($_POST["password"]).'<br>';
        //echo $stmt->rowCount().'<br>';
        //echo var_dump($stmt).'<br>';
        if($stmt->rowCount()>0){
            $_SESSION = $stmt->fetch(PDO::FETCH_ASSOC);
            if($stmt->rowCount()>0){
                $_SESSION = $stmt -> fetch(PDO::FETCH_ASSOC);
                $_SESSION["isLogin"] = 1;
                $_SESSION["username"] = $_POST["username"];
                $_SESSION['uid'] = 1;
                header("Location:mail-index.php");
            } else {
                echo '<font color="red">用户名或者密码错误</font>';
            }
        } else {
            echo '数据为空';
        }
    } else {
        echo '没有取到sub<br>';
    }
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>邮件登录系统</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>邮件登录系统</h1>
    <form action="mail-login.php" method="post">
        <table>
            <tr>
                <td>用户名</td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td>密码</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="sub" value="登录"></td>
            </tr>
        </table>
        <br>
    </form>
</body>

</html>
