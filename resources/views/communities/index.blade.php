@extends('layouts.app')

@section('content')
	<div class="container">
		<h2>Communities</h2>
		<a href="{{ route('communities.create') }}" class="btn btn-primary">Create commmunity</a>
		@include('partials/communities-list')
	</div>
		
@endsection