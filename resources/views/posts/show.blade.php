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
                    <h3>{{ $post->user->username }}</h3>
                    <p>{{ $post->caption }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
