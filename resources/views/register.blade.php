<html>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
        <link rel='stylesheet' href="{{ asset('css/register.css') }}">
        <link rel='icon' type='image/png' href="{{ asset('img/favicon.png')}}">
        <script src="{{ url('js/login.js')}}" defer="true"></script>
        @yield('style')
        <title>Netfflix - Iscriviti</title>
    </head>
    <body>
        <div class="top">
            <div class="overlay"></div>
            <div class="logo">
                <img src="{{ url('img/netfflix.png')}}">
            </div>

            <div class="contenuto">
                <div class="disclaimer"> 
                    <h1>Cos'è Netfflix?</h1>
                    <p>Netfflix è una piattaforma che ti permette di cercare informazioni su migliaia di film e serie tv<p>
                    <p>Puoi cercare e visualizzare contenuti multimediali direttamente da YouTube</p>
                    <p>Puoi scambiare commenti e suggerimenti con altri utenti Netfflix</p>
                    <i class="fa fa-youtube" aria-hidden="true"></i>
                    <i class="fa fa-imdb" aria-hidden="true"></i>
                    <i class="fa fa-comments-o" aria-hidden="true"></i>
                </div>
                
                @if($error == 'empty_fields')
                <section class='error'>Compila tutti i campi</section>
                @elseif($error == 'bad_passwords')
                <section class='error'>Le password non corrispondono</section>
                @elseif($error == 'existing_username')
                <seciton class='error'>Nome utente già in uso</section>
                @elseif($error == 'existing_email')
                <section class='error'>Email già in uso</section>
                @endif
                    
                <form name='signup' method='post' enctype='multipart/form-data' autocomplete='off'>
                    @csrf
                    <div class="username">
                        <input type='text' name='username' placeholder="Username" value="{{ old('username') }}">
                        <i class="fa fa-user-o" aria-hidden="true"></i>
                    </div>
                    <div class="email">
                        <input type='email' name='email' placeholder="Email" value="{{ old('email') }}">
                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                    </div>
                    <div class="password">
                        <input type='password' name='password' id="password" placeholder="Password">
                        <i id="pass-status" class="fa fa-eye" aria-hidden="true" onClick="viewPassword()"></i>
                    </div>
                    <div class="conferma-password">
                        <input type='password' name='conferma' id="conferma_password" placeholder="Conferma password">
                        <i id="conf-pass-status" class="fa fa-eye" aria-hidden="true" onClick="viewConfirmPassword()"></i>
                    </div>
                    <div class="submit">
                        <input type='submit' class='submit' name='submit' value='Registrati'>
                    </div>
                    <div class="login">Hai già un account Netfflix? <a href="{{ url('login')}}">Accedi</a></div>
                    <p>Questa pagina non è protetta da Google reCAPTCHA per garantire che tu non sia un bot.</p>
                </form>
                
            </div>       
        </div>
        <footer> 
            <div>Netfflix non è un marchio registrato</div>
            <div>Powered by<a href="https://github.com/acelm0r"> Carmelo Pillera · O46001367</a></div>
            <div><a href="https://perceivelab.github.io/web-programming-course/">Web Programming 2022</a></div>
        </footer>
    </body>