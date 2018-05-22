
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
            <img id="userImg" src="{{$user->avatar_path}}" />
            <span id="userName">{{$user->name}}</span>
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



        @foreach($articles as $article)
            <article>
                <div class="title">
                    <h1><a href="article/{{$article->id}}">{{$article->title}}</a></h1>
                    <p>作者：<span>{{$article->user_name}}</span></p>
                </div>
                <div class="articleMain">
                    {{$article->intro}}
                </div>
                <p class="corner"><span>{{$article->created_at}}</span></p>

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
