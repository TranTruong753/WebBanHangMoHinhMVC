
<link rel="stylesheet" href="<?php echo Root ?>public/css/TrangChu/style.css">
    <link rel="stylesheet" href="http://localhost/WebBanHangMoHinhMVC/public/css/TrangChu/reset.css" />
    <link rel="stylesheet" href="http://localhost/WebBanHangMoHinhMVC/public/css/TrangChu/styleAllForm.css" />
    <link rel="stylesheet" href="http://localhost/WebBanHangMoHinhMVC/public/css/TrangChu/style.css" />
    <link rel="stylesheet" href="http://localhost/WebBanHangMoHinhMVC/public/css/TrangChu/chitietsanpham.css" />
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<section class="product">
    <div class="container">
    
        <?php echo '<input type="hidden" id ="test" value ="'.$data['cl'].'"/>
                    <input type="hidden" id ="testa" value ="'.$data['tl'].'"/>
                    <input type="hidden" id ="testb" value ="'.$data['tk'].'"/>'; 
                    ?>
        
        <!-- fashion - 01 -->
        <section class="product__fashion">
            <p class="product__title product__title-left" id="product__title"></p>
            <div class="product__list" id ="product__list">
            

            <!-- nội dung của ajax -->



            </div>
        </section>
    </div>
    
</section>
<script src="http://localhost/WebBanHangMoHinhMVC/public/script/TrangChu/XuLyDanhMuc.js"></script>
<script src="http://localhost/WebBanHangMoHinhMVC/public/script/TrangChu/timkiem.js"></script>
<script src="http://localhost/WebBanHangMoHinhMVC/public/script/TrangChu/GioHangJS.js"></script>