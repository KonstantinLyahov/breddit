@extends('profile/layout')

@section('data')
	<div class="container">
		@if (count($posts)==0)
			<h2>Nothing here..</h2>
		@else
			@include('partials/posts', ['posts' => $posts])
		@endif
	</div>
@endsection