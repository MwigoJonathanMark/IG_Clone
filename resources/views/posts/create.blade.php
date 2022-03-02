@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">{{ __('Add New Post') }}</div>

                <div class="card-body">
                    <form method="POST" action="/p" enctype="multipart/form-data">
                        @csrf

                        <img id="postPreview" src="/images/userProfile.jpg" alt="Post here" class="card-img card-img-top img-fluid rounded w-100 h-100 pb-2">

                        <div class="row mb-3 justify-content-center">
                            <div class="col-md-6">
                                <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" required autocomplete="image" onchange="getImage()">

                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 justify-content-center">
                            <div class="col-md-12 text-center">
                              <label for="caption" class="col-form-label text-md-top">{{ __('Caption') }}</label>
                            </div>

                            <div class="col-md-12">
                                <input id="caption" type="text" class="form-control @error('caption') is-invalid @enderror" name="caption" value="{{ old('caption') }}" required autocomplete="caption" autofocus>

                                @error('caption')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 justify-content-center">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    {{ __('Post') }}
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
@section('scripts'){{-- 
function getImage() {
    var file = document.getElementById('image').value;
    document.getElementById('postPreview').src = file
} --}}
@endsection