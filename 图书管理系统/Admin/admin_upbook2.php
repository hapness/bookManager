<?php 
include("../conn/conn.php");
$bname=$_POST['bname'];
$type=$_POST['choice'];
$author = $_POST['author'];
$publish = $_POST['public'];
$price = $_POST['price'];
$num = $_POST['number'];
$remark = $_POST['text'];
$floor = $_POST['floor'];
$id = $_POST['bid'];

$sql = "update book set book_name='$bname',type_id='$type',author='$author',publish='$publish',
price='$price',number='$num',remark='$remark',floor='$floor' where id='$id'";
$result = mysqli_query($conn,$sql);
if($result){
	echo "<script>";
	echo "alert(\"修改成功!\");";
	echo "location.href=\"admin_upbook.php?book=".$id."\";";
	echo "</script>";
}else{
	echo "<script>";
	echo "alert(\"修改失败!\");";
	echo "location.href=\"admin_upbook.php?book=".$id."\";";
	echo "</script>";
}
?>			