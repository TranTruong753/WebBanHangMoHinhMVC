<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<h1 class = 'styleText-02' >Thêm kích cỡ</h1>
<a class="form-add__link" href="http://localhost/WebBanHangMoHinhMVC/admin/default/KichCoPage"> Trang quản lý kích cỡ></a>

<form method="post" class="form_add">
   <div class="input-add_wrap">
        <label class="styleText-04 label-add" for="tenkichco">Tên Kích Cỡ</label>
        <input class="input-add" type="text" id="tenkichco"> 
   </div>

    <div class="input-add_wrap"> 
        <button class="btn" type = "button" onclick="addKC()">Thêm</button>
    </div>

   
</form>
<script src="http://localhost/WebBanHangMoHinhMVC/public/script/manage/QuanlyKCJS.js"></script>