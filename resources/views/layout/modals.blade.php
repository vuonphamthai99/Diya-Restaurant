<!-- Modals for User Management-->

<!-- Modal Add User-->
<div class="modal fade" id="addNewUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form class="forms-sample" method="POST" action="{{route('addNewUser')}}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm người dùng</h5>
                    <button type="button" class="btn close-modal btn-outline-primary btn-rounded btn-icon">
                        <i class="mdi mdi-close"></i>
                      </button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Tạo người dùng mới</h4>
                            <p class="card-description">Mật khẩu mặc định là User@123 </p>

                            <div class="form-group row">
                                <label for="name" class="col-sm-3 col-form-label">Họ và tên</label>
                                <div class="col-sm-9">
                                    <input name="name" type="text" class="form-control" id="name"
                                        placeholder="Họ và Tên">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleFormControlSelect1" class="col-sm-3 col-form-label">Vai trò</label>
                                <div class="col-sm-9 ">
                                    <select style="" name="id_user_role" class="form-control form-control-lg" aria-placeholder="Chọn vai trò" id="exampleFormControlSelect1">
                                        <option value="0" disabled selected>Chọn vai trò</option>
                                        <option value="1">Quản lý</option>
                                        <option value="2">Thu ngân</option>
                                        <option value="3">Bồi bàn</option>
                                    </select>
                                </div>

                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" name="email" class="form-control" id="email"
                                        placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="phone" class="col-sm-3 col-form-label">Số điện thoại</label>
                                <div class="col-sm-9">
                                    <input type="text" name="phone" class="form-control" id="phone"
                                        placeholder="Số điện thoại">
                                </div>
                            </div>



                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn close-modal btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Confirm action on User-->

<div class="modal fade" id="confirmActionOnUser" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Xác nhận</h5>
          <button type="button" class="btn close-modal btn-outline-primary btn-rounded btn-icon">
            <i class="mdi mdi-close"></i>
          </button>
        </div>
        <div class="modal-body">
            <div class="card">
                <div class="card-body">

          <h4 class="card-description" id="ConfirmActionMsg"></h5>
        </div>
        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="close-modal btn btn-danger" data-dismiss="modal">Hủy</button>
          <button type="button" id="actionConfirmed" class="btn btn-primary">Đồng ý</button>
        </div>
      </div>
    </div>
  </div>





<!-- End Modals for User Management-->
