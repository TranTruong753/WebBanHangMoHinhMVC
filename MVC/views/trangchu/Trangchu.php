<!DOCTYPE html>
<html lang="vi">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>MEN STYLE</title>
        <!-- link favicon -->
        <link
            rel="apple-touch-icon"
            sizes="57x57"
            href="http://localhost/WebBanHangMoHinhMVC/public/favicon/apple-icon-57x57.png"
        />
        <link
            rel="apple-touch-icon"
            sizes="60x60"
            href="http://localhost/WebBanHangMoHinhMVC/public/favicon/apple-icon-60x60.png"
        />
        <link
            rel="apple-touch-icon"
            sizes="72x72"
            href="http://localhost/WebBanHangMoHinhMVC/public/favicon/apple-icon-72x72.png"
        />
        <link
            rel="apple-touch-icon"
            sizes="76x76"
            href="http://localhost/WebBanHangMoHinhMVC/public/favicon/apple-icon-76x76.png"
        />
        <link
            rel="apple-touch-icon"
            sizes="114x114"
            href="http://localhost/WebBanHangMoHinhMVC/public/favicon/apple-icon-114x114.png"
        />
        <link
            rel="apple-touch-icon"
            sizes="120x120"
            href="http://localhost/WebBanHangMoHinhMVC/public/favicon/apple-icon-120x120.png"
        />
        <link
            rel="apple-touch-icon"
            sizes="144x144"
            href="http://localhost/WebBanHangMoHinhMVC/public/favicon/apple-icon-144x144.png"
        />
        <link
            rel="apple-touch-icon"
            sizes="152x152"
            href="http://localhost/WebBanHangMoHinhMVC/public/favicon/apple-icon-152x152.png"
        />
        <link
            rel="apple-touch-icon"
            sizes="180x180"
            href="http://localhost/WebBanHangMoHinhMVC/public/favicon/apple-icon-180x180.png"
        />
        <link
            rel="icon"
            type="image/png"
            sizes="192x192"
            href="http://localhost/WebBanHangMoHinhMVC/public/favicon/android-icon-192x192.png"
        />
        <link
            rel="icon"
            type="image/png"
            sizes="32x32"
            href="http://localhost/WebBanHangMoHinhMVC/public/favicon/favicon-32x32.png"
        />
        <link
            rel="icon"
            type="image/png"
            sizes="96x96"
            href="http://localhost/WebBanHangMoHinhMVC/public/favicon/favicon-96x96.png"
        />
        <link
            rel="icon"
            type="image/png"
            sizes="16x16"
            href="http://localhost/WebBanHangMoHinhMVC/public/favicon/favicon-16x16.png"
        />
        <link rel="manifest" href="http://localhost/WebBanHangMoHinhMVC/public/favicon/manifest.json" />
        <meta name="msapplication-TileColor" content="#ffffff" />
        <meta
            name="msapplication-TileImage"
            content="http://localhost/WebBanHangMoHinhMVC/public/favicon/ms-icon-144x144.png"
        />
        <meta name="theme-color" content="#ffffff" />
        <!-- embed font -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&family=Sora:wght@100..800&display=swap"
            rel="stylesheet"
        />
        <!-- link icon -->
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
            integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
        <!-- link css -->
        <link rel="stylesheet" href="http://localhost/WebBanHangMoHinhMVC/public/css/reset.css" />
        <link rel="stylesheet" href="http://localhost/WebBanHangMoHinhMVC/public/css/style.css" />
        <!-- link js -->
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        
       
    </head>
    <body>
        <!-- header -->
        <header class="header">
            <div class="container">
                <div class="header__info">
                    <div class="header__info-left">
                        <a href="#!" class="header__info-phone">
                            <i class="fa-solid fa-phone-flip"></i>
                            Hotline: 0888.888.888
                        </a>
                    </div>
                    <div class="header__info-right">
                        <ul class="header__info-list">
                            <li class="header__info-items">
                                <a href="#!" class="header__info-link">
                                    Cách chọn Size
                                </a>
                            </li>
                            <li class="header__info-items">
                                <a href="#!" class="header__info-link">
                                    Chính sách khách vip
                                </a>
                            </li>
                            <li class="header__info-items">
                                <a href="#!" class="header__info-link">
                                    Giới thiệu
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <!-- nav -->
        <nav class="fixed">
            <div class="container container__nav">
                <div class="nav__inner">
                    <!-- logo -->
                    <a href="#" class="nav__link-logo">
                        <img
                            src="http://localhost/WebBanHangMoHinhMVC/public/img/logo.png"
                            alt=""
                            class="nav-logo"
                        />
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
                        
                        <!-- <li class="nav__list-items">
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
                        </li> -->
                        <li class="nav__list-items">
                            <a href="#!" class="nav__item-link">OUTLET SALE</a>
                        </li>
                    </ul>
                    <!-- search -->
                    <!-- Search form -->
                    <div class="nav__form">
                        <form action="" class="search-form">
                            <input
                                type="text"
                                class="search-form__input"
                                placeholder="Tìm kiếm ..."
                            />
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
                            <a href="" class="nav__signin"
                                >Đăng nhập</a
                            >
                            <span>/</span>
                            <a href="#!" class="nav__signup">Đăng ký</a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <!-- hero -->
        <section class="hero">
            <div class="hero__inner">
                <div class="hero__media">
                    <i class="fa-solid fa-chevron-left hero-chevron-left"></i>
                    <i class="fa-solid fa-chevron-right hero-chevron-right"></i>
                    <div class="hero__media-item">
                        <a href="#!" class="hero__media-link">
                            <img
                                src="http://localhost/WebBanHangMoHinhMVC/public/img/hero-img02.jpg"
                                alt=""
                                class="hero__img"
                            />
                        </a>
                    </div>
                    <div class="hero__media-item">
                        <a href="#!" class="hero__media-link">
                            <img
                                src="http://localhost/WebBanHangMoHinhMVC/public/img/hero-img02.jpg"
                                alt=""
                                class="hero__img"
                            />
                        </a>
                    </div>
                    <div class="hero__media-item">
                        <a href="#!" class="hero__media-link">
                            <img
                                src="http://localhost/WebBanHangMoHinhMVC/public/img/hero-img02.jpg"
                                alt=""
                                class="hero__img"
                            />
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <!-- main -->
        <main>
            <section class="product">
                <div class="container">
                    <!-- fashion - 01 -->
                    <section class="product__fashion">
                        <p class="product__title">THỜI TRANG HOT</p>
                        <div class="product__list" id ="product__list">

                        <!-- nội dung của ajax -->



                       </div>
                    </section>
                </div>
                
            </section>
            <section class="product__intro-wrap">
                <div class="container">
                    <div class="product__intro">
                        <div class="product__intro-column">
                            <a href="#!" class="product__intro-link">
                                <img
                                    src="http://localhost/WebBanHangMoHinhMVC/public/img/intro-01.jpg"
                                    alt=""
                                    class="product__intro-img"
                                />
                            </a>
                        </div>
                        <div class="product__intro-column">
                            <a href="#!" class="product__intro-link">
                                <img
                                    src="http://localhost/WebBanHangMoHinhMVC/public/img/intro-02.jpg"
                                    alt=""
                                    class="product__intro-img"
                                />
                            </a>
                        </div>
                        <div class="product__intro-column">
                            <a href="#!" class="product__intro-link">
                                <img
                                    src="http://localhost/WebBanHangMoHinhMVC/public/img/intro-03.jpg"
                                    alt=""
                                    class="product__intro-img"
                                />
                            </a>
                        </div>
                    </div>
                </div>
            </section>
            <section class="product">
                <div class="container">
                    <!-- fashion - 02 -->
                    <section class="product__fashion">
                        <p class="product__title">THỜI TRANG MỚI NHẤT</p>
                        <div class="product__list">
                            <!-- item 01 -->
                            <section class="product__item">
                                <a href="#!" class="product__link">
                                    <div class="product__img-wrap">
                                        <img
                                            src="http://localhost/WebBanHangMoHinhMVC/public/img/product02.jpg"
                                            alt=""
                                            class="product__img"
                                        />
                                        <span class="product__img-sale"
                                            >-50%</span
                                        >
                                    </div>

                                    <div class="product__content">
                                        <div class="product__content-price">
                                            xxx VND
                                        </div>
                                        <p class="product__content-title">
                                            Quần tây
                                        </p>
                                    </div>
                                </a>
                            </section>
                            <!-- item 02 -->
                            <section class="product__item">
                                <a href="#!" class="product__link">
                                    <div class="product__img-wrap">
                                        <img
                                            src="http://localhost/WebBanHangMoHinhMVC/public/img/product02.jpg"
                                            alt=""
                                            class="product__img"
                                        />
                                        <span class="product__img-sale"
                                            >-50%</span
                                        >
                                    </div>

                                    <div class="product__content">
                                        <div class="product__content-price">
                                            xxx VND
                                        </div>
                                        <p class="product__content-title">
                                            Quần tây
                                        </p>
                                    </div>
                                </a>
                            </section>
                            <!-- item 03 -->
                            <section class="product__item">
                                <a href="#!" class="product__link">
                                    <div class="product__img-wrap">
                                        <img
                                            src="http://localhost/WebBanHangMoHinhMVC/public/img/product02.jpg"
                                            alt=""
                                            class="product__img"
                                        />
                                        <span class="product__img-sale"
                                            >-50%</span
                                        >
                                    </div>

                                    <div class="product__content">
                                        <div class="product__content-price">
                                            xxx VND
                                        </div>
                                        <p class="product__content-title">
                                            Quần tây
                                        </p>
                                    </div>
                                </a>
                            </section>
                            <!-- item 04 -->
                            <section class="product__item">
                                <a href="#!" class="product__link">
                                    <div class="product__img-wrap">
                                        <img
                                            src="http://localhost/WebBanHangMoHinhMVC/public/img/product02.jpg"
                                            alt=""
                                            class="product__img"
                                        />
                                        <span class="product__img-sale"
                                            >-50%</span
                                        >
                                    </div>

                                    <div class="product__content">
                                        <div class="product__content-price">
                                            xxx VND
                                        </div>
                                        <p class="product__content-title">
                                            Quần tây
                                        </p>
                                    </div>
                                </a>
                            </section>
                            <!-- item 05 -->
                            <section class="product__item">
                                <a href="#!" class="product__link">
                                    <div class="product__img-wrap">
                                        <img
                                            src="http://localhost/WebBanHangMoHinhMVC/public/img/product02.jpg"
                                            alt=""
                                            class="product__img"
                                        />
                                        <span class="product__img-sale"
                                            >-50%</span
                                        >
                                    </div>

                                    <div class="product__content">
                                        <div class="product__content-price">
                                            xxx VND
                                        </div>
                                        <p class="product__content-title">
                                            Quần tây
                                        </p>
                                    </div>
                                </a>
                            </section>
                        </div>
                    </section>
                </div>
            </section>
            <section class="product">
                <div class="container">
                    <!-- fashion - 03 -->
                    <section class="product__fashion">
                        <p class="product__title">THỜI TRANG BÁN CHẠY</p>
                        <div class="product__list-hot">
                            <i
                                class="fa-solid fa-chevron-left product-chevron-left"
                            >
                            </i>
                            <i
                                class="fa-solid fa-chevron-right product-chevron-right"
                            >
                            </i>
                            <!-- item 01 -->
                            <section class="product__item-hot">
                                <a href="#!" class="product__link">
                                    <div class="product__img-wrap">
                                        <img
                                            src="http://localhost/WebBanHangMoHinhMVC/public/img/product01.jpg"
                                            alt=""
                                            class="product__img"
                                        />
                                        <span class="product__img-sale"
                                            >-50%</span
                                        >
                                    </div>

                                    <div class="product__content">
                                        <div class="product__content-price">
                                            xxx VND
                                        </div>
                                        <p class="product__content-title">
                                            Quần tây
                                        </p>
                                    </div>
                                </a>
                            </section>
                            <!-- item 02 -->
                            <section class="product__item-hot">
                                <a href="#!" class="product__link">
                                    <div class="product__img-wrap">
                                        <img
                                            src="http://localhost/WebBanHangMoHinhMVC/public/img/product01.jpg"
                                            alt=""
                                            class="product__img"
                                        />
                                        <span class="product__img-sale"
                                            >-50%</span
                                        >
                                    </div>

                                    <div class="product__content">
                                        <div class="product__content-price">
                                            xxx VND
                                        </div>
                                        <p class="product__content-title">
                                            Quần tây
                                        </p>
                                    </div>
                                </a>
                            </section>
                            <!-- item 03 -->
                            <section class="product__item-hot">
                                <a href="#!" class="product__link">
                                    <div class="product__img-wrap">
                                        <img
                                            src="http://localhost/WebBanHangMoHinhMVC/public/img/product01.jpg"
                                            alt=""
                                            class="product__img"
                                        />
                                        <span class="product__img-sale"
                                            >-50%</span
                                        >
                                    </div>

                                    <div class="product__content">
                                        <div class="product__content-price">
                                            xxx VND
                                        </div>
                                        <p class="product__content-title">
                                            Quần tây
                                        </p>
                                    </div>
                                </a>
                            </section>
                            <!-- item 04 -->
                            <section class="product__item-hot">
                                <a href="#!" class="product__link">
                                    <div class="product__img-wrap">
                                        <img
                                            src="http://localhost/WebBanHangMoHinhMVC/public/img/product01.jpg"
                                            alt=""
                                            class="product__img"
                                        />
                                        <span class="product__img-sale"
                                            >-50%</span
                                        >
                                    </div>

                                    <div class="product__content">
                                        <div class="product__content-price">
                                            xxx VND
                                        </div>
                                        <p class="product__content-title">
                                            Quần tây
                                        </p>
                                    </div>
                                </a>
                            </section>
                            <!-- item 05 -->
                            <section class="product__item-hot">
                                <a href="#!" class="product__link">
                                    <div class="product__img-wrap">
                                        <img
                                            src="http://localhost/WebBanHangMoHinhMVC/public/img/product01.jpg"
                                            alt=""
                                            class="product__img"
                                        />
                                        <span class="product__img-sale"
                                            >-50%</span
                                        >
                                    </div>

                                    <div class="product__content">
                                        <div class="product__content-price">
                                            xxx VND
                                        </div>
                                        <p class="product__content-title">
                                            Quần tây
                                        </p>
                                    </div>
                                </a>
                            </section>
                            <!-- item 06 -->
                            <section class="product__item-hot">
                                <a href="#!" class="product__link">
                                    <div class="product__img-wrap">
                                        <img
                                            src="http://localhost/WebBanHangMoHinhMVC/public/img/product01.jpg"
                                            alt=""
                                            class="product__img"
                                        />
                                        <span class="product__img-sale"
                                            >-50%</span
                                        >
                                    </div>

                                    <div class="product__content">
                                        <div class="product__content-price">
                                            xxx VND
                                        </div>
                                        <p class="product__content-title">
                                            Quần tây
                                        </p>
                                    </div>
                                </a>
                            </section>
                        </div>
                    </section>
                </div>
            </section>
        </main>
        <footer class="footer">
            <div class="footer__top">
                <div class="container">
                    <div class="footer__row">
                        <div class="footer__column">
                            <h3 class="footer__title-top">
                                THANH TOÁN & GIAO HÀNG
                            </h3>
                            <ul class="footer__list">
                                <li class="footer__item-desc">
                                    Miễn phí vận chuyển cho đơn hàng trên
                                    399.000 VNĐ
                                </li>
                                <li class="footer__item-desc">
                                    - Giao hàng và thu tiền tận nơi
                                </li>
                                <li class="footer__item-desc">
                                    - Chuyển khoản và giao hàng
                                </li>
                                <li class="footer__item-desc">
                                    - Mua hàng tại shop
                                </li>
                            </ul>
                        </div>
                        <div class="footer__column">
                            <h3 class="footer__title-top">THẺ THÀNH VIÊN</h3>
                            <ul class="footer__list">
                                <li class="footer__item-desc">
                                    Chế độ ưu đãi thành viên VIP:
                                </li>
                                <li class="footer__item-desc">
                                    - 5% cho thành viên Bạc
                                </li>
                                <li class="footer__item-desc">
                                    - 10% cho thành viên Vàng
                                </li>
                                <li class="footer__item-desc">
                                    - 15% cho thành viên Kim cương
                                </li>
                            </ul>
                        </div>
                        <div class="footer__column">
                            <h3 class="footer__title-top">GIỜ MỞ CỬA</h3>
                            <ul class="footer__list">
                                <li class="footer__item-desc">
                                    8h30 đến 22:00
                                </li>
                                <li class="footer__item-desc">
                                    - Tất cả các ngày trong tuần
                                </li>
                                <li class="footer__item-desc">
                                    - Áp dụng cho tất cả các chi nhánh hệ thống
                                    cửa hàng MENSTYLE
                                </li>
                            </ul>
                        </div>
                        <div class="footer__column">
                            <h3 class="footer__title-top">HỖ TRỢ 24/7</h3>
                            <ul class="footer__list">
                                <li class="footer__item-desc">
                                    Gọi ngay cho chúng tôi khi bạn có thắc mắc
                                </li>
                                <li class="footer__item-desc">
                                    - 0868.444.644
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer__center">
                <div class="container">
                    <div class="footer__row-center">
                        <div class="footer__column">
                            <a href="#">
                                <img
                                    src="http://localhost/WebBanHangMoHinhMVC/public/img/logo.png"
                                    alt=""
                                    class="footer__logo"
                                />
                            </a>
                            <ul>
                                <li class="footer__item-center">
                                    <a href="#!" class="footer__link">
                                        Giới thiệu
                                    </a>
                                </li>
                                <li class="footer__item-center">
                                    <a href="#!" class="footer__link">
                                        Liên hệ
                                    </a>
                                </li>
                                <li class="footer__item-center">
                                    <a href="#!" class="footer__link">
                                        Tuyển dụng
                                    </a>
                                </li>
                                <li class="footer__item-center">
                                    <a href="#!" class="footer__link">
                                        Tin tức
                                    </a>
                                </li>
                                <li class="footer__item-center">
                                    <div class="footer__link-wrap">
                                        <span>Email:</span>
                                        <a href="#!" class="footer__link"
                                            >info@menstyle.com</a
                                        >
                                    </div>
                                </li>
                                <li class="footer__item-center">
                                    <div class="footer__link-wrap">
                                        <span>HotLine:</span>
                                        <a href="#!" class="footer__link"
                                            >0888.888.888</a
                                        >
                                    </div>
                                </li>
                            </ul>
                            <form action="" class="footer__form">
                                <label for="email" class="footer__form-label">
                                    Đăng ký nhận email khuyến mãi
                                    <input
                                        type="email"
                                        name="email"
                                        id="email"
                                        placeholder="Email của bản"
                                        class="footer__form-input"
                                    />
                                </label>
                                <button
                                    type="submit"
                                    class="footer__form-button"
                                >
                                    ĐĂNG KÝ
                                </button>
                            </form>
                        </div>
                        <div class="footer__column">
                            <h3 class="footer__title-center">
                                HỖ TRỢ KHÁCH HÀNG
                            </h3>
                            <ul>
                                <li class="footer__item-center">
                                    <a href="#!" class="footer__link"
                                        >Hướng dẫn đặt hàng</a
                                    >
                                </li>
                                <li class="footer__item-center">
                                    <a href="#!" class="footer__link"
                                        >Hướng dẫn chọn size</a
                                    >
                                </li>
                                <li class="footer__item-center">
                                    <a href="#!" class="footer__link"
                                        >Cậu hỏi thường gặp</a
                                    >
                                </li>
                                <li class="footer__item-center">
                                    <a href="#!" class="footer__link"
                                        >Chính sách khách VIP</a
                                    >
                                </li>
                                <li class="footer__item-center">
                                    <a href="#!" class="footer__link"
                                        >Thanh toán - Giao hàng</a
                                    >
                                </li>
                                <li class="footer__item-center">
                                    <a href="#!" class="footer__link"
                                        >Chính sách đổi trả</a
                                    >
                                </li>
                                <li class="footer__item-center">
                                    <a href="#!" class="footer__link"
                                        >Chính sách bảo mật</a
                                    >
                                </li>
                                <li class="footer__item-center">
                                    <a href="#!" class="footer__link"
                                        >Chính sách cookie</a
                                    >
                                </li>
                            </ul>
                        </div>
                        <div class="footer__column">
                            <h3 class="footer__title-center">
                                HỆ THỐNG CỬA HÀNG
                            </h3>
                        </div>
                        <div class="footer__column">
                            <h3 class="footer__title-center">
                                KẾT NỐI VỚI 4 MEN
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer__bottom">
                <div class="container">
                    <div class="footer__row-bottom">
                        <div class="footer__column">
                            <div class="footer__text-wrap">
                                <p class="footer__text">
                                    Copyright 2024 · Thiết kế và phát triển bởi
                                    <strong>MENSTYLE</strong>
                                    SHOP All rights reserved
                                </p>
                                <p class="footer__text">
                                    Chủ quản: ông Nguyễn Ngọc Năm. MST cá
                                    nhân:<br />
                                    0312028096 Số ĐKKD: 41G8031109 do UBND Quận
                                    7 -<br />
                                    Tp.HCM cấp ngày 05/06/2017
                                </p>
                                <p class="footer__text-color">
                                    Nhãn hiệu "MENSTYLE" đã được đăng kí độc
                                    quyền tại Cục sở hữu trí tuệ Việt Nam
                                </p>
                            </div>
                        </div>
                        <div class="footer__column">
                            <a href="#!" class="footer__bottom-wrap">
                                <img
                                    src="http://localhost/WebBanHangMoHinhMVC/public/img/footer-img.png"
                                    alt=""
                                    class="footer__bottom-link"
                                />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </body>
    <script src="http://localhost/WebBanHangMoHinhMVC/public/script/trangchu.js"></script>
</html>
