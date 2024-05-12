<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<?php
    $chungloai=$data["DanhSach"]["CL"];
?>
<h1 class = 'styleText-02' >Thêm thể loại</h1>
<a class="form-add__link" href="http://localhost/WebBanHangMoHinhMVC/admin/default/TheLoaiPage"> Trang quản lý thể loại></a>

<form method="post" class="form_add">
    <div class="input-add_wrap">
        <label class="styleText-04 label-add" for="">Chủng Loại</label> 
        <div class="custom-select select-add">
            <select name="" id="machungloai"  class="">
                <?php
                if ($chungloai->num_rows > 0) {
                    while ($row = $chungloai->fetch_assoc()) {
                            echo '<option  value="'.$row['MaChungLoai'].'" >'.$row['TenChungLoai'].'</option>';
                    }
                }
                ?>
            </select>
        </div>
    </div>
   <div class="input-add_wrap">
        <label class="styleText-04 label-add" for="tentheloai">Tên Thể Loại</label>
        <input class="input-add" type="text" id="tentheloai"> 
    
   </div>
    <div class="input-add_wrap">
        <button class="btn" type = "button" onclick="addTL()">Thêm</button>
    </div>

    <script src="http://localhost/WebBanHangMoHinhMVC/public/script/manage/QuanlyTLJS.js"></script>
</form>