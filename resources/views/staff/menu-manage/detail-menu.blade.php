@extends('layout.main')
@section('content')
<div class="page-header">
    <h3 class="page-title"> Quản lý món ăn </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Quản lý món ăn</a></li>
        <li class="breadcrumb-item active" aria-current="page">Thêm - Cập nhật món ăn</li>
      </ol>
    </nav>
  </div>
  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body ">
                <h4 class="card-title">Thêm - Cập nhật món ăn</h4>
                <p class="card-description"> Nhập thông tin món ăn </p>
                <form action="{{route('storeMenu')}}" method="POST" enctype="multipart/form-data" class="forms-sample">
                    @csrf
                    @if(isset($menu))
                    <input type="hidden" name="idMenu" value="{{$menu->id}}">
                    @endif
                  <div class="form-group row">
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Tên món</label>
                    <div class="col-sm-9">
                      <input type="text" name="name" required class="form-control @error('name') is-invalid @enderror"
                       id="exampleInputUsername2" value="@if(isset($menu)) {{$menu->name}} @else {{old('name')}} @endif" placeholder="Nhập tên loại..">

                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Giá</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-gradient-primary text-white">VND</span>
                          </div>
                      <input type="text" name="price" required class=" form-control @error('price') is-invalid @enderror"
                       id="exampleInputUsername2" value="@if(isset($menu)) {{$menu->price}} @else {{old('price')}} @endif" placeholder="Nhập tên loại..">
                    </div>

                    </div>

                  </div>

                  <div class="form-group row">
                    <label for="selectType" class="col-sm-3 col-form-label">Danh mục</label>
                    <div class="col-sm-9">
                        <select name="type" class="form-control my-select  @error('type') is-invalid @enderror"
                        style="
                        border: 1px solid #ebedf2 !important;
                        "
                        id="selectType">
                        <option value="" selected disabled>Chọn danh mục..</option>
                        @foreach ($types as $type )
                        <option @isset($menu)
                        @if ($menu->type_id == $type->id) selected @endif
                        @endisset value="{{$type->id}}">{{$type->name}}</option>
                        @endforeach
                        </select>

                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="exampleInputMobile" class="col-sm-3 col-form-label">Hình ảnh</label>
                    <div class="col-sm-9">
                        <div class="input-group col-xs-12">
                        <input type="file" accept="image/*" name="img" class="file-upload-default">
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info @error('img') is-invalid @enderror" disabled placeholder="Upload Image">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-gradient-primary" type="button">Chọn</button>
                          </span>
                        </div>

                    <img id="preview" class="border border-secondary mt-3" alt="your image" src="@if(isset($menu)){{asset('images/menu')}}/{{$menu->hasImage->name}}@else{{asset('dashboard-template/assets/images/blank.jpg')}} @endif" width="100" height="100" />

                    </div>

                  </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Trạng thái</label>
                    <div class="col-sm-4">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="status" id="membershipRadios1" value="0" checked
                          @if(isset($menu) && $menu->status == 0) checked @endif> Hiện <i class="input-helper"></i></label>
                      </div>
                    </div>
                    <div class="col-sm-5">
                      <div class="form-check">
                        <label class="form-check-label">
                          <input type="radio" class="form-check-input" name="status" id="membershipRadios2" value="1"
                          @if(isset($menu) && $menu->status == 1)  @endif> Khóa <i class="input-helper"></i></label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Mô tả thành phần</label>
                    <div class="col-sm-9">
                      <textarea  name="ingredients"  class="form-control  @error('ingredients') is-invalid @enderror " rows="4" id="exampleInputEmail2" placeholder="Nhập mô tả..">
                        @if(isset($menu)) {{$menu->ingredients}} @else {{old('ingredients')}} @endif
                    </textarea>

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
