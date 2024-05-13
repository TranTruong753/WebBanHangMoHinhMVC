
    <?php 
// require_once "./MVC/views/trangchu/block/header.php";
// require('./MVC/views/trangchu/block/navbar.php');
    
?>
    <div class="grid-container">
        <div class="grid-item item1">
            <!-- <div class="menu__sub">
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
            </div> -->
            <?php 
                require('./MVC/views/trangchu/block/link.php');
            ?>
        </div>

        <div class="grid-item item3">
            <div class="container">
                <div class="content__img">
                   
                            <?php
                            // if ($data['img']->num_rows > 0) {
                            //     while ($row = $data['img']->fetch_assoc()) {
                            //             echo  '
                            //             <img src="http://localhost/WebBanHangMoHinhMVC/public/img/'.$row['HinhAnh'].'"
                            //              alt="" class="content__img-item" onclick="changeLargeImage(\'http://localhost/WebBanHangMoHinhMVC/public/img/'.$row['HinhAnh'].'\')">';
                            //     }
                            // }
             
                            if ($data['imgmain']->num_rows > 0) {
                                while ($row = $data['imgmain']->fetch_assoc()) {
                                        
                                    echo '
                                        <div class="content__img-main-wrap"><img  src="http://localhost/WebBanHangMoHinhMVC/public/img/'.$row['HinhAnh'].'" alt=""
                                            class="content__img-main" id="largeImage"></div>';
                                }
                            }
                            ?>
                            
                       
                    
                    <!-- <script>
                        function changeLargeImage(imageSrc) {
                            document.getElementById('largeImage').src = imageSrc;
                        }
                    </script> -->
                  
                    <div class="content__info">
                        <div class="content__info-inner">
                            <!-- <h2 class="content__info-title">Áo Dài Cách Tân Nữ Lụa Tay Loe</h2>
                            <p class="content__info-price">399.000 VNĐ</p> -->
                            <?php
                            if ($data['thongtin']->num_rows > 0) {
                                while ($row = $data['thongtin']->fetch_assoc()) {
                                        echo    '
                                        <h2 class="content__info-title" name = "content__info-title" id ="'.$row['MaSanPham'].'">'.$row['TenSanPham'].'</h2>
                                        <p class="content__info-price" id ="content__info-price">'.number_format($row["GiaSanPham"], 0, ',', '.').' VNĐ</p>';
                                    }
                            }
                            ?>
                            <div class="content__info-wrap">
                                <p class="content__info-color" id= "content__info-color">Màu sắc : </p>
                                <span class="" id= "">Số lượng còn lại :</span> <span class="SoLuong" id= "SoLuong"></span>
                            </div>
                            <form action="" method="post">
                                <div class="content__input">
                                <?php
                                if ($data['mausac']->num_rows > 0) {
                                    while ($row = $data['mausac']->fetch_assoc()) {
                                            echo  '
                                                   <div class = "radio-row">
                                                        <input class="content__input-radio user__radio-input" type="radio" onclick ="change()" name="mausac" id="'.$row['TenMauSac'].'" value="'.$row['MaMauSac'].'">
                                                        <label class="user__radio-label" for="'.$row['TenMauSac'].'">
                                                            <span class="user__radio-span" id="content__input-span"></span>
                                                        </label>
                                                   </div>
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
                                
                                <div class="content__input content__input0-mobile">
                                    <select id="content__input-select" onchange="changecount()" class="content__input-select">
                                        <option value="none">Vui lòng chọn màu</option>
                                        <!-- <option value="sizeL">L</option>
                                        <option value="sizeM">M</option> -->
                                        <!-- <?php
                                        if ($data['kichco']->num_rows > 0) {
                                            while ($row = $data['kichco']->fetch_assoc()) {
                                                    echo    '
                                                    <option  value="'.$row['MaKichCo'].'" >'.$row['TenKichCo'].'</option>';
                                                }
                                        }
                                        ?> -->
                                    </select>
                                
                                    <input type="number" name="" id="content__input-number" class="content__input-number" value="1"  min="1" >
                                </div>

                                <div class="content__input">
                                    <button onclick="addgiohang()" type="button" class="btn btn--primary">Thêm vào giỏ hàng</button>
                                </div>
                                
                                <div class="content__input">
                                    <button type="button" onclick="muangay()" class="btn ">Mua ngay</button>
                                </div>
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

<script src="http://localhost/WebBanHangMoHinhMVC/public/script/TrangChu/trangchu.js"></script>
<script src="http://localhost/WebBanHangMoHinhMVC/public/script/TrangChu/GioHangJS.js"></script>