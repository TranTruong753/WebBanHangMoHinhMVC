<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<?php
    
    $mausac=$data["DanhSach"]["MS"];
       
?>
<h1 class = 'styleText-02'>Sửa Màu Sắc</h1>

<a class="form-add__link" href="http://localhost/WebBanHangMoHinhMVC/admin/default/MauSacPage"> Quay về trang quản lý màu sắc></a>

<form id="submit_form" method="post" action="" class="form_add">
<?php
    if ($mausac->num_rows > 0) {
        while ($row = $mausac->fetch_assoc()) {
            echo '
           <div class = "input-add_wrap">
                <label class="styleText-04 label-add" for="mamausac">Mã Màu Sắc</label>
                <input class="input-add" type="text" id="mamausac" name="mamausac" value="'.$row['MaMauSac'].'" readonly>
           </div>
            <div class = "input-add_wrap">
                <label class="styleText-04 label-add" for="tenmausac">Tên Màu Sắc</label>
                <input class="input-add" type="text" id="tenmausac" name="tenmausac" value="'.$row['TenMauSac'].'" >
            </div>
           <div class = "input-add_wrap"> <button class ="btn" type = "button" onclick="UpdateMS()" value="update">Update</button></div>';
        }
    }
?>
    
    

<script src="http://localhost/WebBanHangMoHinhMVC/public/script/manage/QuanlyMSJS.js"></script>