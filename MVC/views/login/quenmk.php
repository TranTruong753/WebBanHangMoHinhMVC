


    <?php
        // require('./MVC/views/trangchu/block/header.php');
        // require('./MVC/views/trangchu/block/navbar.php');
?>
    <div class="login__wrap" style="background: url(<?php echo Root ?>public/img/hero-img02.jpg);">
        <!-- <div class="login__hero">
            <img src="../../../assets/img/hero-img02.jpg" alt="" class="login__hero-img">
        </div> -->
        <div class="login__main">
           <div class="login__main-wrap">
                <div class="login__title-wrap">
                        <h2 class="heading-title login__title">Quên mật khẩu</h2>
                        <p class="heading-desc login__desc"> Bạn chưa có tài khoản FM?
                         <a href="<?php echo Root ?>Dangki/dangki">Đăng kí ngay</a>
                        </p>
                </div>
                <form action="" class="login__form" method="post" autocapitalize="off" id="my_form">
                    <!-- <div class="login__form-wrap">
                            <label class="login__formLabel" for="">Số điện thoại</label>
                            <input type="text" name="User" id="User" class="login__formInput" placeholder="Nhập số điện thoại">
                            <div class="error-text">Lỗi!</div>
                    </div> -->
                    <div class="form-input-wrap">
                            <label class="login__formLabel" for="email">Email</label>
                            <input type="email" name="email" id="email" class="login__formInput" placeholder="Nhập email..." required >
                            <div id="error-message-email"></div>
                            <!-- <div class="error-text">Lỗi!</div> -->
                    </div>
                    <!-- <div class="form-input-wrap">
                            <label class="login__formLabel" for="">Mã PIN</label>
                            <input type="password" name="Password" id="Password" class="login__formInput" placeholder="Nhập mã PIN" required minlength="6" maxlength="6">
                            <div id="error-message-pin"></div>
                    </div> -->
                    <div class="error-wrap">
                                <div class="error-text">Lỗi!</div>
                                <a href="#!" onclick="sentOTP()">Gửi OTP</a>
                    </div>
                    <div class="form-input-wrap">
                            <input type="hidden" id="codeotp" value="0">
                            <label class="login__formLabel" for="UserName">Nhập OTP<span class="importan">*</span></label>
                            <input type="text" name="UserName" id="maotp" class="login__formInput" placeholder="Mã OTP..."  required>
                            <div id="error-message-user"></div>
                    </div>
                    <div class="form-input-wrap form__save-wrap">
                    </div>
                    <div class="login__form-wrap">
                        <button type="button" onclick="onclickNext()" class="btn login-btn btn--primary ">Next</button>
                    </div>
                    <div class="form-input-wrap">
                            
                            <label class="login__formLabel" for="codePIN">Nhập mã PIN <span class="importan">*</span></label>
                            <input type="password" name="codePIN" id="codePIN" class="login__formInput" placeholder="Nhập mã PIN..."  minlength="6" maxlength="6" readonly   required>
                            <div class="" id="error-message-pin"></div>
                    </div>

                    <div class="form-input-wrap">
                            <label class="login__formLabel" for="reCodePIN">Nhập lại mã PIN <span class="importan">*</span></label>
                            <input type="password" name="reCodePIN" id="reCodePIN" class="login__formInput error__rePass" placeholder="Nhập lại mã PIN..." minlength="6" readonly maxlength="6"   required>
                            <div class="" id="error-message-repin"></div>
                    </div>
                    <div class="form-input-wrap form__save-wrap">
                    </div>
                    <div class="login__form-wrap">
                        <button type="button" onclick="onclickXacNhan()" class="btn login-btn btn--noActivate" id="btn_login">Xác nhận</button>
                    </div>
                    <div class="login-line">
                        <hr class="crossline">
                        <span>Hoặc</span>
                        <hr class="crossline">
                    </div>
                    <div class="login__form-wrap">
                        <div class="social-wrap">
                            <button class="social-btn" type="button">
                         
                                <svg xmlns="http://www.w3.org/2000/svg" width="25px"
                                    height="25px" viewBox="126.445 2.281 589 589"
                                    id="facebook">
                                    <circle cx="420.945" cy="296.781" r="294.5"
                                        fill="#3c5a9a"></circle>
                                    <path fill="#fff"
                                        d="M516.704 92.677h-65.239c-38.715 0-81.777 16.283-81.777 72.402.189 19.554 0 38.281 0 59.357H324.9v71.271h46.174v205.177h84.847V294.353h56.002l5.067-70.117h-62.531s.14-31.191 0-40.249c0-22.177 23.076-20.907 24.464-20.907 10.981 0 32.332.032 37.813 0V92.677h-.032z">
                                    </path>
                                </svg>
                           
                                <span>Facebook</span>
                            </button>
                            <button class="social-btn" type="button">
                         
                                <svg xmlns="http://www.w3.org/2000/svg" width="25px"
                                    height="25px" preserveAspectRatio="xMidYMid"
                                    viewBox="0 0 256 262" id="google">
                                    <path fill="#4285F4"
                                        d="M255.878 133.451c0-10.734-.871-18.567-2.756-26.69H130.55v48.448h71.947c-1.45 12.04-9.283 30.172-26.69 42.356l-.244 1.622 38.755 30.023 2.685.268c24.659-22.774 38.875-56.282 38.875-96.027">
                                    </path>
                                    <path fill="#34A853"
                                        d="M130.55 261.1c35.248 0 64.839-11.605 86.453-31.622l-41.196-31.913c-11.024 7.688-25.82 13.055-45.257 13.055-34.523 0-63.824-22.773-74.269-54.25l-1.531.13-40.298 31.187-.527 1.465C35.393 231.798 79.49 261.1 130.55 261.1">
                                    </path>
                                    <path fill="#FBBC05"
                                        d="M56.281 156.37c-2.756-8.123-4.351-16.827-4.351-25.82 0-8.994 1.595-17.697 4.206-25.82l-.073-1.73L15.26 71.312l-1.335.635C5.077 89.644 0 109.517 0 130.55s5.077 40.905 13.925 58.602l42.356-32.782">
                                    </path>
                                    <path fill="#EB4335"
                                        d="M130.55 50.479c24.514 0 41.05 10.589 50.479 19.438l36.844-35.974C195.245 12.91 165.798 0 130.55 0 79.49 0 35.393 29.301 13.925 71.947l42.211 32.783c10.59-31.477 39.891-54.251 74.414-54.251">
                                    </path>
                                </svg>
                          
                            <span>Google</span>
                            </button>
                        </div>
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
    <!-- <script>
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
    </script> -->
    <script src="<?php echo Root ?>public/script/TrangChu/batLoiQuenMk.js"></script>
    <script src="<?php echo Root ?>public/script/TrangChu/btnLogin.js"></script>
    <script src="http://localhost/WebBanHangMoHinhMVC/public/script/TrangChu/trangchu.js"></script>
