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

<div class="textbox1">
<img src="/images" class="circle"><dt>UserName</dt> 
    <dd class="textbox"><input type="text" name="username" value="{{ Auth::user()->username }}"></dd>
</div>

<div class="textbox1">
<dt>MailAddress</dt>
    <dd><input type="text" name="mail" value="{{ Auth::user()->mail }}"></dd>
</div>

<div class="textbox1">
<dt>Password</dt>
    <dd><input type="password" readonly name="password" value="{{ Auth::user()->password }}"></dd>
</div>

<div class="textbox1">
<dt>new Password</dt>
    <dd><input type="password" name="newpassword"></dd>
</div>

<div class="textbox1">
<dt>Bio</dt>
    <dd><input type="textarea" name="bio" value="{{ Auth::user()->bio }}"></dd>
</div>

<div class="textbox1">
<dt>Icon Image</dt>
    <dd><input type="file" name="iconimage"></dd>
</div>


<div class="button">
<input type="submit" name="upprofile" value="更新">
</div>    
</dl> 
</form>



@endsection