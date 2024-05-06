<?php
    $NhanVienModel = new NhanVienModel();
    $index = $data["DanhSach"]["index"];
    if ($index == "Sửa") {
        $MaNhanVien = $data["DanhSach"]["MaNhanVien"];
        $item = $NhanVienModel->getItemById($MaNhanVien);

    
    }

?>
<?php if ($index == "Thêm") {
    echo    "<h1 class = 'styleText-02' >Thêm Nhân viên</h1>";
} else if ($index == "Sửa") {
    echo "<h1 class = 'styleText-02' >Sửa Nhân viên</h1>";
}
?>
<a class="form-add__link" href="http://localhost/WebBanHangMoHinhMVC/admin/default/NhanVienPage"> Quay về trang quản lý nhân viên></a>


<form action="" method="post" class="form_add">
    <?php 
        if($index == "Sửa"){
            echo "
            <div class='input-add_wrap'>
                <label for='userId'  class='styleText-04 label-add'> Mã nhân viên</label>
                <input type='text' id='userId' name='userId' readonly class='input-add'
                value='".$item["MaNhanVien"]."'
                >
              
            </div>";
        }
    
    ?>
   

   <div class="input-add_wrap">
        <label class="styleText-04 label-add" for="userName">Họ và tên</label>
        <input class="input-add" type="text" id="userName" name="userName" placeholder="Nhập họ và tên"

        <?php 
        if($index == "Sửa"){
            echo "value ='{$item['TenNhanVien']}'";
        }      
        // echo "value = '$userName'"
        ?>
        
        >
        <div id="error-userName" style="color: red;"></div>
   </div>

    <div class="input-add_wrap">
        <label class="styleText-04 label-add" for="userPhone">Số điện thoại</label>
        <input class="input-add" type="tel" id="userPhone" name="userPhone" placeholder="Nhập số điện thoại"
        <?php 
        if($index == "Sửa"){
            echo "value ='{$item['SoDienThoai']}'";
        }      
        // echo "value = '$userName'"
        ?>
        >
        <div id="error-userPhone" style="color: red;"></div>
    </div>

   <div class="input-add_wrap">
        <label class="styleText-04 label-add" for="CCCD">CCCD</label>
        <input class="input-add" type="text" id="userCCCD" name="CCCD" placeholder="Nhập cccd"
            <?php 
            if($index == "Sửa"){
                echo "value ='{$item['CCCD']}'";
            }      
            // echo "value = '$userName'"
            ?>
        >
        <div id="error-userCCCD" style="color: red;"></div>
   </div>

    <div class="input-add_wrap">
        <label class="styleText-04 label-add" for="date">Ngày sinh</label>
        <input class="input-add" type="date" id="date" name="date"
        <?php 
        if($index == "Sửa"){
            echo "value ='{$item['NgaySinh']}'";
        }      
        // echo "value = '$userName'"
        ?>
        >
        <div id="error-userDate"style="color: red;"></div>
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
        var tenNhanVien = document.getElementById("userName").value.trim();
        var sdt = document.getElementById("userPhone").value.trim();
        var cccd = document.getElementById("userCCCD").value.trim();
        var ngaySinh = document.getElementById("date").value.trim();
        // alert(cccd);
        if(checkForm(tenNhanVien,sdt,cccd,ngaySinh)){
            $.ajax({
                url: "http://localhost/WebBanHangMoHinhMVC/AjaxNhanVien/insert",
                type:"post",
                dataType:"html",
                data:{
                    tenNhanVien:tenNhanVien,
                    sdt:sdt,
                    cccd:cccd,
                    ngaySinh:ngaySinh,
                },
                success: function(data)
                {               
                    var errorUserPhone = document.getElementById("error-userPhone");
                    var errorUserCccd = document.getElementById("error-userCCCD");
                    // alert(data);
                    if(data == 1)
                    {
                        // alert("Thêm dữ liệu thành công!");
                        swal({
                            title: "Thêm thành công!",
                            text: "Nhấn vào nút để tiếp tục!",
                            icon: "success",
                        }).then(function () {
                        window.location = "http://localhost/WebBanHangMoHinhMVC/admin/default/NhanVienPage";
                        })
                    }
                    else if(data == -3){
                        errorUserPhone.innerHTML = "Số điện thoại bị trùng!";
                        errorUserCccd.innerHTML = "CCCD bị trùng!";

                    }
                    else if(data == -1){
                        // alert("Số điện thoại bị trùng!");
                        errorUserCccd.innerHTML = "";                 
                        errorUserPhone.innerHTML = "Số điện thoại bị trùng!";
                    } 
                    else if(data == -2){
                        // alert("CCCD bị trùng!");  
                        errorUserPhone.innerHTML = "";                  
                        errorUserCccd.innerHTML = "CCCD bị trùng!";
                    }                 
                    else 
                    {
                        swal({
                            title: "Thêm thất bại!",
                            text: "Nhấn vào nút để tiếp tục!",
                            icon: "error",
                        })
                        // alert("Thêm dữ liệu thất bại!");
                        // window.location = "http://localhost/WebBanHangMoHinhMVC/admin/default/KhuyenMaiPage";
                    }
                }
            })
        }

    }

    function btnEdit() {
        var maNhanVien = document.getElementById("userId").value.trim();
        var tenNhanVien = document.getElementById("userName").value.trim();
        var sdt = document.getElementById("userPhone").value.trim();
        var cccd = document.getElementById("userCCCD").value.trim();
        var ngaySinh = document.getElementById("date").value.trim();
        alert(tenNhanVien+sdt+cccd+ngaySinh);
        if(checkForm(tenNhanVien,sdt,cccd,ngaySinh)){
            $.ajax({
                url: "http://localhost/WebBanHangMoHinhMVC/AjaxNhanVien/update",
                type:"post",
                dataType:"html",
                data:{
                    maNhanVien:maNhanVien,
                    tenNhanVien:tenNhanVien,
                    sdt:sdt,
                    cccd:cccd,
                    ngaySinh:ngaySinh,
                },
                success: function(data)
                {
                    var errorUserPhone = document.getElementById("error-userPhone");
                    var errorUserCccd = document.getElementById("error-userCCCD");
                    // alert(data);
                    if(data == 1)
                    {
                        // alert("Cập nhật dữ liệu thành công!");
                        swal({
                            title: "Cập nhật thành công!",
                            text: "Nhấn vào nút để tiếp tục!",
                            icon: "success",
                        }).then(function () {
                        window.location = "http://localhost/WebBanHangMoHinhMVC/admin/default/NhanVienPage";
                        })
                    }
                    else if(data == -3){
                        errorUserPhone.innerHTML = "Số điện thoại bị trùng!";
                        errorUserCccd.innerHTML = "CCCD bị trùng!";

                    }
                    else if(data == -1){
                        // alert("Số điện thoại bị trùng!");
                        errorUserCccd.innerHTML = "";                 
                        errorUserPhone.innerHTML = "Số điện thoại bị trùng!";
                    } 
                    else if(data == -2){
                        // alert("CCCD bị trùng!");  
                        errorUserPhone.innerHTML = "";                  
                        errorUserCccd.innerHTML = "CCCD bị trùng!";
                    }                 
                    else 
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

    function checkPatterCCCD(cccd){
        var pattern = /^\d{9,12}$/;
        return pattern.test(cccd);
    }

    function checkDate(ngaySinh){
         // Lấy giá trị từ trường input date
        //var dateString = document.getElementById("dob").value;
        
        // Chuyển đổi ngày sinh thành đối tượng Date
        var date = new Date(ngaySinh);
        
        // Lấy ngày hiện tại
        var today = new Date();
        
        // Tính tuổi bằng cách lấy hiệu của năm hiện tại và năm sinh
        var age = today.getFullYear() - date.getFullYear();
        
        // Kiểm tra nếu ngày sinh trong năm hiện tại chưa đến, giảm tuổi đi 1
        if (today.getMonth() < date.getMonth() || (today.getMonth() === date.getMonth() && today.getDate() < date.getDate())) {
            age--;
        }
        //  alert(ngaySinh + "today: " + today +"age: " + age);
        
        // Kiểm tra xem tuổi có lớn hơn hoặc bằng 18 không
        if(age>=18){
            return true;
        }
        return false;
    }



    function checkForm(tenNhanVien,sdt,cccd,ngaySinh){
        var resultTenNhanVien = true;
        var resultSdt = true;
        var resultCccd = true;
        var resultNgaySinh = true;

        var errorUserName = document.getElementById("error-userName");
        var errorUserPhone = document.getElementById("error-userPhone");
        var errorUserCccd = document.getElementById("error-userCCCD");
        var errorUserNgaySinh = document.getElementById("error-userDate");

        var errorUserNameStr = "";
        var errorUserPhoneStr ="";
        var errorUserCccdStr = "";
        var errorUserNgaySinhStr = "";

        //check tên nhân viên
        if(tenNhanVien==""){
            resultTenNhanVien = false;
            errorUserNameStr += "Không được để trống!"
        }
        else{
            errorUserNameStr = "";
            if(checkPatternUser(tenNhanVien)){
                errorUserNameStr = "";
                resultTenNhanVien = true;
            } 
            else {
                resultTenNhanVien = false;
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

        // check cccd
        if(cccd==""){
            resultCccd = false;
            errorUserCccdStr += "Không được để trống!"
        }
        else{
            errorUserCccdStr = "";
            if(checkPatterCCCD(cccd)){
                errorUserCccdStr = "";
                resultCccd = true;
            }  
            else {
                resultCccd = false;
                errorUserCccdStr += "cccd không đúng định dạng!"
            }
        }
        
        //check ngay sinh
        if(ngaySinh==""){
            resultCccd = false;
            errorUserNgaySinhStr += "Không được để trống!"
        }
        else{
            errorUserNgaySinhStr = "";
            if(checkDate(ngaySinh)){
             
                resultCccd = true;
                errorUserNgaySinhStr = "";
            } 
            else {
                resultCccd = false;
                errorUserNgaySinhStr += "Chưa đủ 18 tuổi!"
            }
        }

        errorUserName.innerHTML = errorUserNameStr;
        errorUserPhone.innerHTML = errorUserPhoneStr;
        errorUserCccd.innerHTML = errorUserCccdStr;
        errorUserNgaySinh.innerHTML = errorUserNgaySinhStr;

        if(resultTenNhanVien&&resultSdt&&resultCccd&&resultNgaySinh){
            return true
        }
        return false;
             
        
    }

</script>
