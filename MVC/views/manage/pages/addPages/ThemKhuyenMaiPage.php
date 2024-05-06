<?php
    $index = $data["DanhSach"]["index"];
    $MaKhuyenMai = "";
    $item = [];
    if($index == "Sửa")
    {
        $KhuyenMaiModel = $data["DanhSach"]["KhuyenMaiModel"];
        $MaKhuyenMai = $data["DanhSach"]["MaKhuyenMai"];
        $item = $KhuyenMaiModel->getItemById($MaKhuyenMai);
    }
?>
<h1 class = 'styleText-02'><?php if($index == "Thêm"){echo "Thêm";}else if($index == "Sửa") echo "Sửa";?> Khuyến Mãi</h1>
<a class="form-add__link" href="http://localhost/WebBanHangMoHinhMVC/admin/default/KhuyenMaiPage">Quay về trang quản lý khuyến mãi></a>


<form method="post" class="form_add">
    <?php
    if($index == "Sửa")
    {
        echo "
       <div class = 'input-add_wrap'>
            <label class='styleText-04 label-add' for='MaKhuyenMai'>Mã Khuyến Mãi</label>
            
            <input class='input-add' type='text' name='MaKhuyenMai' id='MaKhuyenMai' value='".$item["MaKhuyenMai"]."' disabled='disabled' />
       </div>
        ";
    }
    ?>
    <div class="input-add_wrap">
        <label class="styleText-04 label-add" for="TenKhuyenMai">Tên Khuyến Mãi</label>
        
        <input class="input-add" type="text" name="TenKhuyenMai" id="TenKhuyenMai" value="<?php if($index == "Sửa") echo $item["TenKhuyenMai"] ?>" />
        
        <span class="errorTenKhuyenMai" style="color: red;"></span>
    </div>
    
   <div class="input-add_wrap">
        <label class="styleText-04 label-add" for="MucKhuyenMai">Mức Khuyến Mãi</label>
        
        <input class="input-add" type="text" name="MucKhuyenMai" id="MucKhuyenMai" value="<?php if($index == "Sửa") echo $item["MucKhuyenMai"] ?>">
        
        <span class="errorMucKhuyenMai" style="color: red;"></span>
   </div>
    
   <div class="input-add_wrap">
        <button type="button" onclick="
        <?php 
        if($index == 'Thêm')
            {echo 'btnAdd()';}
        else if($index == 'Sửa') 
            {echo 'btnEdit()';}
        
        ?>
        " value="Lưu" class="btn">
         <?php 
            if($index == 'Thêm')
                {echo 'Thêm';}
            else if($index == 'Sửa') 
                {echo 'Sửa';}
        
        ?>
        </button>
   </div>
</form>

<script>
    $(document).ready(function() {
        // alert(kiemTraMucKhuyenMai("61"));
    })
    // showAlert();
    // xử lý sự kiện thêm khuyến mãi
    function btnAdd() {
        var TenKhuyenMai = document.getElementById("TenKhuyenMai").value;
        var MucKhuyenMai = document.getElementById("MucKhuyenMai").value;
        // alert(checkForm(TenKhuyenMai, MucKhuyenMai));
        if (checkForm(TenKhuyenMai, MucKhuyenMai) == true) {
            $.ajax({
                url: "http://localhost/WebBanHangMoHinhMVC/AjaxKhuyenMai/insert",
                type:"post",
                dataType:"html",
                data:{
                    TenKhuyenMai:TenKhuyenMai,
                    MucKhuyenMai:MucKhuyenMai
                },
                success: function(data)
                {
                    // alert(data);
                    swal({
                        title: "Thêm thành công!",
                        text: "Nhấn vào nút để tiếp tục!",
                        icon: "success",
                    }).then(function () {
                        window.location = "http://localhost/WebBanHangMoHinhMVC/admin/default/KhuyenMaiPage";
                    });
                    
                    // setTimeout(function () {
                    //     window.location = "http://localhost/WebBanHangMoHinhMVC/admin/default/KhuyenMaiPage";
                    // }, 5000);
                   
                }
            })
        }
        // console.log(MucKhuyenMai);
    }

    // function showAlert() {
    //     swal({
    //         title: "Thành công!",
    //         text: "Nhấn vào nút để tiếp tục!",
    //         icon: "success",
    //     });
    // }

    // xử lý sự kiện sửa khuyến mãi
     function btnEdit() {
        var MaKhuyenMai = document.getElementById("MaKhuyenMai").value;
        var TenKhuyenMai = document.getElementById("TenKhuyenMai").value;
        var MucKhuyenMai = document.getElementById("MucKhuyenMai").value;
        // alert(checkForm(TenKhuyenMai, MucKhuyenMai));
        if (checkForm(TenKhuyenMai, MucKhuyenMai) == true) {
            $.ajax({
                url: "http://localhost/WebBanHangMoHinhMVC/AjaxKhuyenMai/update",
                type:"post",
                dataType:"html",
                data:{
                    MaKhuyenMai:MaKhuyenMai,
                    TenKhuyenMai:TenKhuyenMai,
                    MucKhuyenMai:MucKhuyenMai
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
                        window.location = "http://localhost/WebBanHangMoHinhMVC/admin/default/KhuyenMaiPage";
                        });
                       // window.location = "http://localhost/WebBanHangMoHinhMVC/admin/default/KhuyenMaiPage";
                    }
                    // else if(data == -1)
                    // {
                    //     alert("Tên Khuyến Mãi Đã Tồn Tại, Vui Lòng chọn tên khác") ;
                    // }
                    else
                    {
                        // alert("Cập nhật dữ liệu thất bại!");

                        swal({
                            title: "Lỗi! Cập nhật thất bại!",
                            text: "Nhấn vào nút để tiếp tục!",
                            icon: "error",
                        })
                        // .then(function () {
                        // window.location = "http://localhost/WebBanHangMoHinhMVC/admin/default/KhuyenMaiPage";
                        // });
                    }
                }
            })
        }
        console.log(MucKhuyenMai);
    }

    // Hàm kiểm tra số Nguyên Dương
    function kiemTraMucKhuyenMai(value) {
        if (isIntegerString(value)) {
            if (parseInt(value) > 0 && parseInt(value) <= 60) return true;
            return false;
        } else
            return false;
    }


    //hàm kiểm tra 1 chuỗi có phải là số nguyên hay không
    function isIntegerString(str) {
        // Biểu thức chính quy để kiểm tra chuỗi có phải là số nguyên (dương, âm, hoặc không)
        const integerRegex = /^-?\d+$/;

        // Trả về true nếu chuỗi khớp với biểu thức chính quy
        return integerRegex.test(str);
    }
    // Hàm Check Form
    function checkForm(TenKhuyenMai, MucKhuyenMai) {
        // alert("Mức Khuyến Mãi: " + MucKhuyenMai)
        var resultTenKhuyenMai = true;
        var resultMucKhuyenMai = true;
        var errorTenKhuyenMai = document.getElementsByClassName("errorTenKhuyenMai")[0];
        var errorMucKhuyenMai = document.getElementsByClassName("errorMucKhuyenMai")[0];
        var errorTenKhuyenMaiStr = "";
        var errorMucKhuyenMaiStr = "";
        if (TenKhuyenMai == "") {
            errorTenKhuyenMaiStr += "Tên Khuyến Mãi Không được để trống";
            resultTenKhuyenMai = false;
        } else {
            errorTenKhuyenMaiStr = "";
            resultTenKhuyenMai = true;
        }
        // alert("kiemTraMucKhuyenMai:" + kiemTraMucKhuyenMai("1"))
        if (kiemTraMucKhuyenMai(MucKhuyenMai) == false) {
            errorMucKhuyenMaiStr += "Mức Khuyến Mãi Không Được Để Trống, là 1 số nguyên dương(>0 và <=60)";
            resultMucKhuyenMai = false;
        } else {
            errorMucKhuyenMaiStr = "";
            resultMucKhuyenMai = true;
        }

        errorTenKhuyenMai.innerHTML = errorTenKhuyenMaiStr;
        errorMucKhuyenMai.innerHTML = errorMucKhuyenMaiStr;

        // alert("resultMucKhuyenMai:" + resultMucKhuyenMai)
        if (resultTenKhuyenMai == true && resultMucKhuyenMai == true) {
            return true;
        } else {
            return false;
        }
    }
</script>