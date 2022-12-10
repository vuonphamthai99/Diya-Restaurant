@extends('customer-layout.main')
@section('customer-content')
<main id="main">
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Chi tiết đơn hàng</h2>
          <ol>
            <li><a href="{{route('guest-page')}}">Trang chủ</a></li>
            <li><a href="{{route('showOrderList')}}">Đơn đặt món</a></li>
            <li>Chi tiết đơn hàng</li>
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
                    <th scope="col">Tên món</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Đơn giá</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($order->hasDetail as $detail)
                    @php
                        $total = 0;
                            $total += $detail->ofMenu->price;
                            // $total += $od->ofAddress->feeShip;
                    @endphp
                    <tr >
                        <td scope="row">{{$detail->ofMenu->name}}</td>
                        <td>{{$detail->quantity}}</td>
                        <td>{{format_vnd($detail->ofMenu->price)}}</td>
                        {{-- <td>{{$total}} VNĐ</td> --}}
                        {{-- <td>{{MyCheckOnlineOderStatus($od->status)}}</td> --}}
                      </tr>
                    @endforeach

                </tbody>
              </table>
              <div class="d-flex justify-content-end">
                <h5 class="modal-title" >Tổng:  {{format_vnd($total)}}</h5>
              </div>
          </div>

      </div>
    </section>

  </main><!-- End #main -->
@endsection
@section('page-js')

@stop
