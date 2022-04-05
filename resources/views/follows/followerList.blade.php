@extends('layouts.login')

@section('content')
<form action="/followerlist">
 @csrf
 </form>
 <div id='side-bar'>
        <div class='followerlist'>
            
        <h1>Follower list</h1>
        <br>
        <p>ここにフォロワーリストを表示</p>
        <br>
        </div>

@endsection