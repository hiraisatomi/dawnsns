@extends('layouts.login')

@section('content')

<!-- 送信先と方法の指定 -->
<form action="/tweet" method="post">
@csrf
<!-- 入力方法、初期表示する内容placeholderの指定、画像の表示 -->
    <input type="text" name="tweet" placeholder="何をつぶやこうか...?">
    <input type="image" src="/images/post.png" alt="送信する">
</form>

<table>
@foreach($lists as $list)
<tr>
    <td>
        <img src="/images/{{ $list->user->images }}" alt="icon">
    </td>
    <td>{{ $list->user->username }}</td>
    <td>{{ $list->posts }}</td>
    <td>{{ $list->created_at }}</td>
    <!-- <td>
        <img src="/images/edit.png" alt="edit">
    </td> -->
    <!-- <td>
        <img src="/images/trash.png" alt="trash">
    </td> -->
    <td><a href="/post/{{$list->id}}/update-form"><img src="/images/edit.png" alt="edit"></a></td>
    <td><a href="/post/{{ $list->id }}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')"><img src="/images/trash.png" alt="trash"></a></td>
    
</tr>

<!-- 送信したツイートの受け取り -->
<form action="/uptweet" method="post">
@csrf
    <input type="text" name="uptweet" value="{{ $list->posts }}">
    <input type="hidden" name="upid" value="{{ $list->id }}">
    <input type="image" src="/images/edit.png" alt="edit">
</form>
@endforeach
</table>

@endsection