<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;


class PostsController extends Controller
{

    // ログイン制限
    public function __construct(){
        $this->middleware('auth');
        }
    //
    public function tweet(Request $request){
        $post = $request->input('tweet');
        post::create([
            'user_id' => Auth::id(),
            'posts' => $post,
        ]);
        
        return redirect('/top');
        }

    public function index(){
        return view('posts.index');
        }
    
}

