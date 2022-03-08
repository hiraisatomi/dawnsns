@extends('layouts.login')
<div class='container'>
        <h2 class='page-header'>フォロワーリスト</h2>
        {!! Form::open(['url' => 'follows/follower']) !!}
        <div class="form-group">
            {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => 'フォロワーリスト']) !!}
        </div>
        {!! Form::close() !!}
@section('content')
@endsection