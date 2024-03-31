<?php
$NhomQuyenModel = new NhomQuyenModel();
?>

<a href="http://localhost/WebBanHangMoHinhMVC/admin/container/NhomQuyenPage"> Trang Nhóm Quyền></a>
<h1>Form Thêm Nhóm Quyền</h1>

<form method="post">

    <label for="TenNhomQuyen">Tên Nhóm Quyền</label>
    <Br>
    <input id="TenNhomQuyen" name="TenNhomQuyen" type="text" onkeyup="hienThiBtn()">
    <Br>
    <span id="errorTen" name="errorTen" style="color: red;"></span>
    <Br>
    <input id="btnLuu" type="button" onclick="ThemDuLieuNhomQuyen()" value="Lưu">
</form>

<script>
    function ThemDuLieuNhomQuyen() {
        // var TenNhomQuyen = document.getElementById("TenNhomQuyen").value;
        // var errorTen = document.getElementById("errorTen").innerHTML;
        // $.post("http://localhost/WebBanHangMoHinhMVC/AjaxNhomQuyen/ThemDuLieunhomQuyen", {
        //     TenNhomQuyen: TenNhomQuyen
        // }, function(data) {
        //     alert("Thêm Dữ Liệu Nhóm Quyền Thành Công");
        //     window.location = "http://localhost/WebBanHangMoHinhMVC/admin/default/NhomQuyenPage";

        // })

        // var TenNhomQuyen =document.getElementById("TenNhomQuyen");
        // $.post("http://localhost/WebBanHangMoHinhMVC/AjaxNhomQuyen/")

        var TenNhomQuyen = document.getElementById("TenNhomQuyen").value;

        console.log(TenNhomQuyen.trim())
        alert("result"+TenNhomQuyen.trim())
        if(TenNhomQuyen.trim() != "")
        {   
            $.post("http://localhost/WebBanHangMoHinhMVC/AjaxNhomQuyen/TimKiemQuaTen", {
            TenNhomQuyen: TenNhomQuyen
        }, function(data) {
            // alert(data.length);
            var result = data.length;
            if (result == 6) {
                document.getElementById("errorTen").innerHTML = "Nhóm quyền Đã Tồn Tại";
            } else {
                document.getElementById("errorTen").innerHTML = "";
                $.post("http://localhost/WebBanHangMoHinhMVC/AjaxNhomQuyen/ThemDuLieunhomQuyen", {
                    TenNhomQuyen: TenNhomQuyen
                }, function(data) {
                    alert("Thêm Dữ Liệu Nhóm Quyền Thành Công");
                    window.location = "http://localhost/WebBanHangMoHinhMVC/admin/default/NhomQuyenPage";

                })

            }
        })
        }else
        {
            document.getElementById("errorTen").innerHTML = "Tên nhóm quyền không được để trống";
        }
        


    }

    // function errorTen() {
    //     var TenNhomQuyen = document.getElementById("TenNhomQuyen").value;
    //     $.post("http://localhost/WebBanHangMoHinhMVC/AjaxNhomQuyen/", {
    //         TenNhomQuyen: TenNhomQuyen
    //     }, function(data) {

    //     })
    // }

    function hienThiBtn() {

    }
</script>