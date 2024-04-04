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
    <link rel="stylesheet" href="<?php echo Root ?>public/css/TrangChu/reset.css">
    <link rel="stylesheet" href="<?php echo Root ?>public/css/TrangChu/styleAllForm.css">
    <link rel="stylesheet" href="<?php echo Root ?>public/css/TrangChu/style.css">
    <link rel="stylesheet" href="<?php echo Root ?>public/css/TrangChu/thongTinKhachHang.css">
</head>
<body>
  
   <div class="info__client-wrap container container__nav">      
        <div class="info__client-left">
            <div class="info__wrap">
                <img class="client__user-img" src="<?php echo Root ?>public/img/user.png" alt="">
            </div>

            <div class="info__wrap">
                <div class="client-title-02 client-user__name">Trần Quang Trường</div>
            </div>

            <ul class="info__wrap-column ">
                <li>
                    <a href="#!" class="btn btn-client">Thông tin cá nhân</a>
                </li>
                <li>
                    <a href="#!" class="btn btn-client">Quản lý đơn hàng</a>
                </li>
                <!-- <li>
                    <a href="#!" class="btn btn-client">item1</a>
                </li>
                <li>
                    <a href="#!" class="btn btn-client">item1</a>
                </li>
                <li>
                    <a href="#!" class="btn btn-client">item1</a>
                </li>
                <li>
                    <a href="#!" class="btn btn-client">item1</a>
                </li>
                <li>
                    <a href="#!" class="btn btn-client">item1</a>
                </li>
                <li>
                    <a href="#!" class="btn btn-client">item1</a>
                </li> -->
            </ul>
        </div>
        <div class="info__client-right table">
            <div class="client-right__main">
                <?php 
                     require('./MVC/views/trangchu/pages/thongTinChiTietSanPham.php');
                // ?>
               
            </div>

        </div>   
   </div>
</body>
</html>