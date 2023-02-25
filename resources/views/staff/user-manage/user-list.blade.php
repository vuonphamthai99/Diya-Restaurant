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
                <div class="card-body table-responsive">

                    <div class="row mb-4">
                        <div class="col-lg-6">
                            <a href="{{ route('showAddUser') }}"><button
                                    class="btn   btn-block btn-lg btn-gradient-primary ">+ Thêm người
                                    dùng</button></a>
                        </div>
                    </div>
                    <table class="table table-hover table-responsive table-striped">
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
                                @if ($user->id != Session::get('loginID'))
                                    <tr>
                                        <td class="py-1">
                                            <img src="{{ asset('images/avatars') }}/{{ $user->hasAvatar->name }}"
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
                                            <a
                                                href="{{ route('actionOnUser', ['id' => $user->id, 'action' => 'reset-pwd']) }}"><button
                                                    type="button" title="Reset mật khẩu" id="reset-pwd"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    class="btn btn-outline-primary btn-rounded  btn-icon">
                                                    <i class="mdi mdi-file-restore"></i>
                                                </button></a>
                                            @if ($user->status == 0)
                                                <a
                                                    href="{{ route('actionOnUser', ['id' => $user->id, 'action' => 'lock-user']) }}"><button
                                                        type="button" title="Khóa người dùng" data-toggle="tooltip"
                                                        data-placement="top"
                                                        class="btn  btn-outline-success btn-rounded btn-icon">
                                                        <i class="mdi mdi-lock-open"></i>
                                                    </button>
                                                </a>
                                            @else
                                                <a
                                                    href="{{ route('actionOnUser', ['id' => $user->id, 'action' => 'unlock-user']) }}">
                                                    <button type="button" title="Mở khóa người dùng" id="unlock-user"
                                                        data-toggle="tooltip" data-placement="top"
                                                        class="btn  btn-outline-danger btn-rounded btn-icon">
                                                        <i class="mdi mdi-lock"></i>
                                                    </button>
                                                </a>
                                            @endif
                                            <a
                                                href="{{ route('actionOnUser', ['id' => $user->id, 'action' => 'delete-user']) }}">
                                                <button type="button" title="Xóa người dùng" id="delete-user"
                                                    data-toggle="tooltip" data-placement="top"
                                                    class="btn btn-outline-danger btn-rounded btn-icon">
                                                    <i class="mdi mdi-trash-can"></i>
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                @endif
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


@stop
