<?php
	header("Content-Type: text/html; charset=utf-8");
	function clearCookies(){
		setCookie('username','',time()-3600);
		setCookie('isLogin','',time()-3600);
	}
  	if(isset($_GET["action"]) && $_GET['action']=="login"){
		clearCookies();
		if($_POST["username"]=="admin"&&$_POST["password"]=="123456"){
			setCookie('username',$_POST["username"],time()+60*60*24*7);
			setCookie('isLogin','1',time()+60*60*24*7);
			header("Location:index.php");
		} else {
			die("用户名或密码错误!");
		}
	} else if (isset($_GET["action"])  && $_GET['action']=="logout"){
		clearCookies();
	}
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>cookie用户登录</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
	<h1>用户登录</h1>
	<form action="login.php?action=login" method="post">
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
				<td><input type="submit" value="登录"></td>
			</tr>



		</table>
		<br>
	</form>
</body>

</html>
