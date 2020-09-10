@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1"></div>
        <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">
            <div class="posts">
                @foreach ($posts as $post)
                    <div class="post-box mb-3">
                        @include('partials/post', ['post' => $post])
                    </div>
                @endforeach
                <div class="d-flex justify-content-end">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
        <div class="col-1 col-sm-1 col-md-3 col-lg-3 col-xl-5"></div>
    </div>
</div>
@endsection

@section('script')
    <script>
        var getPostUrl = "{{ URL::to('post') }}";
        var votePostUrl = "{{ URL::to('vote') }}";
    </script>
@endsection