<?php
	session_start();
	if(isset($_SESSION['isLogin']) && $_SESSION['isLogin']===1){
		echo "<p>当前用户名：".$_SESSION["username"].'</p>';
	} else{
		header("Location:mail-login.php");
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
<p><a href="mail-logout.php">退出</a></p>
<?php 
	require "connect.inc.php";
	$stmt=$pdo->prepare("SELECT id,mailtitle,maildt FROM MAIL WHERE uid=?");
	$stmt->execute(array($_SESSION['uid']));
?>
<p>你的信箱中共有<b><?php echo $stmt->rowCount(); ?></b>封邮件</p>
<table border="0" callapacing="0" cellpadding="0" width="380">
	<tr><th>编号</th><th>邮件标题</th><th>接收时间</th></tr>
	<?php 
		while (list($id,$mailtitle,$maildt)=$stmt->fetch(PDO::FETCH_NUM)){
			echo '<tr align="center">';
			echo '<td>'.$id.'</td>';
			echo '<td>'.$mailtitle.'</td>';
			echo '<td>'.date("Y-m-d H:i:s",$maildt).'</td>';
			echo '</tr>';
		}
	?>
	</table>
</body>

</html>
