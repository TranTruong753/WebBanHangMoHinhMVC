<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../../../assets/css/reset.css">
    <link rel="stylesheet" href="../../../assets/css/styleAllForm.css">
    <link rel="stylesheet" href="../../../assets/css/style.css">
    <link rel="stylesheet" href="../../../assets/css/login.css">
</head>

<body>
    <?php
        require('../Home/header.php');
        require('../Home/navbar.php');
?>
    <div class="login__wrap">
        <!-- <div class="login__hero">
            <img src="../../../assets/img/hero-img02.jpg" alt="" class="login__hero-img">
        </div> -->
        <div class="login__main">
           <div class="login__main-wrap">
                <div class="login__title-wrap">
                        <h2 class="heading-title login__title">Đăng nhập</h2>
                        <p class="heading-desc login__desc"> Bạn chưa có tài khoản FM?
                         <a href="#!">Đăng kí ngay</a>
                        </p>
                </div>
                <form action="" class="login__form" method="post" autocapitalize="off">
                    <div class="login__form-wrap">
                            <label class="login__formLabel" for="">Số điện thoại</label>
                            <input type="text" name="User" id="User" class="login__formInput" placeholder="Nhập số điện thoại">
                            <div class="error-text">Lỗi!</div>
                    </div>
                    <div class="login__form-wrap">
                            <label class="login__formLabel" for="">Mã PIN</label>
                            <input type="password" name="Password" id="Password" class="login__formInput" placeholder="Nhập mã PIN">
                            <div class="error-wrap">
                                <div class="error-text">Lỗi!</div>
                                <a href="#!">Quên mã PIN</a>
                            </div>
                    </div>
                    <div class="form-input-wrap form__save-wrap">
                        <input type="checkbox" name="saveUser" id="saveUser" class="login__formCheckBox" hidden>
                       
                        <label class="login__formLabel login__formLabel-save" for="saveUser"> <span></span>
                        Lưu thông tin đăng nhập</label>
                        
                    </div>
                    <div class="login__form-wrap">
                        <button type="submit" class="btn login-btn btn--primary">Đăng nhập</button>
                    </div>
                    <div class="login-line">
                        <hr class="crossline">
                        <span>Hoặc</span>
                        <hr class="crossline">
                    </div>
                    <div class="login__form-wrap">
                        <div class="social-wrap">
                            <button class="social-btn">
                         
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
                            <button class="social-btn">
                         
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
        require('../Home/footer.php');

?>

</body>

</html>