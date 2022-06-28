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
	<style>
		#msg {
			width: 400px;
			border: solid 1px black;
			margin: auto;
			margin-top: 50px;
			border-radius: 10px;
			padding: 20px;
		}
		#msg>div{
			padding-top: 25px;
		}
	</style>
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
				<li class="nav-item"><a href="user_index.php" class="nav-link ">图书查询</a></li>
				<li class="nav-item"><a href="user_jieshumsg.php" class="nav-link">我的借阅</a></li>
				<li class="nav-item"><a href="user_seat.php" class="nav-link">座位预约</a></li>
				<li class="nav-item"><a href="user_introduce.php" class="nav-link active">个人信息</a></li>
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
	$sql = "select * from user where id = ".$_SESSION['uid'].";";
	
	
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_row($result);
	?>
	<div class="" id="msg">
		<h4>用户信息</h4>
		<form action="up_msg.php" method="post">
			<div class="form-group input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">用户名</span>
				</div>
				<input type="text" class="form-control" name="uname" value="<?php echo $_SESSION['username']; ?>" />
			</div>
			<div class="form-group input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">用户id</span>
				</div>
				<input type="text" disabled="disabled" class="form-control" name="uid" value="<?php echo $row[0]; ?>" />
				<input type="hidden" class="form-control" name="uid" value="<?php echo $row[0]; ?>" />
			</div>
			<div class="form-group input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">性别</span>
				</div>
				<input type="text" class="form-control" name="sex" value="<?php echo $row[4]; ?>" />
			</div>
			<div class="form-group input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">联系电话</span>
				</div>
				<input type="text" class="form-control" name="tel" value="<?php echo $row[5]; ?>" />
			</div>
			<div class="form-group">
				<input type="submit" class="form-control btn btn-success" value="点击修改信息" />
			</div>
			<div class="form-group">
				<a href="updatepwd.php"><input type="button" class="form-control btn btn-success" value="点击修改密码" /></a>
			</div>
		</form>
		
	</div>

	<div class="mt-5">
		<?php
		include("../footer.php");
		?>
	</div>
</body>
</html>