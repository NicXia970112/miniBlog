<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" href="css/editPsw.css" />
	</head>
	<body>
		<header id="indexH">
			<div class="logo"><a href="/index">Wblog</a></div>
			<div class="user">
				<div class="userInfo">
					<a href="/profile">
						<img id="userImg" src="{{$user->avatar_path}}" />
						<span id="userName">{{$user->name}}</span>
					</a>
				</div>
			</div>
		</header>
		
		<section id="edp">
			<h1 class="head">用户认证</h1>
			<form action="/checkAuth" method="post"> 
				<div id="vf">
					<label for="verify">验证码：</label>
					<input class="text" type="text" id="verify" name="verify" />
					<button><a href="/auth_email">获取验证码</a></button>
				</div>
				<button class="btn btn1"><a href="/checkAuth">提  交</a></button>
				<button class="btn btn2"><a href="/profile">返回个人中心</a></button>
			</form>
		</section>
		
		<script type="text/javascript" src="js/ensurePsw.js" ></script>
	</body>
</html>
