@extends('layouts.logout')

@section('content')

{!! Form::open() !!}

<div class="textbox">
<p>DAWNのSNSへようこそ</p>

<div class="mail">
{{ Form::label('MailAdress') }}
{{ Form::text('mail',null,['class' => 'input']) }}

{{ Form::label('Password') }}
{{ Form::password('password',['class' => 'input']) }}
</div>
{{ Form::submit('LOGIN') }}
<div class="register">
<p><a href="/register">新規ユーザーの方はこちら</a></p>
</div>
</div>
{!! Form::close() !!}

@endsection
