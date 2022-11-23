<?php

if (!function_exists('MyCheckTableStatus')) {
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
?>
