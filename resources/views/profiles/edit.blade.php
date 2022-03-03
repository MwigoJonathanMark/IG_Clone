@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">{{ __('Edit Profile') }}</div>

                <div class="card-body">
                    <form method="POST" action="/profile/{{ $user->id }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <img id="profilePreview" src="{{ $user->profile->profileImage() }}" alt="Profile here" class="card-img card-img-top img-fluid rounded w-100 h-100 pb-2">

                        <div class="row mb-3 justify-content-center">
                            <div class="col-md-6">
                                <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" autocomplete="image" onchange="getImage()">

                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 justify-content-center">
                            <div class="col-md-12 text-center">
                              <label for="title" class="col-form-label text-md-top">{{ __('Title') }}</label>
                            </div>

                            <div class="col-md-12">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') ?? $user->profile->title }}" required autocomplete="title" autofocus>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 justify-content-center">
                            <div class="col-md-12 text-center">
                              <label for="description" class="col-form-label text-md-top">{{ __('Description') }}</label>
                            </div>

                            <div class="col-md-12">
                                <textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="description" rows="5" autofocus>{{ old('description') ?? $user->profile->description }}</textarea>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 justify-content-center">
                            <div class="col-md-12 text-center">
                              <label for="url" class="col-form-label text-md-top">{{ __('Website') }}</label>
                            </div>

                            <div class="col-md-12">
                                <input id="url" type="url" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ old('url') ?? $user->profile->url }}" required autocomplete="url" autofocus>

                                @error('url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 justify-content-center">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    {{ __('Save') }}
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
    document.getElementById('profilePreview').src = file
} --}}
@endsection
