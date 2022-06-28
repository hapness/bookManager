<?php
include("../conn/conn.php");
$uname=$_POST['uname'];
$sex = $_POST['sex'];
$tel = $_POST['tel'];
$id = $_POST['uid'];
session_start();
$sql = "update user set username='$uname',sex='$sex',phone='$tel' where id = $id";
$_SESSION['username']=$uname;
$result = mysqli_query($conn,$sql);
if($result){
	echo "<script>";
	echo "alert(\"修改成功！\");";
	echo "location.href=\"user_introduce.php\";";
	echo "</script>";
}else{
	echo "<script>";
	echo "alert(\"修改失败！\");";
	echo "location.href=\"user_introduce.php\";";
	echo "</script>";
}
?>