@extends('layout.main')
@section('content')
<div class="page-header">
    <h3 class="page-title"> Quản lý Order </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Quản lý Order</a></li>

            <li class="breadcrumb-item active" aria-current="page">Lịch sử Order</li>
        </ol>
    </nav>
</div>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body table-responsive">
            <h4 class="card-title">Lịch sử Order</h4>
            {{-- <div class="col-lg-6 d-flex mt-2 mb-4 ">
                <button type="button" id="order-btn" class="btn btn-gradient-primary btn-fw">Thêm món+</button>
            </div> --}}
                <table id="table-view-order" class="table hoverable">
                <thead>
                    <tr>
                        <th>
                            ID
                        </th>
                        <th>
                            Số bàn
                        </th>

                        <th>
                            Tổng tiền
                        </th>
                        <th>
                            Nhân viên Order
                        </th>
                        <th>
                            Thời gian
                        </th>
                        <th>
                            Thao tác
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $od)
                    @php

                    @endphp
                    <tr>
                        <td>{{$od->id}}</td>
                        <td>{{$od->ofTable->code}}</td>
                        <td>{{format_vnd($od->total)}}</td>
                        <td>{{$od->hasProcessor ? $od->hasProcessor->name : 'Khách hàng'}}</td>
                        <td>{{$od->finish_date}}</td>
                        <td>
                            <a href="{{route('getOrderDetailsById',['idOrder' => $od->id])}}">
                            <button type="button"  title="Xem chi tiết"
                                data-toggle="tooltip" data-placement="top"
                                class="btn btn-outline-danger btn-rounded btn-icon">
                                <i class="mdi mdi-eye"></i>
                            </button>
                            @if (!$od->hasDetail)
                            <a href="{{route('getOrderDetailsById',['idOrder' => $od->id])}}">
                                <button type="button"  title="Xem chi tiết"
                                    data-toggle="tooltip" data-placement="top"
                                    class="btn btn-outline-danger btn-rounded btn-icon">
                                    <i class="mdi mdi-trash"></i>
                                </button>
                            @endif
                         </a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>

          </div>
        </div>
    </div>
</div>

@endsection
