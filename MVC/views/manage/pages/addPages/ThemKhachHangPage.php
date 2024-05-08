<?php
$KhachHangModel = new KhachHangModel();
$index = $data["DanhSach"]["index"];
if ($index == "Sửa") {
    $MaKhachHang = $data["DanhSach"]["MaKhachHang"];
    $item = $KhachHangModel->getItemById($MaKhachHang);
}
?>

<?php if ($index == "Thêm") {
    echo    "<h1 class = 'styleText-02'>Thêm Khách hàng</h1>";
} else if ($index == "Sửa") {
    echo "<h1 class = 'styleText-02'>Sửa Khách hàng</h1>";
}
?>


<a class="form-add__link" href="http://localhost/WebBanHangMoHinhMVC/admin/default/KhachHangPage"> Quay Về Trang Khách hàng></a>


<form method="post" class="form_add" >
   
     <div class="input-add_wrap">
        <label class="styleText-04 label-add" for='idClient'>Email khách hàng</label>
        <input class="input-add" type='text' id='idClient' name='userId' placeholder="Nhập email "
        <?php
            if($index == "Sửa"){
                echo "readonly value ='{$item['MaKhachHang']}'";
            }
        
        ?> >
        <div id="error-userId" style="color:red;"></div>
              
    </div>
   
    <div class="input-add_wrap">
        <label class="styleText-04 label-add" for="nameClient">Họ và tên khách hàng</label>
        <input class="input-add" type="text" name="" id="nameClient" placeholder="Nhập họ và tên"
         <?php 
            if($index == "Sửa"){
                echo "value ='{$item['TenKhachHang']}'";
            }      
            // echo "value = '$userName'"
            ?>
        >
        <div id="error-userName" style="color:red;"></div>
    </div>
    <div class="input-add_wrap">
        <label class="styleText-04 label-add" for="phoneClient">Số điện thoại khách hàng</label>
        <input class="input-add" type="text" name="" id="phoneClient"  placeholder="Nhập số điện thoại"
         <?php 
            if($index == "Sửa"){
                echo "value ='{$item['SoDienThoai']}'";
            }      
            // echo "value = '$userName'"
            ?>
        >
        <div id="error-userPhone" style="color:red;"></div>
    </div>
    <div class="input-add_wrap">
        <label class="styleText-04 label-add" for="sexClient">Giới tính</label>
        
          <div class="add-form-radio-wrap">
                <div class="radio-wrap">
                    <input type="radio" name="sexClient" id="boy" value="Nam" class="add-form__raido-input" hidden
                    <?php
                    if($index == "Sửa"){
                         if($item['GioiTinh']=="Nam"){
                            echo 'checked';
                        }
                    }
                       
                    ?>
                    > 
                    <label class="add-form__radio-label" for="boy"
                    ><span class="add-form__raido-span"></span>
                    Nam
                    </label>
                </div>
            
            
                <div class="radio-wrap">
                    <input type="radio" name="sexClient" id="girl" value="Nữ" class="add-form__raido-input" hidden
                    <?php
                    if($index == "Sửa"){
                         if($item['GioiTinh']=="Nữ"){
                            echo 'checked';
                        }
                    }
                       
                    ?>
                    >
                    <label class="add-form__radio-label" for="girl"
                    ><span class="add-form__raido-span"></span>
                    Nữ
                    </label>
                </div>
            
            
               <div class="radio-wrap">
                    <input type="radio" name="sexClient" id="other" value="Khác" class="add-form__raido-input" hidden
                    <?php
                    if($index == "Sửa"){
                        if($item['GioiTinh']=="Khác"){
                            echo 'checked';
                        }
                    }
                        
                    ?>
                    >
                    <label class="add-form__radio-label" for="other"
                    ><span class="add-form__raido-span"></span>
                    Khác
                    </label>
               </div>
          </div>

          <div id="error-userGioiTinh" style="color: red;"></div>
        
       
    </div>

    <?php 
        if($index=="Sửa"){
            echo '
            <div class="input-add_wrap">
                <button class = "btn" type="button" onclick="btnEdit()">Cập nhật</button>
            </div>
            ';
        }
        else{
            echo '
            <div class="input-add_wrap">
                <button class = "btn" type="button" onclick = "btnAdd()">Thêm</button>
            </div>
            ';
        }
    ?>

    
</form>

<script>
    $(document).ready(function() {
      
    })

    function btnAdd() {
        var maKhachHang = document.getElementById("idClient").value.trim();
        var tenKhachHang = document.getElementById("nameClient").value.trim();
        var sdt = document.getElementById("phoneClient").value.trim();
        var radioButtons = document.getElementsByName("sexClient");
        var gioitinh="";
        for (var i = 0; i < radioButtons.length; i++) {
            if (radioButtons[i].checked === true) {
                gioitinh= radioButtons[i].value;
            }
        }
        if(checkForm(maKhachHang,tenKhachHang,sdt,gioitinh)){
            $.ajax({
                url: "http://localhost/WebBanHangMoHinhMVC/AjaxThongTinKhachHang/insert",
                type:"post",
                dataType:"html",
                data:{
                    maKhachHang:maKhachHang,
                    tenKhachHang:tenKhachHang,
                    sdt:sdt,
                    gioitinh:gioitinh,                  
                },
                success: function(data)
                {
                    var errorUserPhone = document.getElementById("error-userPhone");
                    var errorUserId = document.getElementById("error-userId");
                    // alert(data);
                    if(data == 1)
                    {
                        errorUserId.innerHTML = "";
                        errorUserPhone.innerHTML = "";
                        // alert("Thêm dữ liệu thành công!");
                        swal({
                            title: "Thêm thành công!",
                            text: "Nhấn vào nút để tiếp tục!",
                            icon: "success",
                        }).then(function () {
                            window.location = "http://localhost/WebBanHangMoHinhMVC/admin/default/KhachHangPage";
                        })
                    }
                    else if(data == -3){
                        errorUserPhone.innerHTML = "Số điện thoại bị trùng!";
                        errorUserId.innerHTML = "Mã bị trùng!";
                    }                  
                    else if(data == -1){
                        // alert("Số điện thoại bị trùng!");
                        errorUserId.innerHTML = "";
                        errorUserPhone.innerHTML = "Số điện thoại bị trùng!";
                    }
                    else if(data == -2){
                        // alert("Gmail bị trùng!");
                        errorUserPhone.innerHTML = "";
                        errorUserId.innerHTML = "Mã bị trùng!";
                    }
                                            
                    else
                    {
                        // alert("Thêm dữ liệu thất bại!");
                        swal({
                            title: "Thêm thất bại!",
                            text: "Nhấn vào nút để tiếp tục!",
                            icon: "error",
                        })
                        // window.location = "http://localhost/WebBanHangMoHinhMVC/admin/default/KhuyenMaiPage";
                    }
                }
            })
        }

    }

    function btnEdit() {
        var maKhachHang = document.getElementById("idClient").value.trim();
        var tenKhachHang = document.getElementById("nameClient").value.trim();
        var sdt = document.getElementById("phoneClient").value.trim();
        var radioButtons = document.getElementsByName("sexClient");
        var gioitinh ="";
        for (var i = 0; i < radioButtons.length; i++) {
            if (radioButtons[i].checked === true) {
            gioitinh = radioButtons[i].value;
            }
        }
        if(checkForm(maKhachHang,tenKhachHang,sdt,gioitinh)){
            $.ajax({
                url: "http://localhost/WebBanHangMoHinhMVC/AjaxThongTinKhachHang/update",
                type:"post",
                dataType:"html",
                data:{
                    maKhachHang:maKhachHang,
                    tenKhachHang:tenKhachHang,
                    sdt:sdt,
                    gioitinh:gioitinh, 
                },
                success: function(data)
                {
                    if(data == 1)
                    {
                        // alert("Cập nhật dữ liệu thành công!");
                        swal({
                            title: "Cập nhật thành công!",
                            text: "Nhấn vào nút để tiếp tục!",
                            icon: "success",
                        }).then(function () {
                            window.location = "http://localhost/WebBanHangMoHinhMVC/admin/default/KhachHangPage";
                        })
                    }
                    if(data == -1){
                        // alert("Số điện thoại bị trùng!");
                        var errorUserPhone = document.getElementById("error-userPhone");
                        errorUserPhone.innerHTML = "Số điện thoại bị trùng!";
                    }                          
                    if(data==0)
                    {
                        swal({
                            title: "Cập nhật thất bại!",
                            text: "Nhấn vào nút để tiếp tục!",
                            icon: "error",
                        })
                        // alert("Cập nhật dữ liệu thất bại!");
                        // window.location = "http://localhost/WebBanHangMoHinhMVC/admin/default/KhuyenMaiPage";
                    }
                }
            })
        }

    }    


    function checkPatternUser(userName){
        var pattern = /^[a-zA-Z\xC0-\u1EF9\s]+$/;

        return pattern.test(userName);
    }

    function checkPatternPhone(phone) {
        var pattern = /^(0|\+?84)(3|5|7|8|9)[0-9]{8}$/;
        return pattern.test(phone);
    }

    function checkPatternEmail(email) {
        var pattern = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/i;
        return pattern.test(email);
    }

function checkForm(email,tenKhachHang,sdt,gioitinh){
        var resultEmail = true;
        var resultTenKhachHang = true;
        var resultSdt = true;
        var resultGioiTinh = true;
      
        var errorUserEmail = document.getElementById("error-userId");
        var errorUserName = document.getElementById("error-userName");
        var errorUserPhone = document.getElementById("error-userPhone");
        var errorUserGioiTinh = document.getElementById("error-userGioiTinh");

        var errorUserEmailStr = "";
        var errorUserNameStr = "";
        var errorUserPhoneStr ="";
        var errorUserGioiTinhStr =""
      
        //check id
        if(email == ""){
            resultEmail = false;
            errorUserEmailStr += "Không được để trống!";
        }else{
            errorUserEmailStr = "";
            if(checkPatternEmail(email)){
                errorUserEmailStr = "";
                resultEmail = true;
            } 
            else {
                resultEmail = false;
                errorUserEmailStr += "Email không đúng định dạng!"
            }
        }

        //check tên 
        if(tenKhachHang==""){
            resultTenKhachHang = false;
            errorUserNameStr += "Không được để trống!";
        }
        else{
            errorUserNameStr = "";
            if(checkPatternUser(tenKhachHang)){
                errorUserNameStr = "";
                resultTenKhachHang = true;
            } 
            else {
                resultTenKhachHang = false;
                errorUserNameStr += "Chỉ chứa chữ, không chứa số & ký tự đặc biệt!"
            }
        }
        //check sdt
        if(sdt==""){
            resultSdt = false;
            errorUserPhoneStr += "Không được để trống!"
        }
        else{
            errorUserPhoneStr = "";
            if(checkPatternPhone(sdt)){
                resultSdt = true;
                errorUserPhoneStr = "";
            }  
            else {
                resultSdt = false;
                errorUserPhoneStr += "Số điện thoại không đúng định dạng!"
            }
        }
        //check gioiTinh
        if(gioitinh==""){
            resultGioiTinh = false;
            errorUserGioiTinhStr += "Không được để trống!"
        }else{
            resultGioiTinh = true;
        }

        errorUserEmail.innerHTML = errorUserEmailStr;        
        errorUserName.innerHTML = errorUserNameStr;
        errorUserPhone.innerHTML = errorUserPhoneStr;
        errorUserGioiTinh.innerHTML = errorUserGioiTinhStr;

        if(resultEmail&&resultTenKhachHang&&resultSdt&&resultGioiTinh){
            return true
        }
        return false;
             
        
    }
</script>