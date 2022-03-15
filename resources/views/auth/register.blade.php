@extends('layouts.logout')

@section('content')

{!! Form::open() !!}

<h2>新規ユーザー登録</h2>

{{ Form::label('UserName') }}
{{ Form::text('username',null,['class' => 'input']) }}
@if ($errors->has('username'))
{{$errors->first('username')}}
@endif
<br>
{{ Form::label('MailAdress') }}
{{ Form::text('mail',null,['class' => 'input']) }}
@if ($errors->has('mail'))
{{$errors->first('mail')}}
@endif
<br>
{{ Form::label('Password') }}
{{ Form::text('password',null,['class' => 'input']) }}
@if ($errors->has('password'))
{{$errors->first('password')}}
@endif
<br>
{{ Form::label('Password confirm') }}
{{ Form::text('password_confirmation',null,['class' => 'input']) }}

{{ Form::submit('REGISTER') }}

<p><a href="/login">ログイン画面へ戻る</a></p>

{!! Form::close() !!}


@endsection
