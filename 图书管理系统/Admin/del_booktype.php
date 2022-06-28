<?php 
include("../conn/conn.php");
if(empty($_GET['id'])){
	echo "<script>";
	echo "location.href=\"book_type.php\";";
	echo "</script>";
}
$id = $_GET['id'];
$sql = "delete from book_type where id ='$id';";
$reslut = mysqli_query($conn,$sql);
if($reslut){
	echo "<script>";
	echo "alert(\"删除类别成功！\");";
	echo "location.href=\"book_type.php\";";
	echo "</script>";
}else{
	echo "<script>";
	echo "alert(\"删除类别失败！\");";
	echo "location.href=\"book_type.php\";";
	echo "</script>";
}
?>