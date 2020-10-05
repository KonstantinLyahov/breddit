@extends('layouts.app')

@section('content')
<div class="container">
    @include('partials/posts', ['posts' => $posts])
</div>
@endsection
