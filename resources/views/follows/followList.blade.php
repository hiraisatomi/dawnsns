@extends('layouts.login')

@section('content')
<div class='container'>
        <h2 class='page-header'>フォローリスト</h2>
        {!! Form::open(['url' => 'follows/follow']) !!}
        <div class="form-group">
            {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => 'フォローリスト']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@endsection