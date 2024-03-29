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
                        <a href="#!" class="nav__item-link" id ="hangmoi">HÀNG MỚI VÈ</a>
                    </li>
                    <?php   
                            if ($data['CL']->num_rows > 0) {
                                while ($row = $data['CL']->fetch_assoc()) {
                                    echo    '
                                    
                                <li class="nav__list-items">
                                    <a href="#!" class="nav__item-link" id = "'.$row["MaChungLoai"].'">'.$row["TenChungLoai"].'</a>
                                    <ul class="sub-menu">';
                                        
                                        if ($data['TL']->num_rows > 0) {
                                            
                                            while ($row1 = $data['TL']->fetch_assoc()) {
                                                
                                                if($row1["MaChungLoai"]==$row["MaChungLoai"]){
                                                    echo'
                                                    <li>
                                                        <span class="sub-link" id = "'.$row1["MaTheLoai"].'">'.$row1["TenTheLoai"].'</span>
                                                    </li>
                                                    ';
                                                }
                                                
                                            }
                                        }$data['TL']->data_seek(0); //đặt con trỏ lại vị trí cũ
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
                        <!-- <a href="#!" class="cart-shopping cart-btn">
                            <i class="fa-solid fa-cart-shopping"></i> -->
                            <!-- Cart preview -->
                            <!-- <div class="cart-preview">
                                    <p class="cart-message">Chưa Có Sản Phẩm</p>
                                    <ul class="cart__list">
                                        <li class="cart-item">
                                            <a href="" class="cart-item__link"></a>
                                        </li>
                                    </ul> -->
                                    <!-- <img src=""> -->
                            <!-- </div>
                        </a> -->
                        <button type="button" class="cart-shopping cart-btn">
                        <i class="fa-solid fa-cart-shopping"></i>
                         <!-- Cart preview -->
                        <div class="cart-preview-wrap">
                             <div class="cart-preview">         
                                <div class="cart-message">Có <span class="cart-message__number">2</span> <span style="color: red;">sản phẩm</span> trong giỏ hàng</div>
                                <ul class="cart__list">
                                    <!-- item 01 -->
                                        <li class="cart-item">
                                            <img src="<?php echo Root ?>public/img/product01.jpg" alt="" class="cart-item__img">
                                            <div class="cart-item__content">
                                                <a href="#!" class="cart-item__link">TÊN SẢN PHẨM 01</a>
                                                <div class="cart-item__info">
                                                    <div class="cart-item__number">1</div>
                                                    <span>X</span>
                                                    <span class="cart-item__price">400.000</span>
                                                </div>
                                                <div class="cart-item__icon">
                                                    <i class="fa-solid fa-trash"></i>
                                                </div>
                                                
                                            </div>
                                        </li>
                                        <!-- item 02 -->
                                        <li class="cart-item">
                                            <img src="<?php echo Root ?>public/img/product02.jpg" alt="" class="cart-item__img">
                                            <div class="cart-item__content">
                                                <a href="#!" class="cart-item__link">TÊN SẢN PHẨM 02</a>
                                                <div class="cart-item__info">
                                                    <div class="cart-item__number">1</div>
                                                    <span>X</span>
                                                    <span class="cart-item__price">400.000</span>
                                                </div>
                                                <div class="cart-item__icon">
                                                    <i class="fa-solid fa-trash"></i>
                                                </div>
                                                
                                            </div>
                                        </li>
    
                                        <!-- item 03 -->
                                        <li class="cart-item">
                                            <img src="<?php echo Root ?>public/img/product03.jpg" alt="" class="cart-item__img">
                                            <div class="cart-item__content">
                                                <a href="#!" class="cart-item__link">TÊN SẢN PHẨM 02</a>
                                                <div class="cart-item__info">
                                                    <div class="cart-item__number">1</div>
                                                    <span>X</span>
                                                    <span class="cart-item__price">400.000</span>
                                                </div>
                                                <div class="cart-item__icon">
                                                    <i class="fa-solid fa-trash"></i>
                                                </div>
                                                
                                            </div>
                                        </li>
    
                                </ul>
                                <div class="cart__buy">
                                    <div class="cart__buy-wrap">Tổng: <span class="cart-buy__price">800.000</span></div>
                                    <a href="#!" class="cart__buy-btn" title="Thanh toán">Thanh toán</a>
                                </div>           
                            </div>
                        </div>
                    </button>
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