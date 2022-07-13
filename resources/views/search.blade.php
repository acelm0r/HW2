<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel='icon' type='image/png' href="{{ asset('img/favicon.png') }}">
        <link rel='stylesheet' href="{{ url('css/search.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
        <x-embed-styles />
        <script src="{{ url('js/search.js') }}" defer="true"></script>
        <title>Netfflix - Search</title>
    </head>

    <body>
        <div class="topnav">
            <div class="logo">
                <a href="{{ url('home') }}"><img src="{{ url('img/netfflix.png') }}"></a>
            </div>
            <a href="{{ url('search')}}">Cerca <i class="fa fa-search" aria-hidden="true"></i></a>
            <a href="{{ url('comment') }}">Commenta <i class="fa fa-pencil" aria-hidden="true"></i></a>
            <div class ="logout">Non sei {{ $username }}? <a href=" {{ url('logout') }}">Esci  <i class="fa fa-times-circle" aria-hidden="true"></i></a></div>
        </div> 

        <div class="container">
            <form name="cerca" id="cerca">
                @csrf
                <label><input type='text' name='content' id='content'></label>
                <select name="tipo" id="tipo">
                    <option value='film'>Film - IMDb</option>
                    <option value='serie_tv'>Serie TV - IMDb</option>
                    <option value='anime'>Anime - Kitsu</option>
                    <option value='youtube'>Video - YouTube</option>
                </select>
                <label>&nbsp;<input class="submit" type='submit' value='Cerca'></label>
            </form>
        </div>

        <article id="risultati"></article>

        <footer> 
        	<div>Netfflix non è un marchio registrato</div>
        	<div>Powered by<a href="https://github.com/acelm0r"> Carmelo Pillera · O46001367</a></div>
        	<div><a href="https://perceivelab.github.io/web-programming-course/">Web Programming 2022</a></div>
        </footer>
    </body>
</html>