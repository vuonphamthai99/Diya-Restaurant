const defaultImage = 'http://localhost/dashboard-template/assets/images/blank.jpg'
const defaultLink = 'http://localhost/images/menu/'
var csrf = $('meta[name="csrf-field"').attr('content')
$('input.price').on('input', function (e) {
    $(this).val(formatCurrency(this.value.replace(/[,VNĐ]/g, '')));
}).on('keypress', function (e) {
    if (!$.isNumeric(String.fromCharCode(e.which))) e.preventDefault();
}).on('paste', function (e) {
    var cb = e.originalEvent.clipboardData || window.clipboardData;
    if (!$.isNumeric(cb.getData('text'))) e.preventDefault();
});
function formatCurrency(number) {
    var n = number.split('').reverse().join("");
    var n2 = n.replace(/\d\d\d(?!$)/g, "$&,");
    return n2.split('').reverse().join('') + 'VNĐ';
}
function formatNumber(nStr, decSeperate, groupSeperate) {
    nStr += '';
    x = nStr.split(decSeperate);
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + groupSeperate + '$2');
    }
    return x1 + x2;
}

$('.price').text(formatNumber(700000, '.', ','))


$(document).ready(function () {

    var csrf = $('meta[name="csrf-field"]').attr('content')

    $("button[data-dismiss='modal']").on('click', function () {
        $('.modal').modal('hide')
    })
    var $mySelect = $('select').selectize({
        sortField: 'text'
    });

    $('.table thead tr')
        .clone(true)
        .addClass('filters')
        .appendTo('.table thead');

    var table = $('.table').DataTable({
        language: {
            url: 'https://cdn.datatables.net/plug-ins/1.12.1/i18n/vi.json'
        },
        orderCellsTop: true,
        fixedHeader: true,
        initComplete: function () {
            var api = this.api();

            // For each column
            api
                .columns()
                .eq(0)
                .each(function (colIdx) {
                    // Set the header cell to contain the input element
                    var cell = $('.filters th').eq(
                        $(api.column(colIdx).header()).index()
                    );
                    var title = $(cell).text();
                    $(cell).html(`<input type="text" style="width: 100% !important;" class="form-control" placeholder="${$.trim(title)}" aria-label="${$.trim(title)}" aria-describedby="basic-addon2">`);

                    // On every keypress in this input
                    $(
                        'input',
                        $('.filters th').eq($(api.column(colIdx).header()).index())
                    )
                        .off('keyup change')
                        .on('change', function (e) {
                            // Get the search value
                            $(this).attr('title', $(this).val());
                            var regexr = '({search})'; //$(this).parents('th').find('select').val();

                            var cursorPosition = this.selectionStart;
                            // Search the column for that value
                            api
                                .column(colIdx)
                                .search(
                                    this.value != ''
                                        ? regexr.replace('{search}', '(((' + this.value + ')))')
                                        : '',
                                    this.value != '',
                                    this.value == ''
                                )
                                .draw();
                        })
                        .on('keyup', function (e) {
                            e.stopPropagation();

                            $(this).trigger('change');
                            $(this)
                                .focus()[0]
                                .setSelectionRange(cursorPosition, cursorPosition);
                        });
                });
        },
    });


    //add user selector
    $('#role-selector').children('.dropdown-item').on('click', function () {
        $('#user-role').val($(this).html().toString())
        $('#user-role-selected').val($(this).attr('idRole'))
    })



    // Order functions
    var idTable = 0;
    var Status
    var total = 0;
    var Table_picked
    var idMenu = 0;
    $('#confirmOrder').click(notEnoughData)

    $('.my-table').on('click', function () {
        $('#order-btn').removeClass('btn-gradient-secondary').addClass('btn-gradient-primary')
        $('#checkout-btn').removeClass('btn-gradient-secondary').addClass('btn-gradient-primary')
        $('#table-view-order').DataTable().rows().remove().draw();
        $('#total-money').html('0,000VNĐ')

        if ($(this).attr('idTable') == idTable) {
            $('#order-btn').addClass('btn-gradient-secondary').removeClass('btn-gradient-primary')
            $('#checkout-btn').addClass('btn-gradient-secondary').removeClass('btn-gradient-primary')
            $(this).attr('style', '')
            $('#table-picked').html('Chọn bàn để xem')
            $('#total-money').html('0,000VNĐ')
            resetOrder();
            idTable = 0;
            Status = 0;
            return false;
        }

        Table_picked = $(this).attr('tablecode');
        idTable = $(this).attr('idTable');
        Status = $(this).attr('Status');
        $('#table-picked').html('Các món của bàn ' + Table_picked)

        $(this).css('background', 'linear-gradient(89deg, #5e7188, #3e4b5b)');
        $('.my-table').not(this).attr('style', '')
        if (Status == 1) {
            $('#order-btn').addClass('btn-gradient-secondary').removeClass('btn-gradient-primary')
            $('#checkout-btn').addClass('btn-gradient-secondary').removeClass('btn-gradient-primary')
            idTable = 0;
            $.toast({
                text: "Bàn đã bị khóa!", // Text that is to be shown in the toast
                heading: 'Lỗi!', // Optional heading to be shown on the toast
                icon: 'error', // Type of toast icon
                showHideTransition: 'fade', // fade, slide or plain
                allowToastClose: true, // Boolean value true or false
                hideAfter: 3000, // false to make it sticky or number representing the miliseconds as time after which toast needs to be hidden
                stack: 5, // false if there should be only one toast at a time or a number representing the maximum number of toasts to be shown at a time
                position: 'top-right', // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values



                textAlign: 'left',  // Text alignment i.e. left, right or center
                loader: true,  // Whether to show loader or not. True by default
                loaderBg: '#9EC600',  // Background color of the toast loader
            });
            $(this).removeClass('btn-secondary');

            return false;
        }
        if (Status == 2 || Status == 3) {
            getOrderDetails(idTable)

        }


    })


    $('#order-btn').on('click', function () {
        if (!idTable) {
            $.toast({
                text: "Chọn bàn để thao tác!", // Text that is to be shown in the toast
                heading: 'Lỗi!', // Optional heading to be shown on the toast
                icon: 'error', // Type of toast icon
                showHideTransition: 'fade', // fade, slide or plain
                allowToastClose: true, // Boolean value true or false
                hideAfter: 3000, // false to make it sticky or number representing the miliseconds as time after which toast needs to be hidden
                stack: 5, // false if there should be only one toast at a time or a number representing the maximum number of toasts to be shown at a time
                position: 'top-right', // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values



                textAlign: 'left',  // Text alignment i.e. left, right or center
                loader: true,  // Whether to show loader or not. True by default
                loaderBg: '#9EC600',  // Background color of the toast loader
            });
            return false

        }
        $('#OrderModal').modal('toggle')
    });

    $('#checkout-btn').click(function () {
        if (!idTable) {
            $.toast({
                text: "Chọn bàn để thao tác!", // Text that is to be shown in the toast
                heading: 'Lỗi!', // Optional heading to be shown on the toast
                icon: 'error', // Type of toast icon
                showHideTransition: 'fade', // fade, slide or plain
                allowToastClose: true, // Boolean value true or false
                hideAfter: 3000, // false to make it sticky or number representing the miliseconds as time after which toast needs to be hidden
                stack: 5, // false if there should be only one toast at a time or a number representing the maximum number of toasts to be shown at a time
                position: 'top-right', // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values



                textAlign: 'left',  // Text alignment i.e. left, right or center
                loader: true,  // Whether to show loader or not. True by default
                loaderBg: '#9EC600',  // Background color of the toast loader
            });
            return false
        }
        if (Status != 2) {
            $.toast({
                text: "Bàn chưa gọi món!", // Text that is to be shown in the toast
                heading: 'Lỗi!', // Optional heading to be shown on the toast
                icon: 'error', // Type of toast icon
                showHideTransition: 'fade', // fade, slide or plain
                allowToastClose: true, // Boolean value true or false
                hideAfter: 3000, // false to make it sticky or number representing the miliseconds as time after which toast needs to be hidden
                stack: 5, // false if there should be only one toast at a time or a number representing the maximum number of toasts to be shown at a time
                position: 'top-right', // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values



                textAlign: 'left',  // Text alignment i.e. left, right or center
                loader: true,  // Whether to show loader or not. True by default
                loaderBg: '#9EC600',  // Background color of the toast loader
            });
            return false
        }
        $.ajax({
            url: "checkout",
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': csrf
            },
            data: {
                'idTable': idTable
            },
            success: function () {
                $('.my-table[idtable="' + idTable + '"]').attr('status', 0)
                $('.my-table[idtable="' + idTable + '"]').attr('style', '')
                $('.my-table[idtable="' + idTable + '"]').removeClass('btn-warning').addClass('btn-primary')
                $('.my-table[idtable="' + idTable + '"] p').html('Trống')
                $('#total-money').html('0,000VNĐ')
                Status = 0;
                idTable = 0;
                $('#table-view-order').DataTable().rows().remove().draw();
                resetOrder();
                toastSuccess('Thanh toán thành công')
            },
            error: function () {
                toastError('Hệ thống bị lỗi, thử lại sau!')
            }
        })
    })






    $('#OrderModal').on('hidden.bs.modal', function (e) {
        resetOrder()
    })
    $('#selectTypeMenu').on('change', function (e) {
        $('#selectOrder')[0].selectize.clearOptions();
        $('#selectOrder')[0].selectize.clear();

        // $("#optionNetFlow")[0].selectize.clear();

        let idType = $(this).val()
        $.ajax({
            url: "fetchMenuData",
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': csrf
            },
            data: {
                'idType': idType
            },
            success: function (data) {

                $.each(data, function (i, val) {
                    let $select = $('#selectOrder').selectize();
                    let selectize = $select[0].selectize;
                    selectize.addOption({ value: val.id, text: val.name });
                    selectize.refreshOptions();
                });
                $('#selectOrder').on('change', function () {
                    idMenu = $(this).val();

                    $.each(data, function (i, val) {
                        if (val.id == idMenu) {
                            $('#previewOrder').attr('src', defaultLink + val.img)
                            return false
                        }
                    })
                    $('#orderQuant').on('change', function () {
                        let quant = $(this).val()
                        if (quant < 1) {
                            return false
                        }
                        $('#confirmOrder').off('click').on('click', function (e) {
                            e.preventDefault();
                            if (idMenu == 0) {
                                notEnoughData()

                            }
                            $.ajax({
                                url: "addOrder",
                                type: "POST",
                                headers: {
                                    'X-CSRF-TOKEN': csrf
                                },
                                data: {
                                    'idMenu': idMenu,
                                    'idTable': idTable,
                                    'quant': quant,
                                    'Status': Status
                                },
                                success: function (data) {

                                    $('.my-table[idtable="' + idTable + '"]').attr('status', 2)
                                    Status = 2;
                                    $('.my-table[idtable="' + idTable + '"]').addClass('btn-warning').removeClass('btn-primary')
                                    $('.my-table[idtable="' + idTable + '"] p').html('Có khách')

                                    getOrderDetails(idTable)
                                    resetOrder()
                                    $('#OrderModal').modal('toggle')
                                    toastSuccess('Thêm thành công')

                                }
                            })
                            idMenu = 0;

                        })
                    });


                })
            },
            error: function () {
                console.log('fail')
            }
        })

    });

    function resetOrder() {
        $('#selectOrder')[0].selectize.clearOptions();
        $('#selectTypeMenu')[0].selectize.clear();
        $('#previewOrder').attr('src', defaultImage)
        $('#orderQuant').val('')
        // $('#total-money').html('0,000VNĐ')


        total = 0;
    }


    function notEnoughData() {
        $.toast({
            text: "Chọn đủ thông tin!", // Text that is to be shown in the toast
            heading: 'Lỗi!', // Optional heading to be shown on the toast
            icon: 'error', // Type of toast icon
            showHideTransition: 'fade', // fade, slide or plain
            allowToastClose: true, // Boolean value true or false
            hideAfter: 3000, // false to make it sticky or number representing the miliseconds as time after which toast needs to be hidden
            stack: 5, // false if there should be only one toast at a time or a number representing the maximum number of toasts to be shown at a time
            position: 'top-right', // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values



            textAlign: 'left',  // Text alignment i.e. left, right or center
            loader: true,  // Whether to show loader or not. True by default
            loaderBg: '#9EC600',  // Background color of the toast loader
        });
    }
    //------------------------------------------------------------------------------------------------------------------------

    // Chi tiết Order
    // $('#order-details-btn').click(function(){
    //     $('#OrderDetailsModal').modal('toggle')
    // })

    //------------------------------------------------------------------------------------------------------------------------

    function getPrice(str) {
        return parseInt(str.replace(/[^0-9.]/g, ""))
    }

    function toastError(message) {
        $.toast({
            text: message, // Text that is to be shown in the toast
            heading: 'Lỗi!', // Optional heading to be shown on the toast
            icon: 'error', // Type of toast icon
            showHideTransition: 'fade', // fade, slide or plain
            allowToastClose: true, // Boolean value true or false
            hideAfter: 3000, // false to make it sticky or number representing the miliseconds as time after which toast needs to be hidden
            stack: 5, // false if there should be only one toast at a time or a number representing the maximum number of toasts to be shown at a time
            position: 'top-right', // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values



            textAlign: 'left',  // Text alignment i.e. left, right or center
            loader: true,  // Whether to show loader or not. True by default
            loaderBg: '#9EC600',  // Background color of the toast loader
        });
    }
    function toastSuccess(message) {
        $.toast({
            text: message, // Text that is to be shown in the toast
            heading: 'Thành công!', // Optional heading to be shown on the toast
            icon: 'success', // Type of toast icon
            showHideTransition: 'fade', // fade, slide or plain
            allowToastClose: true, // Boolean value true or false
            hideAfter: 3000, // false to make it sticky or number representing the miliseconds as time after which toast needs to be hidden
            stack: 5, // false if there should be only one toast at a time or a number representing the maximum number of toasts to be shown at a time
            position: 'top-right', // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values



            textAlign: 'left',  // Text alignment i.e. left, right or center
            loader: true,  // Whether to show loader or not. True by default
            loaderBg: '#9EC600',  // Background color of the toast loader
        });
    }
    function getOrderDetails(idTable) {
        $.ajax({
            url: "getOrderDetails",
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': csrf
            },
            data: {
                'idTable': idTable
            },
            success: function (data) {
                if (data == false) {
                    $('.my-table[idtable="' + idTable + '"]').attr('status', 0)
                    $('.my-table[idtable="' + idTable + '"]').removeClass('btn-warning').addClass('btn-primary')
                    $('.my-table[idtable="' + idTable + '"] p').html('Trống')

                }
                $('#table-view-order').DataTable().rows().remove().draw();
                $.each(data, function (i, val) {
                    total += (val.menuPrice) * val.quantity
                    let html = `<tr>
                                <td>${val.menuName}</td>
                                <td > ${val.quantity}</td>
                                <td>${formatCurrency(val.menuPrice.toString())}</td>
                                <td><button type="button" idDetail="${val.id}" class="delete-detail btn btn-fw btn-danger">Xóa món</button></td>
                            </tr>`
                    // $('#table-view-order').append(html)
                    $('#table-view-order').DataTable().row.add($(html).get(0)).draw()
                    // $('#table-view-order tbody').append(html)
                })
                $('.delete-detail').click(function () {
                    let idDetail = $(this).attr('idDetail');
                    deleteDetail(idDetail);
                })
                $('#total-money').text(formatCurrency(total.toString()))
            },
            error: function (e) {
                console.log('ajax fails')
            }
        })
    }

    function deleteDetail(idDetail) {
        $.ajax({
            url: "deleteDetail/" + idDetail,
            type: "GET",
            data: {},
            success: function () {
                getOrderDetails(idTable);
            },
            error: function (e) {
                console.log('ajax fails')
            }
        })
    }


    //----------------------------------------------------------------
    // Online Order Management
    $(".delete-order").on("click", function (event) {
        event.preventDefault();
        let link = $(this).attr('href');
        alertify.confirm("This is an alert dialog?", function (e) {
            if (e) {
                $("#category-form").submit();
                alertify.success("Category was saved.")
                window.location = link;
            } else {
                alertify.error("Category not saved.");
                return false;
            }
        });
    });

});

