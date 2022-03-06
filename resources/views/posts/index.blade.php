@extends('layouts.app')

@section('content')

<div class="container">
    @foreach ($posts as $post)
        <div class="offset-2">
            <div class="row">
                <div class="d-flex col-md-6">
                    <img src="{{ $post->user->profile->profileImage() }}" class="rounded-circle w-100" style="max-width: 40px;">
                    <div class="ps-2">
                        <a style="text-decoration: none;" href="/profile/{{ $post->user->id }}" class="fw-bold link-dark">{{ $post->user->username }}</a href="/profile/{{ $post->user->id }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 offset-3">
                    <a style="text-decoration: none;" href="/profile/{{ $post->user->id }}"><img src="/storage/{{ $post->image }}" class="img-responsive w-100"></a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <p>{{ $post->caption }}</p>
                </div>
            </div>
        </div>
        <hr>
    @endforeach
</div>
@endsection
