
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
}
$(document).ready(function () {
   $("#cart-icon").click(function (e) { 
       e.preventDefault();
      $("#cart-dropdown").toggleClass("dropdown-cart-items");
   });
});
$(document).ready(function () {
    $("#user-icon").click(function (e) { 
        e.preventDefault();
        $("#login-card").toggleClass("dropdown-login-form");
    });
});
/// typeahead
/* var path ="{{ route('autocomplete') }}";
    $("input .typeahead").typeahead({
   source: function(terms,process){
       return $.get(path,{terms:terms},function (data) {
               return process(data);
       });
    }
}); */
$(document).ready(function () {
    $("#test").hover(function () {
          var link = ( $(this).data('link'));
          $(this).attr("href","http://localhost/webshop/public/collection/"+link);        
    });
});


