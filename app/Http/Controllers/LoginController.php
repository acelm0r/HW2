<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use Session;

class LoginController extends BaseController
{
    public function login_form(){
        if(Session::get('user_id')){
            return redirect('home');
        }

        //per evitare di mostrare sempre gli errori, inizialmente la variabile sarà uguale alla stringa vuota
        $error = Session::get('error');
        Session::forget('error');
        return view('login')->with('error', $error);
    }

    public function do_login(){
        if(Session::get('user_id')){
            return redirect('home');
        }
        
        // validazione dati (campi non vuoti e utente presente nel database)
        if(strlen(request('username')) == 0 || strlen(request('password')) == 0){
            Session::put('error', 'empty_fields');
            return redirect('login')->withInput();
        }
        $user = User::where('username', request('username'))->first();
        if(!$user || !password_verify(request('password'), $user->password)){
            Session::put('error', 'wrong');
            return redirect('login')->withInput();
        }

        Session::put('user_id', $user->id);
        
        return redirect('home');
    }

    public function register_form(){
        if(Session::get('user_id')){
            return redirect('home');
        }

        // serve ad evitare di mostrare sempre gli errori, inizialmente la variabile sarà uguale alla stringa vuota
        $error = Session::get('error');
        Session::forget('error');
        return view('register')->with('error', $error);
    }

    public function do_register(){ 
        if(Session::get('user_id')){
            return redirect('home');
        }
        // controlla che i campi in fase di registrazione non siano vuoti, che le password corrispondano, che l'username e la mail siano univoche
        if(strlen(request('username')) == 0 || strlen(request('password')) == 0){
            Session::put('error', 'empty_fields');
            return redirect('register')->withInput();
        }
        else if(request('password') != request('conferma')){
            Session::put('error', 'bad_passwords');
            return redirect('register')->withInput();
        }
        else if(User::where('username', request('username'))->first()){
            Session::put('error', 'existing_username');
            return redirect('register')->withInput();
        }
        else if(User::where('email', request('email'))->first()){
            Session::put('error', 'existing_email');
            return redirect('register')->withInput();
        }

        // creazione nuovo utente
        $user = new User;
        $user->username = request('username');
        $user->email = request('email');
        $user->password = password_hash(request('password'), PASSWORD_BCRYPT);
        $user->save();

        Session::put('user_id', $user->id);

        return redirect('home');
    }

    public function logout(){
        Session::flush();
        return redirect('login');
    }
}

?>