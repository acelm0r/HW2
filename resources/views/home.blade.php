<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <link rel='stylesheet' href="{{ asset('css/home.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
        <link rel='icon' type='image/png' href="{{ asset('img/favicon.png') }}">
        <title>Netfflix - Home</title>
    </head>

    <body>
        <div class="topnav">
            <div class="logo">
                <a href="{{ url('home') }}"><img src="{{ url('img/netfflix.png') }}"></a>
            </div>
            <a href="{{ url('search')}}">Cerca <i class="fa fa-search" aria-hidden="true"></i></a>
            <a href="{{ url('comment') }}">Commenta <i class="fa fa-pencil" aria-hidden="true"></i></a>
            <div class ="logout">Non sei {{ $username }}? <a href=" {{ url('logout') }}">Esci <i class="fa fa-times-circle" aria-hidden="true"></i></a></div>
        </div>
      
        <div class="top-image">
            <div class="overlay"></div>
        </div>

        @if (!empty($success_msg))
        <div class="success_msg"> {{$success_msg}} </div>
        @endif
        <h1>Tutti i commenti</h1>
        <div class="container">
                    @foreach($comments as $comment)
                    <div class="comment">
                        <div class="id" hidden> {{$comment->id}}</div>
                        <div class="author">{{$comment->username}}</div>
                        <div class="timestamp">{{$comment->created_at}}</div>
                        <div class="text_content">{{$comment->text_content}}</div>
                    </div>
                    @endforeach
                </h1>
            </div>
        </div>

        <footer> 
            <div>Netfflix non è un marchio registrato</div>
        	<div>Powered by<a href="https://github.com/acelm0r"> Carmelo Pillera · O46001367</a></div>
        	<div><a href="https://perceivelab.github.io/web-programming-course/">Web Programming 2022</a></div>
        </footer>
    </body>
</html>