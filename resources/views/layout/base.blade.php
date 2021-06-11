<!doctype html>
<html lang="en">
  <head>
    <title>ShopNO1</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" > {{-- them vao khi co csrf --}}
    <!--Font-Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <!--CSS -->
    <link rel ="stylesheet"  href="{{ URL::asset('css/baseStyle.css') }}">
    <link rel ="stylesheet"  href="{{ URL::asset('css/mainStyle.css') }}">
    <link href='https://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet'>
    <!-- Base Link -->
    <base href="http://localhost/webshop/public/">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body >
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- file JS cua bladeView --}}
    <script type="module" src="{{ URL::asset('js/validator.js') }}"></script>
    <script   src="{{ URL::asset('js/baseJS.js') }}"></script>
    <script type="module" src = "{{ URL::asset('js/loginJS.js') }}"></script>
    <script>
        //navbar tha xuong khi onscroll
       var tmp = 0;
        $(window).scroll(function () {
           var currentPos = $(this).scrollTop();
           $("#cart-dropdown").removeClass("dropdown-cart-items");
           if(currentPos >= tmp || currentPos === 0 ){
               $("#scroll-header").removeClass("onscroll-header");
               $('#space-top').removeClass("demo");
           }
           else
            if(currentPos >50){
              $("#scroll-header").addClass("onscroll-header");
              $('#space-top').addClass("demo");
           }
           tmp = currentPos;
        })
        //tạo scroll bar khi co nhieu san pham trong cart
        if($('.body-cart').height() > 300){
            $('.body-cart').css({'height':'300','overflow-y':'scroll','overflow-x':'hidden'});
        }
        $(document).ready(function () {
            $('.carousel').carousel({
                interval: 2000
            });
        });
    </script>
    <header id="scroll-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 offset-md-4">
                    <img src="logos/logo-mimigame.jpg" alt="MiniGame_logo" width="100%">
                </div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="header-icon">
                                <input type="text" class="typeahead"placeholder="search..." style="width:280px">
                                <i id="search-product"class="fa fa-search" aria-hidden="true"></i>
                                @if(Session::has('admin')==null || Session::has('user')!=null)
                                <i class="fa fa-user" id="user-icon"></i>
                                @endif
                                <i class="fa fa-shopping-cart" id="cart-icon">
                                    @if(Session::has("Cart") !=null)
                                        <span id="total-quanty-show">{{ Session::get("Cart")->totalQuanty }}</span>
                                    @else
                                        <span id="total-quanty-show">0</span>
                                    @endif
                                </i> 
                            </div>
                        </div>
                        <div class="col-md-2 mr-5" id="user-menu">
                            @if (Session::has('admin') != null || Session::has('user')!=null)
                            <div class="dropdown" style="margin-top: 35px">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    @if(Session::has('user')!=null)
                                   <span>HI,{{ Session::get('user')->name }}</span>
                                   @endif
                                   @if(Session::has('admin')!=null)
                                   <span>HI,{{ Session::get('admin')->name }}</span>
                                   @endif
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                    @if(Session::has('admin')!=null)
                                  <a href="http://localhost/webshop/public/admin/product/read"><button class="dropdown-item" type="button">Admin</button></a>
                                    @endif
                                  <a href="http://localhost/webshop/public/ListCart"><button class="dropdown-item" type="button">Giỏ hàng</button></a>
                                  <a href="http://localhost/webshop/public/logout"><button class="dropdown-item" type="button" id="logout">Logout</button></a>
                                </div>
                            </div>
                            @endif
                        </div> 
                    </div>
                </div>
            </div>
            <div id="change-item-cart" >
                @if(Session::has('Cart') != null)
                <div class="row">
                    <div class="col-md-4 offset-md-6 pos">
                       <div class="cart" id="cart-dropdown">
                           <span class="icon-cart"><i class="fas fa-sort-up" style="font-family :Font Awesome 5 Free"></i></span>
                           <div class="header-cart">
                               <p>Giỏ hàng </p>
                           </div>
                           <div class=" body-cart">
                               @foreach (Session::get('Cart')->products as $item)
                                    <div class="row" style="padding: 15px">
                                        <div class="col-md-3 ">
                                            <img src="images/products/store/{{ $item['productinfo']->image }} " width="100%">
                                        </div>
                                        <div class="col-md-9 mt-4">
                                            <div class="row">
                                                <div class="col-md-8" >
                                                    <p>{{ $item['productinfo']->name }}</p>
                                                </div>
                                                <div class="col-md-4" >
                                                    <div class="delete-icon">
                                                        <i class="far fa-trash-alt" data-icon="{{ $item['productinfo']->id }}"></i>
                                                    </div>
                                                </div>
                                                <div class="col-md-8" >
                                                    <p>{{ $item['quanty'] }}</p>
                                                </div>
                                                <div class="col-md-4" >
                                                    <p>{{ number_format($item['productinfo']->price) }}đ</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                               @endforeach
                            </div>
                           <div class="footer-cart">
                            <div style="display: flex;justify-content: space-between;">
                                <h4> Tổng tiền: </h4>
                                    <div><h4 style="color:red">{{ number_format(Session::get('Cart')->totalPrice) }}đ </h4></div><br>
                                </div>
                                <div class="thanhtoan">
                                 <a  href="http://localhost/webshop/public/ListCart" class="btn">XEM GIỎ HÀNG</a>
                                 <a href="http://localhost/webshop/public/checkout" class="btn">THANH TOÁN</a>
                                </div>
                           </div>
                           </div>
                       </div>
                    </div>
                </div>
                @endif
                <div class="row">
                    <div class="col-md-4 offset-md-6 pos">
                        <div class="cart" id="cart-dropdown" >
                            <span class="icon-cart"><i class="fas fa-sort-up" style="font-family :Font Awesome 5 Free"></i></span>
                            <div class="header-cart">
                                <p>Giỏ hàng </p>
                            </div>
                            <div class="body-cart empty-cart">
                                <img src="images/cart.jpg" alt="cart" width="20%">
                                <p>Hiện chưa có sản phẩm</p>
                            </div>
                            <div class="footer-cart">
                                <div class="thanhtoan">
                                    <a href="http://localhost/webshop/public/ListCart" class="btn btn-primary">Xem giỏ hàng</a>
                                    <a href="http://localhost/webshop/public/checkout" class="btn btn-primary">Thanh toán</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="login">
                <div class="row">
                    <div class="col-md-3 offset-5 pos">
                     <div class="card login-form" id="login-card">
                       <div class="card-header">
                          <h3>Đăng Nhập</h3>
                       </div>
                       <div class="card-body">
                           <form method="get" action="" id="login-form">
                               @csrf
                               <div class="form-group">
                                 <label for="">Email</label>
                                 <input type="text" name="email" id="email" class="form-control" placeholder="Email" aria-describedby="helpId">
                                 <small id="form-message" class="text-muted"></small>
                               </div>
                               <div class="form-group">
                                 <label for="">Mật Khẩu</label>
                                 <input type="password" name="password" id="password" class="form-control" placeholder="Mật Khẩu" aria-describedby="helpId">
                                 <small id="form-message" class="text-muted"></small>
                               </div>
                               <button type="submit" class="btn btn-outline-primary">Đăng Nhập</button>
                           </form>
                       </div>
                       <div class="card-footer">
                           <p>Khách hàng mới ? <span><a href="http://localhost/webshop/public/register">Tạo tài khoản</a></span></p>
                           <p>Quên mật khẩu ? <span><a href="#">Khôi phục mật khẩu</a></span></p>
                       </div>
                     </div>
                </div>
            </div>
            <nav>
                <ul class="mainMenu">
                    <li><a href="http://localhost/webshop/public/mainView">Trang chủ</a></li>
                    <li><a href="#">Collector</a></li>
                    <li>
                        <a href="#" data-link="">PlayStation <span class="arrow arrowDown"></span></a>
                        <ul class="subMenu">
                            <li>
                                <a href="#">PlayStation 5<span class="arrow arrowRight"></a>
                                <ul class="subsubMenu">
                                    <li><a href="http://localhost/webshop/public/collection/may-ps-5">Máy PS5</a></li>
                                    <li><a href="http://localhost/webshop/public/collection/game-ps-5">Game PS5</a></li>
                                    <li><a href="http://localhost/webshop/public/collection/phukien-ps-5">Phụ kiện PS5</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">PlayStation 4<span class="arrow arrowRight"></a>
                                <ul class="subsubMenu">
                                    <li><a href="#">Máy PS4</a></li>
                                    <li><a href="#">Game PS4</a></li>
                                    <li><a href="#">Phụ kiện PS4</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Nintendo Switch<span class="arrow arrowDown"></span></a>
                        <ul class="subMenu">
                            <li><a href="#">Máy Switch</a></li>
                            <li><a href="#">Game Switch</a></li>
                            <li><a href="#">Phụ kiện Switch</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Xbox One<span class="arrow arrowDown"></span></a>
                        <ul class="subMenu">
                            <li><a href="#">Máy Xbox One</a></li>
                            <li><a href="#">Game Xbox One</a></li>
                            <li><a href="#">Phụ kiện Xbox One</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">PS Vita<span class="arrow arrowDown"></span></a>
                        <ul class="subMenu">
                            <li><a href="#">Máy PS Vita</a></li>
                            <li><a href="#">Game PS Vita</a></li>
                            <li><a href="#">Phụ kiện PS Vita</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">3DS<span class="arrow arrowDown"></span></a>
                        <ul class="subMenu">
                            <li><a href="#">Máy 3DS</a></li>
                            <li><a href="#">Game 3DS</a></li>
                            <li><a href="#">Phụ kiện 3DS</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Tin tức<span class="arrow arrowDown"></span></a>
                        <ul class="subMenu">
                            <li><a href="#">Tin game</a></li>
                            <li><a href="#">Chia sẻ</a></li>
                            <li><a href="#">Khuyến mãi</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Khác</a></li>
                    <li><a href="#">Liên hệ</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <body>
        @yield('mainBody')
        @yield('ListCart')
        @yield('product')
        @yield('register')
        @yield('typeProduct')
    </body>
    <footer>
        <div>
            <div class=" top-footer">
                <div class="col-md-3 letter">
                    <i class="fas fa-envelope-open-text"></i>
                    <h6>Đăng kí nhận tin</h6>
                </div>
                <div class="col-md-6 dis-flex">
                    <form class="text1">
                        @csrf
                        <input type="text" class="nhapemail" placeholder="Nhập email của bạn" >
                        <button type="submit" class="btn btn-primary register-bt">Đăng kí</button>
                    </form>
                </div>
                <div class="col-md-3 dis-flex1">
                    <p class="hotline"><i class="fas fa-phone-alt"></i> Hotline: 0909301300</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <h5>Giới Thiệu</h5>
                    <p>Mimi Game Shop Mimigame là nơi cung cấp đầy đủ các sản phẩm game Playstation, Xbox, Nintendo..., game mới cập nhật mỗi ngày.</p>
                </div>
                <div class="col-md-2">
                    <h5>Liên Kết</h5>
                    <p>Chính sách & Quy định chung
                        Chính sách vận chuyển, giao hàng
                        Chính sách bảo hành
                        Chính sách đổi/trả hàng và hoàn tiền
                        Chính sách bảo mật thông tin</p>
                </div>
                <div class="col-md-3">
                    <h5>Thông tin liên hệ</h5>
                    <p><span><i class="fas fa-map-marker-alt"></i></span>13 Lý Chính Thắng, phường 8, quận 3, Tp. Hồ Chí Minh.</p>
                    <p><span><i class="fas fa-phone-square-alt"></i></span>093370101</p>
                    <p><span><i class="fas fa-envelope"></i></span>mimigame@gmail.com</p>
                </div>
                <div class="col-md-3">
                    <h5>Fanpage</h5>
                    <img src="images/fanpage.jpg" alt="fanpage">
                </div>
            </div>
        </div>
    </footer>
  </body>
    <script>
        var path ="{{ route('autocomplete') }}";
        $("input.typeahead").typeahead({
        source: function (query,process){
        return $.get(path, {query:query} ,function (data) {
                return ( process(data));
        });
        }})  
    </script> 

  
</html>