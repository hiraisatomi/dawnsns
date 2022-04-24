<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();
Route::resource('users', 'UsersController');
// Route::group(['middleware' => 'auth'], function() {
//     Route::get('/show','FollowsController@show');
// });

//ログインページ
Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login');


// ユーザー登録
Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');
// 登録完了時のページ
Route::get('/added', 'Auth\RegisterController@added');


//ログイン中のページ
Route::get('/top','PostsController@index');
// 投稿の送信と受け取り
Route::post('/tweet','PostsController@tweet');
Route::post('/uptweet','PostsController@uptweet');
// 投稿の削除
Route::get('/posts/{id}/delete','PostsController@trash');

Auth::routes();


// プロフィール編集
Route::get('/profile','UsersController@profile');
Route::post('/profile','UsersController@profile');
Route::post('/upprofile','UsersController@upprofile');
Route::get('/index', 'UsersController@index');


// ユーザー検索
Route::get('/usersearch','UsersController@usersearch');
Route::post('/usersearch','UsersController@usersearch');
// つぶやき検索
Route::get('/tweetsearch','UsersController@tweetsearch');
Route::post('/tweetsearch','UsersController@tweetsearch');
// フォローする・外す
Route::get('/follow/{follow}', 'FollowsController@follow');
Route::get('/unfollow/{unfollow}', 'FollowsController@unfollow');


// フォローリスト
Route::get('/followlist','FollowsController@followlist');
// フォロワーリスト
Route::get('/followerlist','FollowsController@followerlist');
// 他のユーザーのページに飛ぶ
Route::get('/others/{id}','FollowsController@others');


// ログアウト時
Route::get('/logout', 'Auth\LoginController@logout');


