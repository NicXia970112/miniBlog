<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" href="/css/blog.css" />
	</head>
	<body>
		<header id="indexH">
			<div class="logo"><a href="/index">Wblog</a></div>
			<nav>
				<ul class="nav">
					<li><a href="/index">博文</a></li>
					<li><a href="##">话题</a></li>
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
					<a href="/profile">
						<img id="userImg" src="{{$user->avatar_path}}" />
						<span id="userName">{{$user->name}}</span>
					</a>
				</div> 
			</div>
		</header>
		
		<section id="blog">
			<div >
				<img src="{{$article->img_path}}"/>
			</div>
			<div class="title">
				<h1>{{$article->title}}</h1>
				<div class="blogInfo">
					<p>作者：<span>{{$article->user_name}}</span></p>
					<p>关键字：<span>{{$article->tag_1}}</span></p>
				</div>
			</div>
			<p class="content">
				{{$article->content}}
			</p>
		</section>


		<script type="text/javascript" src="js/blog.js" ></script>
	</body>
</html>
