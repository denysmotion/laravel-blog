@extends('admin.layouts.index')

@section('title', 'Edit post')

@section('content')
    <div class="app-content-header"> <!--begin::Container-->
        <div class="container-fluid"> <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Edit post</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('posts.index') }}">Posts</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Edit post
                        </li>
                    </ol>
                </div>
            </div> <!--end::Row-->
        </div> <!--end::Container-->
    </div> <!--end::App Content Header--> <!--begin::App Content-->
    <div class="app-content"> <!--begin::Container-->
        <div class="container-fluid"> <!--begin::Row-->

            <form method="post" action="{{ route('posts.update', ['post' => $post->id]) }}">
                @csrf
                @method('put')
                <div class="row"> <!--begin::Col-->

                    <div class="col-md-8">

                        <div class="card card-warning card-outline mb-4">

                            <div class="card-body">

                                <div class="mb-3">
                                    <label for="title" class="form-label required">Post
                                        name</label>
                                    <input type="text" name="title" class="form-control" id="title"
                                           value="{{ $post->title }}">
                                </div>

                                <div class="mb-3">
                                    <label for="meta_desc" class="form-label">Meta
                                        description</label>
                                    <input type="text" name="meta_desc" class="form-control" id="meta_desc"
                                           value="{{ $post->meta_desc }}">
                                </div>

                                <div class="mb-3">
                                    <label for="content"
                                           class="form-label required">Content</label>
                                    <textarea class="form-control ckeditor" name="content" id="content" cols="30"
                                              rows="10">{{ $post->content }}</textarea>
                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="card card-warning card-outline mb-4">

                            <div class="card-body">

                                <div class="mb-3">
                                    <label for="category_id"
                                           class="form-label required">Category</label>
                                    <select name="category_id" id="category_id" class="form-select">
                                        @foreach($categories as $category_id => $category_title)
                                            <option value="{{ $category_id }}" @selected($post->category_id == $category_id )>{{ $category_title }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="tags"
                                           class="form-label">Tags</label>
                                    <select name="tags[]" id="tags" class="form-select select2" multiple>
                                        @php
                                            $tags_ids = $post->tags->pluck('id')->all();
                                        @endphp
                                        @foreach($tags as $tag_id => $tag_title)
                                            <option value="{{ $tag_id }}" {{ in_array($tag_id, $tags_ids) ? 'selected' : '' }}>{{ $tag_title }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <!-- <label for="thumb">Feature Image</label> -->
                                    <input type="hidden" id="thumb" name="thumb" value="{{ $post->thumb }}">
                                    <button type="button" class="btn btn-outline-primary popup_selector" data-inputid="thumb">Post Image</button>
                                    <div class="post-thumb mt-3">
                                        @if($post->thumb)
                                            <img src="/{{ $post->thumb }}" alt="" width="200">
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-warning">Update</button>
                            </div>

                        </div>

                    </div>

                </div><!--end::Row--> <!--begin::Row-->
            </form>

        </div> <!--end::Container-->
    </div> <!--end::App Content-->
@endsection
