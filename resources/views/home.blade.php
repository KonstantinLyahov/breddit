@extends('layouts.app')

@section('content')
<div class="container">
    @include('partials/posts', ['posts' => $posts])
</div>
@endsection

@section('script')
    <script>
        var getPostUrl = "{{ URL::to('post') }}";
        var votePostUrl = "{{ URL::to('vote') }}";
    </script>
@endsection