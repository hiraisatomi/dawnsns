@extends('layouts.logout')

@section('content')

{!! Form::open() !!}

<div id="textbox">
<p>DAWNのSNSへようこそ</p>

{{ Form::label('MailAdress') }}
{{ Form::text('mail',null,['class' => 'input']) }}
<div id>
{{ Form::label('Password') }}
{{ Form::password('password',['class' => 'input']) }}

{{ Form::submit('LOGIN') }}
<div id="register">
<p><a href="/register">新規ユーザーの方はこちら</a></p>
</div>
</div>
{!! Form::close() !!}

@endsection
