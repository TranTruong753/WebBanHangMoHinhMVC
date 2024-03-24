<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="<?php echo Root ?>public/css/reset.css">
    <link rel="stylesheet" href="<?php echo Root ?>public/css/styleAllForm.css">
    <link rel="stylesheet" href="<?php echo Root ?>public/css/style.css">
    <link rel="stylesheet" href="<?php echo Root ?>public/css/login.css">
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
                <form action="<?php echo Root ?>Dangki/dangkiDB" class="login__form" method="post" autocapitalize="off">
                    <div class="form-input-wrap">
                            <label class="login__formLabel" for="UserName">Họ và tên <span class="importan">*</span></label>
                            <input type="text" name="UserName" id="UserName" class="login__formInput" placeholder="Nhập họ và tên...">
                            <div class="error-text">Lỗi!</div>
                    </div>
                    <div class="form-input-wrap">
                            <label class="login__formLabel" for="phone">Số điện thoại <span class="importan">*</span></label>
                            <input type="tel" name="phone" id="phone" class="login__formInput" placeholder="Nhập mã số điện thoại...">
                            <div class="error-wrap">
                                <div class="error-text">Lỗi!</div>
                                <a href="#!"class="text-link" >Gửi mã OTP</a>
                            </div>
                    </div>
                     
                    <div class="form-input-wrap">
                            <label class="login__formLabel" for="codeOTP">Mã xác thực OTP <span class="importan">*</span></label>
                            <input type="text" name="codeOTP" id="codeOTP" class="login__formInput" placeholder="Nhập mã OTP...">
                            <div class="error-text">Lỗi!</div>
                    </div>

                    <div class="form-input-wrap">
                            <label class="login__formLabel" for="email">Email</label>
                            <input type="email" name="email" id="email" class="login__formInput" placeholder="Nhập email...">
                            <div class="error-text">Lỗi!</div>
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
                    </div>

                    <div class="form-input-wrap">
                            <label class="login__formLabel" for="codePIN">Nhập mã PIN <span class="importan">*</span></label>
                            <input type="text" name="codePIN" id="codePIN" class="login__formInput" placeholder="Nhập mã PIN...">
                            <div class="error-text">Lỗi!</div>
                    </div>

                    <div class="form-input-wrap">
                            <label class="login__formLabel" for="reCodePIN">Nhập lại mã PIN <span class="importan">*</span></label>
                            <input type="text" name="reCodePIN" id="reCodePIN" class="login__formInput" placeholder="Nhập lại mã PIN...">
                            <div class="error-text">Lỗi!</div>
                    </div>
  
                    <div class="form-input-wrap">
                        <button type="submit" class="btn login-btn btn--noActivate ">Hoàn thành</button>
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

</body>

</html>