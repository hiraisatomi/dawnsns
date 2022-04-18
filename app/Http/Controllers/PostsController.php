<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// 以下忘れず追記
use App\Post; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;

class PostsController extends Controller
{

    // ログイン制限
    public function __construct(){
        $this->middleware('auth');
        }

    //投稿時間の降順で取得
    public function index(){
        $lists = Post::orderby('posts.created_at','desc')
                ->get();
        // posts.index内にlist情報を保持させたまま画面表示処理
            return view('posts.index',['lists'=>$lists]);
    }


    //ツイート内容の送信保存
    public function tweet(Request $request){
        $tweet = $request->input('tweet');
        Post::create([
            'user_id' => Auth::id(),
            'posts' => $tweet,
        ]);     
        // web.phpのpostルーティングを読み込み送信保存に成功したらトップページへ
        return redirect('/top');
    }

    // ツイート内容の表示
    public function uptweet(Request $request){
        $uptweet = $request->input('uptweet');
        $upid = $request->input('upid');
        Post::where('id',$upid)
            ->update([
                'posts' => $uptweet,
        ]);        
        // web.phpのpostルーティングを読み込み表示に成功したらトップページに反映
        return redirect('/top');
    }


    // ツイートの削除
    public function trash($id){
        DB::table('posts')
         ->where('id', $id)
         ->delete();
        // web.phpのpostルーティングを読み込み削除に成功したらトップページに反映
         return redirect('/top');
    }

}





