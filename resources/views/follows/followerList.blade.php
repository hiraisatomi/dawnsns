@extends('layouts.login')

@section('content')

<h1>Follower list</h1>
        
@foreach($followerlists as $followerlist)
    <a href="/others/{{ $followerlist->id }}"><img src="/images/{{ $followerlist->images }}" alt="icon" class="circle2"/></a>
@endforeach

<table class="table table-hover">
@foreach($followerposts as $followerpost)
        <tr>
        <td>
                <img src="/images/{{ $followerpost->images }}" alt="icon" class="circle2">
                <!-- フォロワーの投稿の表示 -->
        </td>
        <td>{{ $followerpost->username }}</td>
        <td>{{ $followerpost->posts }}</td>
        <td>{{ $followerpost->created_at }}</td>
        </tr>
@endforeach
</table>

@endsection
