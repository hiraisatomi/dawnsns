@extends('layouts.login')

@section('content')

<table>
@foreach($users as $user)
<tr>
<td><img src="/images/{{ $user->images }}" alt="icon"></td>
<td>{{ $user->username }}</td>
<td><a href="">フォローをする</a></td>
<td><a href="">フォローを外す</a></td>
</tr>


@endforeach
</table>

@endsection