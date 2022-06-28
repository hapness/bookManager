<?php 
include("../conn/conn.php");
if(empty($_GET['user'])){
	echo "<script>";
	echo "location.href=\"introduce.php\";";
	echo "</script>";
}
$id = $_GET['user'];
$sql = "delete from user where id ='$id';";
$reslut = mysqli_query($conn,$sql);
if($reslut){
	$sql = "delete from borrowdetail where user_id='$id';";
	mysqli_query($conn,$sql);
	echo "<script>";
	echo "alert(\"删除用户成功！\");";
	echo "location.href=\"introduce.php\";";
	echo "</script>";
}else{
	echo "<script>";
	echo "alert(\"删除用户失败！\");";
	echo "location.href=\"introduce.php\";";
	echo "</script>";
}
?>