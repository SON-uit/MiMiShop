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
  </head>
  <body>
    <section>
        <div class="container-fluid">
           <div class="col-md-3 offset-4">
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
    </section>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="{{ URL::asset('js/validator.js') }}"></script>
    <script>
        Validator({
          form: "#login-form",
          rule : [
            Validator.isRequired("#email"),
            Validator.isRequired("#password"),
            Validator.Length("#password", 8, 16),
          ],
          checkSubmit : function(data){
            $.ajax({
              type: "POST",
              url: "http://localhost/webshop/public/check/login",
              headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},//them vao khi co csrf
              data: {
                inputValues : data
              },
              dataType: "dataType",
              success: function (response) {
                  alert(response);
              }
            });
          }
        });
    </script>
  </body>
</html>