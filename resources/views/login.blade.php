<html>
	<head>
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<meta charset="utf-8">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    	<link rel='stylesheet' href="{{ asset('css/login.css') }}">
    	<link rel='icon' type="image/png" href="{{ asset('img/favicon.png') }}">
		<script src="{{ url('js/login.js') }}" defer></script>
		@yield('style')
    	<title> Netfflix - Accedi </title>
	</head>
	<body>
    	<div class="top">
        	<div class="overlay"></div>
        	<div class="logo">
				<img src="{{ asset('img/netfflix.png') }}">
        	</div>

    		<div class="contenuto">
				<h1>Sei già iscritto? Accedi</h1>

                @if($error == 'empty_fields')
                <div class='error'>Compila tutti i campi</div>
                @elseif($error == 'wrong')
                <div class='error'>Credenziali non valide</div>
                @endif

            	<form name="login" method="post">
                    @csrf
					<div class="username">
                		<input type="text" name="username" id="username" placeholder="Username" value="{{ old('username') }}">
						<i class="fa fa-user-o" aria-hidden="true"></i>
					</div>
            		<div class="password">
                		<input type="password" name="password" id="password" placeholder="Password">
						<i id="pass-status" class="fa fa-eye" aria-hidden="true" onClick="viewPassword()"></i>
					</div>
					<div>
						<input type='submit' class='submit' name='submit' value='Accedi'>
					</div>
					<div class='signup'>Prima volta su Netfflix? <a href="{{ url('register') }}">Registrati</a></div>
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
</html>