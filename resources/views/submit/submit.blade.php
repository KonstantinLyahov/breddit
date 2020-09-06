@extends('layouts/app')

@section('title')
Submit to breddit
@endsection

@section('content')
<div class="container submit-box">
	<div class="pr-1">
		<h2 class="mt-2">Create a Post</h2>
		<hr style="background-color: #cdcfd1;">
		<div class="form-theme pr-4 pl-4 pb-4 pt-1">
			<nav aria-label="breadcrumb" id="submit-breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item active"><a href="javascript:void(0)">Post</a></li>
					<li class="breadcrumb-item"><a href="javascript:void(0)">Images & Video</a></li>
				 </ol>
			</nav>
			<form class="d-flex flex-column" action="" method="post">
				<div class="form-group">
					<input type="text" name="title" id="title" class="form-control" placeholder="Title:" name="title">
				</div>
				<textarea class="form-control" id="summary-ckeditor" name="body"></textarea>
				<button type="submit" class="btn btn-light mt-3 ml-auto">Submit</button>
			</form>
		</div>
	</div>
</div>

@endsection

@section('script')	 
<script>
	CKEDITOR.replace('summary-ckeditor');

</script>
@endsection