<?php
	include("../conn/conn.php");
	
	if(!empty($_GET['id'])){
		$id = $_GET['id'];
		$sql = "delete from seat where id = '$id'";
		$result = mysqli_query($conn,$sql);
		if($result){
			echo"<script>";
			echo"alert(\"删除座位成功！\");";
			echo "location.href=\"seat_admin.php\";";
			echo"</script>";	
		}else{
			echo"<script>";
			echo"alert(\"删除座位失败！\");";
			echo "location.href=\"seat_admin.php\";";
			echo"</script>";
		}
	}
?>