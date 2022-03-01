<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // postsテーブルの入れていい項目
    protected $fillable = [
        'user_id', 'posts', 
    ];
}
