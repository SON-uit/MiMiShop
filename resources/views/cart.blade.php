@if(Session::has('Cart') != null)
<div class="row">
    <div class="col-md-4 offset-md-6 pos">
       <div class="cart" id="cart-dropdown">
           <span class="icon-cart"><i class="fas fa-sort-up" style="font-family: Font Awesome 5 Free";></i></span>
           <div class="header-cart">
               <p>Giỏ hàng </p>
           </div>
           <div class="body-cart">
               @foreach (Session::get('Cart')->products as $item)
                    <div class="row" style="padding:15px">
                        <div class="col-md-3">
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
                    <div><h4 style="color: red">{{ number_format(Session::get('Cart')->totalPrice) }}đ </h4></div><br>
                <h4> Tổng sản phẩm: </h4>
                <div><h4 style="color: red">{{(Session::get('Cart')->totalQuanty) }} </h4></div><br>
            </div>
                <div class="thanhtoan">
                 <a  href="http://localhost/webshop/public/ListCart" class="btn btn-primary">XEM GIỎ HÀNG</a>
                 <a  href="http://localhost/webshop/public/checkout" class="btn btn-primary">THANH TOÁN</a>
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
                    <a href="http://localhost/webshop/public/checkout" class="btn btn-primary">ĐẶT HÀNG</a>
                </div>
            </div>
        </div>
    </div>
</div>


