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
        var findSelected  = selected
        if (selected == 'Tất cả'){
            findSelected = '';
        }
        SearchByString(findSelected,'UserListTable');
        $('#sortUserByRole').html(selected);
    });
  });






