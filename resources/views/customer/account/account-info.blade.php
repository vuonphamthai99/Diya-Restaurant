@extends('customer-layout.main')
@section('customer-content')
<main id="main">
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Cập nhật thông tin tài khoản</h2>
          <ol>
            <li><a href="{{route('guest-page')}}">Trang chủ</a></li>
            <li>Cập nhật thông tin tài khoản</li>
          </ol>
        </div>

      </div>
    </section>

    <section class="inner-page">
      <div class="container">
        <div class="row book-a-table">

            <form action="{{route('editAccount')}}" method="post" role="form" class=" php-email-form">
                @csrf
                <div class="row">
                    <div class="text-center mb-3">
                        <h3>Thông tin tài khoản</h3>
                    </div>

                    <div class="col-md-6 form-group">
                        <input type="text" name="name" class="form-control" id="name" value="{{$customer->name}}" placeholder="Họ tên" required>
                    </div>
                    <div class="col-md-6 form-group mt-3 mt-md-0">
                        <input type="email" class="form-control" name="email" id="email" autocomplete="off" value="{{$customer->email}}" placeholder="Email" required>
                    </div>
                </div>
                <div class="form-group mt-3">
                    <input type="text" class="form-control" name="phone" id="res-phone" value="{{$customer->phone}}" placeholder="Số điện thoại" required>
                </div>
                <div class="text-center mt-3"><button type="submit">Xác nhận</button></div>

            </form>
          </div>

      </div>
    </section>

  </main><!-- End #main -->
@endsection
@section('page-js')

@stop
