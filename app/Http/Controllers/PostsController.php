<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// 以下忘れず追記
use App\Post; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


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
        $tweet = $request->input('tweet');
        post::create([
            'user_id' => Auth::id(),
            'posts' => $tweet,
        ]);        
        return redirect('/top');
    }

    // ツイート内容の表示
    public function uptweet(Request $request){
        $uptweet = $request->input('uptweet');
        $upid = $request->input('upid');
        post::where('id',$upid)
            ->update([
                'posts' => $uptweet,
        ]);        
        return redirect('/top');
    }


    // ツイートの編集
    // public function updateFome($id){
    //     $post = DB::table('posts')
    //         ->where('id', $id)
    //         ->first();
    //     return view('posts.updateForm', ['post' => $post]);
    // }

    // public function update(Request $request)
    // {
    //     $id = $request->input('id');
    //     $up_post = $request->input('upPost');
    //     DB::table('posts')
    //         ->where('id', $id)
    //         ->update(
    //            ['post' => $up_post]
    //         );

    //     return redirect('/top');
    // }


    // ツイートの削除
    public function trash($id){
        DB::table('posts')
         ->where('id', $id)
         ->delete();

         return redirect('/top');
    }

}


namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    protected $fillable = [   // <---追加
        'user_id', 'tweet',
    ];
}



