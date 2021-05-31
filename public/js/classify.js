
$(document).ready(function () {
    let categories= [];
    $('input[name="price-classify[]"]').change(function (e) { 
        e.preventDefault();
        categories =[];
        if(categories.length===0){
            let temp ={};
            temp.min='0';
            temp.max='1000000000';
            categories.push(temp);
        }
        let typeproduct = $("#type").attr("value");
        $('input[name="price-classify[]"]:checked').each(function(){
            let temp ={};
            temp.min=($(this).attr('data-min'));
            temp.max=($(this).attr('data-max'));
            categories.push(temp);
        })
        $.get("http://localhost/webshop/public/price-classify", {categories:categories,type:typeproduct},
            function (data) {
                 if(data ==='1'){
                    $(".pricesort").empty(); 
                    let createP = $("<h4></h4>").text("Không tìm thấy kết quả").appendTo('.pricesort').css('margin-left','30px');
                }else{
                 $(".pricesort").empty();   
                 
                for(let items of data){
                    let currency =(new Intl.NumberFormat('en-US').format(items.price));
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
                    let productPrice = $("<p></p>").text(currency+'đ').addClass('pro-price').appendTo(body)
                    let button = $("<button></button>")
                    .attr('type',"submit").addClass('btn btn-outline-danger').appendTo(card);
                    let clickeve = $("<a></a>")
                    .attr("onclick","cartdropdown("+items.id+")")
                    .attr('href',"javascript:")
                    .text("Thêm vào giỏ hàng")
                    .appendTo(button)   
                }     
            }
        }, 
        ); 
        
    });
});