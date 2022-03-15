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
        <!-- 投稿の表示 -->
    </td>
    <td>{{ $list->user->username }}</td>
    <td>{{ $list->posts }}</td>
    <td>{{ $list->created_at }}</td>
    
    <td><a href="/post/{{$list->id}}/update-form"><img src="/images/edit.png" alt="edit"></a></td>
    <td><a href="/posts/{{$list->id}}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')"><img src="/images/trash.png" alt="trash"></a></td> 
</tr>

<!-- 送信したツイートの受け取り -->
<form action="/uptweet" method="post">
@csrf
    <input type="text" name="uptweet" value="{{ $list->posts }}">
    <input type="hidden" name="upid" value="{{ $list->id }}">
</form>


<!-- ツイートの編集 モーダル機能-->

<!-- 1.鉛筆クリックでモーダル表示 -->
<input type="image" src="/images/edit.png" alt="edit" data-toggle="modal" data-target="#modal-tweet">
 
  <!-- 2.モーダルの配置 -->
  <div class="modal" id="modal-tweet" tabindex="-1">
    <div class="modal-dialog">
 
      <!-- 3.モーダルのコンテンツ -->
      <div class="modal-content">
 
        <!-- 4.モーダルのヘッダ -->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">
            <span aria-hidden="true">&times;</span>
          </button>
          <p class="modal-title" id="modal-label">ツイート</p>
        </div>
 
        <!-- 5.モーダルのボディ -->
        <div class="modal-body">
        <input type="text" name="uptweet" value="{{ $list->posts }}">
        <input type="hidden" name="upid" value="{{ $list->id }}">
            <!-- <textarea>つぶやいた内容を表示します。つぶやきは最大を150文字までとし、それ以上のテキストが入力フォームに打ち込まれた場合は、投稿できないように設定してください。</textarea> -->
        </div>
 
        <!-- 6.モーダルのフッタ -->
        <div class="modal-footer">
          <input type="image" src="/images/edit.png" alt="edit">
        </div>
      </div>
    </div>
  </div>
@endforeach

</table>

@endsection