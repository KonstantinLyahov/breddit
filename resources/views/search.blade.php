@extends('layouts.app')

@section('content')
	<div class="container main-theme">
		@if ($users->count()==0)
			<h2>Sorry, there were no users results for "{{ $search }}"</h2>
		@else 
			<h2>Users</h2>
			<ul class="list-group">
				@foreach ($users as $user)				 
					<li class="list-group-item search-list">
						<a href="{{ route('profile.overview', ['code' => $user->urlcode->code]) }}">{{ $user->name }}</a>
					</li>
				@endforeach
			</ul>
		@endif
		@if ($communities->count()==0)
			<h2>Sorry, there were no community results for "{{ $search }}"</h2>
		@else
		<h2>Communities</h2>
		@include('partials/communities-list')
		@endif
	</div>
@endsection