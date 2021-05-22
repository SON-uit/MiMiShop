<!doctype html>
<html lang="en">
  <head>
    <title>Thanh toán</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      <div class="container-fluid">
          <div class="row">
              <div class="col-md-5 offset-md-2">
                  <h3>Mimi Game Shop</h3><br>
                  <h4>Thông tin thanh toán</h4><br>
                    <div class="PayMent">
                        <form method="POST" action="{{ route("check_checkout") }}">
                          @if(Session::has('bill'))
                          <div class="alert alert-primary" role="alert">
                              <strong>{{ Session::get('bill') }}</strong>
                          </div>
                          @endif
                          @csrf
                            <div class="form-group">
                              <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId" placeholder="Họ và tên">
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                      <input type="text" class="form-control" name="email" id="email" aria-describedby="helpId" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                      <input type="text" class="form-control" name="phonenumber" id="phonenumber" aria-describedby="helpId" placeholder="Số điện thoại">
                                    </div>
                                </div>
                               
                            </div>
                            <div class="form-group">
                                <label for="pay-method">Phương thức thanh toán</label>
                                <select class="form-control" name="payment" id="pay-method">
                                  <option>Chọn phương thức thanh toán</option>
                                  <option value="live">Trực tiếp</option>
                                  <option value ="transfer">Chuyển khoản</option>
                                </select>
                              </div>
                            <div class="form-group">
                              <input type="text" class="form-control" name="address" id="address" aria-describedby="helpId" placeholder="Đia chỉ">
                            </div>
                            <input type="submit" class="btn btn-primary" value="Thanh toán">
                        </form>
                    </div>
              </div>
              <div class="col-md-5" style="background: #ECE7E6">
                @if(Session::has('Cart') != null)
                @foreach (Session::get('Cart')->products as $item)
                    <tr>
                        <td><img src="images/products/store/{{ $item['productinfo']->image }}" width="100px"></td>
                        <td>{{ $item['productinfo']->name }}</td>
                    </tr><br>
                    <tr>
                        <td> Giá :{{ number_format($item['productinfo']->price) }} vnd</td><br>
                    </tr>
                @endforeach
                @endif
                <div class="total">
                    <p>Tổng cộng <span>{{ number_format(Session::get('Cart')->totalPrice) }} vnd</span></p>
                </div>
              </div>
          </div>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>