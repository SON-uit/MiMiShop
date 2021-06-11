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
            alert("Đăng nhập thành công");
            window.location.reload();
            $("#user-icon").css('display','none');
          }else{
            alert("Đăng nhập thất bại");
            window.location.reload();
          }
        }
      });
    }
  }); 

  import {Validator} from './validator.js';