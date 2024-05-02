<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<h1 class = 'styleText-02' >Thêm nhà cung cấp</h1>
<a class="form-add__link" href="http://localhost/WebBanHangMoHinhMVC/admin/default/NhaCungCapPage"> Trang quản lý nhà cung cấp></a>
<form method="post" class="form_add">
   <div class="input-add_wrap">
        <label class="styleText-04 label-add" for="">Tên Nhà Cung Cấp</label>
        <input class="input-add" type="text" id="tennhacungcap">
   </div> 
    <div class="input-add_wrap">
        <label class="styleText-04 label-add" for="">Số Điện Thoại</label>
        <input class="input-add" type="text" id="sodienthoai"> 
    </div>
    <div class="input-add_wrap">
        <label class="styleText-04 label-add" for="">Địa Chỉ</label>
        <input class="input-add" type="text" id="diachi"> 
    </div>

    <div class="input-add_wrap">
        <button class="btn" type = "button" onclick="addNCC()">Thêm</button>
    </div>

    <script src="http://localhost/WebBanHangMoHinhMVC/public/script/manage/QuanlyNCCJS.js"></script>
</form>