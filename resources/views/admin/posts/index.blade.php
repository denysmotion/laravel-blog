@extends('admin.layouts.index')

@section('title', 'Posts')

@section('content')
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">Posts</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Posts</li>
                </ol>
              </div>
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content Header-->
        <!--begin::App Content-->
        <div class="app-content">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">

                <div class="col-md-12">
                    <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between">
                        <a class="btn btn-primary" href="{{ route('posts.create') }}">Create</a>
                        <a class="btn btn-danger position-relative" href="{{ route('posts.basket') }}">
                            <i class="bi bi-trash"></i>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                {{ $basket_cnt }}
                                <span class="visually-hidden">unread messages</span>
                            </span>
                        </a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                        <thead>
                            <tr>
                            <th style="width: 10px">ID</th>
                            <th>Thumb</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Tags</th>
                            <th style="width: 150px">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                            <tr class="align-middle">
                                <td>{{ $post->id }}</td>
                                <td><img src="/{{ $post->thumb ?: env('NO_IMAGE') }}" alt="{{ $post->title }} thumb" height="50"></td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->category->title }}</td>
                                <td>{{ $post->tags->implode('title', ', ') }}</td>
                                <td class="d-flex gap-2">
                                    <a class="btn btn-primary" href="{{ route('posts.edit', ['post' => $post->id]) }}">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <form action="{{ route('posts.destroy', ['post' => $post->id]) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger" type="submit" onclick="return confirm('Delete post {{ $post->title }}?')"><i class="bi bi-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                    {{ $posts->links('vendor.pagination.bootstrap-5-admin') }}
                  </div>
                </div>
                </div>

            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
@endsection
