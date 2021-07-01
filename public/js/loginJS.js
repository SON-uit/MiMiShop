Validator({
    form: "#login-form",
    rule : [
      Validator.isRequired("#email"),
      Validator.isEmail("#email"),
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
        dataType: "html",
        success: function (response) {
          if(response==true){
            swal({
            icon: 'success',
            title: 'Chúc mừng!!',
            text: "Đăng nhập thành công !!",
            button: "OK",
          }).then(function(){
            window.location.reload();
          });
          }else{
            swal({
              icon: 'error',
              title: 'Thất bại!',
              text: " Vui lòng kiểm tra tài khoản hoặc mật khẩu!!",
              button: "OK",
            });
          }
        }
      });
    }
  }); 

  import {Validator} from './validator.js';