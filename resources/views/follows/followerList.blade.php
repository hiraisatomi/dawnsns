@extends('layouts.login')
<div id='side-bar'>
        <div class='follower'>フォロワーリスト</div>
        {!! Form::open(['url' => '/follower']) !!}
        <div class="form-group">
            {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => 'フォロワーリスト']) !!}
        </div>
        {!! Form::close() !!}
@section('content')
@endsection