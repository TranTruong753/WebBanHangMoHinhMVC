<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<?php
    $sanpham=$data["DanhSach"]["SP"];
    $ctsp=$data["DanhSach"]["CTSP"];
    $mausac=$data["DanhSach"]["MS"];
    $kichco=$data["DanhSach"]["KC"];
    $dem=1;
    if ($ctsp->num_rows > 0) {
        while ($row = $ctsp->fetch_assoc()) {
                $dem++;
        }
        $ctsp->data_seek(0);
    }
    $masp="";
    $tensp="";
    if ($sanpham->num_rows > 0) {
        $row = $sanpham->fetch_assoc();
        $masp=$row['MaSanPham'];
        $tensp=$row['TenSanPham'];
        $sanpham->data_seek(0);
    }
    
?>
<h1 class = 'styleText-02' >Thêm Chi Tiết Sản Phẩm</h1>
<a class="form-add__link" href="http://localhost/WebBanHangMoHinhMVC/admin/default/ChiTietSanPhamPage,<?php echo $masp ?>"> Quay về Trang Chi Tiết Sản Phẩm></a>




<form id="submit_form" method="post" action="" class="form_add">
    
   <div class="input-add_wrap">
        <label class="styleText-04 label-add" for="masanpham">Mã sản phẩm</label>
        <input class="input-add" type="text" id="masanpham" value="<?php echo $masp;?>" readonly> 
   </div>
   <div class="input-add_wrap">
        <label class="styleText-04 label-add" for="tensanpham" >Ten sản phẩm</label>
        <input class="input-add" type="text" id="tensanpham" name="tensanpham" value="<?php echo $tensp;?>" readonly> 
   </div>
 

   <div class="input-add_wrap">
        <label class="styleText-04 label-add" for="mactsp" readonly>Ma chi tiet san pham</label>
        <input class="input-add" type="text" id="mactsp" value="CTSP<?php echo $dem;?>" readonly> 
   </div>

   <div class="input-add_wrap">
        <label class="styleText-04 label-add" for="hinhanh">Hinh anh</label>
        <input type="file" name="hinhanh" id="hinhanh"  > 
   </div>

    <div class="show input-add_wrap" id="show">
        
    </div>
    <!-- <p id="test" class="test">cc</p> -->
    <div class="input-add_wrap">
        <label for="">Mau sac</label> 
        <div class="custom-select">
            <select name="" id="mausac"  class="">
                <?php
                if ($mausac->num_rows > 0) {
                    while ($row = $mausac->fetch_assoc()) {
                            echo '<option  value="'.$row['MaMauSac'].'" >'.$row['TenMauSac'].'</option>';
                    }
                }
                ?>
            </select>
        </div>
    </div>

    <div class="input-add_wrap">
        <label for="">kich co</label> 
        <div class="custom-select">
            <select name="" id="kichco"  class="">
            <?php
                if ($kichco->num_rows > 0) {
                    while ($row = $kichco->fetch_assoc()) {
                            echo '<option  value="'.$row['MaKichCo'].'" >'.$row['TenKichCo'].'</option>';
                    }
                }
                ?>
            </select>
        </div>
    </div>

    <div class="input-add_wrap"> 
        <button class="btn" type = "button" onclick="addCTSP()" value="thêm">Thêm</button>
    </div>
</form>
<div id="ctsp"></div>

<script src="http://localhost/WebBanHangMoHinhMVC/public/script/manage/QuanlyCTSP.js"></script>