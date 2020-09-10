@extends('layouts/app')

@section('content')
	<div class="container">
		@include('partials/post')
	</div>
@endsection

@section('script')
	 <script>
		 var votePostUrl = "{{ URL::to('vote') }}";
	 </script>
@endsection