<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>thongTinSanPham</title>
     <!-- link icon -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- link css -->
    <link rel="stylesheet" href="<?php echo Root ?>public/css/TrangChu/thongTinSanPham.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  
</head>
<body>
    <header class="user__header ">
        <h2 class="client-title-01">Quản lý đơn hàng</h2>
    </header>
    <main class="user__main">
        <ul class="user-product__list">
            <!-- item 01 -->
            
                <?php
                    if ($data['HD']->num_rows > 0) {
                        while ($row = $data['HD']->fetch_assoc()) {
                            echo    '
                            <li class=" user-product-item-wrap">
                                <a href="#!" class="user-product-item" id="'.$row['MaHoaDon'].'" onclick="GetCTHD(this)">
                                    <div class="product-item__row">
                            
                                    <span>Số hoá đơn:'.$row['MaHoaDon'].'</span>';
                                    if($row['TrangThai']==-1){
                                        echo'<span class="product-item__column-span">Đã hủy</span>';
                                    }
                                    else
                                    if($row['TrangThai']==0){
                                        echo'<span class="product-item__column-span">Đang đợi xử lý</span>';
                                    }
                                    else if($row['TrangThai']==1){
                                        echo'<span class="product-item__column-span">Đã gọi xác nhận</span>';
                                    }
                                    else if($row['TrangThai']==2){
                                        echo'<span class="product-item__column-span">Đã giao</span>';
                                    }
                                    
                                    echo '
                                    </div>
                                    <div class="product-item__row">                       
                                        <div class="product-item__column product-item__column-w">
                                            
                                            <div class="product-item__info">
                                                    
                
                                                    <div class="product-item__info-wrap">
                                                        <span class="product-item__info-span">Tổng tiền hàng:</span>
                                                        <span>'.number_format($row['TongTien'], 0, ',', '.').' VNĐ</span>
                                                    </div>
                
                                                    <div class="product-item__info-wrap">
                                                        <span class="product-item__info-span">Ngày đặt hàng:</span>
                                                        <span>'.$row['NgayLap'].'</span>
                                                    </div>
                                            </div>
                                            <div class="product-item__info-price">
                                                        <span>Tổng thanh toán:'.number_format($row['TongTien'], 0, ',', '.').' VNĐ</span>
                                            </div>
                                        
                                            
                                        </div>
                                
                                    </div>
                                </a>
                            </li>';
                            }
                    }
                ?>
                    
                

        
        </ul>
     
    </main>
</body>
</html>
<script src="<?php echo Root ?>public/script/TrangChu/QLHoaDonJS.js"></script>