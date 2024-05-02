<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<h1 class = 'styleText-02'>Thêm Màu Sắc</h1>

<a class="form-add__link" href="http://localhost/WebBanHangMoHinhMVC/admin/default/MauSacPage"> Quay về trang quản lý màu sắc></a>

<form method="post" class="form_add">
    <div class="input-add_wrap">
        <label class="styleText-04 label-add" for="tenmausac">Tên Màu Sắc</label>
        <input class="input-add" type="text" id="tenmausac"> 
    </div>

    <div class="input-add_wrap">
        <button class="btn" type = "button" onclick="addMS()">Thêm</button>
    </div>

   
</form>
<script src="http://localhost/WebBanHangMoHinhMVC/public/script/manage/QuanlyMSJS.js"></script>