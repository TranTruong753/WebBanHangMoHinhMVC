<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<?php
    
    $nhacungcap=$data["DanhSach"]["NCC"];
       
?>
<h1 class = 'styleText-02' >Sửa nhà cung cấp</h1>
<a class="form-add__link" href="http://localhost/WebBanHangMoHinhMVC/admin/default/NhaCungCapPage"> Trang quản lý nhà cung cấp></a>
<form id="submit_form" method="post" action="" class="form_add">
<?php
    if ($nhacungcap->num_rows > 0) {
        while ($row = $nhacungcap->fetch_assoc()) {
            echo '
            <div class="input-add_wrap">
                <label class="styleText-04 label-add" for="">Mã Nhà Cung Cấp</label>
                <input  class="input-add" type="text" id="manhacungcap" name="manhacungcap" value="'.$row['MaNhaCungCap'].'" readonly >
            </div>
            <div class="input-add_wrap">
                <label class="styleText-04 label-add" for="">Tên Nhà Cung Cấp</label>
                <input  class="input-add" type="text" id="tennhacungcap" name="tennhacungcap" value="'.$row['TenNhaCungCap'].'" >
            </div>
           <div class="input-add_wrap">
                <label class="styleText-04 label-add" for="">Số điện thoại</label>
                <input  class="input-add" type="text" id="sodienthoai" name="sodienthoai" value="'.$row['SoDienThoai'].'" >
           </div>
           <div class="input-add_wrap">
                <label class="styleText-04 label-add" for="">Địa chỉ</label>
                <input class="input-add" type="text" id="diachi" name="diachi" value="'.$row['DiaChi'].'" >
           </div>
           <div class="input-add_wrap"> 
                <button  class ="btn" type = "button" onclick="UpdateNCC()" value="update">update</button>
           </div>';
        }
    }
?>
    
    

<script src="http://localhost/WebBanHangMoHinhMVC/public/script/manage/QuanlyNCCJS.js"></script>