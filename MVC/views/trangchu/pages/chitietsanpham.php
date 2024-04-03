<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Chi tiết sản phẩm</title>
    <!-- link icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- link css -->
    <link rel="stylesheet" href="<?php echo Root ?>public/css/TrangChu/style.css">
    <link rel="stylesheet" href="http://localhost/WebBanHangMoHinhMVC/public/css/TrangChu/reset.css" />
    <link rel="stylesheet" href="http://localhost/WebBanHangMoHinhMVC/public/css/TrangChu/styleAllForm.css" />
    <link rel="stylesheet" href="http://localhost/WebBanHangMoHinhMVC/public/css/TrangChu/style.css" />
    <link rel="stylesheet" href="http://localhost/WebBanHangMoHinhMVC/public/css/TrangChu/chitietsanpham.css" />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>

<body>
    <?php 
// require_once "./MVC/views/trangchu/block/header.php";
// require('./MVC/views/trangchu/block/navbar.php');
    
?>
    <div class="grid-container">
        <div class="grid-item item1">
            <div class="menu__sub">
                <div class="container">
                    <ul class="menu__sub-list">
                        <li class="menu__sub-item">
                            <a class="menu__sub-link" href="#!">item 1</a>
                        </li>
                        <li class="menu__sub-item">
                            <a class="menu__sub-link" href="#!">item 2</a>
                        </li>
                        <li class="menu__sub-item">
                            <a class="menu__sub-link" href="#!">item 3</a>
                        </li>
                        <li class="menu__sub-item">
                            <a class="menu__sub-link" href="#!">item 4</a>
                        </li>
                        <li class="menu__sub-item">
                            <a class="menu__sub-link" href="#!">item 5</a>
                        </li>
                        <li class="menu__sub-item">
                            <a class="menu__sub-link" href="#!">item 6</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="grid-item item3">
            <div class="container">
                <div class="content__img">
                    <div class="content__img-list">
                            <?php
                            if ($data['img']->num_rows > 0) {
                                while ($row = $data['img']->fetch_assoc()) {
                                        echo  '
                                        <img src="http://localhost/WebBanHangMoHinhMVC/public/img/'.$row['HinhAnh'].'"
                                         alt="" class="content__img-item" onclick="changeLargeImage(\'http://localhost/WebBanHangMoHinhMVC/public/img/'.$row['HinhAnh'].'\')">';
                                }
                            }
                            echo '</div>';
                            if ($data['imgmain']->num_rows > 0) {
                                while ($row = $data['imgmain']->fetch_assoc()) {
                                        
                                    echo '
                                        <div class="content__img-main-wrap"><img  src="http://localhost/WebBanHangMoHinhMVC/public/img/'.$row['HinhAnh'].'" alt=""
                                            class="content__img-main" id="largeImage"></div>';
                                }
                            }
                            ?>
                            
                        <!-- <img src="http://localhost/WebBanHangMoHinhMVC/public/img/product03.jpg" alt="" class="content__img-item">
                        <img src="http://localhost/WebBanHangMoHinhMVC/public/img/product04.jpg" alt="" class="content__img-item">
                        <img src="http://localhost/WebBanHangMoHinhMVC/public/img/product05.jpg" alt="" class="content__img-item">
                        <img src="http://localhost/WebBanHangMoHinhMVC/public/img/product06.jpg" alt="" class="content__img-item">
                        <img src="http://localhost/WebBanHangMoHinhMVC/public/img/product07.jpg" alt="" class="content__img-item"> -->
                    <!-- </div>
                    <div class="content__img-main-wrap"><img src="http://localhost/WebBanHangMoHinhMVC/public/img/product03.jpg" alt=""
                            class="content__img-main">
                    </div> -->
                    
                    <!-- <script>
                        function changeLargeImage(imageSrc) {
                            document.getElementById('largeImage').src = imageSrc;
                        }
                    </script> -->
                    <script>
                        
                    </script>
                    <div class="content__info">
                        <div class="content__info-inner">
                            <!-- <h2 class="content__info-title">Áo Dài Cách Tân Nữ Lụa Tay Loe</h2>
                            <p class="content__info-price">399.000 VND</p> -->
                            <?php
                            if ($data['thongtin']->num_rows > 0) {
                                while ($row = $data['thongtin']->fetch_assoc()) {
                                        echo    '
                                        <h2 class="content__info-title" name = "content__info-title" id ="'.$row['MaSanPham'].'">'.$row['TenSanPham'].'</h2>
                                        <p class="content__info-price" id ="content__info-price">'.$row['GiaSanPham'].'</p>';
                                    }
                            }
                            ?>
                            <div class="content__info-wrap">
                                <p class="content__info-color" id= "content__info-color">Màu sắc :</p>
                                <span class="SoLuong" id= "SoLuong">Số lượng còn lại :</span>
                            </div>
                            <form action="" method="post">
                                <div class="content__input">
                                <?php
                                if ($data['mausac']->num_rows > 0) {
                                    while ($row = $data['mausac']->fetch_assoc()) {
                                            echo  '
                                                     <input class="content__input-radio" type="radio" onclick ="change()" name="mausac" id="'.$row['TenMauSac'].'" value="'.$row['MaMauSac'].'">
                                                     <label class="content__input-label" for="'.$row['TenMauSac'].'">
                                                    <span class="content__input-span" id="content__input-span" va></span>
                                                    </label>
                                                     '.$row['TenMauSac'];
                                    }
                                }
                                ?>
                                    <!-- <label class="content__input-label" for="white"></label>
                                    <input type="radio" name="" id="white">
                                    <label class="content__input-label" for="black"></label>
                                    <input type="radio" name="" id="black">
                                    <label class="content__input-label" for="be"></label>
                                    <input type="radio" name="" id="be">
                                    <label class="content__input-label" for="red"></label>
                                    <input type="radio" name="" id="red"> -->
                                </div>
                                
                                <div class="content__input">
                                    <select name="" id="content__input-select"  class="content__input-select">
                                        <!-- <option value="sizeS">S</option>
                                        <option value="sizeL">L</option>
                                        <option value="sizeM">M</option> -->
                                        <?php
                                        if ($data['kichco']->num_rows > 0) {
                                            while ($row = $data['kichco']->fetch_assoc()) {
                                                    echo    '
                                                    <option  value="'.$row['MaKichCo'].'" >'.$row['TenKichCo'].'</option>';
                                                }
                                        }
                                        ?>
                                    </select>
                                
                                    <input type="number" name="" id="content__input-number" class="content__input-number" value="1"  min="1" >
                                </div>

                                <div class="content__input"><button onclick="addgiohang()" type="button" class="btn btn--primary">Thêm vào giỏ hàng</button>
                                </div>
                                
                                <div class="content__input"><button class="btn ">Mua ngay</button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
     
    <div class="grid-item item5">
        <?php 

            require('./MVC/views/trangchu/block/viewProduct02.php');
            require('./MVC/views/trangchu/block/footer.php');
            ?>
    </div>
    </div>
</body>

</html>
<script src="http://localhost/WebBanHangMoHinhMVC/public/script/TrangChu/trangchu.js"></script>
<script src="http://localhost/WebBanHangMoHinhMVC/public/script/TrangChu/GioHangJS.js"></script>