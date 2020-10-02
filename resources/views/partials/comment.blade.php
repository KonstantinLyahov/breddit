
<div class="comment d-flex" data-commentid={{ $comment->id }}>
	<a name="comment{{ $comment->id }}"></a>
	<div class="d-flex vote-section flex-column pl-2 pt-3 pr-3 {{ Auth::user()?Auth::user()->votes()->where('votable_type', 'App\Comment')->where('votable_id', $comment->id)->first()?Auth::user()->votes()->where('votable_type', 'App\Comment')->where('votable_id', $comment->id)->first()->up?'upvoted':'downvoted':'':'' }} ">
		<a class="material-icons upvote-link" href="javascript:void(null)">
			arrow_circle_up
		</a>
		<div class="text-center">{{ $comment->votes()->where('up', true)->count() - $comment->votes()->where('up', false)->count() }}</div>
		<a class="material-icons downvote-link" href="javascript:void(null)">
			arrow_circle_up
		</a>
	</div>
	<div class="card flex-fill">
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
		<div class="d-flex flex-column">
			<a href="javascript:void(null)" class="btn btn-light ml-auto reply-btn" title="reply">
				<span class="material-icons">
					reply
				</span>
			</a>
			<div class="reply mt-2 d-none row">
				<div class="col-4"></div>
				<form action="{{ route('comment.reply') }}" class="d-flex flex-column col-8" method="POST">
					@csrf
					<input type="hidden" name="parentId" value="{{ $comment->id }}">
					<input type="hidden" name="postId" value="{{ $post->id }}">
					<textarea name="body" class="reply-editor" cols="30" rows="10"></textarea>
					<button class="btn btn-light mt-2 ml-auto" type="submit">Reply</button>
				</form>
			</div>
		</div>
		@foreach ($comment->replies as $reply)
			<div class="ml-2 mt-2">
				@include('partials/comment', ['comment' => $reply])
			</div>
		@endforeach
	</div>
</div>