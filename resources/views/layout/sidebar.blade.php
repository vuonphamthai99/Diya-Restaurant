@php
                    $user =  App\Models\User::find(session()->get('loginID'));

@endphp
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item nav-profile">
        <a href="#" class="nav-link">
          <div class="nav-profile-image">
            <img src="{{$user->hasAvatar->name}}" alt="profile">
            <span class="login-status online"></span>
            <!--change to offline or busy as needed-->
          </div>
          <div class="nav-profile-text d-flex flex-column">
            <span class="font-weight-bold mb-2">{{$user->name}}</span>
            <span class="text-secondary text-small">Project Manager</span>
          </div>
          <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('showDashboard')}}">
          <span class="menu-title">Trang chủ</span>
          <i class="mdi mdi-home menu-icon"></i>
        </a>
      </li>
      {{-- Quản lý order khách hàng --}}
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#order-manage-collapse" aria-expanded="false" aria-controls="order-manage-collapse">
          <span class="menu-title">Order Món</span>
          <i class="menu-arrow"></i>
          <i class="mdi mdi-border-color menu-icon"></i>
        </a>
        <div class="collapse" id="order-manage-collapse">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{route('showOrderPage')}}">Chọn bàn Order</a></li>
          </ul>
        </div>
      </li>
      {{-- Quản lý đặt bàn --}}
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#reservation-manage-collapse" aria-expanded="false" aria-controls="reservation-manage-collapse">
          <span class="menu-title">Quản lý đặt bàn</span>
          <i class="menu-arrow"></i>
          <i class="mdi mdi-calendar-check menu-icon"></i>
        </a>
        <div class="collapse" id="reservation-manage-collapse">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="">Danh sách người dùng</a></li>
          </ul>
        </div>
      </li>
    {{-- Quản lý đơn đặt online --}}
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#online-order-manage-collapse" aria-expanded="false" aria-controls="online-order-manage-collapse">
          <span class="menu-title">Quản lý đơn đặt online</span>
          <i class="menu-arrow"></i>
          <i class="mdi mdi-bell-ring menu-icon"></i>
        </a>
        <div class="collapse" id="online-order-manage-collapse">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="">Danh sách người dùng</a></li>
          </ul>
        </div>
      </li>
      {{-- Quản lý số bàn --}}
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#table-manage-collapse" aria-expanded="false" aria-controls="table-manage-collapse">
          <span class="menu-title">Quản lý số bàn</span>
          <i class="menu-arrow"></i>
          <i class="mdi mdi-tag-multiple menu-icon"></i>
        </a>
        <div class="collapse" id="table-manage-collapse">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{route('showListTable')}}">Danh sách bàn</a></li>
          </ul>
        </div>
      </li>
      {{-- Quản lý menu --}}
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#menu-manage-collapse" aria-expanded="false" aria-controls="menu-manage-collapse">
          <span class="menu-title">Quản lý menu</span>
          <i class="menu-arrow"></i>
          <i class="mdi mdi-nutrition menu-icon"></i>
        </a>
        <div class="collapse" id="menu-manage-collapse">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"><a class="nav-link" href="{{route('showListMenu')}}">Danh sách món ăn</a></li>
          </ul>
        </div>
      </li>
      {{-- Quản lý loại món --}}
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#menu-type-manage-collapse" aria-expanded="false" aria-controls="menu-type-manage-collapse">
          <span class="menu-title">Quản lý loại món</span>
          <i class="menu-arrow"></i>
          <i class="mdi mdi-format-list-bulleted-type menu-icon"></i>
        </a>
        <div class="collapse" id="menu-type-manage-collapse">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{route('showListType')}}">Danh sách loại món</a></li>
          </ul>
        </div>
      </li>
      {{-- Quản lý người dùng --}}
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#user-manage-collapse" aria-expanded="false" aria-controls="user-manage-collapse">
          <span class="menu-title">Quản lý người dùng</span>
          <i class="menu-arrow"></i>
          <i class="mdi mdi-contacts menu-icon"></i>
        </a>
        <div class="collapse" id="user-manage-collapse">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{route('showListUser')}}">Danh sách người dùng</a></li>
          </ul>
        </div>
      </li>
      {{-- Quản lý tài khoản --}}
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#user-profile-collapse" aria-expanded="false" aria-controls="user-profile-collapse">
          <span class="menu-title">Quản lý tài khoản</span>
          <i class="menu-arrow"></i>
          <i class="mdi mdi-account-settings menu-icon"></i>
        </a>
        <div class="collapse" id="user-profile-collapse">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{route('showUserProfile')}}"> Thông tin cá nhân </a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('showChangePassword')}}"> Thay đổi mật khẩu </a></li>
          </ul>
        </div>
      </li>

    </ul>
  </nav>
