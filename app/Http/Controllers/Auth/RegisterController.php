<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/added';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|string|max:12|min:4',
            'mail' => 'required|string|email|max:50|min:4|unique:users',
            'password' => 'required|string|max:12|min:4|confirmed',
            'password_confirmation' => 'required|string'
        ],[
            'required' => 'この項目は必須です',
            'username.max' =>'名前は12文字以内です',
            'username.min' =>'名前は4文字以上です',
            'mail.max' =>'メールアドレスは50文字以内です',
            'mail.min' =>'メールアドレスは4文字以上です',
            'mail.email' =>'そのメールアドレスは使用できません',
            'mail.unique' =>'そのメールアドレスは既に使われています',
            'password.max' =>'パスワードは12文字以内です',
            'password.min' =>'パスワードは4文字以上です',
            'password.confirmed' =>'確認用パスワードが一致しません',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'mail' => $data['mail'],
            'password' => bcrypt($data['password']),
        ]);
    }


    // public function registerForm(){
    //     return view("auth.register");
    // }

    // ユーザー登録処理
    public function register(Request $request){
        if($request->isMethod('post')){
            $data = $request->input();

            // バリテーションエラーの表示
            $validator = $this->validator($data);
            if ($validator->fails()) {
                return redirect('/register')
                            ->withErrors($validator)
                            ->withInput();
            }

            // 登録フォームの表示
            $this->create($data);
            return redirect('added')->with('username',$data['username']);
        }
        return view('auth.register');

    }

    // 登録成功したらaddページに飛ぶ
    public function added(){
        return view('auth.added');
    }
}
