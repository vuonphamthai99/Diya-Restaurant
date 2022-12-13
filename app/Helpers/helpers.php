<?php

if (!function_exists('MyCheckStatus')) {
    function MyCheckStatus($status){
        switch ($status) {
            case 0:
              return 'Trống';
              break;
            case 1:
                return 'Bị khóa';
                break;
            case 2:
              return 'Có khách';
              break;
            case 3:
                return 'Đặt trước';
                break;
            default:
              return 'Trạng thái không đúng định dạng';
          }
    }
}

if (!function_exists('MyCheckReservationStatus')) {
    function MyCheckReservationStatus($status){
        switch ($status) {
            case 0:
              return 'Chờ';
              break;
            case 1:
                return 'Đã xác nhận';
                break;
            case 2:
              return 'Từ chối';
              break;
            default:
              return 'Trạng thái không đúng định dạng';
          }
    }
}
if (!function_exists('MyCheckOnlineOderStatus')) {
    function MyCheckOnlineOderStatus($status){
        switch ($status) {
            case 0:
              return 'Đã tiếp nhận';
              break;
            case 1:
                return 'Đang giao';
                break;
            case 2:
              return 'Đang yêu cầu hủy';
              break;
            case 3:
              return 'Đã giao';
            case 4:
              return 'Bị hủy';
              break;
            default:
              return 'Trạng thái không đúng định dạng';
          }
    }
}

if (!function_exists('CheckStockStatus')) {
  function CheckStockStatus($status){
      switch ($status) {
          case 0:
            return 'Còn';
            break;
          case 1:
              return 'Hết';
              break;
          default:
            return 'Trạng thái không đúng định dạng';
        }
  }
}

if (!function_exists('checkReservation')) {
  function checkReservation($status){
      switch ($status) {
          case 0:
            return 'Đã tiếp nhận';
            break;
          case 1:
              return 'Đã xác nhận';
              break;
          case 2:
              return 'Đã hủy';
              break;
          default:
            return 'Trạng thái không đúng định dạng';
        }
  }
}
if (!function_exists('format_vnd')) {
  function format_vnd($money){
    return number_format($money, 0, ',', ',') . "VNĐ";
  }
}
?>
