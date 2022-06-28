<?php
include("../conn/conn.php");
session_start();
$old =$_POST['old'];
$newpwd = $_POST['newpwd'];

$sql = "select * from user where id='".$_SESSION['uid']."' and password='$old';";

$result = mysqli_query($conn,$sql);
$num = mysqli_num_rows($result);
if($num>0){
	$sql = "update user set password='$newpwd' where id='".$_SESSION['uid']."';";
	$result = mysqli_query($conn,$sql);
	if($result){
		echo"<script>";
		echo"alert(\"修改密码成功!\");";
		echo"location. href=\"updatepwd.php?flag=ok\"";
		echo"</script>";
	}else{
		echo"<script>";
		echo"alert(\"修改密码失败!\");";
		echo"location. href=\"updatepwd.php?flag=no\"";
		echo"</script>";
	}
	
}else{
	echo"<script>";
	echo"alert(\"旧密码输入错误!\");";
	echo"location. href=\"updatepwd.php?flag=no\"";
	echo"</script>";
}
?>