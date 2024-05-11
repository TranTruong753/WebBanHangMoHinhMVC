

   
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
    <script>
        $(document).ready(function() {
            var element = document.querySelector(".info__client-right");
            element.style.overflowY = "scroll";
          

            })

      </script>

<script src="<?php echo Root ?>public/script/TrangChu/QLHoaDonJS.js"></script>