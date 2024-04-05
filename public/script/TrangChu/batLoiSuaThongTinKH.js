
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