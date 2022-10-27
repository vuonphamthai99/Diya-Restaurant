@extends('layout.main')
@section('content')
    <div class="page-header">
        <h3 class="page-title"> Quản lý người dùng </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Quản lý người dùng</a></li>
                <li class="breadcrumb-item active" aria-current="page">Danh sách người dùng</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <div class="row mb-3">
                        <div class="col-lg-6">
                            <button id="addNewUser" class="btn  me-3 btn-block btn-lg btn-gradient-primary ">+ Thêm người
                                dùng</button>
                            <div class="btn-group">
                                <button id="sortUserByRole"
                                    class="btn dropdown-toggle   me-3 btn-block btn-lg btn-gradient-primary "
                                    data-bs-toggle="dropdown"> Vai trò </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item">Tất cả</a>
                                    {{-- <a class="dropdown-item">Admin</a> --}}
                                    <a class="dropdown-item">Quản lý</a>
                                    <a class="dropdown-item">Thu ngân</a>
                                    <a class="dropdown-item">Bồi bàn</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 ">
                            <div class="input-group">
                                <input type="text" class="form-control" id="searchUserInput" placeholder="Nhập gì đó..."
                                    aria-label="Nhập gì đó..." aria-describedby="basic-addon2">
                                <button class="btn btn-sm btn-gradient-primary" type="button"> Tìm Kiếm </button>
                            </div>

                        </div>

                    </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th> Ảnh đại diện </th>
                                <th> Họ Tên </th>
                                <th> Chức vụ </th>
                                <th> SDT </th>
                                <th> Email </th>
                                <th> Ngày tham gia </th>
                                <th> Người thêm </th>
                                <th> Thao tác </th>
                            </tr>
                        </thead>
                        <tbody id="UserListTable">
                            @foreach ($user_list as $user)
                                <tr>
                                    <td class="py-1">
                                        <img src="{{ asset('dashboard-template/assets/images/faces-clipart/pic-1.png') }}"
                                            alt="image" />
                                    </td>
                                    <td> {{ $user->name }} </td>
                                    <td>
                                        {{ $user->hasRole->user_role }}
                                    </td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td> {{ $user->created_at->format('d/m/Y') }} </td>
                                    <td> {{ $user->hasCreator ? $user->hasCreator->name : '' }} </td>
                                    <td class="action user-manage" id-user="{{ $user->id }}">
                                        <button type="button" title="Reset mật khẩu" id="reset-pwd" data-toggle="tooltip"
                                            data-placement="top"
                                            class="btn act-user-btn tooltip-r btn-gradient-primary btn-rounded  btn-icon">
                                            <i class="mdi mdi-file-restore"></i>
                                        </button>
                                        @if ($user->lock_status == 0)
                                            <button type="button" title="Khóa người dùng" id="lock-user"
                                                data-toggle="tooltip" data-placement="top"
                                                class="btn act-user-btn tooltip-r btn-gradient-warning btn-rounded btn-icon">
                                                <i class="mdi mdi-lock"></i>
                                            </button>
                                        @else
                                            <button type="button" title="Mở khóa người dùng" id="unlock-user"
                                                data-toggle="tooltip" data-placement="top"
                                                class="btn act-user-btn tooltip-r btn-gradient-success btn-rounded btn-icon">
                                                <i class="mdi mdi-lock-open"></i>
                                            </button>
                                        @endif

                                        <button type="button" title="Xóa người dùng" id="delete-user" data-toggle="tooltip"
                                            data-placement="top"
                                            class="btn act-user-btn tooltip-r btn-gradient-danger btn-rounded btn-icon">
                                            <i class="mdi mdi-trash-can"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@stop

@section('page-js')
    <script src="{{ asset('dashboard-template/assets/js/user-manage.js') }}"></script>
    @if (Session::has('success'))
        <script>
            $.toast({
                text: "Thêm người dùng thành công!", // Text that is to be shown in the toast
                heading: 'Thành công', // Optional heading to be shown on the toast
                icon: 'success', // Type of toast icon
                showHideTransition: 'slide', // fade, slide or plain
                allowToastClose: true, // Boolean value true or false
                hideAfter: 3000, // false to make it sticky or number representing the miliseconds as time after which toast needs to be hidden
                stack: 3, // false if there should be only one toast at a time or a number representing the maximum number of toasts to be shown at a time
                position: 'top-right', // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values



                textAlign: 'left', // Text alignment i.e. left, right or center
                loader: true, // Whether to show loader or not. True by default
                loaderBg: '#9EC600', // Background color of the toast loader

            });
        </script>
    @elseif(Session::has('fail'))
        <script>
            $.toast({
                text: "Thêm người dùng không thành công!", // Text that is to be shown in the toast
                heading: 'Lỗi!', // Optional heading to be shown on the toast
                icon: 'error', // Type of toast icon
                showHideTransition: 'slide', // fade, slide or plain
                allowToastClose: true, // Boolean value true or false
                hideAfter: 3000, // false to make it sticky or number representing the miliseconds as time after which toast needs to be hidden
                stack: 3, // false if there should be only one toast at a time or a number representing the maximum number of toasts to be shown at a time
                position: 'top-right', // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values



                textAlign: 'left', // Text alignment i.e. left, right or center
                loader: true, // Whether to show loader or not. True by default
                loaderBg: '#9EC600', // Background color of the toast loader

            });
        </script>
    @elseif(Session::has('update-success'))
        <script>
            $.toast({
                text: "Cập người dùng thành công!", // Text that is to be shown in the toast
                heading: 'Thành công', // Optional heading to be shown on the toast
                icon: 'success', // Type of toast icon
                showHideTransition: 'slide', // fade, slide or plain
                allowToastClose: true, // Boolean value true or false
                hideAfter: 3000, // false to make it sticky or number representing the miliseconds as time after which toast needs to be hidden
                stack: 3, // false if there should be only one toast at a time or a number representing the maximum number of toasts to be shown at a time
                position: 'top-right', // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values



                textAlign: 'left', // Text alignment i.e. left, right or center
                loader: true, // Whether to show loader or not. True by default
                loaderBg: '#9EC600', // Background color of the toast loader

            });
        </script>
    @endif

@stop
