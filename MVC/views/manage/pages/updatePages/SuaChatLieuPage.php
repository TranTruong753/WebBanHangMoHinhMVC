<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<?php
    
    $chatlieu=$data["DanhSach"]["CL"];
       
?>
<h1 class = 'styleText-02'>Sửa Vật Liệu</h1>
<a class="form-add__link" href="http://localhost/WebBanHangMoHinhMVC/admin/default/ChatLieuPage"> Quay Về Trang Vật liệu></a>

<form id="submit_form" method="post" action="" class="form_add">
<?php
    if ($chatlieu->num_rows > 0) {
        while ($row = $chatlieu->fetch_assoc()) {
            echo '
           <div class = "input-add_wrap">
                <label class="styleText-04 label-add" for="">Mã Chất Liệu</label>
                <input class="input-add" type="text" id="machatlieu" name="machatlieu" value="'.$row['MaChatLieu'].'"  readonly>
                
           </div>
           <div class = "input-add_wrap">
                <label class="styleText-04 label-add" for="">Tên Chất Liệu</label>           
                <input class="input-add" type="text" id="tenchatlieu" name="tenchatlieu" value="'.$row['TenChatLieu'].'" >
                
           </div>
            <div class = "input-add_wrap">
                <button class="btn" type = "button" onclick="UpdateCL()" value="update">Cập nhật</button>
            </div>';
        }
    }
?>
    
    

<script src="http://localhost/WebBanHangMoHinhMVC/public/script/manage/QuanlyCLJS.js"></script>