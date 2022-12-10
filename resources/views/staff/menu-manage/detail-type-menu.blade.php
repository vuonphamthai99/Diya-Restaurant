@extends('layout.main')
@section('content')
<div class="page-header">
    <h3 class="page-title"> Quản lý loại món </h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Quản lý loại món</a></li>
            <li class="breadcrumb-item active" aria-current="page">Thêm - cập nhật loại món</li>
        </ol>
    </nav>
</div>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Thêm - cập nhật loại món</h4>
                <p class="card-description"> Nhập thông tin loại món </p>
                <form action="{{route('storeType')}}" method="POST" class="forms-sample">
                    @csrf
                    @if(isset($type))
                    <input type="hidden" name="idType" value="{{$type->id}}">
                    @endif
                  <div class="form-group row">
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Tên loại</label>
                    <div class="col-sm-9">
                      <input type="text" name="name" required class="form-control @error('name') is-invalid @enderror"
                       id="exampleInputUsername2" value="@if(isset($type)) {{$type->name}} @else {{old('name')}} @endif" placeholder="Nhập tên loại..">
                      @error('name')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Mô tả</label>
                    <div class="col-sm-9">
                      <textarea  name="description" required  class="form-control  @error('description') is-invalid @enderror " rows="4" id="exampleInputEmail2" placeholder="Nhập mô tả..">
                        @if(isset($type)) {{$type->description}} @else {{old('description')}} @endif
                    </textarea>
                        @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                  </div>
                  <button type="submit" class="btn btn-gradient-primary me-2">Lưu</button>
                  <a href="{{route('showListType')}}"><button type="button" class="btn btn-light">Hủy</button></a>
                </form>
              </div>
        </div>
    </div>
</div>
@stop

@section('page-js')
@stop
