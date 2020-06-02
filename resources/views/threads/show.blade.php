@extends('layouts.app')

@section('content')

<div class="container">
  <a href="{{ route('thread.index') }}">Back To Threads</a>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                  <a href="#">{{ $thread->creator->username }}</a> posted: {{ $thread->title }}
                </div>

                <div class="card-body">
                    <p>{{ $thread->body }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
          @foreach($thread->replies as $reply)
            <div class="card">
                <div class="card-header">
                   <a href="#">{{ $reply->owner->username }}</a> said {{ $reply->created_at->diffForHumans() }}
                </div>

                <div class="card-body">
                    <p>{{ $reply->body }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    @if(auth()->check())
    <div class="row justify-content-center">
        <div class="col-md-8">

          <form method="POST" action="{{ route('reply.add', $thread) }}">
            @csrf

            <div class="form-group">
              <textarea name="body" id="body" class="form-control" placeholder="Add Your Reply" rows="5">
              </textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
          </form>

        </div>
    </div>

    @else
    <p>To reply to this thread <a href="{{ route('login') }}">Login</a> or <a href="{{ route('register') }}">Register</a> for an account!</p>
    @endif
</div>
@endsection
