<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	
	<script type="text/javascript" src="js/jQuery.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
	
	<title>登录页面</title>
</head>
<body>
	<nav class="navbar navbar-expand navbar-dark bg-dark">
		<a href="#" class="navbar-brand">图书馆管理系统</a>
		<ul class="navbar-nav">
			<li class="nav-item"><a href="#" class="nav-link">(登录页)</a></li>
		</ul>
	</nav>
	
	<div class="justify-content-center dl">
	      <div id="myForm" class="myForm">
	        <form method="post" action="CheckPwd.php">
	          <fieldset>
	            <legend>用户登录</legend>
	            <div class="form-group">
	              <label for="exampleInputEmail1" class="form-label mt-4">用户名</label>
	              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
	                placeholder="请输入学号或工号" name="username">
	            </div>
	            <div class="form-group">
	              <label for="exampleInputPassword1" class="form-label mt-4">密码</label>
	              <input type="password" class="form-control" id="exampleInputPassword1" placeholder="请输入密码" name="userpwd">
	            </div>
	            <div class="form-group">
	              <label for="exampleSelect1" class="form-label mt-4">身份</label>
	              <select class="form-select" id="exampleSelect1" name="role">
	                <option value="user">用户</option>
	                <option value="admin">管理员</option>
	              </select>
	            </div>
	            <hr>
	            <div class="form-group justify-content-center">
	              <button type="submit" name="button" id="button" class="btn btn-dark">提交</button>
	              <button type="reset" name="button" id="button" class="btn btn-dark">重置</button>
	            </div>
	          </fieldset>
	        </form>
	        <hr>
	      </div>
	    </div>
	
</body>
</html>