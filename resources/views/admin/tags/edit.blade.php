@extends('admin.layouts.index')

@section('title', 'Edit tag')

@section('content')
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">Edit tag</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                  <li class="breadcrumb-item"><a href="{{ route('tags.index') }}">Tags</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Edit tag</li>
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
                    <div class="card card-warning card-outline mb-4">
                        <!--begin::Header-->
                        <div class="card-header"><div class="card-title">Edit <strong>{{ $tag->title }}</strong></div></div>
                        <!--end::Header-->
                        <!--begin::Form-->
                        <form action="{{ route('tags.update', ['tag' => $tag->id]) }}" method="post">
                            @csrf
                            @method('put')
                            <!--begin::Body-->
                            <div class="card-body">
                                <div class="row mb-3">
                                    <label for="title" class="col-sm-2 col-form-label">Title</label>
                                    <div class="col-sm-10">
                                    <input name="title" type="text" class="form-control" id="title" value="{{ $tag->title }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="meta_desc" class="col-sm-2 col-form-label">Meta description</label>
                                    <div class="col-sm-10">
                                    <input name="meta_desc" type="text" class="form-control" id="meta_desc" value="{{ $tag->meta_desc }}">
                                    </div>
                                </div>
                            </div>
                            <!--end::Body-->
                            <!--begin::Footer-->
                            <div class="card-footer">
                            <button type="submit" class="btn btn-warning">Update</button>
                            </div>
                            <!--end::Footer-->
                        </form>
                        <!--end::Form-->
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
