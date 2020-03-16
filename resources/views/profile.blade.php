@extends('layouts.app')

@section('content')
<h1>{{$user->username}}</h1>
<h1>{{$user->name}}</h1>
<h1>{{$user->id}}</h1>
<h1>{{$user->email}}</h1>
@endsection
