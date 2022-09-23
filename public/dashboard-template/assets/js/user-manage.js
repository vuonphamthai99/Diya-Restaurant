$(document).ready(function(){
    // Tìm thông tin trong bảng
    $("#searchUserInput").on("keyup", function() {
        SearchTable('searchUserInput','UserListTable');
    });
    // Hiện modal thêm user
    $("#addNewUser").click(function(){
        $('#addNewUserModal').modal('toggle');
    })
    // Lọc theo vai trò người dùng
    $("a.dropdown-item").click(function(){
        var selected = $(this).text();
        console.log(selected);
    });
  });






