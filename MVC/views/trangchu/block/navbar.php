<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
       <!-- link icon -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>

<body>
    
    <!-- nav -->
    <nav class="fixed">
        <div class="container container__nav">
            <div class="nav__inner">
                <!-- logo -->
                <a href="#" class="nav__link-logo">
                    <img src="<?php echo Root ?>public/img/logo.png" alt="" class="nav-logo" />
                </a>
                <!-- <div class="nav__toggle nav__bars" id="nav-toggle">
                        <i class="fa-solid fa-bars"></i>
                        <i class="fa-solid fa-x"></i>
                    </div> -->
                <!-- nav list -->
                <ul class="nav__list">
                    <li class="nav__list-items">
                        <a href="#!" class="nav__item-link">HÀNG MỚI VÈ</a>
                    </li>
                    <?php
                            if ($data['CL']->num_rows > 0) {
                                while ($row = $data['CL']->fetch_assoc()) {
                                    echo    '
                                    
                                <li class="nav__list-items">
                                    <a href="#!" class="nav__item-link" id = "'.$row["MaChungLoai"].'">'.$row["TenChungLoai"].'</a>
                                    <ul class="sub-menu">';
                                        // <li>
                                        //     <a href="#!" class="sub-link">Item 1</a>
                                        // </li>
                                        // <li>
                                        //     <a href="#!" class="sub-link">Item 2</a>
                                        // </li>
                                        // <li>
                                        //     <a href="#!" class="sub-link">Item 3</a>
                                        // </li>
                                        if ($data['TL']->num_rows > 0) {
                                            while ($row = $data['TL']->fetch_assoc()) {
                                                if($row["MaChungLoai"]==$row["MaChungLoai"]){
                                                    echo'
                                                    <li>
                                                        <a href="#!" class="sub-link">'.$row["TenTheLoai"].'</a>
                                                    </li>
                                                    ';
                                                }
                                            }
                                        }
                                    echo '</ul>
                                </li>';
                                }
                            }
                            ?>
                </ul>
                <!-- search -->
                <!-- Search form -->
                <div class="nav__form">
                    <form action="" class="search-form">
                        <input type="text" class="search-form__input" id ="search-form__input" placeholder="Tìm kiếm ..." />
                        <!-- Submit button -->
                        <button onclick="showAlert()" class="search-form__btn" type="button">
                            
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                            <script>
                                
                            </script>

                            <!-- Clear button -->
                            <button type="reset" class="search-form__clear">
                                <i class="fa-solid fa-circle-xmark"></i>
                            </button>
                        </form>
                        <a href="#!" class="cart-shopping cart-btn">
                            <i class="fa-solid fa-cart-shopping"></i>
                            <!-- Cart preview -->
                            <div class="cart-preview">
                                    <p class="cart-message">Chưa Có Sản Phẩm</p>
                                    <!-- <img src="<?php echo Root ?>public/img/logo.png"> -->
                            </div>
                        </a>
                    </div>
                    <!-- login logout -->
                    <div class="nav__right">
                        <div class="nav__right-wrap">
                            <?php
                                if(isset($_SESSION['email'])){
                                    echo $_SESSION['email'];
                                    echo '<button onclick="Logout()" class="" type="button"> Đăng con mẹ nó xuất';
                                }
                                else{ echo '
                                    <a href="'; echo Root; echo 'DangNhap/dangNhap" class="nav__signin"
                                    >Đăng nhập</a>
                                    <span>/</span>
                                    <a href="'; echo Root; echo 'Dangki/dangki" class="nav__signup">Đăng ký</a>
                                    ';
                                }
                            ?>
                            
                        </div>
                    </div>
                </div>
            </div>
        </nav>
</body>

</html>
<script src="<?php echo Root ?>public/script/TrangChu/btnLogin.js"></script>