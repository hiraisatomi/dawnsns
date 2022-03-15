<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
    }
    public function userserch(){
        $users=User::where('id','<>','auth')
            ->get();
        return view('users.search',['users'=>$users]);
    }
}
