<?php
$NhomQuyenModel = new NhomQuyenModel();
$index = $data["DanhSach"]["index"];
if ($index == "Sửa") {
    $MaNhomQuyen = $data["DanhSach"]["MaNhomQuyen"];
}
?>

<a href="http://localhost/WebBanHangMoHinhMVC/admin/default/NhomQuyenPage,0,8"> Trang Nhóm Quyền></a>
<?php if ($index == "Thêm") {
    echo    "<h1>Form Thêm Nhóm Quyền</h1>";
} else if ($index == "Sửa") {
    echo "<h1>Form Sửa Nhóm Quyền</h1>";
}
?>

<form method="post">

    <label for="MaNhomQuyen">Mã Nhóm Quyền</label>
    <Br>
    <input id="MaNhomQuyen" name="MaNhomQuyen" type="text" disabled="disabled" value="<?php if ($index == "Sửa") echo $MaNhomQuyen ?>">
    <Br>
    <label for="TenNhomQuyen">Tên Nhóm Quyền</label>
    <Br>
    <input id="TenNhomQuyen" name="TenNhomQuyen" type="text" onkeyup="hienThiBtn()" value="<?php if($index == "Sửa") echo $NhomQuyenModel->getTenNhomQuyenTuMa($MaNhomQuyen) ?>">
    <Br>
    <span id="errorTen" name="errorTen" style="color: red;"></span>
    <Br>
    <input id="btnLuu" type="button" onclick="<?php
                                                if ($index == "Thêm") {
                                                    echo "ThemDuLieuNhomQuyen()";
                                                } else if ($index == "Sửa") {
                                                    echo "SuaDuLieuNhomQuyen()";
                                                } ?>"
    value="
    <?php
    if ($index == "Thêm") {
        echo "Thêm";
    } else if ($index == "Sửa") {
        echo "Cập Nhật";
    } ?>
    
    ">
</form>

<script>
    function ThemDuLieuNhomQuyen() {
        var TenNhomQuyen = document.getElementById("TenNhomQuyen").value;
        console.log(TenNhomQuyen.trim())
        if (TenNhomQuyen.trim() != "") {
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
                        window.location = "http://localhost/WebBanHangMoHinhMVC/admin/default/NhomQuyenPage,1,8";

                    })

                }
            })
        } else {
            document.getElementById("errorTen").innerHTML = "Tên nhóm quyền không được để trống";
        }
    }

    function SuaDuLieuNhomQuyen() {
        var MaNhomQuyen = document.getElementById("MaNhomQuyen").value;
        var TenNhomQuyen = document.getElementById("TenNhomQuyen").value;
        // alert(TenNhomQuyen);

        if (TenNhomQuyen.trim() != "") {
            $.post("http://localhost/WebBanHangMoHinhMVC/AjaxNhomQuyen/TimKiemQuaTen", {
                TenNhomQuyen: TenNhomQuyen
            }, function(data) {
                // alert(data.length);
                var result = data.length;

                if (result == 6) {
                    document.getElementById("errorTen").innerHTML = "Nhóm quyền Đã Tồn Tại";
                } else {
                    document.getElementById("errorTen").innerHTML = "";
                    $.post("http://localhost/WebBanHangMoHinhMVC/AjaxNhomQuyen/SuaDuLieuNhomQuyen",{MaNhomQuyen:MaNhomQuyen,TenNhomQuyen:TenNhomQuyen},function(data)
                    {
                        var result = data;
                        alert("result: "+result.length);
                        if(result.length == 6)
                        {
                            alert("Cập nhật dữ liệu nhóm quyền thành công!");
                            window.location = "http://localhost/WebBanHangMoHinhMVC/admin/default/NhomQuyenPage,1,8";
                        }
                        else
                        {
                            alert("Cập nhật dữ liệu nhóm quyền thất bại!");
                        }
                    })
                }
            })
        } else {
            document.getElementById("errorTen").innerHTML = "Tên nhóm quyền không được để trống";
        }
    }
</script>