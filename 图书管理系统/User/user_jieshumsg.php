<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"/>
	<script src="../js/jQuery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<title>欢迎登录用户端</title>
</head>
<body>
	<nav class="navbar navbar-expand-sm navbar-light">
		<a href="#" class="navbar-brand">国家图书馆</a>
		
		<button type="button" class="navbar-toggler" data-toggle = "collapse" data-target="#nb">
			<span class="navbar-toggler-icon text-dark"></span>
		</button>
		
		<div class="navbar-collapse collapse" id="nb">
			<ul class="navbar-nav">
				<li class="nav-item"><a href="user_index.php" class="nav-link">图书查询</a></li>
				<li class="nav-item"><a href="user_jieshumsg.php" class="nav-link active">我的借阅</a></li>
				<li class="nav-item"><a href="user_seat.php" class="nav-link">座位预约</a></li>
				<li class="nav-item"><a href="user_introduce.php" class="nav-link">个人信息</a></li>
				<li class="nav-item"><a href="../index.php" class="nav-link">退出登录</a></li>
			</ul>
		</div>
		
		<span class="navbar-brand">你好,
		<?php
			session_start();//开启session功能
			echo $_SESSION["username"];
		?></span>
	</nav>
	
	<table class="table table-hover table-bordered table-striped container-fluid mt-5" >
		<thead class="table-dark" align="center">
			<th>借书编号</th>
			<th>图书名称</th>
			<th>是否归还</th>
			<th>借书时间</th>
			<th>还书时间</th>
		</thead>
		<tbody class="" align="center">
			<?php
			include_once("../conn/conn.php");
			include_once("../tools.php");
			$sql = "select * from borrowdetail where user_id='".$_SESSION['uid']."';";
			// echo "<script>";
			// echo "alert(\"借书成功!\");";
			// echo "location.href=\"user_index.php\";";
			// echo "</script>";
			
			$result = mysqli_query($conn,$sql);
			$number = mysqli_num_rows($result);
			if($number>0){
				if(empty($_GET['p'])){
					$p=0;
				}else{
					$p=$_GET['p'];
				}
				$endl=$p+10;
				if($endl>$number){
					$endl=$number;
				}
				for($i=0;$i<$endl;$i++){
					$row = mysqli_fetch_array($result);
					if($i>=$p){
						echo "<tr>";
						echo "<td>$row[0]</td><td>".fbname($row[2],$conn)."</td><td>".($row[3]==1?'否':'是')."</td>
						<td>".date("Y-m-d",$row[4])."</td><td>".($row[5]==null?'未还':date("Y-m-d",$row[5]))."</td>";
						echo "</tr>";
					}
				}
				
			}
			?>
		</tbody>
	</table>
	
	<ul class="pagination pagination-lg justify-content-center mt-5" style="width: 40px 0;" id="footer">
		<li class="page-item"><a href="user_jieshumsg.php ? p=0" class="page-link">&laquo;</a></li>
		<?php
			$cnt=-1;
			for($i=$number;$i!=0;$i-=10){
				if($i<0) {
					break;
				}
				else {
					$cnt+=1;
					echo "<li class='page-item'><a href='user_jieshumsg.php ? p=".($cnt*10)."' class='page-link'>".($cnt+1)."</a></li>";
				}
			}
			echo "<li class=\"page-item\"><a href='user_jieshumsg.php ? p=".($cnt*10)."' class=\"page-link\">&raquo;</a></li>";
			if($cnt==-1){
				echo "<script>";
				echo "$(\"#footer\").hide();";
				echo "</script>";
			}
		?>
	</ul>
	<?php
	include("../footer.php");
	?>
</body>
</html>
<script>
	
</script>