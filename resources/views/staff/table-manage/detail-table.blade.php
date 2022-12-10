@extends('layout.main')
@section('content')
<div class="page-header">
    <h3 class="page-title"> Quản lý số bàn </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Quản lý số bàn</a></li>
        <li class="breadcrumb-item active" aria-current="page">Danh sách bàn</li>
      </ol>
    </nav>
  </div>
  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Thêm bàn</h4>
                <p class="card-description"> Nhập thông tin bàn </p>
                <form action="{{route('storeTable')}}" method="POST" enctype="multipart/form-data" class="forms-sample">
                    @csrf
                    @if(isset($table))
                    <input type="hidden" name="idTable" value="{{$table->id}}">
                    <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Số bàn</label>
                        <div class="col-sm-9">

                            <input type="text" readonly name="" required   value="{{$table->code}}"
                          class="form-control  @error('capacity') is-invalid @enderror "  id="exampleInputEmail2" >

                        </div>
                      </div>
                    @endif

                    <div class="form-group @isset($table) d-none @endisset  row">
                        <label for="selectsection" class="col-sm-3 col-form-label">Khu</label>
                        <div class="col-sm-9">
                            <select name="section"
                             @isset($table) disabled @endisset
                              required class="form-control form-control-lg my-select  @error('section') is-invalid @enderror"

                            id="selectsection">
                            <option value="" selected disabled>Chọn khu..</option>
                            <option  selected >A</option>
                            <option >B</option>
                            <option >C</option>
                            </select>

                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Sức chứa</label>
                        <div class="col-sm-9">

                            <input type="number" min="1" max="12" name="capacity" required   value="@if(isset($table)){{$table->capacity}}@else {{old('capacity')}} @endif"
                          class="form-control  @error('capacity') is-invalid @enderror "  id="exampleInputEmail2" >

                        </div>
                      </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Trạng thái</label>
                    <div class="col-sm-4">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="status" id="membershipRadios1"  @if(isset($table) && $table->status == 0) checked @endif value="0" checked> Hiện <i class="input-helper"></i></label>
                      </div>
                    </div>
                    <div class="col-sm-5">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="status" id="membershipRadios2"  @if(isset($table) && $table->status == 1) checked @endif value="1"> Khóa <i class="input-helper"></i></label>
                      </div>
                    </div>
                  </div>


                  <button type="submit" class="btn btn-gradient-primary me-2">Lưu</button>
                  <a href="{{route('showListMenu')}}"><button type="button" class="btn btn-light">Hủy</button></a>
                </form>
              </div>
        </div>
    </div>
</div>
  @endsection
