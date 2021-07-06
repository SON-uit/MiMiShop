
function cartdropdown(id){
    $(document).ready(function () {
        $.ajax({
            type: "GET",
            url: "http://localhost/webshop/public/AddCart/"+id,
            data: "",
            dataType: "html",
            success: function (response) {
               RenderCart(response);
            }
        });
        $("#scroll-header").addClass("onscroll-header");
    });
    
}
//xoa san pham o cart
$(document).ready(function () {
    $("#change-item-cart").on("click",'.delete-icon i', function () {
        $.ajax({
                type: "GET",
                url: "http://localhost/webshop/public/DeleteCart/"+$(this).data('icon'),
                data: "",
                dataType: "html",
                success: function (response) {
                    RenderCart(response);          
                }
            }); 
    });
});
function RenderCart(response){
    $("#change-item-cart").empty();
    $("#change-item-cart").html(response);
    $("#cart-dropdown").toggleClass("dropdown-cart-items");    
    $("#total-quanty-show").html($("#total-quanty-cart").html()); 
     if($('.body-cart').height() > 300){
        $('.body-cart').css({'height':'300','overflow-y':'scroll','overflow-x':'hidden'});
    }  
}
//toogle cart
$(document).ready(function () {
   $("#cart-icon").click(function (e) { 
       e.preventDefault();
      $("#cart-dropdown").toggleClass("dropdown-cart-items");
   });
});
//toogle loginform
$(document).ready(function () {
    $("#user-icon").click(function (e) { 
        e.preventDefault();
        $("#login-card").toggleClass("dropdown-login-form");
    });
});
//searchProduct
$(document).ready(function () {
    $("#search-product").click(function(e){
         e.preventDefault();
        let productName= ($('.typeahead').val().replace(/\s/g, '-'));
        if(productName){
         $.ajax({
            type: "GET",
            url: 'http://localhost/webshop/public/searchProduct',
            data: {name:productName},
            dataType: "json",
            success: function (data) {
                location.href = 'http://localhost/webshop/public/product/'+data[0].slug; 
                ($('.typeahead').val(''));
            }
        }); 
        }
    })
});
$(document).ready(function () {
    if($('.body-cart').height() > 300){
        $('.body-cart').css({'height':'300','overflow-y':'scroll','overflow-x':'hidden'});
    }
});




