<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<?php
    
    $kichco=$data["DanhSach"]["KC"];
       
?>
<h1 class = 'styleText-02' >Sửa kích cỡ</h1>
<a class="form-add__link" href="http://localhost/WebBanHangMoHinhMVC/admin/default/KichCoPage"> Trang quản lý kích cỡ></a>

<form id="submit_form" method="post" action="" class="form_add">
<?php
    if ($kichco->num_rows > 0) {
        while ($row = $kichco->fetch_assoc()) {
            echo '
           <div class = "input-add_wrap">
                <label class="styleText-04 label-add" for="makichco">Mã Kích Cỡ</label>
                <input class="input-add" type="text" id="makichco" name="makichco" value="'.$row['MaKichCo'].'" readonly>
           </div>
          <div class = "input-add_wrap">
                <label class="styleText-04 label-add" for="tenkichco">Tên Kích Cỡ</label>
                <input class="input-add" type="text" id="tenkichco" name="tenkichco" value="'.$row['TenKichCo'].'" >
          </div>
           <div class = "input-add_wrap"> 
            <button class ="btn" type = "button" onclick="UpdateKC()" value="update">update</button>           
           </div>';
        }
    }
?>
    
    

<script src="http://localhost/WebBanHangMoHinhMVC/public/script/manage/QuanlyKCJS.js"></script>