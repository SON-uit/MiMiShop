
 function Validator(options){  
    var selectorRules ={};
    var formElement = document.querySelector(options.form);
    // ham thuc hien validate
    function validate(inputElement,rule){
        var errorElement = inputElement.parentElement.querySelector('#form-message');
        var errorMessage ='';
        // lay ra cac rules cua selector
        var rule = selectorRules[rule.selector];
        // lap qua tung rule va check
        for( var i = 0 ; i < rule.length ; i++){
            errorMessage = rule[i](inputElement.value);//goi ham test(value);
            if(errorMessage) break;
        }
        if(errorMessage){
             errorElement.innerText = errorMessage;
        }else{
            errorElement.innerText = "";
        }
        return !!errorMessage;
    }
    if(formElement){
        $(formElement).on('submit', function (e) {
            e.preventDefault();
            var isFormValid = true;
            options.rule.forEach(function(rule) {
                var inputElement = formElement.querySelector(rule.selector);
                var isValid= validate(inputElement,rule);// rule day la tung ham valid
                if(isValid){
                    isFormValid = false;
                }
            })
            if(isFormValid){
                if( typeof options.checkSubmit === 'function'){
                    var enableInput = formElement.querySelectorAll('[name]');
                    var formValues = Array.from(enableInput);///convert nodelist sang arraySS
                    var messageAlert = document.querySelector(options.message);
                    var getValues = {};//lay tat ca cac input
                    formValues.forEach(function(input){
                        getValues[input.name] = input.value;
                    })
                    options.checkSubmit(getValues);//tra gia tri ve ham check
                
            }
            }
        });
        // lap qua moi rule va xu ly    
       options.rule.forEach(function(rule) {
           //luu lai cac rule cho moi input 
            if(Array.isArray(selectorRules[rule.selector])){ //vd = { #email :[] }
                selectorRules[rule.selector].push(rule.test);
            }else{
                selectorRules[rule.selector] = [rule.test];
            }
           var inputElement = formElement.querySelector(rule.selector);
           var errorElement = inputElement.parentElement.querySelector('#form-message');
           if(inputElement){
               //blur khoi input
               $(inputElement).on('blur',(function (e) { 
                   e.preventDefault();
                    validate(inputElement,rule);
               }));
               // khi nguoi dung nhap lai
               $(inputElement).on('input', function () {
                    errorElement.innerText = "";
               });
           }
       });
    }
}
//dinh nghi cac rules
//hop le k in ra gi 
// khong hop le bao loi
Validator.isRequired = function (selector ,message){
    return {
        selector : selector,
        test : function (value) {
            return value.trim() ? undefined : message || 'Vui lòng nhập trường này';
        }
    }
}
Validator.isEmail = function (selector){
    return {
        selector : selector,
        test : function(value) {
            var regexEmail =/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
            return regexEmail.test(value) ? undefined : 'Nhập lại Email';
        }
    }
}
Validator.Length = function (selector, minlength,maxLength){
    return {
        selector : selector,
        test : function(value){
            return value.length > minlength && value.length < maxLength ? undefined : 'Độ dài từ 8 đến 16 kí tự';
        }
    }
}
Validator.isConfirm = function (selector ,getConfirmValue, message) {
    return {
        selector : selector,
        test : function(value) {
            return value === getConfirmValue() ? undefined : message || 'Giá trí nhập lại không chính xác';
        }
    }
 }
 export {Validator}; 
