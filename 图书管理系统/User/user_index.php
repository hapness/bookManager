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
		<input type="text" id="id" class="form-control input-group-lg " name="content" placeholder="输入图书名查询图书信息"/>
		<button type="submit" class="btn btn-dark">搜索</button>
	</form>
	
	<table class="table table-hover table-bordered table-striped container-fluid" >
		<thead class="table-dark" align="center">
			<th>图书id</th>
			<th>书名</th>
			<th>作者</th>
			<th>出版社</th>
			<th>价格</th>
			<th>数量</th>
			<th>状态</th>
			<th>简介</th>
			<th>类别</th>
		</thead>
		<tbody class="" align="center">
			<?php
			include("../conn/conn.php");
			include("../tools.php");
			if(!empty($_POST["content"])){
				$content = $_POST["content"];
				$sql = "select * from book INNER JOIN book_type bt ON book.type_id  =bt.id where book.book_name like '%".$content."%' or book.author like '%".$content."%';";
			}else{
				$sql = "select * from book INNER JOIN book_type bt ON book.type_id  =bt.id;";
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
						echo "<td>$row[0]</td><td>$row[1]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td><td>$row[6]</td><td>".($row[7]==1?'可借':'不可借')."</td><td>$row[8]</td><td>".(ftname($row[10],$conn))." </td>";
						echo "</tr>";
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