@extends('index')
@section('content')
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>注册</title>
		<link rel="stylesheet" href="css/register.css" />
	</head>
	<body> 
		<main>
			<h1 class="head">注  册</h1>
			<form id="register" action="/checkRegis" method="post">
				<div class="cell">
					<label for="userName">姓  名：</label>
					<input type="text" id="userName" name="userName" />
					<span class="prompt">* 支持汉字、字母、数字</span>
				</div>
				<div class="cell">
					<label for="psw">密  码：</label>
					<input type="password" id="psw" name="password" />
					<span class="prompt">* 请输入6-12位密码</span>
				</div>
				<div class="cell">
					<label for="email">邮  箱：</label>
					<input type="email" id="email" name="email" />
					<span class="prompt">* 请填写正确邮箱格式</span>
				</div>
				<div class="cell">
					<label for="tel">电  话：</label>
					<input type="tel" id="tel"  name="tel" />
					<span class="prompt">* 请输入电话号码</span>
				</div>
				<div class="cell cmp_cell"> 
					<label for="cmp">验证码：</label>
					<input type="text" id="cmp" name="captcha" />
					<img src="/captcha/1" />
					<a href="/captcha/1">看不清，换一张</a>
				</div>
				<input type="submit" id="reSub" value="提  交" />
			</form>
		</main>
		<script type="text/javascript" src="js/promt.js" ></script>
		@if($errors->any()) 
			<li class = "list-group"></li>
			@foreach($errors->all() as $error)
				<li class= "list-group-item list-group-item-danger"> {{$error}}</li>
			</ul> 
			@endforeach
		@endif

	</body>
</html>
@stop