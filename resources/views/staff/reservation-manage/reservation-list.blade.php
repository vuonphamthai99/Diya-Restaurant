@extends('layout.main')
@section('content')
    <div class="page-header">
        <h3 class="page-title"> Quản lý đặt bàn </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Quản lý đặt bàn</a></li>
                <li class="breadcrumb-item active" aria-current="page">Danh sách yêu cầu đặt bàn</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body table-responsive">
                    <table class="table  table-hover table-striped">
                        <thead>
                            <tr>
                                <th> Tạo lúc </th>
                                <th> Thời gian đặt </th>
                                <th> Số người </th>
                                <th> Số bàn </th>
                                <th> Tên khách hàng </th>
                                <th> Sdt khách hàng </th>
                                <th> Trạng thái </th>
                                <th> Thao tác </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reserList as $rl)
                                <tr>

                                    <td>
                                        {{ $rl->created_at->format('d-m-Y H:i') }}
                                    </td>
                                    <td>
                                        {{ $rl->reservation_time->format('d-m-Y H:i') }}
                                    </td>

                                    <td>
                                        {{ $rl->people }}
                                    </td>
                                    <td>
                                        {{ $rl->ofTable ? $rl->ofTable->code : 'Chưa có' }}
                                    </td>
                                    <td>
                                        {{ $rl->ofCustomer->name }}
                                    </td>
                                    <td>
                                        {{ $rl->ofCustomer->phone }}
                                    </td>

                                    <td>
                                        {{ checkReservation($rl->status) }}
                                    </td>
                                    <td><a href="{{ route('confirmReservation', ['idRes' => $rl->id]) }}">
                                            <button type="button" title="Xác nhận" data-toggle="tooltip"
                                                data-placement="top" class="btn btn-outline-success btn-rounded btn-icon">
                                                <i class="mdi mdi-check"></i>
                                            </button>
                                        </a>
                                        <a href="{{ route('cancelReservation', ['idRes' => $rl->id]) }}">
                                            <button type="button" title="Từ chối" data-toggle="tooltip"
                                                data-placement="top" class="btn btn-outline-danger btn-rounded btn-icon">
                                                <i class="mdi mdi-cancel"></i>
                                            </button>
                                        </a>
                                        @if ($rl->status == 2)
                                            <a href="{{ route('deleteReservation', ['idRes' => $rl->id]) }}">
                                                <button type="button" title="Xóa" data-toggle="tooltip"
                                                    data-placement="top"
                                                    class="btn btn-outline-danger btn-rounded btn-icon">
                                                    <i class="mdi mdi-trash-can"></i>
                                                </button>
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
