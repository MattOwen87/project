@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Forum Threads</div>

                <div class="card-body">
                    @foreach ($threads as $thread)
                      <article>
                        <h4><a href="{{route('thread.show', ['channel'=>$thread->channel->slug, 'thread'=>$thread->id])}}">{{ $thread->title }}</a></h4>
                        <p>{{ $thread->body }}</p>
                      </article>
                    @endforeach
                </div>
            </div>
            @guest
            <p>To create a new thread <a href="{{ route('login') }}">Login</a> or <a href="{{ route('register') }}">Register</a> for an account!</p>
            @endguest
        </div>
    </div>
</div>
@endsection
