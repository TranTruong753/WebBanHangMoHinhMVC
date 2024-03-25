<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
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
                            if ($data['TL']->num_rows > 0) {
                                while ($row = $data['TL']->fetch_assoc()) {
                                    echo    '
                                    
                                <li class="nav__list-items">
                                    <a href="#!" class="nav__item-link" id = "'.$row["MaTheLoai"].'">'.$row["TenTheLoai"].'</a>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="#!" class="sub-link">Item 1</a>
                                        </li>
                                        <li>
                                            <a href="#!" class="sub-link">Item 2</a>
                                        </li>
                                        <li>
                                            <a href="#!" class="sub-link">Item 3</a>
                                        </li>
                                    </ul>
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
                            </div>
                        </a>
                    </div>
                    <!-- login logout -->
                    <div class="nav__right">
                        <div class="nav__right-wrap">
                            <a href="" class="nav__signin"
                                >Đăng nhập</a
                            >
                            <span>/</span>
                            <a href="<?php echo Root ?>Dangki/dangki" class="nav__signup">Đăng ký</a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
</body>

</html>