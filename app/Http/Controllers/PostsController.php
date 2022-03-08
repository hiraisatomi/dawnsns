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
        $lists = Post::orderby('posts.created_at','desc')
                ->get();
            return view('posts.index',['lists'=>$lists]);
    }


    //ツイート内容の送信保存
    public function tweet(Request $request){
        $post = $request->input('tweet');
        post::create([
            'user_id' => Auth::id(),
            'posts' => $post,
        ]);        
        return redirect('/top');
    }

    // ツイート内容の表示
    public function uptweet(Request $request){
        $post = $request->input('uptweet');
        $upid = $request->input('upid');
        post::where('id',$upid)
            ->update([
                'posts' => $uptweet,
        ]);        
        return redirect('/top');
    }


    // ツイートの編集
    

    // ツイートの削除
    public function delete($id){
        DB::table('posts')
         ->where('id', $id)
         ->delete();
         return redirect('/top');
    }




//     // フォローリスト
//     public function followList(){
//         return view('follows.followList');
//     }

//     public function follow(){
//         return view('posts.index');
// }

//     // フォロワーリスト
//     public function followerList(){
//         return view('follows.followList');
//     }

//     public function follower(){
//         return view('posts.index');
// }


}