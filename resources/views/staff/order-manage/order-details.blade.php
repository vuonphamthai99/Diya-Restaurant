@extends('layout.main')
@section('content')
<div class="page-header">
    <h3 class="page-title"> Quản lý Order </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Quản lý Order</a></li>
            <li class="breadcrumb-item"><a href="{{route('showOrderHistory')}}">Lịch sử Order</a></li>
            <li class="breadcrumb-item active" aria-current="page">Chi tiết Order</li>
        </ol>
    </nav>
</div>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body table-responsive">
            <h4 class="card-title">Danh sách các đơn Order</h4>
            {{-- <div class="col-lg-6 d-flex mt-2 mb-4 ">
                <button type="button" id="order-btn" class="btn btn-gradient-primary btn-fw">Thêm món+</button>
            </div> --}}
                <table id="" class="table hoverable">
                <thead>
                    <tr>

                        <th>
                            Tên món
                        </th>

                        <th>
                            Giá
                        </th>
                        <th>
                            Số lượng
                        </th>
                        <th>
                            Thành tiền
                        </th>

                    </tr>
                </thead>
                <tbody>
                    @php
                        $total = 0;
                    @endphp
                    @foreach ($order->hasDetail as $dt)
                    <tr>
                        <td>{{$dt->ofMenu->name}}</td>
                        <td>{{format_vnd($dt->ofMenu->price)}}</td>
                        <td>{{$dt->quantity}}</td>
                        <td>{{format_vnd($dt->ofMenu->price*$dt->quantity)}}</td>
                    </tr>
                    @php
                        $total += $dt->ofMenu->price*$dt->quantity;
                    @endphp
                    @endforeach
                </tbody>
            </table>
            <div class="row mt-5">
                <div class="col-lg-3 ">
                    <h4 class="card-title">
                        Tổng tiền:
                    </h4>
                </div>
                <div class="col-lg-4 ">
                    <p id="total-money" class="h4">{{format_vnd($total)}}</p>
                </div>

            </div>
          </div>
        </div>
    </div>
</div>

@endsection
