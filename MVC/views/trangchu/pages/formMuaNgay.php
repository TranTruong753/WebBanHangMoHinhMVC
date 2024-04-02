<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mua hàng</title>
    <!-- link icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?php echo Root ?>public/css/TrangChu/reset.css">
    <link rel="stylesheet" href="<?php echo Root ?>public/css/TrangChu/styleAllForm.css">
    <link rel="stylesheet" href="<?php echo Root ?>public/css/TrangChu/style.css">
    <link rel="stylesheet" href="<?php echo Root ?>public/css/TrangChu/thanhtoansanpham.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

   
</head>

<body>
    <nav class="nav-form__pay fixed">
        <div class="container container__nav">
            <div class="nav-pay__inner">
                <!-- logo -->
                <a href="#" class="nav__link-logo">
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
                <div class="nav-pay__next">
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
            <div class="menu__sub">
                <div class="container container__nav">
                    <ul class="menu__sub-list">
                        <li class="menu__sub-item">
                            <a class="menu__sub-link" href="#!">item 1</a>
                        </li>
                        <li class="menu__sub-item">
                            <a class="menu__sub-link" href="#!">item 2</a>
                        </li>                      
                    </ul>
                </div>
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
                                    
                                        <input class="procedure-left__info-input " type="tel" name="" id="" placeholder="Nhập số điện thoại...">
                                        <textarea class="procedure-left__info-textarea" name="" id="" cols="30" rows="5" placeholder="Nhập địa chỉ của mày vào"></textarea>
                                   
                                </div>
                                                             
                            </div>
                       </div>
                       <div class="procedure-left__center table">
                            <div class="procedure-wrap">
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
                                    <!-- item 01-->
                                    <tr class="table-title table-line">
                                        <td class="table-product">
                                            <input class="procedure-input__check" type="checkbox" name="product" id="product">
                                            <label class="procedure-label__check" for="product"><span class="procedure-label__tick"></span></label>                                  
                                            <div class="table-product__info">
                                                <img class="table-product__img" src="<?php echo Root ?>public/img/product01.jpg" alt="">
                                                <div class="table-title-wrap">
                                                    <p class="table__info-title">áo sơ mi kiểu nữ tay dài xoắn ngực</p>
                                                   <div class="table__info-input-wrap">
                                                        <div class="table__info-size">Size: S</div>
                                                        <div class="table__info-color">Color: Nâu</div>                                                
                                                   </div>
                                                </div>
                                            </div>                                       
                                        </td>
                                        <td>
                                            1
                                        </td>
                                        <td>
                                            400.000 VNĐ
                                        </td>
                                        <td>
                                            400.000 VNĐ
                                        </td>
                                        <td>
                                            <div class="table__icon"><i class="fa-solid fa-trash"></i></div>
                                        </td>
                                    </tr>
                                    <!-- item 02-->
                                    <tr class="table-title table-line">
                                        <td class="table-product">
                                            <input class="procedure-input__check" type="checkbox" name="product" id="product02">
                                            <label class="procedure-label__check" for="product02"><span class="procedure-label__tick"></span></label>                                  
                                            <div class="table-product__info">
                                                <img class="table-product__img" src="<?php echo Root ?>public/img/product01.jpg" alt="">
                                                <div class="table-title-wrap">
                                                    <p class="table__info-title">áo sơ mi kiểu nữ tay dài xoắn ngực</p>
                                                   <div class="table__info-input-wrap">
                                                        <div class="table__info-size">Size: S</div>
                                                        <div class="table__info-color">Color: Nâu</div>   
                                                   </div>
                                                </div>
                                            </div>                                       
                                        </td>
                                        <td>
                                            1
                                        </td>
                                        <td>
                                            400.000 VNĐ
                                        </td>
                                        <td>
                                            400.000 VNĐ
                                        </td>
                                        <td>
                                            <div class="table__icon"><i class="fa-solid fa-trash"></i></div>
                                        </td>
                                    </tr>
                                     <!-- item 03-->
                                     <tr class="table-title table-line">
                                        <td class="table-product">
                                            <input class="procedure-input__check" type="checkbox" name="product" id="product03">
                                            <label class="procedure-label__check" for="product03"><span class="procedure-label__tick"></span></label>                                  
                                            <div class="table-product__info">
                                                <img class="table-product__img" src="<?php echo Root ?>public/img/product01.jpg"alt="">
                                                <div class="table-title-wrap">
                                                    <p class="table__info-title">áo sơ mi kiểu nữ tay dài xoắn ngực</p>
                                                   <div class="table__info-input-wrap">
                                                        <div class="table__info-size">Size: S</div>
                                                        <div class="table__info-color">Color: Nâu</div>   
                                                   </div>
                                                </div>
                                            </div>                                       
                                        </td>
                                        <td>
                                            1
                                        </td>
                                        <td>
                                            400.000 VNĐ
                                        </td>
                                        <td>
                                            400.000 VNĐ
                                        </td>
                                        <td>
                                            <div class="table__icon"><i class="fa-solid fa-trash"></i></div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                       </div>
                       <div class="procedure-left__bottom table">
                            <div class="procedure-wrap">
                                <div class="procedure-left__header">
                                    <span>Giảm Trừ</span>
                                </div>                             
                            </div>
                       </div>
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
                                            name="sex"
                                            value="Nam"
                                            checked
                                            hidden
                                        />
                                        
                                        <label class="procedure__radio-label" for="atm"
                                            ><span class="procedure__radio-span"></span>                                               
                                            ATM card (Thẻ nội địa)
                                            </label
                                        >
                                    </div>
                                    <div class="radio-row">
                                        <input
                                            class="procedure__raido-input"
                                            type="radio"
                                            id="visa"
                                            name="sex"
                                            value="Nu"
                                            hidden
                                        />
                                    
                                        <label class="procedure__radio-label" for="visa"
                                            ><span class="procedure__radio-span"></span>                                              
                                            Thẻ quốc tế (Visa, Master, JCB)</label
                                        >
                                    </div>
                                    <div class="radio-row">
                                        <input
                                            class="procedure__raido-input"
                                            type="radio"
                                            id="momo"
                                            name="sex"
                                            value="Nu"
                                            hidden
                                        />
                                    
                                        <label class="procedure__radio-label" for="momo"
                                            ><span class="procedure__radio-span"></span>                                              
                                            Thanh toán qua MoMo</label
                                        >
                                    </div>
                                    <div class="radio-row">
                                        <input
                                            class="procedure__raido-input"
                                            type="radio"
                                            id="shope"
                                            name="sex"
                                            value="khac"
                                            hidden
                                        />
                                        
                                        <label class="procedure__radio-label" for="shope"
                                            ><span class="procedure__radio-span"></span>
                                            Shopee Pay</label
                                        >
                                    </div>
                                    <div class="radio-row">
                                        <input
                                            class="procedure__raido-input"
                                            type="radio"
                                            id="other"
                                            name="sex"
                                            value="khac"
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
                                            name="sex"
                                            value="khac"
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
                                        <span class="procedure__price">800.000 VNĐ</span>
                                    </div>
                                    <div class="procedure__row">
                                        <span>Phí vận chuyển</span>
                                        <span class="procedure__price">80.000 VNĐ</span>
                                    </div>
                               </div>

                               <div class="procedure__price-wrap no--line">
                                    <div class="procedure__row">
                                                <span>Tổng thanh toán</span>
                                                <span class="procedure__price">800.000 VNĐ</span>
                                    </div>
                                </div>
                               <button type="button" class="procedure__btn btn btn--primary">Thanh toán</button>
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


</body>

</html>
<script src="http://localhost/WebBanHangMoHinhMVC/public/script/TrangChu/GioHangLonJS.js"></script>