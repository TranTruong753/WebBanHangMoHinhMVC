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
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body>
  <?php 
    $userName = "" ;
    $email = "";
    $userPhone ="";
    $sex = "";
    
    if(isset( $_SESSION['email'])){
        $email = $_SESSION['email'];
    }

    if(isset($_SESSION['Ten'])) {
        $userName = $_SESSION['Ten'];
    }

     if(isset($data['KH'])){
      
        if ($data['KH']->num_rows > 0) {
        
            while ($row = $data['KH']->fetch_assoc()) {
             
               
                $userPhone = $row['SoDienThoai'];
                $sex = $row['GioiTinh'];
             
            }
        }

    }
  ?>
   <div class="info__client-wrap container container__nav">      
        <div class="info__client-left">
            <div class="info__wrap">
                <label for="imgUser">
                    <img class="client__user-img" src="<?php echo Root ?>public/img/user.png" alt="" id="preview">
                </label>
                <input type="file" name="" id="imgUser" hidden onchange="preview.src=window.URL.createObjectURL(this.files[0])">
            </div>

            <div class="info__wrap">
                <div class="client-title-02 client-user__name"><?php echo $userName ?></div>
            </div>

            <ul class="info__wrap-column ">
                <li>
                    <a href="#!" 
                    <?php 
                         if(strpos($_SESSION['email'], '@') !== false){ 
                            echo 'onclick="QLThongTin()" ';
                         }
                    ?>
                    
                    
                    class="btn btn-client">Thông tin cá nhân</a>
                </li>
                <li>
                    <a href="#!" 
                    <?php 
                         if(strpos($_SESSION['email'], '@') !== false){ 
                            echo 'onclick="QLHoaDon()"  ';
                         }
                    ?>
                    
                    class="btn btn-client">Quản lý đơn hàng</a>
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
            <div class="client-right__main" id="client-right__main">
                <?php
                    if(strpos($_SESSION['email'], '@') !== false){
                        require('./MVC/views/trangchu/pages/thongTinCaNhan.php');
                    }
                    
                 ?>
               
            </div>

        </div>   
   </div>
</body>
</html>
<script src="<?php echo Root ?>public/script/TrangChu/QLThongTinKHJS.js"></script>