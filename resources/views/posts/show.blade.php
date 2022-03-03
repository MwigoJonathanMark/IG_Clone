@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="d-flex">
            <div class="col-md-8">
                <img src="/storage/{{ $post->image }}" class="img-responsive w-100">
            </div>
            <div class="ps-4 col-md-4 border">
                <div>
                    <div class="d-flex align-content-center pt-2">
                        <div class="pe-3">
                            <img src="{{ $post->user->profile->profileImage }}" class="rounded-circle w-100" style="max-width: 30px;">
                        </div>
                        <div>
                            <a style="text-decoration: none;" href="/profile/{{ $post->user->id }}" class="fw-bold link-dark">{{ $post->user->username }}</a href="/profile/{{ $post->user->id }}">
                        </div>
                        <svg class="text-center" width="20" height="20">
                            <circle cx="10" cy="10" r="2"/>
                        </svg>
                        <a style="color: #1DA1F2; text-decoration: none;" class="fw-bold" href="#">Follow</a>
                    </div>
                    <hr>
                    <p><a style="text-decoration: none;" href="/profile/{{ $post->user->id }}" class="fw-bold link-dark">{{ $post->user->username }}</a> {{ $post->caption }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
