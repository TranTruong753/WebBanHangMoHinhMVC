<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<?php
    
    $nhacungcap=$data["DanhSach"]["NCC"];
       
?>
<form id="submit_form" method="post" action="">
<?php
    if ($nhacungcap->num_rows > 0) {
        while ($row = $nhacungcap->fetch_assoc()) {
            echo '
            <label for="">Mã Nhà Cung Cấp</label><br>
            <input type="text" id="manhacungcap" name="manhacungcap" value="'.$row['MaNhaCungCap'].'" ><br>
            <label for="">Tên Nhà Cung Cấp</label><br>
            <input type="text" id="tennhacungcap" name="tennhacungcap" value="'.$row['TenNhaCungCap'].'" ><br>
            <label for="">Số điện thoại</label><br>
            <input type="text" id="sodienthoai" name="sodienthoai" value="'.$row['SoDienThoai'].'" ><br>
            <label for="">Địa chỉ</label><br>
            <input type="text" id="diachi" name="diachi" value="'.$row['DiaChi'].'" ><br>
            <input type = "button" onclick="UpdateNCC()" value="update"></button>';
        }
    }
?>
    
    

<script src="http://localhost/WebBanHangMoHinhMVC/public/script/manage/QuanlyNCCJS.js"></script>