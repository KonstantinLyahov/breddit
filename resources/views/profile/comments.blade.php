@extends('layouts/app')

@section('title')
{{ $user->name }}
@endsection

@section('content')
<div class="container">
	@include('partials/profile-breadcrumb')
	<div>
		@foreach ($comments as $comment)
		<div class="comment profile-comment">
			<div class="card">
			<div class="card-header" onclick="location.href='{{route('post', ['post_id' => $comment->post_id])}}'">Comment on {{ $comment->post_id }}</div>
			<div class="card-body" onclick="location.href='{{ route('post', ['post_id' => $comment->post_id]) }}' + '#comment{{ $comment->id }}'">
					<div class="card-text">
						{!! mb_strimwidth($comment->body, 0, 40, '...') !!}
					</div>
				</div>
			</div>
		</div>
		@endforeach
	</div>
</div>
@endsection