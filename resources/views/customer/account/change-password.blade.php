@extends('customer-layout.main')
@section('customer-content')
<main id="main">
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Cập nhật mật khẩu</h2>
          <ol>
            <li><a href="{{route('guest-page')}}">Trang chủ</a></li>
            <li>Cập nhật mật khẩu</li>
          </ol>
        </div>

      </div>
    </section>

    <section class="inner-page">
      <div class="container">
        <div class="row book-a-table">

            <form action="{{route('saveChangePassword')}}" method="post" role="form" class=" php-email-form">
                @csrf
                <div class="row">
                    <div class="text-center mb-3">
                        <h3>Cập nhật mật khẩu</h3>
                    </div>
                    <div class="form-group mt-3">
                        <input type="password" class="form-control" autocomplete="off" name="current_password" id="res-password" placeholder="Mật khẩu cũ" required="">
                    </div>
                    <div class="form-group mt-3">
                        <input type="password" class="form-control" autocomplete="off" name="new_password" id="res-password" placeholder="Mật khẩu mới" required="">
                    </div>
                    <div class="form-group mt-3">
                        <input type="password" class="form-control " autocomplete="off" name="new_password_confirmation" id="res-password-confirmation" placeholder="Nhập lại mật khẩu" required="">
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
