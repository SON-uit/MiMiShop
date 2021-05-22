function DeleteListItemCart(id){
    console.log(id);
    $(document).ready(function () {
        $.ajax({
            type: "GET",
            url: "http://localhost/webshop/public/DeleteListCart/"+id,
            data: "",
            dataType: "html",
            success: function (response) {
              RenderListCart(response);
               
            }
        });
    });
}
function RenderListCart(response){
    $("#list-cart").empty();
    $("#list-cart").html(response);
}
$(document).ready(function () {
    $(".qtyminus").click(function (e) { 
        e.preventDefault();
        var count = parseInt($(this).parent().find('input').val())
        var id = parseInt($(this).parent().find('input').attr('id'));
        if(!isNaN(count)){
            count--
            count =count < 1 ? 1 : count;
            $(this).parent().find('input').val(count);
            EditListCart(id,count);
        }
        else{
            input.val(1);
        }  
    });
});
$(document).ready(function () {
    $(".qtyplus").click(function (e) { 
        e.preventDefault();
        var count = parseInt($(this).parent().find('input').val())
        var id = parseInt($(this).parent().find('input').attr('id'));
        if(!isNaN(count)){
            count++;
            count =count > 100 ? 1 : count;
            $(this).parent().find('input').val(count);
            EditListCart(id,count);
        }
        else{
            input.val(1);
        }  
    });
});
function EditListCart(id,quanty){
   $.ajax({
       type: "GET",
       url: "http://localhost/webshop/public/EditListCart/"+id+'/'+quanty,
       data: "",
       dataType: "html",
       success: function (response) {
           $("#list-cart").empty();
           $("#list-cart").html(response);
       }
   });
}