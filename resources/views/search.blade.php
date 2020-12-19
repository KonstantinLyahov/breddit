@extends('layouts.app')

@section('content')
	<div class="container main-theme">
		<h2>Users</h2>
		<ul class="list-group">
			@foreach ($users as $user)				 
				<li class="list-group-item search-list">
					<a href="{{ route('profile.overview', ['code' => $user->urlcode->code]) }}">{{ $user->name }}</a>
				</li>
			@endforeach
		</ul>
	</div>
@endsection