@extends('layout.main')
@section('content')
    <div class="page-header">
        <h3 class="page-title"> Quản lý Order </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Quản lý Order</a></li>
                <li class="breadcrumb-item active" aria-current="page">Chọn bàn Order</li>
            </ol>
        </nav>
    </div>
    {{-- page php --}}
    @php
        $tbSection = collect([
            'A' => 1,
            'B' => 1,
            'C' => 1,
            'D' => 1,
            'E' => 1,
        ]);
    @endphp
    <div class="row">
        <div class="col-lg-6 grid-margin ">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Bàn</h4>
                    <p class="card-description"> Các bàn theo từng khu vực </p>
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-section-a-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-section-a" type="button" role="tab"
                                aria-controls="pills-section-a" aria-selected="true">Khu A</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-section-b-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-section-b" type="button" role="tab"
                                aria-controls="pills-section-b" aria-selected="false">Khu B</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-section-c-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-section-c" type="button" role="tab"
                                aria-controls="pills-section-c" aria-selected="false">Khu C</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-section-d-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-section-d" type="button" role="tab"
                                aria-controls="pills-section-d" aria-selected="false">Khu D</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-section-E-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-section-E" type="button" role="tab"
                                aria-controls="pills-section-E" aria-selected="false">Khu E</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-section-a" role="tabpanel"
                            aria-labelledby="pills-section-a-tab">
                            <div class="row m-3">
                                @foreach ($tables as $tb)
                                    @if ($tb->section == 'A')
                                        <div class="btn  btn-primary @if($tb->status == 2) btn-warning @elseif($tb->status == 1) btn-warning @endif col-lg-2 my-table btn-fw"
                                            idTable="{{ $tb->id }}" Status="{{ $tb->status}}">
                                            Bàn số {{ $tbSection['A'] }} <br /><br /> {{ MyCheckStatus($tb->status)}}
                                        </div>
                                        @php
                                            $tbSection['A'] += 1;
                                        @endphp
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-section-b" role="tabpanel"
                            aria-labelledby="pills-section-b-tab">
                            <div class="row m-3">
                                @foreach ($tables as $tb)
                                    @if ($tb->section == 'B')
                                        <div class="btn  btn-primary @if($tb->status == 2) btn-warning @elseif($tb->status == 1) btn-warning @endif col-lg-2 my-table btn-fw"
                                            idTable="{{ $tb->id }}" Status="{{ $tb->status }}">
                                            Bàn số {{ $tbSection['B'] }} <br /><br /> {{ MyCheckStatus($tb->status) }}
                                        </div>
                                        @php
                                            $tbSection['B'] += 1;
                                        @endphp
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-section-c" role="tabpanel"
                            aria-labelledby="pills-section-c-tab">
                            <div class="row m-3">
                                @foreach ($tables as $tb)
                                    @if ($tb->section == 'C')
                                        <div class="btn  btn-primary @if ($tb->status == 2) btn-warning @elseif($tb->status == 1) btn-warning @endif col-lg-2 my-table btn-fw"
                                            idTable="{{ $tb->id }}" Status="{{ $tb->status }}">
                                            Bàn số {{ $tbSection['C'] }} <br /><br /> {{ MyCheckStatus($tb->status) }}
                                        </div>
                                        @php
                                            $tbSection['C'] += 1;
                                        @endphp
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-section-d" role="tabpanel"
                            aria-labelledby="pills-section-d-tab">
                            <div class="row m-3">
                                @foreach ($tables as $tb)
                                    @if ($tb->section == 'D')
                                        <div class="btn  btn-primary @if($tb->status == 2) btn-warning @elseif($tb->status == 1) btn-warning @endif col-lg-2 my-table btn-fw"
                                            idTable="{{ $tb->id }}" Status="{{ $tb->status }}">
                                            Bàn số {{ $tbSection['D'] }} <br /><br /> {{ MyCheckStatus($tb->status) }}
                                        </div>
                                        @php
                                            $tbSection['D'] += 1;
                                        @endphp
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-section-E" role="tabpanel"
                            aria-labelledby="pills-section-E-tab">
                            <div class="row m-3">
                                @foreach ($tables as $tb)
                                    @if ($tb->section == 'E')
                                        <div class="btn  btn-primary @if($tb->status == 2) btn-warning @elseif($tb->status == 1) btn-warning @endif col-lg-2 my-table btn-fw"
                                            idTable="{{ $tb->id }}" Status="{{ $tb->status }}">
                                            Bàn số {{ $tbSection['E'] }} <br /><br /> {{ MyCheckStatus($tb->status) }}
                                        </div>
                                        @php
                                            $tbSection['E'] += 1;
                                        @endphp
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <div class="col-lg-6 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Món</h4>
                    <p class="card-description">Các món đã gọi</p>
                    <div class="col-lg-6 d-flex mt-2 mb-4 ">
                        <button type="button" id="order-btn" class="btn btn-gradient-primary btn-fw">Thêm món+</button>
                    </div>
                        <table id="table-view-order" class="table hoverable">
                        <thead>
                            <tr>
                                <th>
                                    Tên món
                                </th>
                                <th>
                                    Số lượng
                                </th>
                                <th>
                                    Đơn giá
                                </th>
                                <th>
                                    Gọi lúc
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                    <div class="row mt-5">
                        <div class="col-lg-3 ">
                            <h4 class="card-title">
                                Tổng tiền:
                            </h4>
                        </div>
                        <div class="col-lg-4 ">
                            <p id="total-money" class="h4">0,000VNĐ</p>
                        </div>
                        <div class="col-lg-5 d-flex flex-row-reverse">
                            <button type="button" id="checkout-btn" class="btn btn-gradient-primary btn-fw">Thanh toán</button>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
