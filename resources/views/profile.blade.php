@extends('layouts.app')

@section('content')
<img src="{{asset('../public/uploads/avatars/'.$user->avatar)}}">
<h1>{{$user->username}}</h1>
<h1>{{$user->name}}</h1>
<h1>{{$user->id}}</h1>
<h1>{{$user->email}}</h1>
@endsection
