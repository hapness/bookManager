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
				<li class="nav-item"><a href="#" class="nav-link active">图书查询</a></li>
				<li class="nav-item"><a href="user_jieshumsg.php" class="nav-link">我的借阅</a></li>
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
	
	<form class="input-group mt-2 mb-3" method="post" action="" style="width: 400px; margin: 0 auto;">
		<input type="text" id="id" class="form-control input-group-lg " name="content" placeholder="输入位置所属区域进行查询"/>
		<button type="submit" class="btn btn-dark">搜索</button>
	</form>
	
	<table class="table table-hover table-bordered table-striped container-fluid" >
		<thead class="table-dark" align="center">
			<th>座位id</th>
			<th>所处位置</th>
			<th>预约状态</th>
			<th>操作</th>
		</thead>
		<tbody class="" align="center">
			<?php
			include("../conn/conn.php");
			
			if(!empty($_POST["content"])){
				$content = $_POST["content"];
				$sql = "select * from seat where location like '%".$content."%';";
			}else{
				$sql = "select * from seat;";
			}
			
			// echo "<script>";
			// echo "alert(\"$sql\")";
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
						echo "<td>$row[0]</td><td>$row[1]</td><td>".($row[2]==0?'可预约':'不可预约')."</td>";
						if($row[2]==0){
							echo "<td style=\"vertical-align: ;\" align='center'>
							<a href='user_seat2.php?id=$row[0]&vis=1'>预约</a>
							</td></tr>";
						}else{
							if($row[3]==$_SESSION['username']){
								echo "<td style=\"vertical-align: ;\" align='center'>
								<a href='user_seat2.php?id=$row[0]&vis=0'>取消预约</a>
								</td></tr>";
							}else{
								echo "<td style=\"vertical-align: ;\" align='center'>
								<a href='user_seat2.php?id=$row[0]&vis=2'>取消预约</a>
								</td></tr>";
							}
							
						}
						
					}
				}
				
			}
			else{
				echo '<h1 class="text-info">没有书籍信息</h1>';
			}
			?>
		</tbody>
	</table>
	
	<ul class="pagination pagination-lg justify-content-center mt-5" style="width: 40px 0;">
		<li class="page-item"><a href="user_index.php ? p=0" class="page-link">&laquo;</a></li>
		<?php
			$cnt=-1;
			for($i=$number;$i!=0;$i-=10){
				if($i<0) {
					break;
				}
				else {
					$cnt+=1;
					echo "<li class='page-item'><a href='user_index.php ? p=".($cnt*10)."' class='page-link'>".($cnt+1)."</a></li>";
				}
			}
			echo "<li class=\"page-item\"><a href='user_index.php ? p=".($cnt*10)."' class=\"page-link\">&raquo;</a></li>";
			if($cnt==-1){
				echo "<h1 class='text-info'>没有书籍信息</h1>";
			}
		?>
	</ul>
	<?php
	include("../footer.php");
	?>
</body>
</html>