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

//Auth::routes();


//ログアウト中のページ
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

// 投稿の編集
// Route::post('update', 'PostsController@update');
// 投稿の削除
Route::get('/posts/{id}/delete','PostsController@trash');


Auth::routes();

// プロフィール編集
Route::get('/profile','UsersController@profile');
// ユーザー検索
Route::get('/search','UsersController@index');


// フォローリスト
Route::get('/followList','FollowsController@followList');
Route::post('/follow','FollowsController@follow');
// フォロワーリスト
Route::get('/followerList','FollowsController@followerList');
Route::get('/follower','FollowsController@follower');


// ログアウト時
Route::get('/logout', 'Auth\LoginController@logout');





