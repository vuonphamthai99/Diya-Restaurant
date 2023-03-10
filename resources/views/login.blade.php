<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Diya Restaurant</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('dashboard-template/assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard-template/assets/vendors/css/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('dashboard-template/assets/css/style.css')}}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{asset('dashboard-template/assets/images/favicon.ico')}}" />
  </head>
  <body>
    @php
         $greetings = "";
        /* This sets the $time variable to the current hour in the 24 hour clock format */
        $time = Carbon\Carbon::now()->format('H');

        /* Set the $timezone variable to become the current timezone */
        $timezone = date("e");

        /* If the time is less than 1200 hours, show good morning */
        if ($time < "12") {
            $greetings = "Chào buổi sáng!";
        } else

        /* If the time is grater than or equal to 1200 hours, but less than 1700 hours, so good afternoon */
        if ($time >= "12" && $time < "17") {
            $greetings = "Buổi trưa tốt lành!";
        } else

        /* Should the time be between or equal to 1700 and 1900 hours, show good evening */
        if ($time >= "17") {
            $greetings = "Chào buổi tối";
        }
    @endphp
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                  <img src="{{asset('/images/logo/logo.jpg')}}">
                </div>
                <h4>{{$greetings}}! </h4>
                <h6 class="font-weight-light">Đăng nhập để tiếp tục.</h6>
                <form class="pt-3" action="{{route('authLogin')}}" method="POST">
                    @if(Session::has('fail'))
                    <div class="col-md-6">
                        <p class="text-danger">{{Session::get('fail')}}</p>
                    </div>
                    @endif
                    @csrf
                  <div class="form-group">
                    <input type="text" name="phone" value="{{old('phone')}}" class="form-control form-control-lg" id="exampleInputPhone" placeholder="Số điện thoại">
                    <span class="text-danger">@error('phone'){{$message}}@enderror</span>
                </div>
                  <div class="form-group">
                    <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Mật khẩu">
                    <span class="text-danger">@error('password'){{$message}}@enderror</span>
                </div>
                  <div class="mt-3">
                    <button class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" type="submit">Đăng Nhập</button>
                  </div>
                  <div class="my-2 d-flex justify-content-between align-items-center">
                    <div class="form-check">
                      <label class="form-check-label text-muted">
                        {{-- <input type="checkbox" name="KeepSigned" class="form-check-input"> Nhớ mật khẩu </label> --}}
                    </div>
                  </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{asset('dashboard-template/assets/vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{asset('dashboard-template/assets/js/off-canvas.js')}}"></script>
    <script src="{{asset('dashboard-template/assets/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('dashboard-template/assets/js/misc.js')}}"></script>
    <!-- endinject -->
  </body>
</html>
