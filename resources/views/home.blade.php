@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1"></div>
        <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
            @foreach ($posts as $post) <div class="card mb-4">
                <div class="card-header text-muted">
                    Posted <span>{{ time_elapsed_string($post->created_at) }}</span> by <a href="#">{{ $post->user->name }}</a>
                </div>
                <img class="card-img-top" src="{{ Storage::url($post->files()->first()->path) }}">
                <div class="card-body">
                    <h2 class="card-title">{{ $post->title }}</h2>
                    <p class="card-text">{{ $post->body }}<p> <a href="#" class="btn btn-primary">Read More &rarr;</a>
                </div>
            </div>
            @endforeach
        </div>
        <div class="col-1 col-sm-1 col-md-3 col-lg-3 col-xl-5"></div>
    </div>
</div>
@endsection