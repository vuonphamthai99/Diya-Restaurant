
const originLocation = [10.0111,105.7688]
const originCity = "Cần Thơ"
const feeShipPerKm = 10000
const csrf = $('meta[name="csrf-field"').attr('content')

// const originLocation = [41.0772, 73.4687]
// const testLocation = [41.1792, 73.1894]
$( function() {
    $('.back-to-top').slideUp();
    $('.show-cart').slideUp();

    $( "#date" ).datepicker();
    $('#time').timepicker({
        timeFormat: 'h:mm p',
    interval: 60,
    minTime: '8',
    maxTime: '09:00pm',
    defaultTime: '8',
    startTime: '08:00',
    dynamic: false,
    dropdown: true,
    scrollbar: true
    });


    var cartItem =[]
    $.ajax({
        url: "fetchCartData",
        type: "POST",
        headers: {
            'X-CSRF-TOKEN': csrf
        },
        success:function(data){
            // console.log("success")
            cartItem = data

            let total = 0
            // console.log(cartItem)
            if(cartItem.length != 0)
            {
                $('.cart-item-quantity p').html(cartItem.length)
                $.each(cartItem,function(i,val){
                    total += cartItem[i].price * cartItem[i].quant

                    let item = `<tr class="item-tr" idItem="${cartItem[i].id}" nameItem="${cartItem[i].name}">
                        <th scope="row">${cartItem[i].name}</th>
                        <td>${cartItem[i].price}</td>
                        <td class="quant-input"><input class="page-input cart-quant-input" value="${cartItem[i].quant}" min="1" type="number" name="" ></td>
                        <td><button class="delete-item page-btn"> Xóa </button></td>
                    </tr>`
                    $('#cart tbody').append(item)

                })

                 setCartTotal(total)
                 total = 0
                 $(".cart-quant-input").on('change', function () {
                    let id = $(this).parent().parent().attr('iditem');
                    let newQuant = $(this).val();
                    $('.item-tr[iditem="'+id+'"]').children('.quant-input').children('.cart-quant-input').val(newQuant)

                    // $('.cart-quant-input').parent().parent().attr('iditem',id).val(newQuant)
                    $.each(cartItem,function(i,val){
                        if(val.id == id){
                             cartItem[i].quant =newQuant
                             toastSuccess('Cập nhật thành công')
                         }
                         total += cartItem[i].price * cartItem[i].quant

                     })
                     setCartTotal(total)
                     total = 0
                     storeCartData(cartItem)
                     return false;
                })
                $(".delete-item").click(function(){
                    let delID = $(this).parent().parent().attr('iditem');
                    let delItem = $(this).parent().parent().attr('nameItem');

                    alertify.confirm("Bạn có muốn xóa "+delItem+".",
                    function(){
                        $.each(cartItem,function(i,val){
                            if(val.id == delID){
                                 cartItem.splice(i,1);
                                 $('.item-tr[iditem="'+delID+'"]').remove()
                                 toastSuccess('Cập nhật thành công')
                                 $.each(cartItem,function(i,val){
                                    total += cartItem[i].price * cartItem[i].quant
                                 })
                                 setCartTotal(total)
                                 total = 0;
                                 return false;
                             }
                         })

                         $('.cart-item-quantity p').html(cartItem.length)
                     storeCartData(cartItem)


                    },
                    function(){

                    }).set({title:"Xác nhận xóa?"}).set({labels:{ok:'Xác nhận', cancel: 'Hủy'}});;

                })

            }else{
                cartItem =[]

            }
            // window.location.href = '/guest-page/checkout';
        },
        error:function(e){
            // toastError('Đăng nhập để đặt món!');
        }
    })


    $('.show-cart').click(function(){

        $('#cart-modal').modal('toggle')
    })

    $('.place-order').click(function(e){
        e.preventDefault();
        console.log(cartItem)
        let check = false;
        let total = 0;
        let id = $(this).attr('iditem');
        let name = $(this).attr('nameitem');
        let price = $(this).attr('priceitem');
        $.each(cartItem,function(i,val){
           if(val.id == id){
                cartItem[i].quant++;
                check = true
                toastSuccess('Đã thêm 1 '+name+' vào giỏ hàng!')
            }
        })
        if(check){
            $.each(cartItem,function(i,val){
                total += cartItem[i].price * cartItem[i].quant
             })
             setCartTotal(total)
            return false;
        }
        cartItem.push({'id':id,'name':name,'price':price,'quant': 1})
        $('.cart-item-quantity p').html(cartItem.length)
        let item = `<tr class="item-tr" idItem="${id}" nameItem="${name}">
        <th scope="row">${name}</th>
        <td>${price}</td>
        <td class="quant-input"><input class="page-input cart-quant-input" value="1" min="1" type="number" name="" ></td>
        <td><button class="delete-item page-btn"> Xóa </button></td>
      </tr>`
        $('#cart tbody').append(item)
        $.each(cartItem,function(i,val){
            total += cartItem[i].price * cartItem[i].quant
         })
         setCartTotal(total)
         total = 0
        toastSuccess(name+' đã thêm vào giỏ hàng!, Vui lòng kiểm tra giỏ hàng')
        $(".cart-quant-input").on('change', function () {
            let id = $(this).parent().parent().attr('iditem');
            let newQuant = $(this).val();
            $('.item-tr[iditem="'+id+'"]').children('.quant-input').children('.cart-quant-input').val(newQuant)
            $.each(cartItem,function(i,val){
                if(val.id == id){
                     cartItem[i].quant =newQuant

                    //  toastSuccess('Cập nhật thành công')
                 }
                 total += cartItem[i].price * cartItem[i].quant

             })
             setCartTotal(total)
             total = 0
             storeCartData(cartItem)
             return false;
        })
        $(".delete-item").click(function(){
            let delID = $(this).parent().parent().attr('iditem');
            let delItem = $(this).parent().parent().attr('nameItem');

            alertify.confirm("Bạn có muốn xóa "+delItem+".",
            function(){
                $.each(cartItem,function(i,val){
                    if(val.id == id){
                         cartItem.splice(i,1);
                         $('.item-tr[iditem="'+delID+'"]').remove()
                         toastSuccess('Cập nhật thành công')
                         $.each(cartItem,function(i,val){
                            total += cartItem[i].price * cartItem[i].quant
                         })
                         setCartTotal(total)
                         total = 0;
                         return false;
                     }
                 })
                 storeCartData(cartItem)

                 $('.cart-item-quantity p').html(cartItem.length)

            },
            function(){

            }).set({title:"Xác nhận xóa?"}).set({labels:{ok:'Xác nhận', cancel: 'Hủy'}});;

        })
        return false;

    })


    $('#confirm-order').click(function(){

        if(cartItem.length == 0){
            toastError('Vui lòng chọn món ăn')
            return false;
        }
        $.ajax({
            url: "storeCartData",
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': csrf
            },
            data: {cartItem},
            success:function(data){
                // console.log('success')
                window.location.href = '/guest-page/guestCheckout';
            },
            error:function(e){
                toastError('Đăng nhập để đặt món!');
            }
        })
    })


    function storeCartData(cartItem){

        $.ajax({
            url: "storeCartData",
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': csrf
            },
            data: {cartItem},
            success:function(){
                console.log('success')
                // window.location.href = '/guest-page/guestCheckout';
            },
            error:function(e){
                toastError('Đăng nhập để đặt món!');
            }
        })
      }
  });




  function setCartTotal(total){
    $('.cart-total').html('Thành tiền:  '+total+' VND')
  }

  // Add address function

  $("#add-address-btn").click(function(){
    $('#address-modal').modal('toggle')
    $("#check-address").click(function(){
        let address = $('#address-input').val();
        if(address == ''){
            alertifyAlert("Bạn chưa nhập địa chỉ!")
            return false;
        }
        let street = (address.toString()).replace(/ /g, '+');
        $.ajax({
            url: "https://nominatim.openstreetmap.org/",
            type: "GET",
            data: {
                addressdetails: 1,
                street : street,
                city :  originCity,
                format: 'json',
                limit : 1
            },
            success:function(data){
                if(data.length == 0){
                    alertifyAlert("Địa chỉ không đúng. Địa chỉ hợp lệ gồm\"Số nhà + Tên đường (Bằng chữ)\" ")
                    return false;
                }
                if(data[0].address.road == null){
                    alertifyAlert("Không tìm thấy đường này! hãy thử lại. Địa chỉ hợp lệ gồm\"Số nhà + Tên đường (Bằng chữ)\" ")
                    return false;
                }
                // if(data[0].address.ISO3166-2-lvl4 != 'VN-CT'){
                //     alertifyAlert("Không tìm thấy đường này! hãy thử lại. Địa chỉ hợp lệ gồm\"Số nhà + Tên đường (Bằng chữ)\" ")
                //     return false;
                // }

                let destination = [Number(parseFloat(data[0].lat).toFixed(4)),Number(parseFloat(data[0].lon).toFixed(4))]
                let addressDistance =Math.ceil(distance(originLocation,destination))
                let feeShip = (addressDistance * feeShipPerKm)
                if(addressDistance>10){
                    alertifyAlert("Hiện chỉ giao hàng trong bán kính 10 Km!")
                    return false;
                }
                feeShip < 20000 ? feeShip = 20000 : feeShip
                console.log(data)
                let confirmedAddress = data[0].address.road
                console.log(confirmedAddress.toString())
                $('#address-input').val(confirmedAddress)
                $('#distance-input').val(addressDistance)
                $('#feeShip-input').val(feeShip)
                $('#suburb-input').val(data[0].address.suburb)
                $('#district-input').val(data[0].address.district)

            },
            error:function(e){
                console.log('không được')
            }
        })
      })


  })








  function distance(origin, destination) {
    var a, c, d, dlat, dlon, lat1, lat2, lon1, lon2, radius;
    [lat1, lon1] = origin;
    [lat2, lon2] = destination;
    radius = 6371;
    dlat = toRadians(lat2 - lat1);
    dlon = toRadians(lon2 - lon1);
    a = Math.sin(dlat / 2) * Math.sin(dlat / 2) + Math.cos(toRadians(lat1)) * Math.cos(toRadians(lat2)) * Math.sin(dlon / 2) * Math.sin(dlon / 2);
    c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
    d = radius * c;
    return d;
  }
  function toRadians (angle) {
    return angle * (Math.PI / 180);
  }

  function alertifyAlert (message) {
    alertify.alert(message, function(){
                    }).set({title:"Thông báo!"})
  }

  function toastError(message){
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
function toastSuccess(message){
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

