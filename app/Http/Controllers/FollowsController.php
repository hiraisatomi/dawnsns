<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Follow;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Tweet;
use App\Post;


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
        $followerlists = Follow::join('users', 'follows.follower', '=', 'users.id')
            ->where('follow',Auth::id())
            ->select('users.id', 'users.images')
            ->get();
        
        $followerposts = Follow::join('users', 'follows.follower', '=', 'users.id')
            ->join('posts', 'users.id', '=', 'posts.user_id')
            ->where('follow',Auth::id())
            ->select('users.id', 'users.images', 'posts.posts', 'posts.created_at')
            ->get();
            
        return view('follows.followerList', ['followerlists' => $followerlists, 'followerposts' => $followerposts]);
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

    // フォローフォロワーのツイートページに飛ぶ
    public function others($id)
    {
        $profile = User::where('id', $id)
            ->select('id', 'username', 'bio', 'images')
            ->first();

        $lists = Post::where('user_id', $id)->orderby('posts.created_at','desc')
            ->get();

        $followlists = Follow::where('follower', Auth::id())
            ->get()
            ->toArray(); 

        return view('follows.others', ['profile' => $profile, 'lists' => $lists, 'followlists'=> $followlists]);
    }


    

}