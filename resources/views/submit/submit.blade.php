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
					<li class="breadcrumb-item active post-li"><a href="javascript:void(0)"> <span>Post</span></a></li>
					<li class="breadcrumb-item img-li"><a href="javascript:void(0)"><span>Images & Video</span></a></li>
				</ol>
			</nav>
			<form class="d-flex flex-column" action="{{ route('submit') }}" method="post" enctype="multipart/form-data">
				@csrf
				<div class="submit-form-body">
					<div class="form-group">
						<input type="text" name="title" id="title" class="form-control" placeholder="Title:" name="title">
					</div>
					<textarea class="form-control" id="summary-ckeditor" name="body"></textarea>
				</div>
				<div class="submit-form-media d-none">
					<div class="form-group">
						<div class="input-images-1" style="padding-top: .5rem;"></div>
					</div>
				</div>
				<button type="submit" class="btn btn-light mt-3 ml-auto">Submit</button>
			</form>
		</div>
	</div>
</div>

@endsection

@section('script')
<script type="text/javascript" src="{{ asset('js/image-uploader.js') }}"></script>
<script>
	CKEDITOR.replace('summary-ckeditor');
	$('li.breadcrumb-item>a').on('click', function() {
		if($(this).find('span').text()!='Post'){
			$('.submit-form-body').addClass('d-none');
			$('.submit-form-media').removeClass('d-none');
			$('.post-li').removeClass('active');
			$('.img-li').addClass('active');
		} else {
			$('.submit-form-body').removeClass('d-none');
			$('.submit-form-media').addClass('d-none');
			$('.post-li').addClass('active');
			$('.img-li').removeClass('active');
		}
	});
	$('.input-images-1').imageUploader({
		label: 'Drag and drop images or upload',
		imagesInputName: 'files'
	});
</script>
@endsection