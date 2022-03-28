@extends('layouts.login')

@section('content')

<form action="{{ url('upprofile') }}" enctype="multipart/form-data" method="post">
  @csrf
  @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
   @endif
<dl class="UserProfile">

<dt><img src="/images/dawn.png" alt="icon">UserName</dt> 
    <dd><input type="text" name="username" value="{{ Auth::user()->username }}"></dd>

<dt>MailAdress</dt>
    <dd><input type="text" name="mail" value="{{ Auth::user()->mail }}"></dd>

<dt>Password</dt>
    <dd><input type="text" name="password" value="{{ Auth::user()->password }}"></dd>

<dt>new Password</dt>
    <dd><input type="password" name="newpassword"></dd>

<dt>Bio</dt>
    <dd><input type="textarea" name="bio" value="{{ Auth::user()->bio }}"></dd>

<dt>Icon Image</dt>
    <dd><input type="file" name="iconimage"></dd>
</dl>

<input type="submit" name="upprofile" value="更新">
       
</form>



@endsection