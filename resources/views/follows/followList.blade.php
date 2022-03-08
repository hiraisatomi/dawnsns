@extends('layouts.login')

@section('content')
<div id='side-bar'>
        <div class='followlist'>フォローリスト<div>
        {!! Form::open(['url' => 'post/follow']) !!}
        <div class="form-group">
            {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => 'フォローリスト']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@endsection