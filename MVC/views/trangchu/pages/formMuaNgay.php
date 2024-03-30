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
                   <div class="procedure__main-left table">
                        <div class="procedur-left-wrap">
                            <div class="procedure-left__top">
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
                                                    <select name="" id="" class="table__info-select">
                                                        <option value="sizeS">S</option>
                                                        <option value="sizeL">L</option>
                                                        <option value="sizeM">M</option>
                                                    </select>
                                                    <input class="table__info-radio" type="radio" name="" id="color">
                                                    <label class="table__label-radio" for="color" >
                                                        <span class="table__label-img" style="background: #f00;"></span>
                                                    </label>
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
                                        <input class="procedure-input__check" type="checkbox" name="product" id="product">
                                        <label class="procedure-label__check" for="product"><span class="procedure-label__tick"></span></label>                                  
                                        <div class="table-product__info">
                                            <img class="table-product__img" src="<?php echo Root ?>public/img/product01.jpg" alt="">
                                            <div class="table-title-wrap">
                                                <p class="table__info-title">áo sơ mi kiểu nữ tay dài xoắn ngực</p>
                                               <div class="table__info-input-wrap">
                                                    <select name="" id="" class="table__info-select">
                                                        <option value="sizeS">S</option>
                                                        <option value="sizeL">L</option>
                                                        <option value="sizeM">M</option>
                                                    </select>
                                                    <input class="table__info-radio" type="radio" name="" id="color">
                                                    <label class="table__label-radio" for="color" >
                                                        <span class="table__label-img" style="background: #f00;"></span>
                                                    </label>
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
                                        <input class="procedure-input__check" type="checkbox" name="product" id="product">
                                        <label class="procedure-label__check" for="product"><span class="procedure-label__tick"></span></label>                                  
                                        <div class="table-product__info">
                                            <img class="table-product__img" src="<?php echo Root ?>public/img/product01.jpg"alt="">
                                            <div class="table-title-wrap">
                                                <p class="table__info-title">áo sơ mi kiểu nữ tay dài xoắn ngực</p>
                                               <div class="table__info-input-wrap">
                                                    <select name="" id="" class="table__info-select">
                                                        <option value="sizeS">S</option>
                                                        <option value="sizeL">L</option>
                                                        <option value="sizeM">M</option>
                                                    </select>
                                                    <input class="table__info-radio" type="radio" name="" id="color">
                                                    <label class="table__label-radio" for="color" >
                                                        <span class="table__label-img" style="background: #f00;"></span>
                                                    </label>
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
                   <div class="procedure__main-right table">
                     <div class="procedure__right-inner">
                           <div class="procedure__price-wrap">
                                <span>Tạm tính</span>
                                <span class="procedure__price">800.000 VNĐ</span>
                           </div>
                           <button type="button" class="procedure__btn btn btn--primary">Thanh toán</button>
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


</body>

</html>