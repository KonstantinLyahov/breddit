<div class="comment profile-comment">
	<div class="card">
	<div class="card-header" onclick="location.href='{{route('post', ['code' => $comment->post->urlcode->code])}}'">Comment on {{ $comment->post->title }} <span>{{ time_elapsed_string($comment->created_at) }}</span></div>
	<div class="card-body" onclick="location.href='{{ route('post', ['code' => $comment->post->urlcode->code]) }}' + '#comment{{ $comment->id }}'">
			<div class="card-text">
				{!! mb_strimwidth($comment->body, 0, 40, '...') !!}
			</div>
		</div>
	</div>
</div>