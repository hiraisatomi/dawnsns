<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Follow;
use App\Follower;
use Illuminate\Support\Facades\Auth;
use App\User;


class FollowsController extends Controller
{
    //
    
//このユーザがフォローしている人を取得
public function followlist()
    {
        return view('follows.followList');
    }


//このユーザをフォローしている人を取得
public function followerlist()
    {
        return view('follows.followerList');
    }


    // フォローする
    public function follow($follow)
    {
        Follow::create([
            'follower' => Auth::id(),
            'follow' => $follow,
        ]);
        
        return back();
    }

    //フォロー解除する
    public function unfollow($unfollow)
    {
        Follow::where('follow', $unfollow)
            ->where('follower', Auth::id())
            ->delete();

            return back();
 }


}

