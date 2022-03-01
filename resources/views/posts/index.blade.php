@extends('layouts.login')

@section('content')

<!-- 送信先と方法の指定 -->
<form action="/tweet" method="post">
@csrf
<!-- 入力方法、初期表示する内容placeholderの指定、画像の表示 -->
    <input type="text" name="tweet" placeholder="ここに文字を入力しましょう">
    <input type="image" src="/images/post.png">
</form>


@endsection