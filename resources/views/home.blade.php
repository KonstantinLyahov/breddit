@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1"></div>
        <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6 posts">
            @foreach ($posts as $post)
            <div class="card mb-4">
                <div class="card-header text-muted">
                    Posted <span>{{ time_elapsed_string($post->created_at) }}</span> by <a
                        href="#">{{ $post->user->name }}</a>
                </div>
                <div class="card-body">
                    <h2 class="card-title">{{ $post->title }}</h2>
                    <p class="card-text">{!! $post->body !!}<p>
                </div>
                @if ($post->files()->count() == 1)
                <img class="card-img" src="{{ asset(Storage::url($post->files()->first()['path'])) }}">
                @else
                <div class="row">
                    @for ($i = 1; $i < $post->files()->count(); $i++)
                        <div class="col-4 thumb">
                            <img class="card-img-top img-fluid"
                                src="{{ asset(Storage::url($post->files()->get()[$i]['path'])) }}">
                        </div>
                    @endfor
                </div>
                @endif
            </div>
            @endforeach
            <div class="d-flex justify-content-end">

                {{ $posts->links() }}
            </div>
        </div>
        <div class="col-1 col-sm-1 col-md-3 col-lg-3 col-xl-5"></div>
    </div>
</div>
@endsection