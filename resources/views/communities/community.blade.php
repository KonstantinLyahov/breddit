@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col-2"></div>
		<div class="container col-7">
			@include('partials/posts', ['posts' => $community->posts()->simplePaginate(10)])		
		</div>
		<div class="col-3 ml-auto border border-info p-3">
			<div class="d-flex">
				<img src="{{ asset(Storage::url($community->image_path)) }}" class="community-avatar">
				<span class="ml-2">
					{{ $community->name }}
				</span>
				<div class="ml-auto"> 
					<span id="followers-count">{{ $community->followers->count() }}</span> 
					<span>followers</span>
					@if ($community->followers->contains(Auth::user()))
						<button class="btn btn-dark" id="follow-community-btn" data-communityid="{{ $community->id }}">Following</button> 
					@else
						<button class="btn btn-light" id="follow-community-btn" data-communityid="{{ $community->id }}">Follow</button> 	
					@endif
				</div>
			</div>
			<p>{{ $community->description }}</p>
		</div>
	</div>
@endsection