<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="../css/style.css"/>
	<script src="../js/jQuery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<title>书籍添加</title>
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
					<a href="#" class="nav-link active dropdown-toggle" data-toggle="dropdown">图书管理</a>
					<div class="dropdown-menu">
						<a href="admin_index.php" class="nav-link active ">书籍查询</a>
						<a href="add_book.php" class="nav-link active ">添加书籍</a>
					</div>
				</li>
				<li class="nav-item"><a href="jh_book.php" class="nav-link">图书借还</a></li>
				<li class="nav-item dropdown">
					<a href="admin_index.php" class="nav-link active dropdown-toggle" data-toggle="dropdown">座位管理</a>
					<div class="dropdown-menu">
						<a href="seat_admin.php" class="nav-link active ">座位信息</a>
						<a href="add_seat.php" class="nav-link active ">座位添加</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a href="admin_index.php" class="nav-link active dropdown-toggle" data-toggle="dropdown">类别管理</a>
					<div class="dropdown-menu">
						<a href="book_type.php" class="nav-link active ">类别信息</a>
						<a href="book_type2.php" class="nav-link  ">类别添加</a>
					</div>
				</li>
				<li class="nav-item"><a href="introduce.php" class="nav-link">用户信息</a></li>
				<li class="nav-item"><a href="../index.php" class="nav-link">退出登录</a></li>
			</ul>
		</div>
		
		<span class="navbar-brand">你好,
		<?php
			session_start();//开启session功能
			echo $_SESSION["username"];
		?></span>
	</nav>
	
	<div id="msg">
		<h1>添加书籍</h1>
		<form method="post" action="add_book2.php">
			<div class="form-group input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">图书名</span>
				</div>
				<input type="text" name="bname" class="form-control" name="bname" placeholder="请输入书籍姓名" />
			</div>
				<?php
				include("../conn/conn.php");
				include("../tools.php");
				$sql = "select * from book_type";
				$result = mysqli_query($conn,$sql);
				$number = mysqli_num_rows($result);
				for($i=0;$i<$number;$i++){
					$row[][] = mysqli_fetch_array($result);
				}
				$json = json_encode($row);
				
				echo "<script>";
				echo "var row = $json;";
				echo "</script>";
				?>
			<div class="form-group input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">图书类型</span>
				</div>
				<select name="choice" class="form-select form-control">
				</select>
			</div>
			<div class="form-group input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">作者</span>
				</div>
				<input type="text" class="form-control" name="author" placeholder="请输入作者信息" />
			</div>
			<div class="form-group input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">出版社</span>
				</div>
				<input type="text" class="form-control" name="public" placeholder="请输入出版社信息" />
			</div>
			<div class="form-group input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">价格</span>
				</div>
				<input type="text" class="form-control isok" name="price" placeholder="请输入价格" />
			</div>
			<div class="form-group input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">数量</span>
				</div>
				<input type="text" class="form-control" name="number" placeholder="请输入书籍数量" />
			</div>
			<div class="form-group input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">馆藏位置:</span>
				</div>
				<select class="form-control form-select" name="floor">
					<option value="图书馆一楼">图书馆一楼</option>
					<option value="图书馆二楼">图书馆二楼</option>
					<option value="图书馆三楼">图书馆三楼</option>
					<option value="图书馆四楼">图书馆四楼</option>
				</select>
			</div>
			<div class="form-group">
				<label for="text">描述信息:</label>
				<textarea type="text" id="text" placeholder="请输入描述信息" class="form-control" name="text"></textarea>
			</div>
			<input type="hidden" value='<?php echo $row[0]; ?>' name="bid"/>
			<div class="form-group">
				<input type="submit" class="form-control btn btn-success" value="确认修改" />
			</div>
		</form>
	</div>
</body>
</html>

<script>
	$(function(){
		var len = row.length;
		
		for(var i=0;i<len;i++){
			$('select[name="choice"]').append("<option value="+row[i][0].id+">"+row[i][0].type_name+"</option>")
			console.log(row[i][0].id);
		}
	})
</script>