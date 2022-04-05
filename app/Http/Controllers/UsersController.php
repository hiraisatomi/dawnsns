<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Follow;
use App\Follower;



class UsersController extends Controller
{
    //プロフィール画面の表示
    public function profile(){
        // users.profile内の情報を保持させたまま画面表示処理
        return view('users.profile');
    }

    // トップページ
    public function index(User $user)
    {
        $all_users = $user->getAllUsers(auth()->user()->id);
        ddd($all_users);
        // posts.index内に全てのユーザー情報を保持させたまま処理
        return view('posts.index', [
            'all_users'  => $all_users
        ]);
    }

    
    //プロフィールの更新   web.phpのpostルーティングを読み込み更新に成功したらプロフィールページに反映
    public function upprofile(Request $request){
        $validator = Validator::make($request->all(),[
          'username'  => 'required|min:2|max:12',
          'mail' => ['required', 'min:5', 'max:40', 'email', Rule::unique('users')->ignore(Auth::id())],
          'newpassword' => 'min:8|max:20|confirmed|alpha_num',
          'bio' => 'max:150',
          'iconimage' => 'image',
        ]);

        $user = Auth::user();
        $image = $request->file('iconimage');
        $uppass= $request->input('newpassword');
        // 拡張子付きでファイル名を取得、名前の保存
        if(!empty($image)){
            $filename = $image->getClientOriginalName();
            $image->storeAs('/images', $filename, 'disk');

            User::where('id', Auth::id())->update([
            'images' => $filename,
            ]);
        }

        if(!empty($uppass)){
        User::where('id', Auth::id())->update([
            'password' => bcrypt($uppass),
        ]);
        }

        User::where('id', Auth::id())->update([
            'username' => $request->input('username'),
            'mail' => $request->input('mail'), 
            'bio' => $request->input('bio'),
            
        ]);
        
        return redirect('/profile');
    }


    // whereで自分以外のユーザーを対象。likeで曖昧検索できるようルーティング
    public function usersearch(Request $request){
        $search = $request->input('search');
        $followlists = Follow::where('follower', Auth::id())
            ->get()
            ->toArray(); 
            // 配列化

        // ！、<>で否定系になる
        if(!empty($search)){
            $users=User::where('id','<>', Auth::id())
                ->where('username','like','%'.$search.'%')
                ->get();       
        } else{
            $users=User::where('id','<>', Auth::id())
                ->get();
        }
        // users.search内にusers、followlists情報を保持させたまま画面表示処理
        return view('users.search',['users'=>$users, 'followlists'=>$followlists]);
    }


    // ツイート検索
    public function tweetsearch(Request $request){
        $search = $request->input('search');

        // ！で否定系になる
        if(!empty($search)){
            $tweets=User::where('id',Auth::id())
                ->where('uptweet','like','%'.$search.'%')
                ->get();       
        } else{
            $tweets=User::where('id',Auth::id())
                ->get();
        }
        // users.search内にtweets情報を保持させたまま画面表示処理
        return view('users.search',['tweet'=>$tweets]);
    }

    
    
    

}




