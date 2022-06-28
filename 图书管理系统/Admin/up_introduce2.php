<?php
include("../conn/conn.php");
$uname=$_POST['uname'];
$pwd=$_POST['pwd'];
$sex = $_POST['sex'];
$tel = $_POST['tel'];
$id = $_POST['uid'];

$sql = "update user set username='$uname',password='$pwd',sex='$sex',phone='$tel' where id = $id";

$result = mysqli_query($conn,$sql);
if($result){
	echo "<script>";
	echo "alert(\"修改成功！\");";
	echo "location.href=\"introduce.php\";";
	echo "</script>";
}else{
	echo "<script>";
	echo "alert(\"修改失败！\");";
	echo "location.href=\"introduce.php\";";
	echo "</script>";
}
?>