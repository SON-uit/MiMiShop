@if(Session::has('Cart') != null)
<div class="row">
    <div class="col-md-5 offset-md-6 pos">
       <div class="cart" id="cart-dropdown">
           <span class="icon-cart"><i class="fas fa-sort-up" style="font-family: Font Awesome 5 Free";></i></span>
           <div class="header-cart">
               <p>Giỏ hàng </p>
           </div>
           <div class="body-cart">
               @foreach (Session::get('Cart')->products as $item)
                    <div class="row">
                        <div class="col-md-3">
                            <img src="images/products/store/{{ $item['productinfo']->image }} " width="50%">
                        </div>
                        <div class="col-md-9 mt-4">
                            <div class="row">
                                <div class="col-md-9" style="background: red;">
                                    <p>{{ $item['productinfo']->name }}</p>
                                </div>
                                <div class="col-md-3" style="background: yellow;">
                                    <div class="delete-icon">
                                        <i class="far fa-trash-alt" data-icon="{{ $item['productinfo']->id }}"></i>
                                    </div>
                                </div>
                                <div class="col-md-9" style="background: red;">
                                    <p>{{ $item['quanty'] }}</p>
                                </div>
                                <div class="col-md-3" style="background: yellow;">
                                    <p>{{ $item['productinfo']->price }}đ</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
               @endforeach
            </div>
           <div class="footer-cart">
               <p id="total-quanty-cart">{{ Session::get('Cart')->totalQuanty }}</p>
               <p> Tổng tiền: {{ number_format(Session::get('Cart')->totalPrice) }}đ</p><br>
               <a href="http://localhost/webshop/public/ListCart" class="btn btn-primary">Xem giỏ hàng</a>
               <a href="#" class="btn btn-primary">Thanh toán</a>
           </div>
       </div>
    </div>
</div>
@endif


