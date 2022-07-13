<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {

    protected $table = 'comments';

    protected $fillable = [
        'author', 'text_content'
    ];

    protected $hidden = [
        'id', 'created_at'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');         // seconda parte della relazione 1 N, il comment appartiene ad un user
    }
}

?>