<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" href="css/editProfile.css" />
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
			<h1 class="head">编辑个人信息</h1>
			<form action="/EditProfile" method="post" enctype="multipart/form-data">
				<div id="first">
					<label for="img">头像：</label>
					<img src="{{$user->avatar_path}}" />
					<input type="file" id="img" name="avatar" />
				</div>
				<div>
					<label for="name">用户名：</label>
					<input class="text" type="text" id="name" name="userName" value="{{$user->name}}" />
				</div>
				<div>
					<label for="autoGraph">个人签名：</label>
					<input class="text" type="text" id="autoGraph" name="intro" value="{{$user->user_intro}}" />
				</div>
				<input class="btn btn1" type="submit" value="保  存" />
				<button class="btn btn2"><a href="/profile">返回个人中心</a></button>
			</form>
		</section>
	</body>
</html>
