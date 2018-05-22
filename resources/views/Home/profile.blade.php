<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" href="/css/profile.css" />
	</head>
	<body>
		<header id="indexH">
			<div class="logo"><a href="/index">Wblog</a></div>
			<nav>
				<ul class="nav">
					<li><a href="/index">博文</a></li>
					<li><a href="##">我的收藏</a></li>
					<li class="liIn">
						<form action="/search" method="post">
							<input type="text" id="searchBtn" name= "info" />
							<input id='searchSub' type = 'submit' value ='搜索' >
						</form>
					</li>
					<li>
						<a href="/toEditArticle">写文章</a>
					</li>
				</ul>
			</nav>
			<div class="user">
				<div class="userInfo">
					<img id="userImg" src="{{$user->avatar_path}} " />
					<span id="userName">{{$user->name}}</span>
				</div>
				<ul class="userMore">
					

					
					<li><a href="/toEditPsw">设置</a></li>
					

					<li><a href="/logout">退出</a></li>
				</ul>
			</div>
		</header>
		
		<section id="profile">
			<img id="userImg" src="{{$user->avatar_path}}" />
			<div class="info">
				<h1>{{$user->name}}</h1>
				<span>{{$user->user_intro}}</span>
				<div>
					@if($user->is_auth == 'true') 
					<p id="ident" class="identification"><a href="/toAuth_email">认证</a>
					</p>
					@endif
					@if($user->is_auth == 'false') 
					<p id="ident" class="identification"><a href="/toAuth_email">未认证</a>
					</p>
					@endif

					<p>账号：<span>{{$user->id}}</span></p>
				</div>
				
			</div>
			<a id="changeProBtn"  href='/toEditProfile'> 编辑个人资料  </a>

			<div class="container">
				<h1 class="myblog">我的博客</h1>
				<ul>
					<li>
						@foreach($articles as $article) 
							<article>
								<div class="title">
									<h1><a href="/article/{{$article->id}}">{{$article->title}}</a></h1>
										<p>作者：<span>{{$article->user_name}}</span></p>					
								</div>
								<div class="articleMain">
									{{$article->content}}
								</div>
									<p class="corner">
										 <span><a href="/uploadsArticle/{{$article->id}}">编辑</a></span>
										<span>{{$article->created_at}}</span>
									</p>					
							</article>
						
						@endforeach
					</li>
				</ul>
			</div>
		</section>

		<script type="text/javascript" src="js/identification.js"></script> 
		<script type="text/javascript" src="js/userDown.js" ></script>
	</body>
</html>
