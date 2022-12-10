<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Diya Restaurant</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <meta content="{{ csrf_token() }}" name="csrf-field">

  <!-- Favicons -->
  <link href="{{asset('customer-template/img/favicon.png')}}" rel="icon">
  <link href="{{asset('customer-template/img/apple-touch-icon.png')}}" rel="apple-touch-icon">
<style>
    .card{
        background:#625b4b !important;
    }
    .without_ampm::-webkit-datetime-edit-ampm-field {
   display: none;
 }
 input[type=time]::-webkit-clear-button {
   -webkit-appearance: none;
   -moz-appearance: none;
   -o-appearance: none;
   -ms-appearance:none;
   appearance: none;
   margin: -10px;
 }
 .page-input{
    display: block;
    width: 100%;
    height: 44px;
    border-radius: 0;
    box-shadow: none;
    font-size: 14px;
    background: #0c0b09;
    border-color: #625b4b;
    color: white;
 }
 .form-control{

 }
 .my-disabled{
    pointer-events: none;

 }
.page-btn, .ajs-ok{
    background: #cda45e;
    border: 0;
    padding: 10px 35px;
    color: #fff;
    transition: 0.4s;
    border-radius: 50px;
}
.ajs-cancel{
    margin: 0 0 0 15px;
    border: 2px solid #cda45e;
    color: #0c0b09;
    border-radius: 50px;
    padding: 8px 25px;
    text-transform: uppercase;
    font-size: 13px;
    font-weight: 500;
    letter-spacing: 1px;
    transition: 0.3s;
}
.alertify, .ajs-modal, .ajs-dimmer{
    color: #0c0b09 !important;
    border: none !important;
}
</style>
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css" integrity="sha512-wJgJNTBBkLit7ymC6vvzM1EcSWeM9mmOu+1USHaRBbHkm6W9EgM0HY27+UtUaprntaYQJF75rc8gjxllKs5OIQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">


<!-- CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
  <link href="{{asset('customer-template/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
  <link href="{{asset('customer-template/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('customer-template/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('customer-template/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('customer-template/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('customer-template/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('customer-template/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

  <!-- Template Main CSS File -->
  <link href="{{asset('customer-template/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Restaurantly - v3.8.0
  * Template URL: https://bootstrapmade.com/restaurantly-restaurant-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-center justify-content-md-between">

      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-phone d-flex align-items-center"><span>+84 369 006 523</span></i>
        <i class="bi bi-clock d-flex align-items-center ms-4"><span>Mở cửa: 8AM - 21PM</span></i>
      </div>

      {{-- <div class="languages d-none d-md-flex align-items-center">
        <ul>
          <li>En</li>
          <li><a href="#">De</a></li>
        </ul>
      </div> --}}
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-cente">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">

      <h1 class="logo me-auto me-lg-0"><a href="{{route('guest-page')}}">Diya Restaurant</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="{{asset('customer-template/img/logo.png')}}" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="{{route('guest-page')}}">Trang chủ</a></li>
          <li><a class="nav-link scrollto" href="{{route('guest-page')}}/#about">Thông tin</a></li>
          <li><a class="nav-link scrollto" href="{{route('guest-page')}}/#menu">Thực đơn</a></li>
          {{-- <li><a class="nav-link scrollto" href="#specials">Specials</a></li>
          <li><a class="nav-link scrollto" href="#events">Events</a></li>
          <li><a class="nav-link scrollto" href="#chefs">Chefs</a></li> --}}
          <li><a class="nav-link scrollto" href="{{route('guest-page')}}/#gallery">Thư viện ảnh</a></li>
          <li><a class="nav-link scrollto" href="{{route('guest-page')}}/#contact">Liên hệ</a></li>
          @if (Session::has('loginID'))
          <li class="dropdown"><a href="#"><span>Tùy chọn</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li class="dropdown"><a href="#"><span>Thông tin tài khoản</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Thay đổi thông tin cá nhân</a></li>
                  <li><a href="#">Thay đổi mật khẩu</a></li>
                  <li><a href="{{route('showAddress')}}">Danh sách địa chỉ</a></li>
                  <li><a href="{{route('logoutGuest')}}">Đăng xuất</a></li>
                </ul>
              </li>
              <li><a href="{{route('showOrderList')}}">Đơn đặt món</a></li>
              <li><a href="#">Yêu cầu đặt bàn</a></li>
            </ul>
          </li>
          @else
          <li><a class="nav-link scrollto" href="{{route('guest-page')}}/#forms">Đăng nhập</a></li>
          @endif
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      <a href="{{route('guest-page')}}#book-a-table" class="book-a-table-btn scrollto d-none d-lg-flex">Đặt Bàn</a>
      <a href="{{route('guest-page')}}#menu" class="book-a-table-btn scrollto d-none d-lg-flex">Đặt Món</a>
      @if(Session::has('loginID'))
      <a href="{{route('logoutGuest')}}" class="book-a-table-btn scrollto d-none d-lg-flex"> Đăng xuất </a>
      @else
      <a href="{{route('guest-page')}}#forms"  class="book-a-table-btn scrollto  d-none d-lg-flex ">Đăng ký</a>
        @endif
    </div>
  </header><!-- End Header -->


@yield('customer-content')

 <!-- ======= Footer ======= -->
 <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-6 col-md-6">
            <div class="footer-info">
              <h3>Diya Restaurant</h3>
              <p>
                178 Tầm Vu, Hưng lợi <br>
                Ninh Kiều, Cần Thơ<br><br>
                <strong>Phone:</strong> +84 369 006 523<br>
                <strong>Email:</strong> phamb1805905@student.ctu.edu.vn<br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 footer-links">
            <h4>Đường dẫn nhanh</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="{{route('guest-page')}}">Trang chủ</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{route('guest-page')}}/#contact">Liên hệ</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>





        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Restaurantly</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/restaurantly-restaurant-template/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <!-- Messenger Plugin chat Code -->
  <div id="fb-root"></div>

  <!-- Your Plugin chat code -->
  <div id="fb-customer-chat" class="fb-customerchat">
  </div>


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <a  class="show-cart @if(!Session::has('loginID')) my-disabled @endif d-flex align-items-center justify-content-center"><i class="bi bi-cart"></i></a>
  <div class="  d-flex @if(!Session::has('loginID')) d-none @endif align-items-center justify-content-center cart-item-quantity"><p class="mt-3">0</p></div>
  <!-- Vendor JS Files -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js" integrity="sha512-zlWWyZq71UMApAjih4WkaRpikgY9Bz1oXIW5G0fED4vk14JjGlQ1UmkGM392jEULP8jbNMiwLWdM8Z87Hu88Fw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
  <script src="{{asset('customer-template/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('customer-template/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('customer-template/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('customer-template/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
  <script src="{{asset('customer-template/vendor/aos/aos.js')}}"></script>


  <!-- Template Main JS File -->
  <script src="{{asset('customer-template/js/main.js')}}"></script>
  <script src="{{asset('customer-template/js/custom.js')}}"></script>

  <script src="{{asset('customer-template/js/mapInput.js')}}"></script>
  <script>
    var chatbox = document.getElementById('fb-customer-chat');
    chatbox.setAttribute("page_id", "108020098807230");
    chatbox.setAttribute("attribution", "biz_inbox");
  </script>

  <!-- Your SDK code -->
  <script>
    window.fbAsyncInit = function() {
      FB.init({
        xfbml            : true,
        version          : 'v15.0'
      });
    };

    (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
  </script>


  @if (Session::has('success'))
  <Script>
$.toast({
    text: "{{Session::get('success')}}", // Text that is to be shown in the toast
    heading: 'Note', // Optional heading to be shown on the toast
    icon: 'success', // Type of toast icon
    showHideTransition: 'fade', // fade, slide or plain
    allowToastClose: true, // Boolean value true or false
    hideAfter: 3000, // false to make it sticky or number representing the miliseconds as time after which toast needs to be hidden
    stack: 5, // false if there should be only one toast at a time or a number representing the maximum number of toasts to be shown at a time
    position: 'top-right', // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values



    textAlign: 'left',  // Text alignment i.e. left, right or center
    loader: true,  // Whether to show loader or not. True by default
    loaderBg: '#9EC600',  // Background color of the toast loader
    beforeShow: function () {}, // will be triggered before the toast is shown
    afterShown: function () {}, // will be triggered after the toat has been shown
    beforeHide: function () {}, // will be triggered before the toast gets hidden
    afterHidden: function () {}  // will be triggered after the toast has been hidden
});
  </Script>
  @elseif(Session::has('error'))
  <script>
      $.toast({
          text: "{{Session::get('error')}}", // Text that is to be shown in the toast
          heading: 'Lỗi!', // Optional heading to be shown on the toast
          icon: 'error', // Type of toast icon
          showHideTransition: 'slide', // fade, slide or plain
          allowToastClose: true, // Boolean value true or false
          hideAfter: 5000, // false to make it sticky or number representing the miliseconds as time after which toast needs to be hidden
          stack: 10, // false if there should be only one toast at a time or a number representing the maximum number of toasts to be shown at a time
          position: 'top-right', // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values
          textAlign: 'left', // Text alignment i.e. left, right or center
          loader: true, // Whether to show loader or not. True by default
          loaderBg: '#9EC600', // Background color of the toast loader
      });
  </script>
@endif
  @if($errors->any())
    @foreach ($errors->all() as $error)
    <script>
        $.toast({
            text: '{{ $error}}', // Text that is to be shown in the toast
            heading: 'Lỗi!', // Optional heading to be shown on the toast
            icon: 'error', // Type of toast icon
            showHideTransition: 'slide', // fade, slide or plain
            allowToastClose: true, // Boolean value true or false
            hideAfter: 7000, // false to make it sticky or number representing the miliseconds as time after which toast needs to be hidden
            stack: 10, // false if there should be only one toast at a time or a number representing the maximum number of toasts to be shown at a time
            position: 'top-right', // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values
            textAlign: 'left', // Text alignment i.e. left, right or center
            loader: true, // Whether to show loader or not. True by default
            loaderBg: '#9EC600', // Background color of the toast loader
        });
    </script>
    @endforeach
@endif
@include('customer-layout/modals')

@yield('page-js')
</body>

</html>

