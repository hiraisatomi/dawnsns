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


Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');
// 登録完了時のページ
Route::get('/added', 'Auth\RegisterController@added');


//ログイン中のページ
Route::get('/top','PostsController@index');
// 投稿の受け取り
Route::post('/tweet','PostsController@tweet');
Route::get('/tweets','PostsController@index');

Route::get('/profile','UsersController@profile');
Route::get('/search','UsersController@index');
Route::get('follows/follower-list','PostsController@index');
Route::get('follows/follower','PostsController@index');

Route::get('follows/follow-rist', 'PostsController@followList');
Route::post('follows/follow', 'PostsController@follow');


// ログアウト時
Route::get('/logout', 'Auth\LoginController@logout');





