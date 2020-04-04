@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Upload Images') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('image.edit') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="avatar" class="col-md-4 col-form-label text-md-right">{{ __('Upload your Avatar') }}</label>

                            <div class="col-md-6">
                                <img src="{{asset('../public/uploads/avatars/'.$user->avatar)}}">
                                <input id="avatar" type="file" class="form-control @error('avatar') is-invalid @enderror" name="avatar">

                                @error('avatar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
