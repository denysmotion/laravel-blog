@extends('admin.layouts.index')

@section('title', 'New user')

@section('content')
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">New user</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                  <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
                  <li class="breadcrumb-item active" aria-current="page">New user</li>
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
                        <div class="card-header"><div class="card-title">New user</div></div>
                        <!--end::Header-->
                        <!--begin::Form-->
                        <form action="{{ route('users.store') }}" method="post" autocomplete="off">
                            @csrf
                            <!--begin::Body-->
                            <div class="card-body">
                                <div class="row mb-3">
                                    <label for="name" class="col-sm-2 col-form-label required">Name</label>
                                    <div class="col-sm-10">
                                    <input name="name" type="text" class="form-control" id="name" value="{{ old('name') }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                    <input name="email" type="email" class="form-control" id="email" value="{{ old('email') }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                    <input name="password" type="password" class="form-control" id="password" value="" autocomplete="new-password">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="password_confirmation" class="col-sm-2 col-form-label">Password Confirmation</label>
                                    <div class="col-sm-10">
                                    <input name="password_confirmation" type="password" class="form-control" id="password_confirmation" value="">
                                    </div>
                                </div>
                                <div class="form-check">
                                    <input name="is_admin" class="form-check-input" type="checkbox" value="1" id="is_amin" @checked(old('is_admin'))>
                                    <label for="is_admin" class="form-check-label">Admin</label>
                                </div>
                            </div>
                            <!--end::Body-->
                            <!--begin::Footer-->
                            <div class="card-footer">
                            <button type="submit" class="btn btn-warning">Create</button>
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
