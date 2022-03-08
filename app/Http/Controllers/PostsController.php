<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// 以下忘れず追記
use App\Post; 
use Illuminate\Support\Facades\Auth;


class PostsController extends Controller
{

    // ログイン制限
    public function __construct(){
        $this->middleware('auth');
        }

    public function index(){
            return view('posts.index');
    }

    //ツイート内容の送信保存

    public function tweet(Request $request){
        $post = $request->tweet;
        post::create([
            'user_id' => Auth::id(),
            'posts' => $post,
        ]);        
        return redirect('/top');
    }

    // フォローリスト
    public function followList(){
        return view('follows.followList');
    }

    public function follow(){
        return view('/top');
}

    // フォロワーリスト



    // // 送信したツイート内容の取得
    // public function tweets()
    // {
    //     return view('posts.index');
    // }

    
}

