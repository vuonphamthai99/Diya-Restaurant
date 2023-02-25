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
                <div class="card-body table-responsive">
                    <div class="row mb-4">
                        <div class="col-lg-6">
                            <a href="{{ route('showDetailTable') }}"><button
                                    class="btn   btn-block btn-lg btn-gradient-primary ">+ Thêm bàn</button></a>
                        </div>
                    </div>
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th> Số bàn </th>
                                <th> Số ghế </th>
                                <th> Trạng thái </th>
                                <th> Thao tác </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tables as $table)
                                <tr>

                                    <td>
                                        {{ $table->code }}
                                    </td>
                                    <td>
                                        {{ $table->capacity }}
                                    </td>
                                    <td>
                                        {{ MyCheckStatus($table->status) }}
                                    </td>
                                    <td>
                                        <a href="{{ route('showEditTable', ['idTable' => $table->id]) }}">
                                            <button type="button" title="Chỉnh sửa" data-toggle="tooltip"
                                                data-placement="top" class="btn btn-outline-danger btn-rounded btn-icon">
                                                <i class="mdi mdi-eye"></i>
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
