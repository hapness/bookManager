<?php
include("../conn/conn.php");
$id = $_GET['book'];
$sql = "select * from borrowdetail where book_id=$id and `status`=1";
$result = mysqli_query($conn,$sql);
$num = mysqli_num_rows($result);

if($num>0){
	echo "<script>";
	echo"alert(\"删除书籍失败,有未归还书籍\")";
	echo "location.href=\"seat_admin.php\";";
	echo"</script>";
}else{
	$sql = "delete from book where id = '$id'";
	$result = mysqli_query($conn,$sql);
	
	echo "<script>";
	echo"alert(\"删除成功!\")";
	echo "location.href=\"seat_admin.php\";";
	echo"</script>";
}

?>