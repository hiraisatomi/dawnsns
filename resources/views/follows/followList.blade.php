@extends('layouts.login')

@section('content')

<h1>Follow list</h1>

@foreach($followlists as $followlist)
    <a href="/others/{{ $followlist->id }}"><img src="/images/{{ $followlist->images }}" alt="icon" class="circle2"/></a>
@endforeach

<table class="table table-hover">
@foreach($followposts as $followpost)
        <tr>
        <td>
                <img src="/images/{{ $followpost->images }}" alt="icon" class="circle2">
                <!-- フォローしてる人の投稿の表示 -->
        </td>
        <td>{{ $followpost->username }}</td>
        <td>{{ $followpost->posts }}</td>
        <td>{{ $followpost->created_at }}</td>
        </tr>
@endforeach
</table>

@endsection
