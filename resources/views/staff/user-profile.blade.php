@extends('layout.main')
@section('content')
<style>

</style>
<div class="page-header">
    <h3 class="page-title"> Quản lý tài khoản </h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Quản lý tài khoản</a></li>
        <li class="breadcrumb-item active" aria-current="page">Thông tin cá nhân</li>
      </ol>
    </nav>
  </div>
  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <form action="">
                    <div class="form-group">
                        <div class="col-md-12">

                        </div>
                     </div>
                </form>
            </div>
        </div>
    </div>
  </div>
@stop

@section('page-js')
<script src="{{asset('dashboard-template/assets/js/user-profile.js')}}"></script>
@stop
