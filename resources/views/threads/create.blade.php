@extends('layouts.app')

@section('content')

<div class="container">
  <a href="{{ route('thread.index') }}">Back To Threads</a>

    <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">

            <div class="card-header">Create New Thread</div>

              <div class="card-body">
                <form method="POST" action="{{ route('thread.store') }}">
                  @csrf

                  @if(session('error'))
                  <div class="alert alert-danger" role="alert">
                    {{session('error')}}
                  </div>
                  @endif

                  <div class="form-group">
                    <select name="channel_id" id="channel_id" class="form-control @error('channel_id') is-invalid @enderror" required>
                      <option value="">Choose a Channel For Your Thread</option>
                      @foreach(App\Channel::all() as $channel)
                      <option value="{{ $channel->id }}">{{ $channel->name }}</option>
                      @endforeach
                    </select>
                    @error('channel_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <input name="title" type="text" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Add Title For Your Thread" value="{{ old('title') }}" required>
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <textarea name="body" id="body" class="form-control @error('body') is-invalid @enderror" placeholder="Add Content For Thread" rows="5" value="{{ old('body') }}" required>
                    </textarea>
                    @error('body')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary">Publish Thread</button>
                  </div>
                </form>
              </div>
          </div>
        </div>
    </div>
</div>
@endsection
