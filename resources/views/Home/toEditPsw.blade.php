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
			<h1 class="head">安全中心</h1>
			<form action="/checkChangePsw" method="post"> 
				<div>
					<label for="newPsw">新密码：</label>
					<input class="text" type="password" id="newPsw" name="password" />
				</div>
				<div>
					<label for="rePsw">确认密码：</label>
					<input class="text" type="password" id="rePsw" name="password" />
					<span id="warn">*确认密码应与新设置密码相同</span>
				</div>
				<div id="vf">
					<label for="verify">验证码：</label>
					<input class="text" type="text" id="verify" name="verify" />
					<button><a href="/changePsw">获取验证码</a></button>
				</div>
				<button class="btn btn1"><a href="/checkChangePsw">提  交</a></button>
				<button class="btn btn2"><a href="/profile">返回个人中心</a></button>
			</form>
		</section>
		
		<script type="text/javascript" src="js/ensurePsw.js" ></script>
	</body>
</html>
