<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // postsテーブルのうち入れていい項目
    protected $fillable = [
        'user_id', 'posts', 
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
