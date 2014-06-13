<?php 
	define("DSN","mysql:host=localhost;dbname=mail");
	define("DBUSER",'root');
	define("DBPASS",'');
	try{
		$pdo = new PDO(DSN,DBUSER,DBPASS);
		//echo var_dump($pdo);
	} catch(PDOException $e){
		die("链接失败:".$e->getMessage());
	}
?>