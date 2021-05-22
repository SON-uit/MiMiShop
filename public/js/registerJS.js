import {Validator} from './validator.js';
Validator({
  form: '#register-form',
  rule: [
    Validator.isRequired('#fullname',"Vui lòng nhập tên đầy đủ"),
    Validator.isRequired('#date'),
    Validator.isRequired("#email"),
    Validator.isEmail('#email'),
    Validator.isRequired("#password"),
    Validator.Length('#password',8 ,16),// min =8 max =16
    Validator.isRequired("#confirmPass"),
    Validator.isConfirm('#confirmPass',function(){
      return $("#register-form #password").val();
    },"Mật khẩu nhập lại không chính xác")
  ],
  checkSubmit : function(data){
    //ajax luu du lieu vao database
    $.ajax({
      type: "POST",
      url: "http://localhost/webshop/public/check/register",
      data: {
        inputValues : data,
      },
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      dataType: "html",
      success: function (response) {
            $("#success").empty();
            $("#success").html(response);
            $("#success").parent().css("display","block");
        }
      });
   }
});