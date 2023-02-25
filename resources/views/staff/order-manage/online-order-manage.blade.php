@extends('layout.main')
@section('content')
    <div class="page-header">
        <h3 class="page-title"> Quản lý Order </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Quản lý Order</a></li>

                <li class="breadcrumb-item active" aria-current="page">Lịch sử Order</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body table-responsive">
                    <h4 class="card-title">Lịch sử Order</h4>
                    {{-- <div class="col-lg-6 d-flex mt-2 mb-4 ">
                <button type="button" id="order-btn" class="btn btn-gradient-primary btn-fw">Thêm món+</button>
            </div> --}}
                    <table id="table-view-order" class="table hoverable">
                        <thead>
                            <tr>
                                <th>
                                    ID
                                </th>
                                <th>
                                    Tên khách hàng
                                </th>

                                <th>
                                    Tổng tiền
                                </th>
                                <th>
                                    Hình thức thanh toán
                                </th>
                                <th>
                                    Trạng thái
                                </th>
                                <th>
                                    Nhân viên xử lý
                                </th>
                                <th>
                                    Thời gian
                                </th>
                                <th>
                                    Thao tác
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $od)
                                @php
                                    
                                @endphp
                                <tr>
                                    <td>{{ $od->id }}</td>
                                    <td>{{ $od->ofCustomer->name }}</td>
                                    <td>{{ format_vnd($od->total) }}</td>
                                    <td>{{ $od->payment_id ? 'Thanh toán Paypal - ' . $od->hasPayment->payment_id_code : 'Thanh toán khi nhận hàng' }}
                                    </td>

                                    <td>{{ MyCheckOnlineOderStatus($od->status) }}</td>
                                    <td>{{ $od->hasProcessor ? $od->hasProcessor->name : 'Đang chờ' }}</td>
                                    <td>

                                        @if ($od->status == 1)
                                            {{ $od->finish_date->format('d-M-Y') . ' Lúc ' . $od->finish_date->format('H:m') }}
                                        @else
                                            {{ $od->order_date->format('d-M-Y') . ' Lúc ' . $od->order_date->format('H:m') }}
                                        @endif
                                    </td>

                                    <td>
                                        <a href="{{ route('getOrderDetailsById', ['idOrder' => $od->id]) }}">
                                            <button type="button" title="Xem chi tiết" data-toggle="tooltip"
                                                data-placement="top" class="btn btn-outline-success btn-rounded btn-icon">
                                                <i class="mdi mdi-eye"></i>
                                            </button>
                                        </a>
                                        @if ($od->status == 0 || $od->status == 2)
                                            <a href="{{ route('confirmOrder', ['idOrder' => $od->id]) }}">
                                                <button type="button" title="Xác nhận đơn" data-toggle="tooltip"
                                                    data-placement="top"
                                                    class="btn btn-outline-warning btn-rounded btn-icon">
                                                    <i class="mdi mdi-check"></i>
                                                </button>
                                            </a>
                                            @if ($od->status == 2)
                                                <a href="{{ route('confirmCancelOrder', ['idOrder' => $od->id]) }}">
                                                    <button type="button" title="Xác nhận yêu cầu hủy"
                                                        data-toggle="tooltip" data-placement="top"
                                                        class="btn btn-outline-danger btn-rounded btn-icon">
                                                        <i class="mdi mdi-close"></i>
                                                    </button>
                                                </a>
                                            @endif
                                        @endif

                                        @if ($od->status == 4)
                                            <a class="delete-order"
                                                href="{{ route('deleteOrder', ['idOrder' => $od->id]) }}">
                                                <button type="button" title="Xóa đơn hàng" data-toggle="tooltip"
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
