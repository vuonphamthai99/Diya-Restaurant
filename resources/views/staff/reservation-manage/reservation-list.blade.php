@extends('layout.main')
@section('content')
<div class="page-header">
    <h3 class="page-title"> Quản lý số bàn </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Quản lý số bàn</a></li>
        <li class="breadcrumb-item active" aria-current="page">Danh sách bàn</li>
      </ol>
    </nav>
  </div>
  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="row mb-4">
                <div class="col-lg-6">
                    <a href="{{route('showDetailTable')}}"><button
                            class="btn   btn-block btn-lg btn-gradient-primary ">+ Thêm bàn</button></a>
                </div>
            </div>
            <table class="table table-hover table-striped">
              <thead>
                <tr>
                  <th> ID </th>
                  <th> Tạo lúc </th>
                  <th> Thời gian đặt </th>
                  <th> Giờ đặt </th>
                  <th> Số người </th>
                  <th> Tên khách hàng </th>
                  <th> Email khách hàng </th>
                  <th> Sdt khách hàng </th>
                  <th> Trạng thái </th>
                  <th> Thao tác </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($reserList as $rl )
                <tr>
                    <td>
                        {{$rl->id}}
                    </td>
                    <td>
                        {{$rl->created_at->format('d-M-Y')}}
                    </td>
                    <td>
                        {{$rl->reservation_time->format('d-M-Y')}}
                    </td>
                    <td>
                        {{$rl->reservation_hour}}
                    </td>
                    <td>
                        {{$rl->no_of_people}}
                    </td>
                    <td>
                        {{$rl->customer_name}}
                    </td>
                    <td>
                        {{$rl->customer_phone}}
                    </td>
                    <td>
                        {{$rl->customer_email}}
                    </td>
                    <td>
                        {{$rl->status}}
                    </td>
                    <td><a
                        href="">
                        <button type="button" title="Chỉnh sửa"
                            data-toggle="tooltip" data-placement="top"
                            class="btn btn-outline-danger btn-rounded btn-icon">
                            <i class="mdi mdi-eye"></i>
                        </button>
                    </a></td>
                </tr>
                @endforeach


              </tbody>
            </table>
          </div>
        </div>
      </div>
  </div>
@endsection
