$(document).ready(function(){
    // Tìm thông tin trong bảng
    $("#searchUserInput").on("keyup", function() {
        SearchByInputTable('searchUserInput','UserListTable');
    });
    // Hiện modal thêm user
    $("#addNewUser").click(function(){
        $('#addNewUserModal').modal('toggle');
    })
    // Lọc theo vai trò người dùng
    $("a.dropdown-item").click(function(){
        var selected = $(this).text();
        if (selected == 'Tất cả'){
            selected = '';
        }
        SearchByString(selected,'UserListTable');
    });
  });






