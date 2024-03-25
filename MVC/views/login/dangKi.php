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
                            <input type="text" name="UserName" id="UserName" class="login__formInput" placeholder="Nhập họ và tên..." onkeyup="checkKeyUser()" required>
                            <div id="error-message-user"></div>
                    </div>
                    <div class="form-input-wrap">
                            <label class="login__formLabel" for="phone">Số điện thoại <span class="importan">*</span></label>
                            <input type="tel" name="phone" id="phone" class="login__formInput" placeholder="Nhập mã số điện thoại..." onkeyup="checkKeyPhone()" pattern="^(0|\+?84)(3|5|7|8|9)[0-9]{8}$" required>
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
                            <input type="email" name="email" id="email" class="login__formInput" placeholder="Nhập email..." onkeyup="checkKeyEmail()" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>
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
                            <input type="password" name="codePIN" id="codePIN" class="login__formInput" placeholder="Nhập mã PIN..."  minlength="6" maxlength="6"  onkeyup="checkPassword()" required>
                            <div class="" id="error-message-pin"></div>
                    </div>

                    <div class="form-input-wrap">
                            <label class="login__formLabel" for="reCodePIN">Nhập lại mã PIN <span class="importan">*</span></label>
                            <input type="password" name="reCodePIN" id="reCodePIN" class="login__formInput error__rePass" placeholder="Nhập lại mã PIN..." minlength="6" maxlength="6"  onkeyup="checkPassword()" required>
                            <div class="" id="error-message-repin"></div>
                    </div>
  
                    <div class="form-input-wrap">
                        <button type="button" onclick="my_submit()" class="btn login-btn btn--noActivate " id="btn">Hoàn thành</button>
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
        function my_submit(){
            var error ="";
            var radios = document.getElementsByName("sex");
            var userName = document.getElementsByName("UserName").value;
            var phone = document.getElementsByName("phone").value;
            var email = document.getElementsByName("email").value;

            var pin = document.getElementsByName("codePIN")[0].value;
            var repin = document.getElementsByName("reCodePIN")[0].value;
          

            var formValid = false;
            var checkRadio = false;
            // for(var i = 0; i < radios.length; i++) {
            //     if(radios[i].checked) {
            //         checkRadio = true;
            //         break;
            //     }
            // }
   
            // if(pin===repin){
            //     // document.getElementById("error-message").style.display = "none"; 
            //     formValid = true;
            // }else {
            //     var element = document.getElementById("error-message");
            //     element.classList.add("error-message");
            //     // document.getElementById("error-message").style.display = "block";   
            //     // element.innerHTML ="Mật khẩu không trùng khớp!"
            //     formValid = false;
            // }
            
           

            // if (!checkRadio) {
            //     document.getElementById("error").style.opacity = "1";
            //     document.getElementById("error").innerHTML = "Vui lòng chọn giới tính!";
            //     return false;
            // } else {
               
            //     document.getElementById("error").innerHTML = "";            
            // }

            if(formValid){
                button = document.getElementById("btn").type = "submit";
                // my_form = document.getElementById("my_form");
				// my_form.submit();
            }
            // button = document.getElementById("btn").type = "submit";
        }

        function checkKeyUser() {
            var userName = document.getElementById("UserName").value;

            var message_user = document.getElementById("error-message-user");

            if(userName.length > 0){
                message_user.classList.remove("error-message");
                message_user.innerHTML =""
            } else if (userName.length <= 0){
                message_user.classList.add("error-message"); 
                message_user.innerHTML ="Không được để trống!"
            }

        }

        function checkKeyPhone() {
            var phone = document.getElementById("phone").value;

            var message_phone = document.getElementById("error-message-phone");

            if(phone.length > 0){
                if(checkPatterPhone(phone)){
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

        function checkPatterPhone(phone) {
            var pattern = /^(0|\+?84)(3|5|7|8|9)[0-9]{8}$/;
            return pattern.test(phone);
        }

        function checkKeyEmail() {
            var email = document.getElementById("email").value;


            var message_email = document.getElementById("error-message-email");

            if(email.length > 0){
                if(checkPatterEmail(email)){
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

        function checkPatterEmail(email) {
            var pattern = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/;
            return pattern.test(email);
        }


        function checkPassword() {
            var password = document.getElementById("codePIN").value;

            var confirmPassword = document.getElementById("reCodePIN").value;

            var message_repin = document.getElementById("error-message-repin");

            var message_pin = document.getElementById("error-message-pin");
   

            if(password.length > 0){
                message_pin.classList.remove("error-message");
                message_pin.innerHTML =""       
            }   
            else if (password.length == 0){
                message_pin.classList.add("error-message"); 
                message_pin.innerHTML ="Không được để trống!"
                   
            }


            if (password.length === confirmPassword) {
                
                message_repin.classList.remove("error-message");
                message_repin.innerHTML =""
               
            } else {
                if(confirmPassword.length > 0) {
                    message_repin.classList.add("error-message"); 
                    message_repin.innerHTML ="Mật khẩu không trùng khớp!"
                } 
                else{
                    message_repin.classList.add("error-message"); 
                    message_repin.innerHTML ="Không được để trống!"
                 }
            
            
            }
        }


     

    </script>

</body>

</html>