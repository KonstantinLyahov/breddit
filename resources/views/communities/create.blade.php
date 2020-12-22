@extends('layouts.app')

@section('content')
	<div class="container">
		<h2>Create Community</h2>
		@if ($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
	  		</div>
		@endif
		<form action="{{ route('communities.create') }}" method="POST" class="d-flex flex-column" enctype="multipart/form-data">
			@csrf
			<div class="form-group">
				<label for="name">Community name</label>
				<input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
			</div>
			<div class="form-group">
				<label for="description">Community Description</label>
				<textarea name="description" id="description" cols="30" rows="10" class="form-control" required>{{ old('description') }}</textarea>
			</div>
			<div class="form-group">
				<label for="image">Community Image</label>
				<input type="file" name="image" id="image" accept="image/*" required>
			</div>
			<button type="submit" class="btn btn-primary ml-auto">Create</button>
		</form>
	</div>
@endsection