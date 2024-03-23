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
                    <img src="./assets/img/logo.png" alt="" class="nav-logo" />
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
                    <li class="nav__list-items">
                        <a href="#!" class="nav__item-link">ÁO NAM</a>
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
                    </li>
                    <li class="nav__list-items">
                        <a href="#!" class="nav__item-link">QUẦN NAM</a>
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
                            <li>
                                <a href="#!" class="sub-link">Item 4</a>
                            </li>
                            <li>
                                <a href="#!" class="sub-link">Item 5</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav__list-items">
                        <a href="#!" class="nav__item-link">PHỤ KIỆN</a>
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
                            <li>
                                <a href="#!" class="sub-link">Item 4</a>
                            </li>
                            <li>
                                <a href="#!" class="sub-link">Item 5</a>
                            </li>
                            <li>
                                <a href="#!" class="sub-link">Item 6</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav__list-items">
                        <a href="#!" class="nav__item-link">GIÀY DÉP</a>
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
                    </li>
                    <li class="nav__list-items">
                        <a href="#!" class="nav__item-link">OUTLET SALE</a>
                    </li>
                </ul>
                <!-- search -->
                <!-- Search form -->
                <div class="nav__form">
                    <form action="" class="search-form">
                        <input type="text" class="search-form__input" placeholder="Tìm kiếm ..." />
                        <!-- Submit button -->
                        <button type="submit" class="search-form__btn">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>

                        <!-- Clear button -->
                        <button type="reset" class="search-form__clear">
                            <i class="fa-solid fa-circle-xmark"></i>
                        </button>
                    </form>
                    <a href="#!" class="cart-shopping">
                        <i class="fa-solid fa-cart-shopping"></i>
                    </a>
                </div>
                <!-- login logout -->
                <div class="nav__right">
                    <div class="nav__right-wrap">
                        <a href="./DangNhap.php" class="nav__signin">Đăng nhập</a>
                        <span>/</span>
                        <a href="#!" class="nav__signup">Đăng ký</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</body>

</html>