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
            <option >Đã xác nhận</option>
            <option >Đã hủy</option>
          </select>
        </div>
            <table id="table-filter" class="table table-dark">
                <thead>
                  <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Thời gian</th>
                    <th scope="col">Số người</th>
                    <th scope="col">Lời nhắn</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col">Số bàn</th>
                    <th scope="col">Phản hồi</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                        $stt = 1;

                    @endphp
                    @foreach ($reservations as $rs)

                    <tr >
                        <th scope="row">{{$stt++}}</th>
                        <td>{{$rs->reservation_time->format('d-m-Y H:m')}}</td>
                        <td >{{$rs->ofTable ? $rs->ofTable->code : 'Đang chờ'}}</td>
                        <td>{{$rs->people}}</td>
                        <td style="width:15%;">{{$rs->message ? $rs->message : 'Trống'}}</td>
                        <td>{{checkReservation($rs->status)}}</td>
                        <td>{{$rs->respond ? $rs->respond : 'Đang chờ'}}</td>

                      </tr>
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
