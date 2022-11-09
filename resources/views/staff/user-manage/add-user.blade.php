@extends('layout.main')
@section('content')
<div class="page-header">
    <h3 class="page-title"> Quản lý người dùng </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Quản lý người dùng</a></li>
            <li class="breadcrumb-item active" aria-current="page">Thêm người dùng</li>
        </ol>
    </nav>
</div>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Thêm người dùng</h4>
                <p class="card-description"> Nhập thông tin người dùng </p>
                <form action="{{route('addNewUser')}}" method="POST" class="forms-sample">
                    @csrf
                  <div class="form-group row">
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Họ Tên</label>
                    <div class="col-sm-9">
                      <input type="text" name="name" required class="form-control @error('name') is-invalid @enderror" id="exampleInputUsername2" placeholder="Username">
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
                      <input type="email" name="email" required class="form-control email @error('email') is-invalid @enderror " id="exampleInputEmail2" placeholder="Email">
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
                      <input type="text" required name="phone" class="form-control @error('phone') is-invalid @enderror" id="exampleInputMobile" placeholder="Mobile number">
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Vai Trò</label>
                    <div class="col-sm-9">
                    <div class="input-group">
                        <div class="input-group-prepend">
                          <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Chọn vai trò</button>
                          <div class="dropdown-menu" id="role-selector" style="">
                            @foreach ($user_role_list as $userRole)
                            <a class="dropdown-item" idRole='{{$userRole->id}}'>{{$userRole->user_role}}</a>
                            @endforeach
                          </div>
                        </div>
                        <input type="hidden" id="user-role-selected" value="0" name="id_user_role">
                        <input type="text" id="user-role"  required  class="form-control @error('user_role_id') is-invalid @enderror" value="" aria-label="Text input with dropdown button">
                        @error('user_role_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    </div>
                  </div>

                  <button type="submit" class="btn btn-gradient-primary me-2">Lưu</button>
                  <a href="{{route('showListUser')}}"><button type="button" class="btn btn-light">Hủy</button></a>
                </form>
              </div>
        </div>
    </div>
</div>
@stop

@section('page-js')
@stop
