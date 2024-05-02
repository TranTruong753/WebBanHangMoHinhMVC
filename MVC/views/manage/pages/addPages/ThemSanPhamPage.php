<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<?php
    $theloai=$data["DanhSach"]["TL"];
    $chatlieu=$data["DanhSach"]["CL"];
    $sanpham=$data["DanhSach"]["SP"];
    $km=$data["DanhSach"]["KM"];
   
    $dem=0;
    if ($sanpham->num_rows > 0) {
        while ($row = $sanpham->fetch_assoc()) {
                $dem++;
        }
    }
    
?>
<h1 class = 'styleText-02' >Thêm Sản Phẩm</h1>
<a class="form-add__link" href="http://localhost/WebBanHangMoHinhMVC/admin/default/SanPhamPage"> Quay về Trang Sản Phẩm></a>


<form method="post" class="form_add">
    
    <div class = "input-add_wrap">
        <label class="styleText-04 label-add" for="masanpham">Mã sản phẩm</label>
        <input class="input-add" type="text" id="masanpham" value="SP00<?php echo $dem;?>"> 
    </div>

   <div class = "input-add_wrap">
        <label class="styleText-04 label-add" for="tensanpham">Tên sản phẩm</label>
        <input class="input-add" type="text" id="tensanpham"> 
   </div>

  <div class = "input-add_wrap">
        <label class="styleText-04 label-add" for="gianhap">Giá Nhập</label>
        <input class="input-add" type="text" id="gianhap"> 
  </div>

    <div class = "input-add_wrap">
        <label class="styleText-04 label-add" for="khuyenmai">Khuyến mãi</label> 
       <div class="custom-select select-add">
            <select name="" id="khuyenmai"  class="">
                <?php
                if ($km->num_rows > 0) {
                    while ($row = $km->fetch_assoc()) {
                            echo '<option  value="'.$row['MaKhuyenMai'].'" >'.$row['TenKhuyenMai'].'-'.$row['MucKhuyenMai'].'%</option>';
                    }
                }
                ?>
            </select>
       </div>
    </div>

    <div class = "input-add_wrap">
        <label class="styleText-04 label-add" for="theloai">Thể loại</label> 
        <div class="custom-select select-add">
            <select name="" id="theloai"  class="">
                <?php
                if ($theloai->num_rows > 0) {
                    while ($row = $theloai->fetch_assoc()) {
                            echo '<option  value="'.$row['MaTheLoai'].'" >'.$row['TenTheLoai'].'</option>';
                    }
                }
                ?>
            </select>
        
        </div>
    </div>

    <div class = "input-add_wrap">
        <label class="styleText-04 label-add" for="chatlieu">Chất liệu</label> 
        <div class="custom-select select-add">
            <select name="" id="chatlieu"  class="">
            <?php
                if ($chatlieu->num_rows > 0) {
                    while ($row = $chatlieu->fetch_assoc()) {
                            echo '<option  value="'.$row['MaChatLieu'].'" >'.$row['TenChatLieu'].'</option>';
                    }
                }
                ?>
            </select>
       </div>
    </div>

    <div class = "input-add_wrap">
        <button class="btn" type = "button" onclick="addSP()">Thêm</button>
    </div>



    
    

</form>

<script src="http://localhost/WebBanHangMoHinhMVC/public/script/manage/QuanlySPJS.js"></script>
