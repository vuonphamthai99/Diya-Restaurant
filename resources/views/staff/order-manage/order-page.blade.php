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

                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-section-a" role="tabpanel"
                            aria-labelledby="pills-section-a-tab">
                            <div class="row m-3">
                                @foreach ($tables as $tb)
                                    @if (str_contains($tb->code, 'A'))
                                        <div class="btn   @if($tb->status == 2) btn-warning @elseif($tb->status == 1) btn-danger  @else btn-primary @endif col-lg-2 my-table btn-fw"
                                            idTable="{{ $tb->id }}" TableCode = "{{$tb->code}}" Status="{{ $tb->status}}">
                                            Bàn số {{ $tb->code }} <br /><br /> <p>{{ MyCheckStatus($tb->status)}}</p>
                                        </div>

                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-section-b" role="tabpanel"
                            aria-labelledby="pills-section-b-tab">
                            <div class="row m-3">
                                @foreach ($tables as $tb)
                                    @if (str_contains($tb->code, 'B'))
                                        <div class="btn   @if($tb->status == 2) btn-warning @elseif($tb->status == 1) btn-danger  @else btn-primary @endif col-lg-2 my-table btn-fw"
                                            idTable="{{ $tb->id }}" TableCode = "{{$tb->code}}" Status="{{ $tb->status}}">
                                            Bàn số {{ $tb->code }} <br /><br/> <p>{{ MyCheckStatus($tb->status)}}</p>
                                        </div>

                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-section-c" role="tabpanel"
                            aria-labelledby="pills-section-c-tab">
                            <div class="row m-3">
                                @foreach ($tables as $tb)
                                    @if (str_contains($tb->code, 'C'))
                                        <div class="btn   @if($tb->status == 2) btn-warning @elseif($tb->status == 1) btn-danger  @else btn-primary @endif col-lg-2 my-table btn-fw"
                                            idTable="{{ $tb->id }}" TableCode = "{{$tb->code}}" Status="{{ $tb->status}}">
                                            Bàn số {{ $tb->code }} <br /><br /> <p>{{ MyCheckStatus($tb->status)}}</p>
                                        </div>
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
                    <h4 class="card-title">Các món đã gọi</h4>
                    <p class="card-description" id="table-picked">Chọn bàn để xem</p>
                    <div class="col-lg-6 d-flex mt-2 mb-4 ">
                        <button type="button" id="order-btn" class="btn btn-gradient-secondary btn-fw">Thêm món+</button>
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
                                    Thao tác
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
                            <button type="button" id="checkout-btn" class="btn btn-gradient-secondary btn-fw">Thanh toán</button>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

@endsection
