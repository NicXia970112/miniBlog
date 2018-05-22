@extends('index')
@section('content')
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>注册</title>
		<link rel="stylesheet" href="css/registerSucc.css" />
	</head>
	<body>  
		<main>
			<h1 class="head">注  册</h1>
			<div id="dis">
				<div id="load"><div>正在加载中...</div></div>
				<div id="succ">
					<div>恭喜 <span>{{$user->name}}</span> 注册成功！</div>
					<p>账号： <span>{{$user->id}}</span></p>
					<p>密码： <span>{{$user->password}}</span></p>
					<p>邮箱： <span>{{$user->email}}</span></p>
					<p id="login"><a href="/">马上登录</a></p>
				</div>
			</div> 
		</main>
		
		<script type="text/javascript" src="js/registerLoad.js" ></script>
	</body>
</html>
@stop
