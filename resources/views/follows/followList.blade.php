@extends('layouts.login')

@section('content')
<form action="/followlist" method="post">
 @csrf
 </form>
<div id='side-bar'>
        <div class='followlist'>
            
        <h1>Follow list</h1>
        <br>
        <p>ここにフォローリストを表示</p>
        <br>
        
        
    
    </div>

@endsection
