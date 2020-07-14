@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">



                @foreach ($threads as $thread)
                <div class="card">
                  <div class="card-header">
                    <h4><a href="{{route('thread.show', ['channel'=>$thread->channel->slug, 'thread'=>$thread->id])}}">{{ $thread->title }}</a></h4>
                    <p>This thread was published {{ $thread->created_at->diffForHumans() }} by <a href="#">{{ $thread->creator->username }}</a> and currently has {{ $thread->replies_count }} {{ Str::plural('reply', $thread->replies_count) }}.</p>
                  </div>
                    <div class="card-body">
                        <p>{{ $thread->body }}</p>
                    </div>
                  </div>
                @endforeach

            @guest
            <p>To create a new thread <a href="{{ route('login') }}">Login</a> or <a href="{{ route('register') }}">Register</a> for an account!</p>
            @endguest
        </div>
    </div>
</div>
@endsection
