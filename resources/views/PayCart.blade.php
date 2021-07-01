<!doctype html>
<html lang="en">
  <head>
    <title>Thanh toán</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel ="stylesheet"  href="{{ URL::asset('css/Paycart.css') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  </head>
  <body>
    @if(Session::has('bill')!=null)
      <script>
          swal({
          icon: 'success',
          title: 'Congratulation!!',
          text: "{!! Session::get('bill') !!}",
          button: "OK",
        });
      </script>
      @php 
        Session::forget('bill')
      @endphp
    @endif
      <div class="container-fluid">
          <div class="row">
            <div class="col-md-2 mt-4" >
              <a href="http://localhost/webshop/public/mainView"><h3><span class="arrow arrowRight"></span>BACK</h3></a>
            </div>
          </div>
          <div class="row">
              <div class="col-md-5 offset-md-2 leftbox">
                  <h3>Mimi Game Shop</h3><br>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="http://localhost/webshop/public/ListCart" class="breadcrumb-link">Giỏ hàng</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a class="breadcrumb-link">Thông tin giao hàng</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a class="breadcrumb-link">Phương thức thanh toán</a>
                    </li>
                </ul>
                  <h4>Thông tin thanh toán</h4><br>
                    <div class="PayMent">
                        <form method="POST" action="{{ route("check_checkout") }}">
                          @csrf
                            <div class="form-group">
                              <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId" placeholder="Họ và tên" required>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                      <input type="text" class="form-control" name="email" id="email" aria-describedby="helpId" placeholder="Email" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                      <input type="text" class="form-control" name="phonenumber" id="phonenumber" aria-describedby="helpId" placeholder="Số điện thoại" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="pay-method">Phương thức thanh toán</label>
                                <select class="form-control" name="payment" id="pay-method">
                                  <option>Chọn phương thức thanh toán</option>
                                  <option value="COD">Trực tiếp</option>
                                  <option value ="Banking">Chuyển khoản</option>
                                </select>
                              </div>
                            <div class="form-group">
                              <input type="text" class="form-control" name="address" id="address" aria-describedby="helpId" placeholder="Đia chỉ" required>
                            </div>
                            <input type="submit" class="btn btn-outline-primary" value="Thanh toán">
                        </form>
                    </div>
              </div>
              <div class="sidebar"> {{-- thong tin checkout --}}
                @if(Session::has('Cart') != null)
                @foreach (Session::get('Cart')->products as $item)
                <div class="sidebar-name">
                    <tr>
                        <td><img src="images/products/store/{{ $item['productinfo']->image }}" width="90px"></td>
                        <td>{{ $item['productinfo']->name }}</td>
                    </tr>
                </div>
                <div class="quanty">
                    <h5>Số lượng: </h5>
                    <h5 style="position: relative; right:50px">{{ $item['quanty'] }}</h5>
                </div>
                <div class="price">
                    <h5>Giá: </h5>
                    <h5 style="color:red">{{ number_format($item['productinfo']->price) }} vnd</h5>
                </div>
                @endforeach
                <div class="total">
                    <h3 style="color:red">Tổng cộng: </h3>
                    <h3 style="color :blue">{{ number_format(Session::get('Cart')->totalPrice) }} vnd</h3>
                </div>
                @endif
              </div>
          </div>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>