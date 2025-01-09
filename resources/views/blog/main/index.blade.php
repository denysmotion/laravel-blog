@extends('blog.layouts.index')

@section('title', 'Blog')

@section('content')

<div class="page-wrapper">
    <div class="blog-custom-build">

        @foreach($posts as $post)
            <div class="blog-box wow fadeIn">
                <div class="post-media">
                    <a href="{{ route('blog.posts.show', ['slug' => $post->slug]) }}" title="">
                        <img src="{{ $post->thumb ? asset($post->thumb) : asset('no-image.png') }}" alt="{{ $post->title }}" class="img-fluid">
                        <div class="hovereffect">
                            <span></span>
                        </div>
                        <!-- end hover -->
                    </a>
                </div>
                <!-- end media -->
                <div class="blog-meta big-meta text-center">
                    <div class="post-sharing">
                        <ul class="list-inline">
                            <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Share on Facebook</span></a></li>
                            <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a></li>
                            <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div><!-- end post-sharing -->
                    <h4><a href="{{ route('blog.posts.show', ['slug' => $post->slug]) }}" title="">{{ $post->title }}</a></h4>
                    <p>{{ $post->excerpt }}</p>
                    <small><a href="#" title="">{{ $post->category->title }}</a></small>
                    <small><a href="#" title="">{{ $post->getPostDate() }}</a></small>
                    <small><a href="#" title=""><i class="fa fa-eye"></i> {{ $post->views }}</a></small>
                </div><!-- end meta -->
            </div><!-- end blog-box -->

            <hr class="invis">
        @endforeach

    </div>
</div>

<hr class="invis">

<div class="row">
    <div class="col-md-12">
        <nav aria-label="Page navigation">
            {{ $posts->links('vendor.pagination.bootstrap-5-front') }}
            <!-- <ul class="pagination justify-content-center">
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul> -->
        </nav>
    </div><!-- end col -->
</div>

@endsection
