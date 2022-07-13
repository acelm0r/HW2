<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use App\Models\Collection;
use App\Models\Comment;

use Session;

class SearchController extends BaseController {

    public function home(){
        if(!Session::get('user_id')){
            return redirect('login');
        }
        
        $user = User::find(Session::get('user_id'));
        return view('search')->with('username', $user->username);     
    }

}

?>