@extends('layout.main')
@section('content')
<style>

</style>
<div class="page-header">
    <h3 class="page-title"> Quản lý tài khoản </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Quản lý tài khoản</a></li>
        <li class="breadcrumb-item active" aria-current="page">Thông tin cá nhân</li>
      </ol>
    </nav>
  </div>
  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Thông tin cá nhân</h4>
                <p class="card-description"> Cập nhật thông tin cá nhân </p>
                @php
                $user =  App\Models\User::find(session()->get('loginID'));
                @endphp
                <form class="forms-sample" enctype="multipart/form-data" action="{{route('editUserProfile')}}" method="POST">
                    @csrf
                  <div class="form-group row">
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Họ Tên</label>
                    <div class="col-sm-9">
                      <input type="text" name="name" required class="form-control @error('name') is-invalid @enderror" id="exampleInputUsername2" value="{{$user->name}}" placeholder="Username">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                      <input type="email" name="email" required class="form-control email @error('email') is-invalid @enderror" id="exampleInputEmail2" value="{{$user->email}}" placeholder="Email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="exampleInputMobile" class="col-sm-3 col-form-label">SDT</label>
                    <div class="col-sm-9">
                      <input type="text" name="phone" required class="form-control @error('phone') is-invalid @enderror" id="exampleInputMobile" value="{{$user->phone}}" placeholder="Mobile number">
                    @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="exampleInputMobile" class="col-sm-3 col-form-label">Avatar</label>
                    <div class="col-sm-9">
                        <div class="input-group col-xs-12">
                        <input type="file" accept="image/*" name="img" class="file-upload-default">
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info @error('avatar') is-invalid @enderror" disabled placeholder="Upload Image">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-gradient-primary" type="button">Chọn</button>
                          </span>
                        </div>
                    @error('img')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    </div>

                  </div>
                  </div>
                  <button type="submit" class="btn btn-gradient-primary me-2">Lưu</button>
                  <button class="btn btn-light">Hủy</button>
                </form>
              </div>
        </div>
    </div>
  </div>
@stop

@section('page-js')
<script src="{{asset('dashboard-template/assets/js/user-profile.js')}}"></script>
@stop
