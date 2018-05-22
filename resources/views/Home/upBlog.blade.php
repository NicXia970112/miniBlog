<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" href="/css/edit.css" />
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
		
		<section id="edit">
			<form action="/uploadsArticle/{{$article->id}}" method="post" form enctype="multipart/form-data" >
				<div class="cell">
					<input type= "file"  id="picture" name = 'articlePic' />
				</div>
				<div class="cell">
					<label for="title"> 标  题：</label>
					<input type="text" id="title" name = 'title' value="{{$article->title}}" />
				</div>
				<div class="cell">
					<label>摘  要：</label>
					<textarea style="height: 140px;" name="intro">{{$article->intro}}</textarea>
				</div>
				<div class="cell">
					<label>文  章：</label>
					<textarea style="height: 270px;" name="content">{{$article->content}}      </textarea>
				</div>
				<div class="cell">
					<label for="keys">关键字：</label>
					<input type="text" id="keys" placeholder="请用逗号隔开" name="tag" value="{{$article->tag_1}}" />
				</div>
				<input id="editSub" type="submit" value="提 交" />
			</form>
		</section>
		<script type="text/javascript" src="js/userDown.js" ></script>
		@if($errors->any()) 
			<li class = "list-group"></li>
			@foreach($errors->all() as $error)
				<li class= "list-group-item list-group-item-danger"> {{$error}}</li>
			</ul> 
			@endforeach
		@endif
	</body>
</html>
