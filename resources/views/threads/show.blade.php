@extends('layouts.app')

@section('content')

<div class="container">
  <a href="{{ route('thread.index') }}">Back To Threads</a>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                  <a href="#">{{ $thread->creator->username }}</a> posted: {{ $thread->title }}
                </div>

                <div class="card-body">
                    <p>{{ $thread->body }}</p>
                </div>
            </div>

            @foreach($replies as $reply)
              <div class="card">
                  <div class="card-header">
                     <a href="#">{{ $reply->owner->username }}</a> said {{ $reply->created_at->diffForHumans() }}
                  </div>

                  <div class="card-body">
                      <p>{{ $reply->body }}</p>
                  </div>
              </div>
              @endforeach

              {{ $replies->links() }}

              @if(auth()->check())

                <form method="POST" action="{{ route('reply.add', $thread) }}">
                  @csrf

                  <div class="form-group">
                    <textarea name="body" id="body" class="form-control" placeholder="Add Your Reply" rows="5">
                    </textarea>
                  </div>

                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>

              @else
                <p>To reply to this thread <a href="{{ route('login') }}">Login</a> or <a href="{{ route('register') }}">Register</a> for an account!</p>
              @endif
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <p>This thread was published {{ $thread->created_at->diffForHumans() }} by <a href="#">{{ $thread->creator->username }}</a> and currently has {{ $thread->replies()->count() }} {{ Str::plural('reply', $thread->replies()->count()) }}.</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
