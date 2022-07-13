<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use DB;
use App\Models\User;
use App\Models\Comment;

use Session;

class CommentController extends BaseController {

    public function home(){
        // controlla l'accesso
        if(!Session::get('user_id')){
            return redirect('login');
        }
        // leggiamo username
        $user = User::find(Session::get('user_id'));
        return view('comment')->with('username', $user->username);
    }

    public function create_comment(){
        if(!Session::get('user_id')){
            return redirect('login');
        }
        $user = User::find(Session::get('user_id'));

        $comment = new Comment;
        $comment->author = Session::get('user_id');
        $comment->text_content = request('text_content');
        $comment->save();

        $comments = DB::table('comments')->join('users', 'users.id', '=', 'comments.author')->get();
        return view('home')->with('username', $user->username)->with('id', $user->id)->with('success_msg', 'Il commento è stato salvato con successo!')->withComments($comments); 
    }
}
