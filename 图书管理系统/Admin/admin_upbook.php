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
	<title>修改书籍信息</title>
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
	
	<?php
	include_once("../conn/conn.php");
	$sql = "select * from book where id = ".$_GET['book'].";";
	
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_row($result);
	?>
	<div id="msg">
		<h4>修改书籍信息</h4>
		<form method="post" action="admin_upbook2.php">
				<div class="form-group input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">图书名</span>
					</div>
					<input type="text" name="bname" class="form-control" name="bname" value="<?php echo $row['1']; ?>" />
				</div>
				<div class="form-group input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">图书类型</span>
					</div>
					<select name="choice" class="form-select form-control">
						<?php
						echo "<script>
						var num=".$row[2].";
						</script>";
						?>
						<option value="1">技术</option>
						<option value="2">人文</option>
						<option value="3">小说</option>
					</select>
				</div>
				<div class="form-group input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">作者</span>
					</div>
					<input type="text" class="form-control" name="author" value="<?php echo $row[3]; ?>" />
				</div>
				<div class="form-group input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">出版社</span>
					</div>
					<input type="text" class="form-control" name="public" value="<?php echo $row[4]; ?>" />
				</div>
				<div class="form-group input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">价格</span>
					</div>
					<input type="text" class="form-control isok" name="price" value="<?php echo $row[5]; ?>" />
				</div>
				<div class="form-group input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">数量</span>
					</div>
					<input type="text" class="form-control" name="number" value="<?php echo $row[6]; ?>" />
				</div>
				<div class="form-group input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">馆藏位置:</span>
					</div>
					<?php
						echo "<script>
						var shu='".$row[9]."';
						</script>";
					?>
					<select class="form-control form-select" name="floor">
						<option value="图书馆一楼">图书馆一楼</option>
						<option value="图书馆二楼">图书馆二楼</option>
						<option value="图书馆三楼">图书馆三楼</option>
						<option value="图书馆四楼">图书馆四楼</option>
					</select>
				</div>
				<div class="form-group">
					<label for="text">描述信息:</label>
					<textarea required="required" type="text" id="text" placeholder="<?php echo $row[8];?>" class="form-control" name="text"></textarea>
				</div>
				<input type="hidden" value='<?php echo $row[0]; ?>' name="bid"/>
				<div class="form-group">
					<input type="submit" class="form-control btn btn-success" value="确认修改" />
				</div>
			</div>
			
		</form>
		
</body>
</html>
<script>
	$(function(){
		var p = $("option[value='"+num+"']");
		var p2 =$("option[value='"+shu+"']");

		p.attr('selected','selected');
		p2.attr('selected','selected');
	})
</script>