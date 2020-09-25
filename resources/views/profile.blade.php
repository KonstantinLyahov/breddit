@extends('layouts/app')

@section('title')
	{{ $user->name}}
@endsection

@section('content')
	<div class="container">
		@include('partials/posts', ['posts' => $posts])
	</div>
@endsection