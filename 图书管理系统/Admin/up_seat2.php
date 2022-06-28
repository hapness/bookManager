<?php 
	include("../conn/conn.php");
	$id = $_GET['id'];
	$sql = "update seat "
	if(!empty($_POST['seat'])){
		$seat = $_POST['seat'];
		$sql = "update seat set ";
		$result = mysqli_query($conn,$sql);
		if($result){
			echo"<script>";
			echo"alert(\"添加座位成功！\");";
			echo"</script>";	
		}else{
			echo"<script>";
			echo"alert(\"添加座位失败！\");";
			echo"</script>";
		}
	}
	?>