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
            alert("Dang nhap thanh cong");
            window.location.reload();
            $("#login-card").hide();
            $(document).ready(function () {
              $("#user-icon").click(function (e) { 
                  e.preventDefault();
                  $("#login-card").hide();
              });
            });
          }else{
            alert("Dang nhap that bai");
            window.location.reload();
          }
        }
      });
    }
  }); 

  import {Validator} from './validator.js';