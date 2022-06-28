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
	<script src="../js/bootstrap.bundle.min.js"></script>
	<style>
		#msg {
			width: 400px;
			border: solid 1px black;
			margin: auto;
			margin-top: 100px;
			border-radius: 10px;
			padding: 20px;
		}
		#msg form>div{
			padding-top: 20px;
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
	
	<?php
	include_once("../conn/conn.php");
	$sql = "select * from user where id = ".$_SESSION['uid'].";";
	
	
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_row($result);
	?>
	<div class="" id="msg">
		<h4>修改密码</h4>
		<form onsubmit="return validate()" action="updatepwd2.php" method="post">
			<div class="form-group">
				<label for="older">请输入旧密码</label>
				<input type="password" placeholder="请输入旧密码" name="old" class="form-control" id="older" />
			</div>
			<div class="form-group">
				<label for="new">请输入新密码</label>
				<input type="password" placeholder="密码为六位及以上数字或字母" name="newpwd" class="form-control" id="new" />
			</div>
			<div class="form-group">
				<label for="re">请再次确认密码</label>
				<input type="password" placeholder="请再次输入新密码" class="form-control" id="re" />
			</div>
			<div style="display: flex; justify-content: space-around;">
				<button type="reset" class="btn btn-dark">重置</button>
				<button type="submit" class="btn btn-dark">提交</button>
			</div>
		</form>
	</div>
</body>
</html>

<script>
	let isok=false;
	$(function(){
		$('#new').blur(function(){
			var pwd = $('#new').val();
			var reg = /[a-z,A-Z,0-9]{6,}/;
			var result = reg.test(pwd);
			if(!result){
				$('#ntip').remove();
				$('#new').addClass('is-invalid')
				.after("<div><span class='text-danger' id='ntip'>请输入符合条件的密码<span></div>");
				isok=false;
			}else{
				$('#ntip').remove();
				$('#new').removeClass('is-invalid').addClass('is-valid');
				$('#ntip').remove();
				isok=true;
			}
		});
	});
	function validate(){
		if(!isok){
			return false;
		}
		var pwd = $('#new').val();
		var repwd = $('#re').val();
		
		if(pwd!=repwd){
			$('#tip').remove();
			$('#re').addClass('is-invalid')
			.after("<div><span class='text-danger' id='tip'>请输入相同的新密码<span></div>");
			return false;
		}else{
			$('#re').removeClass('is-invalid').addClass('is-valid');
			$('#tip').remove();
			return true;
		}
	}
</script>