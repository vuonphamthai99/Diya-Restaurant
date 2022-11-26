@extends('customer-layout.main')
@section('customer-content')
    <main id="main">
        <section class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Thanh toán</h2>
                    <ol>
                        <li><a href="{{ route('guest-page') }}">Trang chủ</a></li>
                        <li>Thanh toán</li>
                    </ol>
                </div>

            </div>
        </section>

        <section class="inner-page">
            <div class="container">
                <div class="row">
                    <table id="cart" class="table table-dark">
                        <thead>
                            <tr>
                                <th scope="col">Tên món</th>
                                <th scope="col">Đơn giá</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @if (Session::has('cartItems'))
                    @foreach (Session::get('cartItems') as $citem)

                    @endforeach
                    <tr class="item-tr" idItem="${id}" nameItem="${name}">
                        <th scope="row">{{$citem['name']}}</th>
                        <td>{{$citem['price']}}</td>
                        <td><input class="page-input cart-quant-input" value="{{$citem['quant']}}" min="1" type="number" name="" ></td>
                        <td><button class="delete-item page-btn"> Xóa </button></td>
                      </tr>
                    @else
                    <tr>
                        <td colspan="4" class="d-flex justify-content-center"> Trống </td>
                    </tr>
                    @endif --}}
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-end">
                    </div>
                </div>
                <div class="d-flex mt-3 mb-3 justify-content-end">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">Thanh toán</h5>


                            <div class="form-group ">
                                <label for="exampleFormControlSelect1">Chọn địa chỉ</label>
                                <select class="page-input" id="address-select" name="address" id="exampleFormControlSelect1">
                                    <option selected disabled value="">-- Chọn địa chỉ --</option>
                                    @foreach ($addresses as $ad )
                                    @if ($ad->user_id == Session::get('loginID'))
                                    <option feeShip="{{$ad->feeShip}}" value="{{$ad->id}}" data-toggle="tooltip" data-placement="top" title="{{$ad->address}}"> {{ \Illuminate\Support\Str::limit($ad->address, $limit = 30, $end = '...') }} </option>
                                    @endif
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Phương thức thanh toán</label>
                                <select class="page-input" id="exampleFormControlSelect1">
                                    <option>-- Chọn phương thức thanh toán --</option>

                                    <option value="1">Thanh toán khi nhận hàng</option>
                                    <option value="2">Thanh toán bằng paypal</option>

                                </select>
                            </div>

                        </div>
                        <div class="card-footer ">
                            <h5 class=" cart-total mb-3">Thành tiền: 0000 VND</h5>
                            <h5 class=" feeShip-text mb-3">Phí ship: 0000 VND</h5>
                            <div class=" d-flex justify-content-center">
                                <a href="#" onmouseover="this.style.background='#cda45e'" onmouseout="this.style.background='#0c0b09';"
                                 style="{background: #0c0b09}" class="book-a-table-btn">Xác nhận</a>

                            </div>
                          </div>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
@section('page-js')
    <script>
        $('#address-select').on('change', function() {
            let option = $(this).find('option:selected');
            let feeShip = option.attr('feeShip');
            alert(feeShip)
        });
    </script>
@endsection
