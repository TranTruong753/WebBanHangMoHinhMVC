

<?php 
    require('./MVC/views/trangchu/block/header.php');
?>

    <nav class="nav-form__pay fixed">
        <div class="container container__nav">
            <div class="nav-pay__inner">
                <!-- logo -->
                <a href="#" class="nav__link-logo hidden-tablet">
                    <img src="<?php echo Root ?>public/img/logo.png" alt="MENSTYLE" class="nav-logo" />
                </a>
                <!-- thanh quy trình -->
                <div class="nav-pay__procedure">
                    <div class="pay__procedure-list">
                        <!-- item 01 -->
                        <div class="pay__procedure-item">
                            <div class="procedure-item__icon pay--active">
                                <i class="fa-solid fa-cart-shopping"></i>
                            </div>
                            <div class="procedure-item__title pay-title--active">
                                GIỎ HÀNG
                            </div>
                        </div>

                        <span class="pay__procedure-line">                            
                        </span>
                         <!-- item 02 -->
                        <div class="pay__procedure-item">
                            <div class="procedure-item__icon">
                                <i class="fa-solid fa-money-bill"></i>
                            </div>
                            <div class="procedure-item__title">
                                THANH TOÁN
                            </div>
                        </div>

                        <span class="pay__procedure-line">                            
                        </span>

                          <!-- item 03 -->
                        <div class="pay__procedure-item">
                            <div class="procedure-item__icon">
                                <i class="fa-solid fa-check"></i>
                            </div>
                            <div class="procedure-item__title">
                                HOÀN TẤT
                            </div>
                        </div>
                    </div>
                </div>

                <!-- thanh tiếp tục -->
                <div class="nav-pay__next hidden-tablet">
                    <a href="#!" class="pay__next-wrap">
                        <div class="pay__next-title">TIẾP TỤC MUA SẮM</div>
                        <div class="pay__next-icon">
                            <i class="fa-solid fa-arrow-right"></i>
                        </div>
                    </a>
                </div>

            </div>

        </div>
    </nav>

    <div class="grid-container">
        <div class="grid-item item1">
            <!-- <div class="menu__sub">
                <div class="container container__nav">
                    <ul class="menu__sub-list">
                        <li class="menu__sub-item">
                            <a class="menu__sub-link" href="#!">item 1</a>
                        </li>
                        <li class="menu__sub-item">
                            <a class="menu__sub-link" href="#!">item 2</a>
                        </li>                      
                    </ul>
                 
                </div> -->
                <?php 
                    require('./MVC/views/trangchu/block/link.php');
                ?>
            </div>       
                            
              
        </div>
        <div class="grid-item item3">

            <div class="container container__nav">
                <div class="procedure__main">
                   <div class="procedure__main-left">
                       <div class="procedure-left__top table">
                            <div class="procedure-wrap">
                                <div class="procedure-left__header-top">
                                    <span>Thông Tin Nhận Hàng</span>
                                    <!-- <button type="button" class="btn btn-procedure-left">Thêm địa chỉ mới</button> -->                                  
                                </div>
                                <div class="procedure-left__info table">
                                    
                                        <input class="procedure-left__info-input " type="tel" name="" id="sdt" placeholder="Nhập số điện thoại...">
                                        <textarea class="procedure-left__info-textarea" name="" id="diachi" cols="30" rows="5" placeholder="Nhập địa chỉ của bạn"></textarea>
                                   
                                </div>
                                                             
                            </div>
                       </div>
                       <div class="procedure-left__center table">
                        <input type="hidden" id="ctspchoose" value="<?php echo $data['CTSP']?>">
                            <div class="procedure-wrap" id ="procedure-wrap">
                                <div class="procedure-left__header">
                                    <input class="procedure-input__check"  type="checkbox" name="allProduct" id="allProduct">
                                    <label class="procedure-label__check" for="allProduct"><span class="procedure-label__tick"></span></label>
                                    <label for="allProduct">Tất cả</label>
                                </div>
                                <table class="procedure__table table">
                                    <!-- tiêu đề -->
                                    <tr class="table table-title">
                                        <th style="text-align: left; padding-left:30px;">Sản phẩm</th>
                                        <th>Số lượng</th>
                                        <th>Đơn giá</th>
                                        <th>Tổng tính</th>
                                        <th>Xóa</th>
                                    </tr>
                                       
                                        <?php
                                        
                                        if ($data['GH']->num_rows > 0) {
                                            while ($row = $data['GH']->fetch_assoc()) {
                                                $tongtien=0;
                                                $tongtien=$tongtien+$row['SoLuong']*$row['GiaSanPham'];
                                                    echo  '
                                        <tr class="table-title table-line">
                                            <td class="table-product">';
                                            if($row['MaChiTietSanPham']== $data['CTSP']){
                                                echo '<input type="hidden" id="mactspgh" value="'.$row['MaChiTietSanPham'].'">
                                                <input class="procedure-input__check" type="checkbox" checked  onclick="clicka(this)" value="'.$tongtien.'" name="product" id="'.$row['MaChiTietSanPham'].'" >
                                                ';
                                            } else {
                                                echo '<input class="procedure-input__check" type="checkbox"  onclick="clicka(this)" value="'.$tongtien.'" name="product" id="'.$row['MaChiTietSanPham'].'" >';
                                            }
                                            echo' <label class="procedure-label__check" for="'.$row['MaChiTietSanPham'].'" ><span  class="procedure-label__tick"></span></label>                                  
                                                <div class="table-product__info">
                                                    <img class="table-product__img" src="http://localhost/WebBanHangMoHinhMVC/public/img/'.$row['HinhAnh'].'" alt="">
                                                    <div class="table-title-wrap">
                                                        <p class="table__info-title">'.$row['TenSanPham'].'</p>
                                                    <div class="table__info-input-wrap">
                                                            <div class="table__info-size">'.$row['TenKichCo'].'</div>
                                                            <div class="table__info-color">Color: '.$row['TenMauSac'].'</div>                                                
                                                    </div>
                                                    </div>
                                                </div>                                       
                                            </td>
                                            <td>
                                            '.$row['SoLuong'].'
                                            </td>
                                            <td>
                                            '.number_format($row["GiaSanPham"], 0, ',', '.').' VNĐ
                                            </td>
                                            <td>
                                            '.number_format($row['SoLuong']*$row['GiaSanPham'], 0, ',', '.').' VNĐ
                                            </td>
                                            <td>
                                                <div class="table__icon" id="xoa'.$row['MaChiTietSanPham'].'"  onclick="Delete(this)"><i class="fa-solid fa-trash"></i></div>
                                                <input type="hidden" id="xoa'.$row['MaChiTietSanPham'].'x" value="'.$row['MaChiTietSanPham'].'">
                                            </td>
                                        </tr>';
                                        
                                            }
                                        }?>
                                    

                                </table>
                            </div>
                       </div>
                       <!-- <div class="procedure-left__bottom table">
                            <div class="procedure-wrap">
                                <div class="procedure-left__header">
                                    <span>Giảm Trừ</span>
                                </div>                             
                            </div>
                       </div> -->
                   </div>
                   <div class="procedure__main-right ">
                     <div class="procedure-right__top table">
                         <div class="procedure-wrap">
                               <div class="procedure__price-wrap">
                                   <div class="procedure__row">
                                       <div class="procedure-right__icon-wrap"><span>Phương Thức Thanh Toán</span></div>
                                       <span>Vui lòng chọn 1</span>
                                   </div>
                               </div>
                              
                                <div class="procedure-radio-wrap">
                                    <div class="radio-row">
                                        <input
                                            class="procedure__raido-input"
                                            type="radio"
                                            id="atm"
                                            name="pttt"
                                            value="ATM card (Thẻ nội địa)"
                                            checked
                                            hidden
                                        />
                                        
                                        <label class="procedure__radio-label" for="atm"
                                            ><span class="procedure__radio-span"></span>                                               
                                            <img class="procedure__logo" src="<?php echo Root ?>public/img/logo-atm@3x.png" alt="">
                                            ATM card (Thẻ nội địa)
                                            
                                        </label>
                                    </div>
                                    <div class="radio-row">
                                        <input
                                            class="procedure__raido-input"
                                            type="radio"
                                            id="visa"
                                            name="pttt"
                                            value="Thẻ quốc tế (Visa, Master, JCB)"
                                            hidden
                                        />
                                    
                                        <label class="procedure__radio-label" for="visa"
                                            ><span class="procedure__radio-span"></span>                                              
                                            <img class="procedure__logo" src="<?php echo Root ?>public/img/logo-visa-master-jcb@3x.png" alt="">
                                            Thẻ quốc tế (Visa, Master, JCB)</label
                                        >
                                    </div>
                                    <div class="radio-row">
                                        <input
                                            class="procedure__raido-input"
                                            type="radio"
                                            id="momo"
                                            name="pttt"
                                            value="Thanh toán qua MoMo"
                                            hidden
                                        />
                                    
                                        <label class="procedure__radio-label" for="momo"
                                            ><span class="procedure__radio-span"></span>                                              
                                            <img class="procedure__logo" src="<?php echo Root ?>public/img/momo2.png" alt="">
                                            Thanh toán qua MoMo</label
                                        >
                                    </div>
                                    <div class="radio-row">
                                        <input
                                            class="procedure__raido-input"
                                            type="radio"
                                            id="shope"
                                            name="pttt"
                                            value="Shopee Pay"
                                            hidden
                                        />
                                        
                                        <label class="procedure__radio-label" for="shope"
                                            ><span class="procedure__radio-span"></span>
                                            <img class="procedure__logo" src="<?php echo Root ?>public/img/shopeePayLogoV2.png" alt="">
                                            Shopee Pay</label
                                        >
                                    </div>
                                    <div class="radio-row">
                                        <input
                                            class="procedure__raido-input"
                                            type="radio"
                                            id="other"
                                            name="pttt"
                                            value="Thanh toán khi nhận hàng"
                                            hidden
                                        />
                                            <label class="procedure__radio-label" for="other"
                                            ><span class="procedure__radio-span"></span>
                                            Thanh toán khi nhận hàng</label
                                        >
                                    </div>
                                    <div class="radio-row">
                                        <input
                                            class="procedure__raido-input procedure__raido-info"
                                            type="radio"
                                            id="bank"
                                            name="pttt"
                                            value="Chuyển khoản"
                                            hidden
                                        />
                                        
                                        <label class="procedure__radio-label" for="bank"
                                            ><span class="procedure__radio-span"></span>
                                            Chuyển khoản</label
                                        >

                                        <div class="radio-info__wrap">

                                            <div class="radio-info__row">
                                               <div class="radio-info__column">
                                                    <span>Số tài khoản</span>
                                                    <span>:</span>
                                                    <span>#########</span> 
                                               </div>
                                               <div class="radio-info__column">
                                                    <i>icon</i>
                                               </div>                                               
                                            </div>

                                            <div class="radio-info__row">
                                               <div class="radio-info__column">
                                                    <span>Ngân hàng</span>
                                                    <span>:</span>
                                                    <span>Viettinbank</span> 
                                               </div>
                                               <div class="radio-info__column">
                                                    <i>icon</i>
                                               </div>                                               
                                            </div>

                                            <div class="radio-info__row">
                                               <div class="radio-info__column">
                                                    <span>Chủ tài khoản</span>
<span>:</span>
                                                    <span>Trần Quang Trường</span> 
                                               </div>
                                               <div class="radio-info__column">
                                                    <i>icon</i>
                                               </div>                                               
                                            </div>

                                            <div class="radio-info__row">
                                               <div class="radio-info__column">
                                                    <span>Nội dung</span>
                                                    <span>:</span>                                                   
                                               </div>
                                               <div class="radio-info__column">
                                                    <i>icon</i>
                                               </div>                                               
                                            </div>


                                        </div>
                                    </div>
                                </div>
                               
                        </div>
                     </div>
                     <div class="procedure-right__bottom table">
                         <div class="procedure-wrap">
                               <div class="procedure__price-wrap">
                                   <div class="procedure-right__icon-wrap"><span>Chi Tiết Thanh Toán</span></div>
                               </div>
                               <div class="procedure__price-wrap">
                                    <div class="procedure__row">
                                        <span>Tổng tiền hàng</span>
                                        <span class="procedure__price" id="hientongtien">0 VNĐ</span>
                                        <input type="hidden" id="tongtien" value="0">
                                    </div>
                                    <div class="procedure__row">
                                        <span>Phí vận chuyển</span>
                                        <span class="procedure__price">80.000 VNĐ</span>
                                        <input type="hidden" id="phivanchuyen" value="80000">
                                    </div>
                               </div>

                               <div class="procedure__price-wrap no--line">
                                    <div class="procedure__row">
                                                <span>Tổng thanh toán</span>
                                                <span class="procedure__price" id="hienthanhtien">80.000 VNĐ</span>
                                                <input type="hidden" id="thanhtien" value="80000">
                                    </div>
                                </div>
                               <button type="button" class="procedure__btn btn btn--primary" onclick="test()">Thanh toán</button>
                         </div>
                     </div>
</div>
                </div>
               
            </div>
        </div>

        <div class="grid-item item5">
            <?php
                require('./MVC/views/trangchu/block/footer.php');

            ?>
        </div>
    </div>

    <!-- dialog -->
    <!-- <dialog> 

    </dialog> -->

<script>
  // Lấy ra checkbox "Tất cả"
var allProductCheckbox = document.getElementById("allProduct");

// Lấy ra tất cả các checkbox khác
var otherCheckboxes = document.querySelectorAll('input[type="checkbox"]:not(#allProduct)');

// Thêm sự kiện "change" cho checkbox "Tất cả"
allProductCheckbox.addEventListener('change', function() {
    // Nếu checkbox "Tất cả" được chọn
    if (allProductCheckbox.checked) {
        // Lặp qua tất cả các checkbox khác và đánh dấu chúng
        otherCheckboxes.forEach(function(checkbox) {
            checkbox.checked = true;
            // Kích hoạt sự kiện clicka
            clicka(checkbox);
        });
    } else {
        // Nếu checkbox "Tất cả" không được chọn, hủy đánh dấu các checkbox khác
        otherCheckboxes.forEach(function(checkbox) {
            checkbox.checked = false;
            // Kích hoạt sự kiện clicka
            clicka(checkbox);
        });
    }
});

</script>

<script src="http://localhost/WebBanHangMoHinhMVC/public/script/TrangChu/GioHangLon.js"></script>