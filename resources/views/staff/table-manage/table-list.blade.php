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
            <div class="row mb-4">
                <div class="col-lg-6">
                    <a href="{{route('showDetailTable')}}"><button
                            class="btn   btn-block btn-lg btn-gradient-primary ">+ Thêm bàn</button></a>
                </div>
            </div>
            <table class="table table-hover table-striped">
              <thead>
                <tr>
                  <th> ID </th>
                  <th> Số bàn </th>
                  <th> Khu </th>
                  <th> Số ghế </th>
                  <th> Trạng thái </th>
                  <th> Thao tác </th>
                </tr>
              </thead>
              <tbody>
                @php
                    $tb_no = (object) [
                        'A_no' => 0,
                        'B_no' => 0,
                        'C_no' => 0,
                        'D_no' => 0,
                        'E_no' => 0,
                    ];
                @endphp
                @foreach ($tables as  $table)



                <tr>
                    <td >
                        {{$table->id}}
                    </td>
                    <td>
                        @switch($table->section)
                            @case('A')
                                @php
                                    $tb_no->A_no ++;
                                @endphp
                                    {{$tb_no->A_no}}
                                @break
                                @case('B')
                                @php
                                    $tb_no->B_no ++;
                                @endphp
                                    {{$tb_no->A_no}}
                                @break
                                @case('C')
                                @php
                                    $tb_no->C_no ++;
                                @endphp
                                    {{$tb_no->A_no}}
                                @break
                                @case('D')
                                @php
                                    $tb_no->D_no ++;
                                @endphp
                                    {{$tb_no->A_no}}
                                @break
                                @case('E')
                                @php
                                    $tb_no->E_no ++;
                                @endphp
                                    {{$tb_no->A_no}}
                                @break
                            @default

                        @endswitch
                    </td>
                    <td >
                        {{$table->section}}
                    </td>
                    <td >
                        {{$table->capacity}}
                    </td>
                    <td >
                        {{$table->hasStatus->name}}
                    </td>
                    <td>
                        <a
                            href="{{route('showEditTable',['idTable'  => $table->id])}}">
                            <button type="button" title="Chỉnh sửa"
                                data-toggle="tooltip" data-placement="top"
                                class="btn btn-outline-danger btn-rounded btn-icon">
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
