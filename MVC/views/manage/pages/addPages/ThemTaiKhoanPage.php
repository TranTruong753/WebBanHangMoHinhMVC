<?php
$TaiKhoanModel = new TaiKhoanModel();
$NhomQuyenModel = new NhomQuyenModel();
$NhanVienModel = new NhanVienModel();
$KhachHangModel = new KhachHangModel();
$index = $data["DanhSach"]["index"];
if ($index == "Sửa") {
    $MaTaiKhoan = $data["DanhSach"]["MaTaiKhoan"];
    $arrTk = [];
    $arrNv = [];
    $arrKh = [];
    $itemTk = $TaiKhoanModel->getItemByIdTk($MaTaiKhoan,$arrTk);
    $itemNvSua = $TaiKhoanModel->getItemById($MaTaiKhoan,'nhanvien','MaNhanVien','TenNhanVien', $arrNv);
    $itemKhSua = $TaiKhoanModel->getItemById($MaTaiKhoan,'khachhang','MaKhachHang','TenKhachHang', $arrKh);
    // echo  $itemTk;
    // echo  $itemNvSua;
    // print_r($arrKh);
    // print_r($arrNv);
}
else if ($index == "CấpNv") {
    $MaNhanVien = $data["DanhSach"]["MaNhanVien"];
    $itemNvCap = $NhanVienModel->getItemById($MaNhanVien);
    // echo $MaNhanVien; 
}
else if ($index == "CấpKh") {
    $MaKhachHang = $data["DanhSach"]["MaKhachHang"];
    $itemKhCap = $KhachHangModel->getItemById($MaKhachHang);

}


?>

<?php 
    if ($index == "Thêm") {
        echo    "<h1 class = 'styleText-02' >Tạo tài khoản</h1>";
    } else if ($index == "Sửa") {
        echo "<h1 class = 'styleText-02' >Sửa tài khoản</h1>";
    } else if($index == "CấpNv"||$index == "CấpKh"){
        echo "<h1 class = 'styleText-02' >Cấp tài khoản</h1>";
    }

    if($index == "Sửa" || $index == "Thêm"){
        echo '<a class="form-add__link" href="http://localhost/WebBanHangMoHinhMVC/admin/default/TaiKhoanPage"> Trang quản lý tài khoản></a>';
    }
    else if($index == "CấpNv"){
        echo '<a class="form-add__link" href="http://localhost/WebBanHangMoHinhMVC/admin/default/NhanVienPage"> Trang quản lý nhân viên></a>';
    } else if($index == "CấpKh"){
        echo '<a class="form-add__link" href="http://localhost/WebBanHangMoHinhMVC/admin/default/KhachHangPage"> Trang quản lý khách hàng></a>';
    }
?>

<form action="" method="post" class="form_add">
    <?php 
        if($index == "Sửa"){
            echo '
            <div class="input-add_wrap">
                <label class="styleText-04 label-add" for="userID">ID</label>
                <input type="text" name="userID" id="userID" value="'.$MaTaiKhoan.'" readonly class="input-add">
            </div>';
        }
    
    ?>
    

    <div class="input-add_wrap">
        <label class='styleText-04 label-add' for="userLogin" >Tên Đăng nhập</label>
        <!-- <input type="text" id="userName" name="userName"> -->
        <div class="custom-select select-add">
            <select name="userLogin" id="userLogin">
                <?php 
                    //sửa 
                    if($index == "Sửa"){
                        if($itemNvSua == '1'){
                            echo"<option value='{$arrNv['TenDangNhap']}'>{$arrNv['TenDangNhap']} - {$arrNv['TenNhanVien']}</option>";
                        }else if($itemKhSua == '1'){
                            echo"<option value='{$arrKh['TenDangNhap']}'>{$arrKh['TenDangNhap']} - {$arrKh['TenKhachHang']}</option>";
                        }
                    }
    
                    if($index == "Sửa"||$index == "Thêm"){
                         //thêm và sửa đều load tất cả tên đăng nhâp
                        $itemNv = $TaiKhoanModel->loadDsTenDangNha('nhanvien','MaNhanVien');
                        $itemKh = $TaiKhoanModel->loadDsTenDangNha('khachhang','MaKhachHang');
                        if($itemNv->num_rows>0)
                        {
                            while($row = $itemNv->fetch_assoc())
                            {
                                echo"<option value='{$row['MaNhanVien']}'>{$row['MaNhanVien']} - {$row['TenNhanVien']}</option>";
                            }
                        }
                        if($itemKh->num_rows>0)
                        {
                            while($row = $itemKh->fetch_assoc())
                            {
                                echo"<option value='{$row['MaKhachHang']}'>{$row['MaKhachHang']} - {$row['TenKhachHang']}</option>";
                            }
                        }
                   
                    }
    
                    if($index == "CấpNv")
                    {
                        echo"<option value='{$itemNvCap['MaNhanVien']}'>{$itemNvCap['MaNhanVien']} - {$itemNvCap['TenNhanVien']}</option>";
                    }else if($index == "CấpKh"){
                        echo"<option value='{$itemKhCap['MaKhachHang']}'>{$itemKhCap['MaKhachHang']} - {$itemKhCap['TenKhachHang']}</option>";
                    }
                   
                
                ?>
                
            </select>
        </div>
       
   </div>
  
   <div class="input-add_wrap">
        <label class='styleText-04 label-add' for="userPw">mật khẩu</label>
        <input type="text" id="userPw" name="userPw"  maxlength="6" minlength="6" 
        <?php
            if($index == "Sửa")
            {
                echo "value= '{$arrTk['MatKhau']}'";
            }
            else {
                echo "value='123456'";
            }
        ?>
        
        
         placeholder="Nhập mật khẩu ..." class='input-add'>
        <div id="error-userPw" style="color: red;"></div>
   </div>

   <div class="input-add_wrap">
        <label class='styleText-04 label-add' for="userPhanQuyen">Nhóm Quyên</label>
        <div class="custom-select select-add">
            <select name="userPhanQuyen" id="userPhanQuyen">
                    <?php
                        if($index == "Sửa") {
                            $keyMaNhomQuyen = '';
    
                            if($itemNvSua == '1'){
                                $keyMaNhomQuyen = $arrNv['MaNhomQuyen'];
                                echo"<option value='{$arrNv['MaNhomQuyen']}'>{$arrNv['MaNhomQuyen']} - {$arrNv['TenNhomQuyen']}</option>";
                            }else if($itemKhSua == '1'){
                                $keyMaNhomQuyen = $arrKh['MaNhomQuyen'];
                                echo"<option value='{$arrKh['MaNhomQuyen']}'>{$arrKh['MaNhomQuyen']} - {$arrKh['TenNhomQuyen']}</option>";
                            }
                            $itemNqSua = $NhomQuyenModel->getDanhSachAllNotMa($keyMaNhomQuyen);
                            if($itemNqSua->num_rows>0)
                            {
                                while($row = $itemNqSua->fetch_assoc())
                                {
                                    echo"<option value='{$row['MaNhomQuyen']}'>{$row['MaNhomQuyen']} - {$row['TenNhomQuyen']}</option>";
                                }
                            }
                            
                          
                        }
                    
                        else if($index == "Thêm" || $index == "CấpNv" ){
                            $itemNq = $NhomQuyenModel->getDanhSachAll();                      
                            if($itemNq->num_rows>0)
                            {
                                while($row = $itemNq->fetch_assoc())
                                {                             
                                    echo"<option value='{$row['MaNhomQuyen']}'>{$row['MaNhomQuyen']} - {$row['TenNhomQuyen']}</option>";                               
                                }
                            }
                        }
    
                        else if($index == "CấpKh"){
                            $itemNq = $NhomQuyenModel->getDanhSachAll();                      
                            if($itemNq->num_rows>0)
                            {
                                while($row = $itemNq->fetch_assoc())
                                {
                                    if($row['MaNhomQuyen']=='1'){
    
                                        echo"<option value='{$row['MaNhomQuyen']}'>{$row['MaNhomQuyen']} - {$row['TenNhomQuyen']}</option>";
    
                                    }
                                }
                            }
                        }
                         
                    ?>
            </select>
        </div>
        
   </div>
    <div class="input-add_wrap">
        <?php 
            if ($index == "Thêm") {
            echo '<button class = "btn" style = "--width-btn:160px;" type="button" onclick = "btnAdd()">Tạo tài khoản</button>';
            }else if($index == "Sửa"){
                echo '<button class = "btn" style = "--width-btn:200px;" type="button"  onclick = "btnEdit()">Cập nhật tài khoản</button>';
            }else if($index == "CấpNv" ){
                echo '<button class = "btn" style = "--width-btn:200px;" type="button" onclick = "btnAddNv()">Cấp tài khoản</button>';
            }else if($index == "CấpKh"){
                echo '<button class = "btn" style = "--width-btn:200px;" type="button" onclick = "btnAddKh()">Cấp tài khoản</button>';
            }
    ?>
    </div>
  
   
</form>

<script>
    $(document).ready(function() {
      
    })

    function btnAdd() {
        var TenDangNhap = document.getElementById("userLogin").value.trim();
        var MatKhau = document.getElementById("userPw").value.trim();
        var MaNhomQuyen = document.getElementById("userPhanQuyen").value.trim();
        alert( " " + TenDangNhap +" " + MatKhau +" " + MaNhomQuyen);  
        if(checkForm(MatKhau)){
            $.ajax({
                url: "http://localhost/WebBanHangMoHinhMVC/AjaxTaiKhoan/insert",
                type:"post",
                dataType:"html",
                data:{
                    TenDangNhap:TenDangNhap,
                    MatKhau:MatKhau,
                    MaNhomQuyen:MaNhomQuyen
                },
                success: function(data)
                {               
                   
                    alert(data);
                    if(data == 1)
                    {
                        alert("Thêm dữ liệu thành công!");
                        window.location = "http://localhost/WebBanHangMoHinhMVC/admin/default/TaiKhoanPage";
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

    function btnAddNv() {
        var TenDangNhap = document.getElementById("userLogin").value.trim();
        var MatKhau = document.getElementById("userPw").value.trim();
        var MaNhomQuyen = document.getElementById("userPhanQuyen").value.trim();
        alert( " " + TenDangNhap +" " + MatKhau +" " + MaNhomQuyen);  
        if(checkForm(MatKhau)){
            $.ajax({
                url: "http://localhost/WebBanHangMoHinhMVC/AjaxTaiKhoan/insert",
                type:"post",
                dataType:"html",
                data:{
                    TenDangNhap:TenDangNhap,
                    MatKhau:MatKhau,
                    MaNhomQuyen:MaNhomQuyen
                },
                success: function(data)
                {               
                   
                    alert(data);
                    if(data == 1)
                    {
                        alert("Thêm dữ liệu thành công!");
                        window.location = "http://localhost/WebBanHangMoHinhMVC/admin/default/NhanVienPage";
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

    function btnAddKh() {
        var TenDangNhap = document.getElementById("userLogin").value.trim();
        var MatKhau = document.getElementById("userPw").value.trim();
        var MaNhomQuyen = document.getElementById("userPhanQuyen").value.trim();
        alert( " " + TenDangNhap +" " + MatKhau +" " + MaNhomQuyen);  
        if(checkForm(MatKhau)){
            $.ajax({
                url: "http://localhost/WebBanHangMoHinhMVC/AjaxTaiKhoan/insert",
                type:"post",
                dataType:"html",
                data:{
                    TenDangNhap:TenDangNhap,
                    MatKhau:MatKhau,
                    MaNhomQuyen:MaNhomQuyen
                },
                success: function(data)
                {               
                   
                    alert(data);
                    if(data == 1)
                    {
                        alert("Thêm dữ liệu thành công!");
                        window.location = "http://localhost/WebBanHangMoHinhMVC/admin/default/KhachHangPage";
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
        var MaTaiKhoan = document.getElementById("userID").value.trim();
        var TenDangNhap = document.getElementById("userLogin").value.trim();
        var MatKhau = document.getElementById("userPw").value.trim();
        var MaNhomQuyen = document.getElementById("userPhanQuyen").value.trim();
        //alert( " " + TenDangNhap +" " + MatKhau +" " + MaNhomQuyen);  
        if(checkForm(MatKhau)){
            $.ajax({
                url: "http://localhost/WebBanHangMoHinhMVC/AjaxTaiKhoan/update",
                type:"post",
                dataType:"html",
                data:{
                    MaTaiKhoan:MaTaiKhoan,
                    TenDangNhap:TenDangNhap,
                    MatKhau:MatKhau,
                    MaNhomQuyen:MaNhomQuyen
                },
                success: function(data)
                {               
                   
                    alert(data);
                    if(data == 1)
                    {
                        alert("Cập nhật dữ liệu thành công!");
                        window.location = "http://localhost/WebBanHangMoHinhMVC/admin/default/TaiKhoanPage";
                    }                             
                    else 
                    {
                        alert("Cập nhật dữ liệu thất bại!");
                        // window.location = "http://localhost/WebBanHangMoHinhMVC/admin/default/KhuyenMaiPage";
                    }
                }
            })

        } 
    }

    function checkPatterPin(pin) {
        var pattern = /^\d{6}$/;
        return pattern.test(pin);
    }

    function checkForm(MatKhau) {
        var resultMatKhau = false ;
        var errorUserPw = document.getElementById("error-userPw");
        var errorUserPwStr = "";
         //check mật khẩu
         if(MatKhau==""){
            resultMatKhau = false;
            errorUserPwStr += "Không được để trống!"
        }
        else{
            errorUserPwStr = "";
            if(checkPatterPin(MatKhau)){
                errorUserPwStr = "";
                resultMatKhau = true;
            } 
            else {
                resultMatKhau = false;
                errorUserPwStr += "Mật khẩu phải đủ 6 ký tự và chỉ chứa các ký tự số!"
            }
        }

        errorUserPw.innerHTML = errorUserPwStr;
        return resultMatKhau;
    }


</script>