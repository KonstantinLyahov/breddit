<div class="card post" data-postid={{ $post->id }}>
	<div class="card-header text-muted">
		Posted <span>{{ time_elapsed_string($post->created_at) }}</span> by <a href="#">{{ $post->user->name }}</a>
	</div>
	<div class="d-flex">
		<div class="d-flex vote-section flex-column pl-2 pt-3 pr-3 {{ Auth::user()?Auth::user()->votes()->where('votable_type', 'App\Post')->where('votable_id', $post->id)->first()?Auth::user()->votes()->where('votable_type', 'App\Post')->where('votable_id', $post->id)->first()->up?'upvoted':'downvoted':'':'' }} ">
			<a class="material-icons upvote-link" href="javascript:void(null)">
				arrow_circle_up
			</a>
			<div class="text-center">{{ $post->votes()->where('up', true)->count() - $post->votes()->where('up', false)->count() }}</div>
			<a class="material-icons downvote-link" href="javascript:void(null)">
				arrow_circle_up
			</a>
		</div>
		<div>
			<div class="card-body">
				<h2 class="card-title">{{ $post->title }}</h2>
				<p class="card-text">{!! $post->body !!}<p>
			</div>
			@if ($post->files()->count() == 1)
			<img class="card-img" src="{{ asset(Storage::url($post->files()->first()['path'])) }}">
			@else
			<div class="row mb-2">
				@for ($i = 0; $i < $post->files()->count(); $i++)
					<div class="col-4 thumb">
						<img class="card-img-top img-fluid"
							src="{{ asset(Storage::url($post->files()->get()[$i]['path'])) }}">
					</div>
					@endfor
			</div>
			@endif
		</div>
	</div>
</div>