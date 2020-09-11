@extends('layouts/app')

@section('title')
{{ $post->title }}
@endsection

@section('content')
<div class="container main-theme">
	@include('partials/post')
	<div class="p-5 mt-1">
		<h4>Comment as {{ Auth::user()->name }}</h4>
		<form action="{{ route('comment.create') }}" method="POST">
			@csrf
			<input type="hidden" name="post_id" value="{{ $post->id }}">
			<textarea id="create-comment-editor" name="body"></textarea>
			<div class="d-flex mt-2 justify-content-end">
				<button class="btn btn-light" type="submit">Comment</button>
			</div>
		</form>
	</div>
	<hr style="background-color: #cdcfd1;">
	<div class="mt-2 p-5">
		@foreach ($post->comments as $comment)
		<div class="card comment">
			<div class="card-header d-flex justify-content-between">
				<span>
					{{ $comment->user->name }}
				</span>
				<span>
					{{ time_elapsed_string($comment->created_at) }}
				</span>
				<div></div>
			</div>
			<div class="card-body">
				<div class="card-text">
					{!! $comment->body !!}
				</div>
			</div>
		</div>
		@endforeach
	</div>
</div>
@endsection

@section('script')
<script>
	CKEDITOR.replace( 'create-comment-editor' );
		 var votePostUrl = "{{ URL::to('vote') }}";
</script>
@endsection