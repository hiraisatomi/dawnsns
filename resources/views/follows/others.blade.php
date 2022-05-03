@extends('layouts.login')

@section('content')

<img src="{{ asset('images/' .$profile->images )}}" alt="icon" class="circle2">
<p>{{ $profile->username }}さん</p>
<p>{{ $profile->bio }}</p>
<div class="follow-bar">
@if(!in_array($profile->id, array_column($followlists, 'follow')))
    <td><a class="btn btn-primary" a href="/follow/{{$profile->id}}">フォローをする</a></td>
    @else
    <td><a class="btn btn-danger" a href="/unfollow/{{$profile->id}}">フォローを外す</a></td>
    @endif
</div>

<table>
@foreach($lists as $list)
<tr>
    <td>
        <img src="/images/{{ $list->user->images }}" alt="icon" class="circle2">
        <br>
        <!-- 投稿の表示 -->
    </td>
    <td>{{ $list->user->username }}</td>
    <td>{{ $list->posts }}</td>
    <td>{{ $list->created_at }}</td>
</tr>

@endforeach
</table>
   @endsection