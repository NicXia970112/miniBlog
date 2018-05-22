@extends('index')
@section('content')
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>登录</title>
		<link rel="stylesheet" href="css/login.css" />
	</head>
	<body> 
		<div class="main">
			<h1 class="head">登  录</h1>
			<form id="login" action="/login" method="post">
				<label for="user">账   号：</label>
				<input type="text" id="user" name="id" />
				<br />
				<label for="pws">密   码：</label>
				<input type="password" id="pws" name="password" />
				<br />
				<input type="submit" value="登  录" id="loginBtn" />
				<div><a href="/register">注 册</a></div>
			</form>
		</div>
	</body>
</html>
@stop