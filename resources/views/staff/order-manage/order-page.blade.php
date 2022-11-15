@extends('layout.main')
@section('content')
    <div class="page-header">
        <h3 class="page-title"> Quản lý bàn </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Quản lý bàn</a></li>
                <li class="breadcrumb-item active" aria-current="page">Chọn bàn Order</li>
            </ol>
        </nav>
    </div>
    {{-- page php --}}
    @php
        $tbSection = collect([
            'A' => 1,
            'B' => 1,
            'C' => 1,
            'D' => 1,
            'E' => 1,
        ]);
    @endphp
    <div class="row">
        <div class="col-lg-6 grid-margin ">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Bàn</h4>
                    <p class="card-description"> Các bàn theo từng khu vực </p>
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-section-a-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-section-a" type="button" role="tab"
                                aria-controls="pills-section-a" aria-selected="true">Khu A</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-section-b-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-section-b" type="button" role="tab"
                                aria-controls="pills-section-b" aria-selected="false">Khu B</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-section-c-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-section-c" type="button" role="tab"
                                aria-controls="pills-section-c" aria-selected="false">Khu C</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-section-d-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-section-d" type="button" role="tab"
                                aria-controls="pills-section-d" aria-selected="false">Khu D</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-section-E-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-section-E" type="button" role="tab"
                                aria-controls="pills-section-E" aria-selected="false">Khu E</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-section-a" role="tabpanel"
                            aria-labelledby="pills-section-a-tab">
                            <div class="row m-3">
                                @foreach ($tables as $tb)
                                    @if ($tb->section == 'A')
                                        <div class="btn @if($tb->Status == 2) btn-warning @endif btn-primary col-lg-2 my-table btn-fw" idTable="{{$tb->id}}"
                                            Status="{{$tb->hasStatus->id}}">
                                            Bàn số {{ $tbSection['A'] }} <br /><br /> {{$tb->hasStatus->name}}
                                        </div>
                                        @php
                                            $tbSection['A'] += 1;
                                        @endphp
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-section-b" role="tabpanel"
                            aria-labelledby="pills-section-b-tab">
                            <div class="row m-3">
                                @foreach ($tables as $tb)
                                    @if ($tb->section == 'B')
                                        <div class="btn @if($tb->Status == 2) btn-warning @endif btn-primary col-lg-2 my-table btn-fw" idTable="{{$tb->id}}"
                                            Status="{{$tb->hasStatus->id}}">
                                            Bàn số {{ $tbSection['B'] }} <br /><br /> {{$tb->hasStatus->name}}
                                        </div>
                                        @php
                                            $tbSection['B'] += 1;
                                        @endphp
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-section-c" role="tabpanel"
                            aria-labelledby="pills-section-c-tab">
                            <div class="row m-3">
                                @foreach ($tables as $tb)
                                    @if ($tb->section == 'C')
                                        <div class="btn @if($tb->Status == 2) btn-warning @endif btn-primary col-lg-2 my-table btn-fw" idTable="{{$tb->id}}"
                                            Status="{{$tb->hasStatus->id}}">
                                            Bàn số {{ $tbSection['C'] }} <br /><br /> {{$tb->hasStatus->name}}
                                        </div>
                                        @php
                                            $tbSection['C'] += 1;
                                        @endphp
                                    @endif
                                @endforeach
                            </div></div>
                        <div class="tab-pane fade" id="pills-section-d" role="tabpanel"
                            aria-labelledby="pills-section-d-tab">
                            <div class="row m-3">
                                @foreach ($tables as $tb)
                                    @if ($tb->section == 'D')
                                        <div class="btn @if($tb->Status == 2) btn-warning @endif btn-primary col-lg-2 my-table btn-fw" idTable="{{$tb->id}}"
                                            Status="{{$tb->hasStatus->id}}">
                                            Bàn số {{ $tbSection['D'] }} <br /><br /> {{$tb->hasStatus->name}}
                                        </div>
                                        @php
                                            $tbSection['D'] += 1;
                                        @endphp
                                    @endif
                                @endforeach
                            </div></div>
                        <div class="tab-pane fade" id="pills-section-E" role="tabpanel"
                            aria-labelledby="pills-section-E-tab">
                            <div class="row m-3">
                                @foreach ($tables as $tb)
                                    @if ($tb->section == 'E')
                                        <div class="btn @if($tb->Status == 2) btn-warning @endif btn-primary col-lg-2 my-table btn-fw" idTable="{{$tb->id}}"
                                            Status="{{$tb->hasStatus->id}}">
                                            Bàn số {{ $tbSection['E'] }} <br /><br /> {{$tb->hasStatus->name}}
                                        </div>
                                        @php
                                            $tbSection['E'] += 1;
                                        @endphp
                                    @endif
                                @endforeach
                            </div></div>
                    </div>


                </div>
            </div>
        </div>
        <div class="col-lg-6 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Món</h4>
                    <p class="card-description"> Các món đã gọi </p>
                    <table class="table hoverable">
                        <thead>
                            <tr>
                                <th>
                                    hi
                                </th>
                                <th>
                                    hi
                                </th>
                                <th>
                                    hi
                                </th>
                                <th>
                                    hi
                                </th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
