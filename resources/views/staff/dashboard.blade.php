@extends('layout.main')
@section('content')

    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
          <i class="mdi mdi-home"></i>
        </span> Trang chủ
      </h3>
      <nav aria-label="breadcrumb">
        <ul class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">
            <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
          </li>
        </ul>
      </nav>
    </div>
    <div class="row">
      <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-danger card-img-holder text-white">
          <div class="card-body">
            <img src="{{asset('dashboard-template/assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
            <h4 class="font-weight-normal mb-3">Doanh thu tuần này <i class="mdi mdi-chart-line mdi-24px float-right"></i>
            </h4>
            <h2 class="mb-5">{{format_vnd($sale)}}</h2>
          </div>
        </div>
      </div>
      <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-info card-img-holder text-white">
          <div class="card-body">
            <img src="{{asset('dashboard-template/assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
            <h4 class="font-weight-normal mb-3">Số đơn tuần này <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
            </h4>
            <h2 class="mb-5">{{$order_quantity}}</h2>
          </div>
        </div>
      </div>
      <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-success card-img-holder text-white">
          <div class="card-body">
            <img src="{{asset('dashboard-template/assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
            <h4 class="font-weight-normal mb-3">Lượng người dùng online <i class="mdi mdi-diamond mdi-24px float-right"></i>
            </h4>
            <h2 class="mb-5">{{$customer}}</h2>
          </div>
        </div>
      </div>
    </div>



    <div class="row">
      <div class="col-md-7 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Đơn hàng gần đây</h4>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th> STT </th>
                    <th> Loại đơn hàng </th>
                    <th> Thời gian </th>
                    <th> Tổng tiền </th>
                  </tr>
                </thead>
                <tbody>
                  @php
                      $stt = 1;
                  @endphp
                  @foreach ($order as  $od)

                  <tr>
                    <td> {{$stt++}} </td>
                    <td> {{$od->type_order}} </td>
                    <td> {{$od->finish_date->format('d-m-Y')}} </td>
                    <td>
                      {{format_vnd($od->sale)}}
                    </td>
                  </tr>
                  @endforeach

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-5 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title text-white">Việc phải làm</h4>
            <div class="add-items d-flex">
              <input type="text" class="form-control todo-list-input" placeholder="Việc phải làm?">
              <button class="add btn btn-gradient-primary font-weight-bold todo-list-add-btn" id="add-task">Thêm</button>
            </div>
            <div class="list-wrapper">
              <ul class="d-flex flex-column-reverse todo-list todo-list-custom">
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox"> Tạo món mới </label>
                  </div>
                  <i class="remove mdi mdi-close-circle-outline"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked> Gọi cho khách hàng Trần văn tám </label>
                  </div>
                  <i class="remove mdi mdi-close-circle-outline"></i>
                </li>

              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

@stop
