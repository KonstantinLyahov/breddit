@extends('layouts.app')

@section('content')
	<div class="container">
		<h2>Communities</h2>
		<a href="{{ route('communities.create') }}" class="btn btn-primary">Create commmunity</a>
		<ul class="list-group">
			@foreach ($communities as $community)
				<li href="#" class="list-group-item community-list-item d-flex" onclick="location.href=`{{ route('communities.community', ['name' => $community->name]) }}`"> 
					<img src="{{ asset(Storage::url($community->image_path)) }}" class="community-avatar">
					<span class="ml-3">{{ $community->name }} </span> 
					<div class="ml-auto">{{ mb_strimwidth($community->description, 0, 70, "...") }}</div>
				</li>
			@endforeach
		</ul>
	</div>
		
@endsection