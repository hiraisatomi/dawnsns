@extends('layouts.login')

@section('content')

<form action="/usersearch" method="post">
 @csrf
<input type="text" name="search" placeholder="ユーザー名">
<input type="submit" value="検索">
<p>検索ワード：     </p>
</form>


<table>
@foreach($users as $user)
<tr>
    <td><img src="/images/{{ $user->images }}" alt="icon" class="circle2"/></td>
    <td>{{ $user->username }}</td>
    @if(!in_array($user->id, array_column($followlists, 'follow')))
    <td><a href="/follow/{{$user->id}}">フォローをする</a></td>
    @else
    <td><a href="/unfollow/{{$user->id}}">フォローを外す</a></td>
    @endif
</tr>
@endforeach
</table>

@endsection