@extends('customer-layout.main')
@section('customer-content')
<main id="main">
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Đơn đặt món</h2>
          <ol>
            <li><a href="{{route('guest-page')}}">Trang chủ</a></li>
            <li>Đơn đặt món</li>
          </ol>
        </div>

      </div>
    </section>

    <section class="inner-page">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 mb-3">
          <select class="page-btn w-75" id="filter-select" aria-label=".form-select-lg example">
            <option >Tất cả</option>
            <option >Đã tiếp nhận</option>
            <option >Đang giao</option>
            <option >Đang yêu cầu hủy</option>
            <option >Đã giao</option>
            <option >Bị hủy</option>
          </select>
        </div>
            <table id="table-filter" class="table table-dark">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Người nhận</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">Ngày đặt</th>
                    <th scope="col">Tổng</th>
                    <th scope="col">Phí giao hàng</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col">Thao tác</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $od)
                    @if ($od->customer_id == Session::get('loginID'))
                    @php
                        $total = 0;
                        foreach($od->hasDetail as $detail){
                            $total += $detail->ofMenu->price;
                        }
                        $total += $od->ofAddress->feeShip;
                    @endphp
                    <tr>
                        <th scope="row">{{$od->id}}</th>
                        <td>{{$od->ofAddress->name}}</td>
                        <td>{{$od->ofAddress->phone}}</td>
                        <td style="width:15%;">{{$od->ofAddress->address}}</td>
                        <td >{{$od->order_date->format('d-m-Y')}}</td>
                        <td>{{format_vnd($total)}}</td>
                        <td>{{format_vnd($od->ofAddress->feeShip)}}</td>

                        <td>{{MyCheckOnlineOderStatus($od->status)}}</td>
                        {{-- <td>{{$od->distance}} Km</td> --}}
                        <td>
                          <a  href="{{route('showOrderDetails',['idOrder' => $od->id])}}"><button class=" page-btn"> Chi tiết </button></a>
                          @if ($od->status == 0)
                          <a  href="{{route('cancelOrder',['idOrder' => $od->id])}}"><button style="background:#99542b;" class=" page-btn">Yêu cầu hủy</button></a>
                          @elseif($od->status == 1)
                          <a  href="{{route('confirmReceiveOrder',['idOrder' => $od->id])}}"><button style="background:#99542b;" class=" page-btn">Đã nhận hàng</button></a>
                          @endif

                        </td>
                      </tr>
                    @endif
                    @endforeach

                </tbody>
              </table>
              {{-- <div class="d-flex justify-content-end">
                <h5 class="modal-title" id="cart-total">Tổng:  0000 VND</h5>
              </div> --}}
          </div>

      </div>
    </section>

  </main><!-- End #main -->
@endsection
@section('page-js')

@stop
