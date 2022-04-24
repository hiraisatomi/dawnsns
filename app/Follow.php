<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $fillable = [
        'follow', 'follower',
    ];

    public function getFollowCount($user_id)
    {
        return $this->where('follow', $user_id)->count();
    }

    public function getFollowerCount($user_id)
    {
        return $this->where('follower', $user_id)->count();
    }

    const UPDATED_AT = NULL;
}
