<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use DB;
use App\Models\User;
use App\Models\Collection;
use App\Models\Comment;

use Session;

class HomeController extends BaseController {

    public function home(){
        // controlla l'accesso
        if(!Session::get('user_id')){
            return redirect('login');
        }
        // leggiamo username
        $user = User::find(Session::get('user_id'));
        return view('home')->with('username', $user->username);  
    }

    public function show_comments(){
        // controlla l'accesso
        if(!Session::get('user_id')){
            return redirect('login');
        }
        // leggiamo username

        $comments = DB::table('comments')->join('users', 'users.id', '=', 'comments.author')->get();
        $user = User::find(Session::get('user_id'));
        return view('home')->with('username', $user->username)->with('id', $user->id)->withComments($comments);    
    }
}

