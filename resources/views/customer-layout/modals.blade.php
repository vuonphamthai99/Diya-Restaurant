<style>
    .modal{
        --bs-modal-bg: #0c0b09;
    }
    /* .close{
        color: #0c0b09;
    } */
    button .btn{
        background:#0c0b09;
    }
</style>
<!-- Modal -->
<div class="modal fade" id="cart-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Giỏ hàng</h5>
          <button type="button" class="btn close book-a-table-btn d-lg-flex" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">x</span>
          </button>
        </div>
        <div class="modal-body">
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


                </tbody>
              </table>
              <div class="d-flex justify-content-end">
                <h5 class="modal-title cart-total" >Thành tiền:  0000 VND</h5>
              </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" id="confirm-order" class="btn book-a-table-btn  d-lg-flex">Thanh toán</button>
        </div>
      </div>
    </div>
  </div>


  <!-- Modal -->
<div class="modal fade" id="address-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Thêm địa chỉ</h5>
          <button type="button" class="btn close book-a-table-btn d-lg-flex" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">x</span>
          </button>
        </div>
        <form action="{{route("storeAddress")}}" method="post">

        <div class="modal-body">
                @csrf
                <div class="form-group mb-3">
                    <label>Họ tên</label>
                    <input type="text" name="name"  class="form-control" required placeholder="Họ tên người nhận">
                </div>
                <div class="form-group mb-3">
                    <label>Số điện thoại</label>
                    <input type="text" name="phone"  class="form-control" required placeholder="Nhập số điện thoại">
                </div>
            <div class="form-group mb-3">
                <label>Số nhà</label>
                <input type="text" name="houseNumber" id="house-number-input"  class="form-control" required placeholder="Nhập số nhà">
            </div>
            <div class="form-group mb-3">
                <label>Tên đường ( VD: "đường 3/2" = "đường Ba tháng Hai")</label>
                <input type="text" name="address" id="address-input"  class="form-control" required placeholder="Nhập địa chỉ, tên đường">
            </div>
            <button type="button" id="check-address" class="btn book-a-table-btn mb-3 d-flex">Kiểm tra</button>
            <div class="form-group mb-3" id="latitudeArea">
                <label>Phường</label>
                <input type="text" id="suburb-input" name="suburb" placeholder="Thuộc phường" readonly class="form-control">
            </div>
            <div class="form-group mb-3" id="latitudeArea">
                <label>Quận</label>
                <input type="text" id="district-input" name="district" placeholder="Thuộc Quận" readonly class="form-control">
            </div>
            <div class="form-group mb-3" id="latitudeArea">
                <label>Khoảng cách (Km)</label>
                <input type="text" id="distance-input" name="distance" placeholder="Khoảng cách" readonly class="form-control">
            </div>

            <div class="form-group mb-3" id="longtitudeArea">
                <label>Phí (VND)</label>
                <input type="text" name="feeShip" id="feeShip-input" placeholder="Phí vận chuyển (VND)" readonly class="form-control">
            </div>
            <a onclick="alertifyAlert('Bạn chưa chọn địa chỉ')" id="show-on-map" target="" href="#">
                <button type="button" class="btn book-a-table-btn  d-lg-flex">Xem trên bản đồ</button>
            </a>

        </div>
        <div class="modal-footer">
          <button type="submit" id="confirm-address" class="btn book-a-table-btn  d-lg-flex">Thêm địa chỉ</button>
        </div>
    </form>
      </div>
    </div>
  </div>
