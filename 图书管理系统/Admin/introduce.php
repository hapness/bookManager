<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"/>
	<script src="../js/jQuery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<title>图书馆后台</title>
</head>
<body>
	<nav class="navbar navbar-expand-sm navbar-light">
		<a href="#" class="navbar-brand">国家图书馆</a>
		
		<button type="button" class="navbar-toggler" data-toggle = "collapse" data-target="#nb">
			<span class="navbar-toggler-icon text-dark"></span>
		</button>
		
		<div class="navbar-collapse collapse" id="nb">
			<ul class="navbar-nav">
				<li class="nav-item dropdown">
					<a href="admin_index.php" class="nav-link active dropdown-toggle" data-toggle="dropdown">图书管理</a>
					<div class="dropdown-menu">
						<a href="admin_index.php" class="nav-link active ">书籍查询</a>
						<a href="add_book.php" class="nav-link  ">添加书籍</a>
					</div>
				</li>
				<li class="nav-item"><a href="jh_book.php" class="nav-link">图书借还</a></li>
				<li class="nav-item dropdown">
					<a href="admin_index.php" class="nav-link active dropdown-toggle" data-toggle="dropdown">座位管理</a>
					<div class="dropdown-menu">
						<a href="seat_admin.php" class="nav-link active ">座位信息</a>
						<a href="add_seat.php" class="nav-link  ">座位添加</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a href="admin_index.php" class="nav-link active dropdown-toggle" data-toggle="dropdown">类别管理</a>
					<div class="dropdown-menu">
						<a href="book_type.php" class="nav-link active ">类别信息</a>
						<a href="book_type2.php" class="nav-link  ">类别添加</a>
					</div>
				</li>
				<li class="nav-item"><a href="introduce.php" class="nav-link active">用户信息</a></li>
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
		<input type="text" id="id" class="form-control input-group-lg " name="content" placeholder="请输入用户名或id进行查询"/>
		<button type="submit" class="btn btn-dark">搜索</button>
	</form>
	
	<table class="table table-hover table-bordered table-striped container-fluid" >
		<thead class="table-dark" align="center">
			<th>用户id</th>
			<th>用户名</th>
			<th>密码</th>
			<th>性别</th>
			<th>联系方式</th>
			<th>操作</th>
		</thead>
		<tbody class="" align="center">
			<?php
			include("../conn/conn.php");
			if(!empty($_POST['content'])){
				$content = $_POST['content'];
				$sql = "select * from user where id='$content' or username like '%$content%';";
			}
			else{
				$sql = "select * from user;";
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
						echo "<td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[4]</td><td>$row[5]</td>";
						
						echo "<td style=\"vertical-align: ;\" align='center'>
						<a href='del_introduce.php?user=$row[0]'>删除</a>
						<a href='up_introduce.php?user=$row[0]'>修改</a>
						</td></tr>";
					}
				}
				
			}
			else{
				echo '<h1 class="text-info">没有用户信息</h1>';
			}
			?>
		</tbody>
	</table>
	
	<ul class="pagination pagination-lg justify-content-center mt-5" style="width: 40px 0;">
		<li class="page-item"><a href="introduce.php ? p=0" class="page-link">&laquo;</a></li>
		<?php
			$cnt=-1;
			for($i=$number;$i!=0;$i-=10){
				if($i<0) {
					break;
				}
				else {
					$cnt+=1;
					echo "<li class='page-item'><a href='introduce.php ? p=".($cnt*10)."' class='page-link'>".($cnt+1)."</a></li>";
				}
			}
			echo "<li class=\"page-item\"><a href='introduce.php ? p=".($cnt*10)."' class=\"page-link\">&raquo;</a></li>";
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