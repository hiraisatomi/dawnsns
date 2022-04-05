<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Follow;
use App\Follower;
use Illuminate\Support\Facades\Auth;


class FollowsController extends Controller
{
    //
    
//このユーザがフォローしている人を取得
public function followlist()
    {
        $followlists = Follow::join('users', 'follows.follow', '=', 'users.id')
            ->where('follower', Auth::id())
            ->select('users.id', 'users.images')
            ->get();
        
        $followposts = Follow::join('users', 'follows.follow', '=', 'users.id')
            ->join('posts', 'users.id', '=', 'posts.user_id')
            ->where('follower', Auth::id())
            ->select('users.id', 'users.images', 'posts.posts', 'posts.created_at')
            ->get();
   
        return view('follows.followList', ['followlists' => $followlists, 'followposts' => $followposts]);
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

