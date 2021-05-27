
$(document).ready(function () {
    let categories= [];
    $('input[name="price-classify[]"]').change(function (e) { 
        e.preventDefault();
    /*     categories =[];
        if(check==true){
            $(this).prop('checked',true);
            check=false
        }else{
            $(this).prop('checked',false);
            check=true;
        }
        if($(this).is(':checked')){
        $('input[name="price-classify[]"]:checked').each(function(){
           categories.push($(this).val());
        }) */
        categories =[];
        let typeproduct = $("#type").attr("value");
        $('input[name="price-classify[]"]:checked').each(function(){
           categories.push($(this).val());
        })
        $.get("http://localhost/webshop/public/price-classify", {categories:categories,type:typeproduct},
            function (data) {
                $(".pricesort").empty();   
                for(let items of data){
                    let divpos = $("<div class='col-md-3'></div>").appendTo(".pricesort");
                    let card = $("<div class='card'></div>").appendTo(divpos)
                    let imgpos =$("<div class='col-md-12'></div>").appendTo(card)
                    let achor = $("<a></a>").attr("href","http://localhost/webshop/public/product/"+items.slug).appendTo(imgpos)
                    let img = $("<img>").attr("src","images/products/store/"+items.image+"")
                    .attr("alt",items.name)
                    .attr("width","100%")
                    .appendTo(achor)
                    let body =$("<div class='card-body'></div>").appendTo(card) 
                    let productName = $("<p></p>").text(items.name).addClass('pro-name').appendTo(body)
                    let productPrice = $("<p></p>").text(items.price).addClass('pro-price').appendTo(body)
                    let button = $("<button></button>")
                    .attr('type',"submit").addClass('btn btn-outline-danger').appendTo(card);
                    let clickeve = $("<a></a>")
                    .attr("onclick","cartdropdown("+items.id+")")
                    .attr('href',"javascript:")
                    .text("Thêm vào giỏ hàng")
                    .appendTo(button) 
                }     
            },
            
        );
        
    });
});