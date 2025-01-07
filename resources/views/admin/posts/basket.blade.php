@extends('admin.layouts.index')

@section('title', 'Basket')

@section('content')
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">Basket</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Basket</li>
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
                            <th>Deleted At</th>
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
                                <td>{{ $post->deleted_at }}</td>
                                <td class="d-flex gap-2">
                                    <a class="btn btn-warning" href="{{ route('posts.basket.restore', ['post' => $post->id]) }}">
                                        <i class="bi bi-arrow-counterclockwise"></i>
                                    </a>
                                    <form action="{{ route('posts.basket.destroy', ['post' => $post->id]) }}" method="post">
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
