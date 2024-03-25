<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="<?php echo Root ?>public/css/TrangChu/reset.css">
    <link rel="stylesheet" href="<?php echo Root ?>public/css/TrangChu/styleAllForm.css">
    <link rel="stylesheet" href="<?php echo Root ?>public/css/TrangChu/style.css">
    <link rel="stylesheet" href="<?php echo Root ?>public/css/TrangChu/login.css">
</head>

<body>
    <?php
        // require('./MVC/views/trangchu/block/header.php');
        // require('./MVC/views/trangchu/block/navbar.php');
?>
    <div class="login__wrap">
        <!-- <div class="login__hero">
            <img src="<?php echo Root ?>public/img/hero-img02.jpg" alt="" class="login__hero-img">
        </div> -->
        <div class="login__main">
           <div class="login__main-wrap">
                <div class="login__title-wrap">
                        <h2 class="heading-title login__title">Đăng ký</h2>
                        <p class="heading-desc login__desc"> Bạn đã có tài khoản MENSTYLE?
                         <a href="#!">Đăng nhập</a>
                        </p>
                </div>
                <form action="<?php echo Root ?>Dangki/dangkiDB" class="login__form" method="post" autocapitalize="off" id="my_form">
                    <div class="form-input-wrap">
                            <label class="login__formLabel" for="UserName">Họ và tên <span class="importan">*</span></label>
                            <input type="text" name="UserName" id="UserName" class="login__formInput" placeholder="Nhập họ và tên..."  required>
                            <div id="error-message-user"></div>
                    </div>
                    <div class="form-input-wrap">
                            <label class="login__formLabel" for="phone">Số điện thoại <span class="importan">*</span></label>
                            <input type="tel" name="phone" id="phone" class="login__formInput" placeholder="Nhập mã số điện thoại..." required>
                            <div id="error-message-phone"></div>
                           
                    </div>

                   
                    <div class="error-wrap">
                        <div class="error-text">Lỗi!</div>
                        <a href="#!"class="text-link" >Gửi mã OTP</a>
                    </div>
                 

                     
                    <div class="form-input-wrap">
                            <label class="login__formLabel" for="codeOTP">Mã xác thực OTP <span class="importan">*</span></label>
                            <input type="text" name="codeOTP" id="codeOTP" class="login__formInput" placeholder="Nhập mã OTP..." >
                            <div class="error-text">Lỗi!</div>
                    </div>

                    <div class="form-input-wrap">
                            <label class="login__formLabel" for="email">Email</label>
                            <input type="email" name="email" id="email" class="login__formInput" placeholder="Nhập email..." required>
                            <div id="error-message-email"></div>
                    </div>

                    <div class="form-input-wrap">
                            <label class="signup-form-label">
                                Giới tính <span class="importan">*</span>
                            </label>
                            <div class="signup-radio-wrap">
                                <div class="radio-wrap">
                                    <input
                                        class="signup__raido-input"
                                        type="radio"
                                        id="boy"
                                        name="sex"
                                        value="Nam"
                                        checked
                                        hidden
                                    />
                                    
                                    <label class="signup__radio-label" for="boy"
                                        ><span></span>
                                        Nam
                                        </label
                                    >
                                </div>
                                <div class="radio-wrap">
                                    <input
                                        class="signup__raido-input"
                                        type="radio"
                                        id="girl"
                                        name="sex"
                                        value="Nu"
                                        hidden
                                    />
                                   
                                    <label class="signup__radio-label" for="girl"
                                        > <span></span>
                                        Nữ</label
                                    >
                                </div>
                                <div class="radio-wrap">
                                    <input
                                        class="signup__raido-input"
                                        type="radio"
                                        id="other"
                                        name="sex"
                                        value="khac"
                                        hidden
                                    />
                                    
                                    <label class="signup__radio-label" for="other"
                                        ><span></span>
                                        Khác</label
                                    >
                                </div>
                            </div>
                            <div class="error-text" id="error">Lỗi!</div>
                    </div>

                    <div class="form-input-wrap">
                            <label class="login__formLabel" for="codePIN">Nhập mã PIN <span class="importan">*</span></label>
                            <input type="password" name="codePIN" id="codePIN" class="login__formInput" placeholder="Nhập mã PIN..."  minlength="6" maxlength="6"   required>
                            <div class="" id="error-message-pin"></div>
                    </div>

                    <div class="form-input-wrap">
                            <label class="login__formLabel" for="reCodePIN">Nhập lại mã PIN <span class="importan">*</span></label>
                            <input type="password" name="reCodePIN" id="reCodePIN" class="login__formInput error__rePass" placeholder="Nhập lại mã PIN..." minlength="6" maxlength="6"   required>
                            <div class="" id="error-message-repin"></div>
                    </div>
  
                    <div class="form-input-wrap">
                        <button type="button" class="btn login-btn btn--noActivate " id="btn" >Hoàn thành</button>
                    </div>

                   
                </form>
                <div class="login__footer">
                    <p class="heading-desc">Bằng việc chọn Đăng Nhập, bạn xác nhận đã đọc & đồng ý với các
                    <a href="#!">Chính Sách Bảo Mật & Chia Sẻ Thông Tin</a> của MENSTYLE.</p>
                </div>
           </div>
        </div>
       




    </div>

    <?php
        require('./MVC/views/trangchu/block/footer.php');

    ?>
    <script>
    
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
                    return true;
                }else {
                    message_phone.classList.add("error-message"); 
                    message_phone.innerHTML ="Số điện thoại không đúng định dạng!"
                }
     
            }else if (phone.length <= 0){
                message_phone.classList.add("error-message"); 
                message_phone.innerHTML ="Không được để trống!"
            }
            return false;

        }

        function checkPatternPhone(phone) {
            var pattern = /^(0|\+?84)(3|5|7|8|9)[0-9]{8}$/;
            return pattern.test(phone);
        }

        function checkKeyEmail() {
            var email = document.getElementById("email").value;


            var message_email = document.getElementById("error-message-email");

            if(email.length > 0){
                if(checkPatternEmail(email)){
                    message_email.classList.remove("error-message");
                    message_email.innerHTML ="";
                    return true;
                }else {
                    message_email.classList.add("error-message"); 
                    message_email.innerHTML ="Email sai định dạng!"
                }
     
            }else if (email.length <= 0){
                message_email.classList.add("error-message"); 
                message_email.innerHTML ="Không được để trống!"
            }

            return false;

        }

        function checkPatternEmail(email) {
            var pattern = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/;
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
                return true;
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

            return false;
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
        
            if(userName.length == 0 && !checkPatternUser(userName)){
                check = false;           
            }
            

            var phone = document.getElementById("phone").value;


            if(phone.length == 0 && !checkPatternPhone(phone)){
                check = false;      
            }

            var email = document.getElementById("email").value;


            if(email.length == 0 && !checkPatternEmail(email)){
                check = false;    

            }


            var password = document.getElementById("codePIN").value;

            var confirmPassword = document.getElementById("reCodePIN").value;
        
            if(password.length < 6 && confirmPassword.length < 6){
                check = false                       
            }
            if (password != confirmPassword) {                             
                    check = false;
            }   
               
            return check;
           
        }
       

    </script>

</body>

</html>