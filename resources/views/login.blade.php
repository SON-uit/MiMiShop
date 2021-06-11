<!doctype html>
<html lang="en">
  <head>
    <title>Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" > {{-- them vao khi co csrf --}}
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
      .arrow{
        display: inline-block;
        border :2px solid black;
        width: 15px;
        height: 15px;
        border-bottom: none;
        border-right: none;
        margin-left: 3px;
        margin-right: 10px;
        position: relative;
        right: 0;
        bottom: 3px;
    }
    .arrowRight{
        transform: rotate(-45deg) translate(0px,2px);
    }
    a:hover{
      text-decoration: none;
    }   
    </style>
  </head>
  <body>
    <section>
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-4 mt-5">
              <a href="http://localhost/webshop/public/checkout"><h3><span class="arrow arrowRight"></span>BACK</h3></a>
            </div>
            <div class="col-md-3 mt-5">
              <div class="card">
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
                    <p>Khách hàng mới ? <span><a href="#">Tạo tài khoản</a></span></p>
                    <p>Quên mật khẩu ? <span><a href="#">Khôi phục mật khẩu</a></span></p>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="module" src="{{ URL::asset('js/validator.js') }}"></script>
    <script type="module" src = "{{ URL::asset('js/loginJS.js') }}"></script>
  </body>
</html>