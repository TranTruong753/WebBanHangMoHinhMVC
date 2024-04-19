<?php
$KhachHangModel = new KhachHangModel();
$index = $data["DanhSach"]["index"];
if ($index == "Sửa") {
    $MaKhachHang = $data["DanhSach"]["MaKhachHang"];
    $item = $KhachHangModel->getItemById($MaKhachHang);
}
?>

<a href="http://localhost/WebBanHangMoHinhMVC/admin/default/KhachHangPage,0,8"> Trang Khách hàng></a>
<?php if ($index == "Thêm") {
    echo    "<h1>Form Thêm Khách hàng</h1>";
} else if ($index == "Sửa") {
    echo "<h1>Form Sửa Khách hàng</h1>";
}
?>

<form method="post">
   
     <div>
        <label for='idClient'>Mã khách hàng</label>
        <input type='text' id='idClient' name='userId'<?php
            if($index == "Sửa"){
                echo "readonly value ='{$item['MaKhachHang']}'";
            }
        
        ?> 
        
        >
        <div id="error-userId" style="color:red;"></div>
              
    </div>
   
    <div>
        <label for="nameClient">Họ và tên khách hàng</label>
        <input type="text" name="" id="nameClient"
         <?php 
            if($index == "Sửa"){
                echo "value ='{$item['TenKhachHang']}'";
            }      
            // echo "value = '$userName'"
            ?>
        >
        <div id="error-userName" style="color:red;"></div>
    </div>
    <div>
        <label for="phoneClient">Số điện thoại khách hàng</label>
        <input type="text" name="" id="phoneClient"
         <?php 
            if($index == "Sửa"){
                echo "value ='{$item['SoDienThoai']}'";
            }      
            // echo "value = '$userName'"
            ?>
        >
        <div id="error-userPhone" style="color:red;"></div>
    </div>
    <div>
        <label for="sexClient">Giới tính</label>
        
          <div>
                <input type="radio" name="sexClient" id="" value="Nam"
                <?php
                if($index == "Sửa"){
                     if($item['GioiTinh']=="Nam"){
                        echo 'checked';
                    }
                }
                   
                ?>
                >Nam
            
            
                <input type="radio" name="sexClient" id="" value="Nữ"
                <?php
                if($index == "Sửa"){
                     if($item['GioiTinh']=="Nữ"){
                        echo 'checked';
                    }
                }
                   
                ?>
                >Nữ
            
            
                <input type="radio" name="sexClient" id="" value="Khác"
                <?php
                if($index == "Sửa"){
                    if($item['GioiTinh']=="Khác"){
                        echo 'checked';
                    }
                }
                    
                ?>
                >Khác
          </div>

          <div id="error-userGioiTinh" style="color: red;"></div>
        
       
    </div>

    <?php 
        if($index=="Sửa"){
            echo '
            <div class="">
                <button type="button" onclick="btnEdit()">Cập nhật</button>
            </div>
            ';
        }
        else{
            echo '
            <div class="">
                <button type="button" onclick = "btnAdd()">Thêm</button>
            </div>
            ';
        }
    ?>

    
</form>

<script>
    $(document).ready(function() {
      
    })

    function btnAdd() {
        var maKhachHang = document.getElementById("idClient").value;
        var tenKhachHang = document.getElementById("nameClient").value;
        var sdt = document.getElementById("phoneClient").value;
        var radioButtons = document.getElementsByName("sexClient");
        var gioitinh="";
        for (var i = 0; i < radioButtons.length; i++) {
            if (radioButtons[i].checked === true) {
                gioitinh= radioButtons[i].value;
            }
        }
        if(checkForm(tenKhachHang,sdt,gioitinh)){
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
                    alert(data);
                    if(data == 1)
                    {
                        errorUserId.innerHTML = "";
                        errorUserPhone.innerHTML = "";
                        alert("Thêm dữ liệu thành công!");
                        window.location = "http://localhost/WebBanHangMoHinhMVC/admin/default/KhachHangPage,1,4";
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
                        alert("Thêm dữ liệu thất bại!");
                        // window.location = "http://localhost/WebBanHangMoHinhMVC/admin/default/KhuyenMaiPage";
                    }
                }
            })
        }

    }

    function btnEdit() {
        var maKhachHang = document.getElementById("idClient").value;
        var tenKhachHang = document.getElementById("nameClient").value;
        var sdt = document.getElementById("phoneClient").value;
        var radioButtons = document.getElementsByName("sexClient");
        var gioitinh ="";
        for (var i = 0; i < radioButtons.length; i++) {
            if (radioButtons[i].checked === true) {
            gioitinh = radioButtons[i].value;
            }
        }
        if(checkForm(tenKhachHang,sdt,gioitinh)){
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
                        alert("Cập nhật dữ liệu thành công!");
                        window.location = "http://localhost/WebBanHangMoHinhMVC/admin/default/KhachHangPage,1,4";
                    }
                    if(data == -1){
                        alert("Số điện thoại bị trùng!");
                        var errorUserPhone = document.getElementById("error-userPhone");
                        errorUserPhone.innerHTML = "Số điện thoại bị trùng!";
                    }                          
                    if(data==0)
                    {
                        alert("Cập nhật dữ liệu thất bại!");
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

function checkForm(tenKhachHang,sdt,gioitinh){
        var resultTenKhachHang = true;
        var resultSdt = true;
        var resultGioiTinh = true;
      

        var errorUserName = document.getElementById("error-userName");
        var errorUserPhone = document.getElementById("error-userPhone");
        var errorUserGioiTinh = document.getElementById("error-userGioiTinh");

        var errorUserNameStr = "";
        var errorUserPhoneStr ="";
        var errorUserGioiTinhStr =""
      

        //check tên 
        if(tenKhachHang==""){
            resultTenKhachHang = false;
            errorUserNameStr += "Không được để trống!"
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

        
        errorUserName.innerHTML = errorUserNameStr;
        errorUserPhone.innerHTML = errorUserPhoneStr;
        errorUserGioiTinh.innerHTML = errorUserGioiTinhStr;

        if(resultTenKhachHang&&resultSdt&&resultGioiTinh){
            return true
        }
        return false;
             
        
    }
</script>