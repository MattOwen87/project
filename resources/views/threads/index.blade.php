@extends('layouts.app')

@section('content')
<div class="container">
  @if(auth()->check())
  <a href="{{ route('thread.create') }}">Create New Thread</a>
  @else
  <p>To create a new thread <a href="{{ route('login') }}">Login</a> or <a href="{{ route('register') }}">Register</a> for an account!</p>
  @endif

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Forum Threads</div>

                <div class="card-body">
                    @foreach ($threads as $thread)
                      <article>
                        <h4><a href="{{route('thread.show', $thread->id)}}">{{ $thread->title }}</a></h4>
                        <p>{{ $thread->body }}</p>
                      </article>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
