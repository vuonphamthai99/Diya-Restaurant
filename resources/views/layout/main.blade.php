<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-field" content="{{csrf_token()}}">
    <title>Purple Admin</title>
    <!-- plugins:css -->

    <link rel="stylesheet" href="{{asset('dashboard-template/assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard-template/assets/vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard-template/assets/css/jquery.toast.min.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="shortcut icon" href="{{asset('dashboard-template/assets/images/favicon.ico')}}" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="{{asset('js/datatables.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('dashboard-template/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard-template/assets/css/custom_style.css')}}">
    <!-- End layout styles -->
<style>
    a{
        text-decoration: none;
    }
</style>
  </head>
  <body>
    <input type="hidden" id="success-msg" value="{{Session::has('success') ? Session::get('success') : ""}}">
    <input type="hidden" id="error-msg" value="{{Session::has('error') ? Session::get('error') : ""}}">

    <div class="container-scroller">
        @include('layout.navbar')

        <div class="container-fluid page-body-wrapper">
        @include('layout.sidebar')


            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('content')
                </div>
                @include('layout.footer')

            </div>
        </div>
    </div>

    @include('layout.modals')
    <script src="{{asset('dashboard-template/assets/vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{asset('dashboard-template/assets/vendors/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('dashboard-template/assets/js/jquery.cookie.js')}}" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{asset('dashboard-template/assets/js/off-canvas.js')}}"></script>
    <script src="{{asset('dashboard-template/assets/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('dashboard-template/assets/js/misc.js')}}"></script>

    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{asset('dashboard-template/assets/js/jquery.toast.min.js')}}"></script>
    <script src="{{asset('dashboard-template/assets/js/dashboard.js')}}"></script>
    <script src="{{asset('dashboard-template/assets/js/todolist.js')}}"></script>
    <script src="{{asset('dashboard-template/assets/js/functions-library.js')}}"></script>
    <script src="{{asset('dashboard-template/assets/js/main.js')}}"></script>
    <script src="{{asset('dashboard-template/assets/js/file-upload.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>

    <script type="text/javascript" src="{{asset('js/datatables.min.js')}}"></script>
    @yield('page-js')
    <!-- End custom js for this page -->

    @if (Session::has('success'))
    <script>
        $.toast({
            text: $("#success-msg").val(), // Text that is to be shown in the toast
            heading: 'Thành công', // Optional heading to be shown on the toast
            icon: 'success', // Type of toast icon
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
@elseif(Session::has('error'))
    <script>
        $.toast({
            text: $("#error-msg").val(), // Text that is to be shown in the toast
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

  </body>
</html>
