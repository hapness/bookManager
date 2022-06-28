<?php 
include("../conn/conn.php");

$sql = "insert into book values(0,'".$_POST['bname']."','".$_POST['choice']."','".$_POST['author']."'
,'".$_POST['public']."','".$_POST['price']."','".$_POST['number']."',1,'".$_POST['text']."','".$_POST['floor']."')";

$result = mysqli_query($conn,$sql);
if($result){
	echo "<script>";
	echo "alert(\"添加成功!\");";
	echo "location.href=\"add_book.php\";";
	echo "</script>";
}else{
	echo "<script>";
	echo "alert(\"添加失败!\");";
	echo "location.href=\"add_book.php\";";
	echo "</script>";
}
?>