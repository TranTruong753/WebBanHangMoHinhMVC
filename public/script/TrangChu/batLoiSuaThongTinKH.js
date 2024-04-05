    
function changeButton(){
    button = document.getElementById("btn");    
    if(checkAllInput()){              
        
       
        button.classList.remove("btn--noActivate");
        button.classList.add("btn--primary");
        
        
        
    }else { 
        button.classList.remove("btn--primary");
        button.classList.add("btn--noActivate");  
        //button = document.getElementById("btn").type = "button";
               
    }

}

function checkKeyUser() {
    var userName = document.getElementById("userName").value;
    var message_user = document.getElementById("error-message-user");
    if(userName.length > 0){
        if(checkPatternUser(userName)){
            message_user.classList.remove("error-message");
            message_user.innerHTML ="";
        }else {
            message_user.classList.add("error-message"); 
            message_user.innerHTML ="Chỉ chứa chữ, không chứa số & ký tự đặc biệt!"
        }

    }else if (userName.length <= 0){
        message_user.classList.add("error-message"); 
        message_user.innerHTML ="Không được để trống!"
  
    }

}

function checkPatternUser(userName){
    // var pattern = /^[a-zA-Z]+$/;
    // var pattern = /^[a-zA-ZÀ-ÿ\u0080-\uFFFF]+$/;
    // var pattern = /^[a-zA-ZÀ-ÿ\s]+$/;
    // var pattern = /^[0-9!@#\$%\^\&*\)\(+=._-]+$/;
    var pattern = /^[a-zA-Z\xC0-\u1EF9\s]+$/;



    return pattern.test(userName);
}

function checkKeyPhone() {
    var phone = document.getElementById("userPhone").value;

    var message_phone = document.getElementById("error-message-phone");

    if(phone.length > 0){
        if(checkPatternPhone(phone)){
            message_phone.classList.remove("error-message");
            message_phone.innerHTML ="";

        }else {
            message_phone.classList.add("error-message"); 
            message_phone.innerHTML ="Số điện thoại không đúng định dạng!"
        }

    }else if (phone.length <= 0){
        message_phone.classList.add("error-message"); 
        message_phone.innerHTML ="Không được để trống!"
    }


}

function checkPatternPhone(phone) {
    var pattern = /^(0|\+?84)(3|5|7|8|9)[0-9]{8}$/;
    return pattern.test(phone);
}

var eventUserInput = document.getElementById("userName");
eventUserInput.addEventListener("keyup", checkKeyUser);
eventUserInput.addEventListener("blur", checkKeyUser);

var eventPhoneInput = document.getElementById("userPhone");
eventPhoneInput.addEventListener("keyup", checkKeyPhone);
eventPhoneInput.addEventListener("blur", checkKeyPhone);


var eventform = document.getElementById("my_form");
eventform.addEventListener("keyup", changeButton);
eventform.addEventListener("blur", changeButton);



function checkAllInput(){
    var check = true ;
    var userName = document.getElementById("userName").value;

    if(userName.length == 0 || !checkPatternUser(userName)){
        check = false;           
    }
    var phone = document.getElementById("userPhone").value;


    if(phone.length == 0 || !checkPatternPhone(phone)){
        check = false;      
    }
 return check;
   
}