@extends('layout.main')
@section('content')
    <div class="page-header">
        <h3 class="page-title"> Quản lý loại món </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Quản lý loại món</a></li>
                <li class="breadcrumb-item active" aria-current="page">Danh sách loại món</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body table-responsive">
                    <div class="row mb-4">
                        <div class="col-lg-6">
                            <a href="{{ route('showDetailMenuType') }}"><button
                                    class="btn   btn-block btn-lg btn-gradient-primary ">+ Thêm loại món</button></a>
                        </div>
                    </div>
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th> ID </th>
                                <th> Tên loại </th>
                                <th> Mô tả </th>
                                <th> Thao tác </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $stt = 1;
                            @endphp
                            @foreach ($types as $type)
                                <tr>
                                    <td>
                                        {{ $stt++ }}
                                    </td>
                                    <td> {{ $type->name }} </td>
                                    <td>
                                        {{ $type->description }}
                                    </td>
                                    <td>
                                        <a href="{{ route('showEditMenuType', ['idType' => $type->id]) }}">
                                            <button type="button" title="Chỉnh sửa" data-toggle="tooltip"
                                                data-placement="top" class="btn btn-outline-success btn-rounded btn-icon">
                                                <i class="mdi mdi-eye"></i>
                                            </button>
                                        </a>
                                        <a href="{{ route('deleteType', ['idType' => $type->id]) }}">
                                            <button type="button" title="Xóa loại món" id="delete-user"
                                                data-toggle="tooltip" data-placement="top"
                                                class="btn btn-outline-danger btn-rounded btn-icon">
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

@stop
