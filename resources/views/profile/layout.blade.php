@extends('layouts/app')

@section('title')
{{ $user->name }}
@endsection
@section('content')
<div class="container">
	<nav aria-label="breadcrumb" class="main-theme">
		<ol class="breadcrumb main-theme">
		<li class="breadcrumb-item {{ Route::currentRouteName()=='profile.overview'?'active':'' }}"><a href="{{ route('profile.overview', ['user_id' => $user->id]) }}"><span>Overview</span> </a></li>
			<li class="breadcrumb-item {{ Route::currentRouteName()=='profile.posts'?'active':'' }}"><a href="{{ route('profile.posts', ['user_id' => $user->id]) }}"><span>Posts</span> </a></li>
			<li class="breadcrumb-item {{ Route::currentRouteName()=='profile.comments'?'active':'' }}"><a href="{{ route('profile.comments', ['user_id' => $user->id]) }}"><span>Comments</span></a></li>
			@if (Auth::user() == $user)				 
				<li class="breadcrumb-item {{ Route::currentRouteName()=='profile.upvoted'?'active':'' }}"><a href="{{ route('profile.upvoted', ['user_id' => $user->id]) }}"><span>Upvoted</span></a></li>
				<li class="breadcrumb-item {{ Route::currentRouteName()=='profile.downvoted'?'active':'' }}"><a href="{{ route('profile.downvoted', ['user_id' => $user->id]) }}"><span>Downvoted</span></a></li>
			@endif
		</ol>
	</nav>
	@yield('data')
</div>
@endsection