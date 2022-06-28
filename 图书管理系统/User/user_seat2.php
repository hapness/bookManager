<?php 
include("../conn/conn.php");
session_start();
$uname = $_SESSION['username'];
$id = $_GET['id'];
$vis = $_GET['vis'];
if($vis==1){
	$sql = "update seat set static = 1,isnull='$uname'  where id = '$id';";
}else if($vis==0){
	$sql = "update seat set static = 0,isnull=''  where id = '$id';";
}else{
	echo "<script>";
	echo "alert(\"取消失败，您未预约该位置！\");";
	echo "location.href=\"user_seat.php\";";
	echo "</script>";
}

$result = mysqli_query($conn,$sql);
if($result){
		echo "<script>";
		if($vis==1){
			echo "alert(\"预约成功！\");";
		}else{
			echo "alert(\"取消预约成功！\");";
		}
		echo "location.href=\"user_seat.php\";";
		echo "</script>";
	}else{
		echo "<script>";
		if($vis==1){
			echo "alert(\"预约失败！\");";
		}else{
			echo "alert(\"取消失败！\");";
		}
		echo "location.href=\"user_seat.php\";";
		echo "</script>";
	}
?>