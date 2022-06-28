<?php
include_once("../conn/conn.php");
session_start();
$uid = $_SESSION['uid'];
$id = $_POST['id'];
$time = time();

$sql = "update borrowdetail set `status`=2,return_time = '$time' where user_id='$uid' and book_id='$id';";
$result = mysqli_query($conn,$sql);

if($result){
	$sql = "update book set number=number+1 where id = '$id';";
	mysqli_query($conn,$sql);
	echo "<script>";
	echo "alert(\"还书成功!\");";
	echo "location.href=\"user_jieshumsg.php\";";
	echo "</script>";
}else{
	echo "<script>";
	echo "alert(\"归还失败，请稍后重试！\");";
	echo "location.href=\"user_jieshumsg.php\";";
	echo "</script>";
}
?>