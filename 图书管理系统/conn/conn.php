<?php
	DEFINE ('DB_USER','root');
	DEFINE ('DB_PASSWORD','123456');
	DEFINE ('DB_HOST','localhost');
	DEFINE ('DB_NAME','tushu');
	
	$conn=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) OR die('Could not to connect to Mysql:'.mysqli_connect_error());
	
	// if($conn)           //检测数据库是否连接成功
	// 	{
	// 		echo"<script>";
	// 		echo"alert(\"数据库连接成功！\");";
	// 		echo"</script>";
	// 	}
	// 	else
	// 	{
	// 		echo"<script>";
	// 		echo"alert(\"数据库没有连接成功！\");";
	// 		echo"</script>";
	// 	} 	
	mysqli_set_charset($conn, 'utf8');
?>