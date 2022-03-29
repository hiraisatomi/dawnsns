<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\FollowUser;
use App\Tweet;
use App\Follower;


class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
    }

    
    public function index(User $user)
    {
        $all_users = $user->getAllUsers(auth()->user()->id);
        ddd($all_users);

        return view('posts.index', [
            'all_users'  => $all_users
        ]);
    }

    

    public function upprofile(Request $request){
        $validator = Validator::make($request->all(),[
          'username'  => 'required|min:2|max:12',
          'mail' => ['required', 'min:5', 'max:40', 'email', Rule::unique('users')->ignore(Auth::id())],
          'newpassword' => 'min:8|max:20|confirmed|alpha_num',
          'bio' => 'max:150',
          'iconimage' => 'image',
        ]);

        $user = Auth::user();
        //画像登録
        $image = $request->file('iconimage')->store('public/images');
        $validator->validate();
        $user->update([
            'username' => $request->input('username'),
            'mail' => $request->input('mail'),
            'password' => bcrypt($request->input('newpassword')),
            'bio' => $request->input('bio'),
            'images' => basename($image),
        ]);
        return redirect('/profile');
    }


// whereで自分以外のユーザーを対象。likeで曖昧検索できるようルーティング
    public function usersearch(Request $request){
        $search = $request->input('search');

        if(!empty($search)){
            $users=User::where('id','<>', Auth::id())
                ->where('username','like','%'.$search.'%')
                ->get();       
        } else{
            $users=User::where('id','<>', Auth::id())
                ->get();
        }
        return view('users.search',['users'=>$users]);
    }



    public function tweetsearch(Request $request){
        $search = $request->input('search');

        if(!empty($search)){
            $tweets=User::where('id',Auth::id())
                ->where('uptweet','like','%'.$search.'%')
                ->get();       
        } else{
            $tweets=User::where('id',Auth::id())
                ->get();
        }
        return view('tweet.search',['tweet'=>$tweets]);
    }

    public function show(User $user, Tweet $tweet, Follower $follower)
    {
        $login_user = auth()->user();
        $is_following = $login_user->isFollowing($user->id);
        $is_followed = $login_user->isFollowed($user->id);
        $timelines = $tweet->getUserTimeLine($user->id);
        $tweet_count = $tweet->getTweetCount($user->id);
        $follow_count = $follower->getFollowCount($user->id);
        $follower_count = $follower->getFollowerCount($user->id);

        return view('users.show', [
            'user'           => $user,
            'is_following'   => $is_following,
            'is_followed'    => $is_followed,
            'timelines'      => $timelines,
            'tweet_count'    => $tweet_count,
            'follow_count'   => $follow_count,
            'follower_count' => $follower_count
        ]);
    }

}




