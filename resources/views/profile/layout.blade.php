@extends('layouts/app')

@section('title')
{{ $user->name }}
@endsection
@section('content')
<div class="container">
	<nav aria-label="breadcrumb" class="main-theme">
		<ol class="breadcrumb main-theme">
			<li class="breadcrumb-item {{ Route::currentRouteName()=='profile.overview'?'active':'' }}"><a href="{{ route('profile.overview', ['code' => $user->urlcode->code]) }}"><span>Overview</span> </a></li>
			<li class="breadcrumb-item {{ Route::currentRouteName()=='profile.posts'?'active':'' }}"><a href="{{ route('profile.posts', ['code' => $user->urlcode->code]) }}"><span>Posts</span> </a></li>
			<li class="breadcrumb-item {{ Route::currentRouteName()=='profile.comments'?'active':'' }}"><a href="{{ route('profile.comments', ['code' => $user->urlcode->code]) }}"><span>Comments</span></a></li>
			@if (Auth::user()->id == $user->id)				 
				<li class="breadcrumb-item {{ Route::currentRouteName()=='profile.upvoted'?'active':'' }}"><a href="{{ route('profile.upvoted', ['code' => $user->urlcode->code]) }}"><span>Upvoted</span></a></li>
				<li class="breadcrumb-item {{ Route::currentRouteName()=='profile.downvoted'?'active':'' }}"><a href="{{ route('profile.downvoted', ['code' => $user->urlcode->code]) }}"><span>Downvoted</span></a></li>
			@else
			<li class="bradcrumb-item ml-auto">
				@if (Auth::user()->following()->where('followable_type', 'App\User')->where('followable_id', $user->id)->first())
				<button class="btn btn-dark" data-userid="{{ $user->id }}" id="follow-user-btn">Following</button>
				@else
					<button class="btn btn-light" data-userid="{{ $user->id }}" id="follow-user-btn">Follow</button>
				@endif
			</li>
			@endif
		</ol>
	</nav>
	@yield('data')
</div>
@endsection