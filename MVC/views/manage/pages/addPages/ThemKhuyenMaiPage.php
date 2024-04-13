<?php
echo $data["index"];

?>
<a href="http://localhost/WebBanHangMoHinhMVC/admin/default/KhuyenMaiPage">Quay về trang quản lý khuyến mãi></a>
<h1>Form Thêm Khuyến Mãi</h1>

<div class="form">
    <label for="TenKhuyenMai">Tên Khuyến Mãi</label>
    <br>
    <input type="text" name="TenKhuyenMai" id="TenKhuyenMai" />
    <br>
    <span class="errorTenKhuyenMai" style="color: red;"></span>
    <br>
    <label for="MucKhuyenMai">Mức Khuyến Mãi</label>
    <br>
    <input type="text" name="MucKhuyenMai" id="MucKhuyenMai">
    <br>
    <span class="errorMucKhuyenMai" style="color: red;"></span>
    <br>
    <input type="button" id="btnAdd" value="Lưu">
</div>

<script>
    $(document).ready(function() {
        // alert(kiemTraMucKhuyenMai("61"));
    })
    document.getElementById("btnAdd").onclick = function() {
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
                    alert(data);
                    window.location = "http://localhost/WebBanHangMoHinhMVC/admin/default/KhuyenMaiPage";
                }
            })
        }
        // console.log(MucKhuyenMai);
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
        alert("Mức Khuyến Mãi: " + MucKhuyenMai)
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

        alert("resultMucKhuyenMai:" + resultMucKhuyenMai)
        if (resultTenKhuyenMai == true && resultMucKhuyenMai == true) {
            return true;
        } else {
            return false;
        }
    }
</script>