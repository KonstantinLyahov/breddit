@extends('layouts/app')

@section('title')
	{{ $user->name }}
@endsection

@section('content')
	<div class="container">
		@include('partials/profile-breadcrumb')
		<div>
			<div>
			<h4>Name: {{ $user->name }}</h4>
			<h4>Email: {{ $user->email }}</h4>
			<h4>Account creation date: {{ date('d.m.Y', strtotime($user->created_at)) }}</h4>
			</div>
		</div>
	</div>
@endsection