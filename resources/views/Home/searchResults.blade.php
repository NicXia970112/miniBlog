
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" href="css/index.css" />
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
					<img id="userImg" src="{{$data->avatar_path}} " />
					<span id="userName">{{$data->name}}</span>
				</div>
				<ul class="userMore">
					<li><a href="/profile">个人中心</a></li>
					<li><a href="/toEditPsw">设置</a></li>
					<li><a href="/logout">退出</a></li>
				</ul>
			</div>
		</header>
	
		<section>
			<aside class="indexLeft">
								


				@foreach($articles0 as $article0) 
					<article>
					<div class="title">
						<h1><a href="article/{{$article0->id}}">{{$article0->title}}</a></h1>
						<p>作者：<span>{{$article0->user_name}}</span></p>					
					</div>
					<div class="articleMain">
						{{$article0->intro}}
					</div>
					<p class="corner"><span>{{$article0->created_at}}</span></p>
					
					</article>
				@endforeach 

				@foreach($articles1 as $article1) 
					<article>
					<div class="title">
						<h1><a href="article/{{$article1->id}}">{{$article1->title}}</a></h1>
						<p>作者：<span>{{$article1->user_name}}</span></p>					
					</div>
					<div class="articleMain">
						{{$article1->intro}}
					</div>
					<p class="corner"><span>{{$article1->created_at}}</span></p>
					
					</article>
				@endforeach 

				@foreach($articles2 as $article2) 
					<article>
					<div class="title">
						<h1><a href="article/{{$article2->id}}">{{$article2->title}}</a></h1>
						<p>作者：<span>{{$article2->user_name}}</span></p>					
					</div>
					<div class="articleMain">
						{{$article2->intro}}
					</div>
					<p class="corner"><span>{{$article2->created_at}}</span></p>
					
					</article>
				@endforeach 

				@foreach($articles3 as $article3) 
					<article>
					<div class="title">
						<h1><a href="article/{{$article3->id}}">{{$article3->title}}</a></h1>
						<p>作者：<span>{{$article3->user_name}}</span></p>					
					</div>
					<div class="articleMain">
						{{$article3->intro}}
					</div>
					<p class="corner"><span>{{$article3->created_at}}</span></p>
					
					</article>
				@endforeach 

				@foreach($articles4 as $article4) 
					<article>
					<div class="title">
						<h1><a href="article/{{$article4->id}}">{{$article4->title}}</a></h1>
						<p>作者：<span>{{$article4->user_name}}</span></p>					
					</div>
					<div class="articleMain">
						{{$article4->intro}}
					</div>
					<p class="corner"><span>{{$article4->created_at}}</span></p>
					
					</article>
				@endforeach 
				
			</aside>
			
			


			<aside class="indexRight">
				<article>
					<h1>边栏</h1>
					<div class="newArticle"></div>
				</article>
				<article>
					<h1></h1>
					<div class="newArticle"></div>
				</article>
			</aside>
		</section>
		
		<script type="text/javascript" src="js/userDown.js" ></script>
	</body>
</html>
