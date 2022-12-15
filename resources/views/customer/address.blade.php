@extends('customer-layout.main')
@section('customer-content')
<main id="main">
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Địa chỉ</h2>
          <ol>
            <li><a href="{{route('guest-page')}}">Trang chủ</a></li>
            <li>Địa chỉ</li>
          </ol>
        </div>

      </div>
    </section>

    <section class="inner-page">
      <div class="container">
        <div class="row">
            <div class="col-lg-2 mb-3">
                <a href="#" id="add-address-btn" class="book-a-table-btn  d-lg-flex">+ Thêm địa chỉ</a>

            </div>
            <table  class="table table-dark">
                <thead>
                  <tr>
                    <th scope="col">Tên người nhận</th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Phí ship</th>
                    <th scope="col">Khoảng cách</th>
                    <th scope="col">Thao tác</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($addresses as $ad)
                    @if ($ad->user_id == Session::get('loginID'))
                    <tr >
                        <th scope="row">{{$ad->name}}</th>
                        <td>{{$ad->address}}</td>
                        <td>{{$ad->phone}}</td>
                        <td>{{$ad->feeShip}}</td>
                        <td>{{$ad->distance}} Km</td>
                        <td><a class="delete-address" href="{{route('deleteAddress',['id' => $ad->id])}}"><button class="delete-item page-btn"> Xóa </button></a></td>
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
