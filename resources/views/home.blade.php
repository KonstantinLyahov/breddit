@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ($posts as $post)
    <div class="card mb-4">
        <div class="container">

            <img class="card-img-top" src="{{ Storage::url($post->files()->first()->path) }}">
        </div>
        <div class="card-body">
            <h2 class="card-title">{{ $post->title }}</h2>
            <p class="card-text">{{ $post->body }}<p>
                    <a href="#" class="btn btn-primary">Read More &rarr;</a>
        </div>
        <div class="card-footer text-muted">
            Posted <span>{{ $post->created_at }}</span> by
            <a href="#">{{ $post->user->name }}</a>
        </div>
    </div>
    @endforeach
</div>
@endsection`