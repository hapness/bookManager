<?php
include_once("../conn/conn.php");
session_start();
$uid = $_SESSION['uid'];
$id = $_POST['id'];
$time = time();

$sql = "select * from borrowdetail where user_id = '$uid' and book_id = '$id' and `status`=1;";

$result = mysqli_query($conn,$sql);
$num = mysqli_num_rows($result);
if($num==0){
	$sql = "insert into borrowdetail values(0,$uid,$id,1,$time,null)";
	
	$reslut = mysqli_query($conn,$sql);
	if($result){
		$sql = "update book set number=number-1 where id = '$id';";
		mysqli_query($conn,$sql);
		echo "<script>";
		echo "alert(\"借书成功!\");";
		echo "location.href=\"user_index.php\";";
		echo "</script>";
	}
}else{
	echo "<script>";
	echo "alert(\"本书已借尚未归还，如需借阅请先归还此书！\");";
	echo "location.href=\"user_index.php\";";
	echo "</script>";
}
?>