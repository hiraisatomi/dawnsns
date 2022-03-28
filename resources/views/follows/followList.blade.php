@extends('layouts.login')

@section('content')
<form action="/follow" method="post">
 @csrf
 


<div id='side-bar'>
        <div class='follow'>フォローリスト</div>
        {!! Form::open(['url' => '/follow']) !!}
        <div class="form-group">
            {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => 'フォローリスト']) !!}
        </div>
    <div>
        {!! Form::close() !!}
    </div>
@endsection