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

            <table  class="table table-dark">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Người nhận</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">Tổng</th>
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
                    <tr >
                        <th scope="row">{{$od->id}}</th>
                        <td>{{$od->ofAddress->name}}</td>
                        <td>{{$od->ofAddress->phone}}</td>
                        <td>{{$od->ofAddress->address}}</td>
                        <td>{{$total}} VNĐ</td>
                        <td>{{MyCheckOnlineOderStatus($od->status)}}</td>
                        {{-- <td>{{$od->distance}} Km</td> --}}
                        <td><a  href="{{route('showOrderDetails',['idOrder' => $od->id])}}"><button class=" page-btn"> Chi tiết </button></a></td>
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
