@extends('layout.main')
@section('content')
<div class="page-header">
    <h3 class="page-title"> Quản lý tài khoản </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Quản lý tài khoản</a></li>
            <li class="breadcrumb-item active" aria-current="page">Thay đổi mật khẩu</li>
        </ol>
    </nav>
</div>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
              <h4 class="card-title">Thay đổi mật khẩu</h4>
              <p class="card-description"> Nhập mật khẩu cũ và xác nhận để đổi mật khẩu </p>
              <form class="forms-sample" action="{{route('storeChangePassword')}}" method="POST">
                @csrf
                <div class="form-group row">
                    <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Nhập mật khẩu hiện tại</label>
                    <div class="col-sm-9">
                      <input type="password" name="current_password" required class="form-control @error('current_password') is-invalid  @enderror" id="exampleInputPassword2" placeholder="Password">
                        @error('current_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>
                <div class="form-group row">
                  <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Nhập mật khẩu mới</label>
                  <div class="col-sm-9">
                    <input type="password" name="new_password" required class="form-control @error('new_password') is-invalid  @enderror" id="exampleInputPassword2" placeholder="Password">
                    @error('new_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                </div>
                <div class="form-group row">
                  <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Xác nhận mật khẩu mới</label>
                  <div class="col-sm-9">
                    <input type="password" name="new_password_confirmation" class="form-control" id="exampleInputConfirmPassword2" placeholder="Password">
                  </div>
                </div>

                <button type="submit" class="btn btn-gradient-primary me-2">Xác nhận</button>
                <button class="btn btn-light">Hủy</button>
              </form>
            </div>
          </div>
    </div>
</div>

@stop
