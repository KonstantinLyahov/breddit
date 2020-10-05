@extends('profile/layout')

@section('data')
	<div class="container">
		<div>
			<div>
			<h4>Name: {{ $user->name }}</h4>
			<h4>Email: {{ $user->email }}</h4>
			<h4>Account creation date: {{ date('d.m.Y', strtotime($user->created_at)) }}</h4>
			</div>
		</div>
	</div>
@endsection