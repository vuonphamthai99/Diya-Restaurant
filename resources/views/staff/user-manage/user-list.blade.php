@extends('layout.main')
@section('content')
    <div class="page-header">
      <h3 class="page-title"> Quản lý người dùng </h3>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Quản lý người dùng</a></li>
          <li class="breadcrumb-item active" aria-current="page">Danh sách người dùng</li>
        </ol>
      </nav>
    </div>
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            @if(Session::has('success'))
            <blockquote class="blockquote blockquote-success text-success">
                <p>{{Session::get('success')}}</p>
              </blockquote>
              @elseif(Session::has('fail'))
              <blockquote class="blockquote blockquote-danger text-danger">
                <p>{{Session::get('fail')}}</p>
              </blockquote>
              @endif
            <div class="row mb-3">
                <div class="col-lg-6">
                    <button id="addNewUser" class="btn  me-3 btn-block btn-lg btn-gradient-primary ">+ Thêm người dùng</button>
                    <div class="btn-group">
                    <button id="sortUserByRole" class="btn dropdown-toggle   me-3 btn-block btn-lg btn-gradient-primary " data-bs-toggle="dropdown"> Vai trò </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item">Tất cả</a>
                        {{-- <a class="dropdown-item">Admin</a> --}}
                        <a class="dropdown-item">Quản lý</a>
                        <a class="dropdown-item">Thu ngân</a>
                        <a class="dropdown-item">Bồi bàn</a>
                      </div>
                </div>
                </div>
            <div class="col-lg-6 ">
                <div class="input-group">
                    <input type="text" class="form-control" id="searchUserInput" placeholder="Nhập gì đó..." aria-label="Nhập gì đó..." aria-describedby="basic-addon2">
                    <button class="btn btn-sm btn-gradient-primary" type="button"> Tìm Kiếm </button>
                </div>

            </div>

        </div>
            <table  class="table table-striped">
              <thead>
                <tr>
                  <th> Ảnh đại diện </th>
                  <th> Họ Tên </th>
                  <th> Chức vụ </th>
                  <th> Ngày tham gia </th>
                  <th> Người thêm </th>
                  <th> Thao tác </th>
                </tr>
              </thead>
              <tbody id="UserListTable">
                @foreach ($user_list as $user )
                <tr>
                  <td class="py-1">
                    <img src="{{asset('dashboard-template/assets/images/faces-clipart/pic-1.png')}}" alt="image" />
                  </td>
                  <td> {{$user->name}} </td>
                  <td>
                    {{$user->user_role_id}}
                  </td>
                  <td> {{$user->created_at->format('d/m/Y')}} </td>
                  <td> {{$user->id_user_add}} </td>
                  <td>
                    <button type="button" class="btn btn-gradient-primary btn-rounded btn-sm btn-icon">
                        <i class="mdi mdi-home-outline"></i>
                      </button>
                    <button type="button" class="btn btn-gradient-primary btn-rounded btn-sm btn-icon">
                        <i class="mdi mdi-home-outline"></i>
                      </button>
                    <button type="button" class="btn btn-gradient-primary btn-rounded btn-sm btn-icon">
                        <i class="mdi mdi-home-outline"></i>
                      </button>
                </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

@stop

@section('page-js')
<script src="{{asset('dashboard-template/assets/js/user-manage.js')}}"></script>
@stop
