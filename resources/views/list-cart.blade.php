
    @extends('layout/base')
    @section('ListCart')
    <section>
        <script  src="{{ URL::asset('js/listcart.js') }}"></script>
        <link rel ="stylesheet"  href="{{ URL::asset('css/list-cartStyle.css') }}">
        <div id="list-cart">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3 offset-md-4">
                        <b style="font-size:30px;">Giỏ hàng của bạn</b>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-7 offset-md-1" >
                        <table class="table table-stripped">
                            <thead class="thead-light">
                                <tr>
                                    <th>Image</th>
                                    <th style="width:224px;">Product Name</th>
                                    <th>Price</th>
                                    <th>Quanty</th>
                                    <th>Total</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(Session::has('Cart') != null)
                                    @foreach (Session::get('Cart')->products as $item)
                                        <tr>
                                            <td><img src="images/products/store/{{ $item['productinfo']->image }}" width="100px"></td>
                                            <td>{{ $item['productinfo']->name }}</td>
                                            <td>{{number_format($item['productinfo']->price) }}đ</td>
                                            <td>
                                                <button type="button" class="qtyminus btn btn-danger" >-</button>
                                                <input type='text'name='quanty' id="{{ $item['productinfo']->id }}"value='{{ $item['quanty'] }}'/>
                                                <button type="button" class="qtyplus btn btn-success" >+</button> 
                                            </td>
                                            <td>{{ number_format($item['price']) }}đ</td>
                                            <td><i class="fas fa-trash" onclick="DeleteListItemCart({{ $item['productinfo']->id }})"></i></td>
                                        </tr>
                                    @endforeach
                                @else
                                    <h3 class="text-empty-cart">Giỏ hàng của bạn đang trống</h3>
                                @endif
                            </tbody>
                            <tfoot>            
                            </tfoot>
                        </table>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-checkout">
                            <div class="card-header">
                                Thông tin đơn hàng
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Tổng tiền:  
                                @if(Session::has('Cart') != null)
                                <span style="margin-left: 20px; color:red;"> {{ number_format(Session::get('Cart')->totalPrice) }}đ</span>
                                @else
                                <span style="margin-left: 20px; color:red;"> 0đ</span>
                                @endif
                                </h5>
                                <p class="card-text">Phí vận chuyển sẽ được tính ở trang thanh toán.</p>
                                <p class="card-text">Bạn cũng có thể nhập mã giảm giá ở trang thanh toán.</p>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-danger">Thanh Toán</button>
                                <a href="http://localhost/webshop/public/mainView">Tiếp tục mua hàng</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="customer-notes">
                            <b>Ghi chú đơn hàng </b>
                            <div class="form-group">
                                <label for="notes"></label>
                                <textarea class="form-control" name="note-form" id="notes" rows="4" placeholder="Ghi chú"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="policy">
                            <b> Chính sách mua hàng </b>
                            <ul>
                                <li><p>Sản phẩm còn đủ tem mác, chưa qua sử dụng.</p></li>
                                <li><p>Tích điểm thành viên khi mua hàng.</p></li>
                                <li><p>Miễn phí giao hàng 48 Giờ nội thành TP.HCM với đơn hàng trên 1.000.000.</p></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection




