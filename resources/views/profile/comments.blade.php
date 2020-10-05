@extends('profile/layout')


@section('data')
<div class="container">
	@if (count($comments)==0)
		<h2>Nothing here..</h2>
	@else
		<div>
			@foreach ($comments as $comment)
				@include('partials/profile/comment')
			@endforeach
		</div>
	@endif
</div>
@endsection