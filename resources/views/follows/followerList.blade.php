@extends('layouts.login')
<div id='side-bar'>
        <div class='followerlist'>フォロワーリスト</div>
        {!! Form::open(['url' => 'follows/follower']) !!}
        <div class="form-group">
            {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => 'フォロワーリスト']) !!}
        </div>
        {!! Form::close() !!}
@section('content')
@endsection