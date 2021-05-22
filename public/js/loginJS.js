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
        dataType: "html",
        success: function (response) {
            alert(response);
            $("#login-card").hide();
            $(document).ready(function () {
              $("#user-icon").click(function (e) { 
                  e.preventDefault();
                  $("#login-card").hide();
              });
          });
        }
      });
    }
  }); 

  import {Validator} from './validator.js';