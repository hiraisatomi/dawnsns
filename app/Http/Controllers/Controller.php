<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\View;
use App\Product;
use App\Follow;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

// public function __construct()
// {
//     View::share('follow', $follow_count);

public static function getMyFollow() 
{
    $follow_count = Follow::join('users', 'follows.follow', '=', 'users.id')
    ->where('follower', Auth::id())
    ->select('follows.id','follows.follow')
    ->count();
    $result = $follow_count;
    return $result;
}

public static function getMyFollower() 
{
    $follower_count = Follow::join('users', 'follows.follower', '=', 'users.id')
    ->where('follow', Auth::id())
    ->select('follows.id','follows.follower')
    ->count();
    $result = $follower_count;
    return $result;
}

}
