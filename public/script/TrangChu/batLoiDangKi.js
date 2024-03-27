
    
function changeButton(){
    button = document.getElementById("btn");    
    if(checkAllInput()){              
        button.classList.remove("btn--noActivate");
        button.classList.add("btn--primary");
        button = document.getElementById("btn").type = "submit";
        // return true;
        
    }else { 
        button.classList.remove("btn--primary");
        button.classList.add("btn--noActivate");  
        button = document.getElementById("btn").type = "button";
        // return false;         
    }

}



function checkKeyUser() {
    var userName = document.getElementById("UserName").value;
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
    var phone = document.getElementById("phone").value;

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

function checkKeyEmail() {
    var email = document.getElementById("email").value;
    // console.log(email);
    // alert(email);
    var message_email = document.getElementById("error-message-email");

    if(email.length > 0){
        if(checkPatternEmail(email)){
            message_email.classList.remove("error-message");
            message_email.innerHTML ="";

        }else {
            message_email.classList.add("error-message"); 
            message_email.innerHTML ="Email sai định dạng!"
        }

    }else if (email.length <= 0){
        message_email.classList.add("error-message"); 
        message_email.innerHTML ="Không được để trống!"
    }


}

function checkPatternEmail(email) {
    var pattern = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/i;
    // var pattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-z]{2,4}$/;
    // var pattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    return pattern.test(email);
}


function checkPassword() {
    var password = document.getElementById("codePIN").value;

    var confirmPassword = document.getElementById("reCodePIN").value;

    var message_repin = document.getElementById("error-message-repin");

    var message_pin = document.getElementById("error-message-pin");


    if(password.length > 0){            
        if(checkPatterPin(password)){
            message_pin.classList.remove("error-message");
            message_pin.innerHTML =""  
        } else {
            message_pin.classList.add("error-message");
            message_pin.innerHTML =" Mã PIN phải đủ 6 ký tự và chỉ chứa các ký tự số!"  
        }     
    }   
    else if (password.length == 0){
        message_pin.classList.add("error-message"); 
        message_pin.innerHTML ="Không được để trống!"
           
    }


    if (password === confirmPassword) {              
        message_repin.classList.remove("error-message");
        message_repin.innerHTML =""
    } 
    else {
        if(confirmPassword.length > 0) {                  
            if(checkPatterPin(confirmPassword)){
                message_repin.classList.add("error-message"); 
                message_repin.innerHTML ="Mật khẩu không trùng khớp!"
            } else {
                message_repin.classList.add("error-message");
                message_repin.innerHTML =" Mã PIN phải đủ 6 ký tự và chỉ chứa các ký tự số!"  
            }     
        } 
        else{
            message_repin.classList.add("error-message"); 
            message_repin.innerHTML ="Không được để trống!"
         }
    
    
    }

}

function checkPatterPin(pin) {
    var pattern = /^\d{6}$/;
    return pattern.test(pin);
}



// add event 

var eventUserInput = document.getElementById("UserName");
eventUserInput.addEventListener("keyup", checkKeyUser);
eventUserInput.addEventListener("blur", checkKeyUser);

var eventPhoneInput = document.getElementById("phone");
eventPhoneInput.addEventListener("keyup", checkKeyPhone);
eventPhoneInput.addEventListener("blur", checkKeyPhone);

var eventEmailInput = document.getElementById("email");
eventEmailInput.addEventListener("keyup", checkKeyEmail);
eventEmailInput.addEventListener("blur", checkKeyEmail);


var eventPinInput = document.getElementById("codePIN");
eventPinInput.addEventListener("keyup", checkPassword);
eventPinInput.addEventListener("blur", checkPassword);

var eventRePinInput = document.getElementById("reCodePIN");
eventRePinInput.addEventListener("keyup", checkPassword);
eventRePinInput.addEventListener("blur", checkPassword);

var eventform = document.getElementById("my_form");
eventform.addEventListener("keyup", changeButton);
eventform.addEventListener("blur", changeButton);

// var eventBtn = document.getElementById("btn");
// eventBtn.addEventListener("click", my_submit);

function checkAllInput(){
    var check = true ;
    var userName = document.getElementById("UserName").value;

    if(userName.length == 0 || !checkPatternUser(userName)){
        check = false;           
    }
    

    var phone = document.getElementById("phone").value;


    if(phone.length == 0 || !checkPatternPhone(phone)){
        check = false;      
    }

    var email = document.getElementById("email").value;


    if(email.length == 0 || !checkPatternEmail(email)){
        check = false;    

    }


    var password = document.getElementById("codePIN").value;

    var confirmPassword = document.getElementById("reCodePIN").value;

    if(password.length < 6 || confirmPassword.length < 6){
        check = false                       
    }
    if (password != confirmPassword) {                             
            check = false;
    }   
       
    return check;
   
}

