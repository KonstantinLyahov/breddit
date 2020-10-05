@extends('profile/layout')

@section('data')
	<div class="container">
		@if (count($voted)==0)
			<h2>
				Nothing here..
			</h2>
		@else
			@foreach ($voted as $vote)
				@if ($vote->votable_type=='App\Post')
					 @if ($vote->votable != null)
					 <div class="mb-3 post-box">
						 @include('partials/post', ['post' => $vote->votable])
					 </div>
					 @endif
				@endif
				@if ($vote->votable_type=='App\Comment')
					@if ($vote->votable != null)					 
						@include('partials/profile/comment', ['comment' => $vote->votable])
					@endif
				@endif
			@endforeach
		@endif
	</div>
@endsection