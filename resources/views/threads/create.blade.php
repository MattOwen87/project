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

                  <div class="form-group">
                    <input name="title" type="text" id="title" class="form-control" placeholder="Add Title For Your Thread">
                  </div>

                  <div class="form-group">
                    <textarea name="body" id="body" class="form-control" placeholder="Add Content For Thread" rows="5">
                    </textarea>
                  </div>

                  <button type="submit" class="btn btn-primary">Publish Thread</button>
                </form>
              </div>
          </div>
        </div>
    </div>
</div>
@endsection
