
    
function changeButton(){
    button = document.getElementById("btn_login");    
    if(checkAllInput()){              
        button.classList.remove("btn--noActivate");
        button.classList.add("btn--primary");
        
        
    }else { 
        button.classList.remove("btn--primary");
        button.classList.add("btn--noActivate");  
       
         
    }

}
// function checkKeyEmail() {
//     var email = document.getElementById("email").value;


//     var message_email = document.getElementById("error-message-email");

//     if(email.length > 0){
//         if(checkPatternEmail(email)){
//             message_email.classList.remove("error-message");
//             message_email.innerHTML ="";
//             return true;
//         }else {
//             message_email.classList.add("error-message"); 
//             message_email.innerHTML ="Email sai định dạng!"
//         }

//     }else if (email.length <= 0){
//         message_email.classList.add("error-message"); 
//         message_email.innerHTML ="Không được để trống!"
//     }

//     return false;

// }

// function checkPatternEmail(email) {
//     var pattern = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/i;
//     return pattern.test(email);
// }

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


// var eventEmailInput = document.getElementById("email");
// eventEmailInput.addEventListener("keyup", checkKeyEmail);
// eventEmailInput.addEventListener("blur", checkKeyEmail);


var eventPinInput = document.getElementById("codePIN");
eventPinInput.addEventListener("keyup", checkPassword);
eventPinInput.addEventListener("blur", checkPassword);

var eventRePinInput = document.getElementById("reCodePIN");
eventRePinInput.addEventListener("keyup", checkPassword);
eventRePinInput.addEventListener("blur", checkPassword);

var eventform = document.getElementById("my_form");
eventform.addEventListener("keyup", changeButton);
eventform.addEventListener("blur", changeButton);

function checkAllInput(){
    var check = true ;
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

