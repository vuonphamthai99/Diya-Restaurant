@extends('layout.main')
@section('content')
    <div class="page-header">
        <h3 class="page-title"> Quản lý món ăn </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Quản lý món ăn</a></li>
                <li class="breadcrumb-item active" aria-current="page">Danh sách món ăn</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body table-responsive">
                    <div class="row mb-4">
                        <div class="col-lg-6">
                            <a href="{{ route('showDetailMenu') }}"><button
                                    class="btn   btn-block btn-lg btn-gradient-primary ">+ Thêm món</button></a>
                        </div>
                    </div>
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th> ID </th>
                                <th> Tên món ăn </th>
                                <th> Giá </th>
                                <th> Danh mục </th>
                                <th> Trạng thái </th>
                                <th> Thao tác </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_menu as $menu)
                                <tr>
                                    <td>
                                        {{ $menu->id }}
                                    </td>
                                    <td>
                                        {{ $menu->name }}
                                    </td>
                                    <td>
                                        {{ format_vnd($menu->price) }}
                                    </td>
                                    <td>
                                        {{ $menu->hasType->name }}
                                    </td>
                                    <td>
                                        {{ CheckStockStatus($menu->status) }}
                                    </td>
                                    <td>
                                        <a href="{{ route('showEditMenu', ['idMenu' => $menu->id]) }}">
                                            <button type="button" title="Chỉnh sửa" data-toggle="tooltip"
                                                data-placement="top" class="btn btn-outline-success btn-rounded btn-icon">
                                                <i class="mdi mdi-eye"></i>
                                            </button>
                                        </a>
                                        <a href="{{ route('deleteMenu', ['idMenu' => $menu->id]) }}">
                                            <button type="button" title="Xóa món" id="delete-user" data-toggle="tooltip"
                                                data-placement="top" class="btn btn-outline-danger btn-rounded btn-icon">
                                                <i class="mdi mdi-trash-can"></i>
                                            </button>
                                        </a>
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
@section('page-js')
