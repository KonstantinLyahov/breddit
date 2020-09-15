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
		@foreach ($post->comments()->where('parent_id', null)->get() as $comment)
			@include('partials/comment')
		@endforeach
	</div>
</div>
@endsection

@section('script')
<script>
	CKEDITOR.replace( 'create-comment-editor' );
	CKEDITOR.replaceAll('reply-editor' );
		 var votePostUrl = "{{ route('vote') }}";
		 var voteCommentUrl = "{{ route('comment.vote') }}"
</script>
@endsection