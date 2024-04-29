<?php
$ChucNangModel = new ChucNangModel();
$index = $data["DanhSach"]["index"];
if ($index == "Sửa") {
    $MaChucNang = $data["DanhSach"]["MaChucNang"];
    
}
?>

<a href="http://localhost/WebBanHangMoHinhMVC/admin/default/ChucNangPage,1,4"> Quay về trang quản lý chức năng></a>
<?php if ($index == "Thêm") {
    echo    "<h1>Form Thêm Chức Năng</h1>";
} else if ($index == "Sửa") {
    echo "<h1>Form Sửa Chức Năng</h1>";
}
?>

<form method="post">

    <label for="MaChucNang">Mã Chức Năng</label>
    <Br>
    <input id="MaChucNang" name="MaChucNang" type="text" disabled="disabled" value="<?php if ($index == "Sửa") echo $MaChucNang ?>">
    <Br>
    <label for="TenChucNang">Tên Chức Năng</label>
    <Br>
    <input id="TenChucNang" name="TenChucNang" type="text"  value="<?php if($index == "Sửa") echo $ChucNangModel->getTenChucNangTuMa($MaChucNang) ?>">
    <Br>
    <span id="errorTen" name="errorTen" style="color: red;"></span>
    <Br>
    <input id="btnLuu" type="button" onclick="<?php
                                                if ($index == "Thêm") {
                                                    echo "ThemDuLieuChucNang()";
                                                } else if ($index == "Sửa") {
                                                    echo "SuaDuLieuChucNang()";
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
    // Hàm Thêm Dữ Liệu Chức Năng

    function ThemDuLieuChucNang()
    {
        var TenChucNang = document.getElementById("TenChucNang").value;
        // alert(TenChucNang)
        $.ajax({
            url: "http://localhost/WebBanHangMoHinhMVC/AjaxChucNang/ThemDuLieu",
            type: "post",
            dataType: "html",
            data:{
                TenChucNang:TenChucNang,
            },
            success:function(data)
            {
                if(data == -1)
                {
                    document.getElementById("errorTen").innerHTML = "Tên Chức Năng Đã Tồn Tại!";
                }else
                {
                    document.getElementById("errorTen").innerHTML = "";
                    if(data == 1)
                    {
                        alert("Thêm chức năng thành công!")
                        window.location = "http://localhost/WebBanHangMoHinhMVC/admin/default/ChucNangPage";
                    }
                    else if(data == 0 )
                    {
                        alert("Thêm chức năng thất bại!")
                    }

                }


            }
        }
        )
    }

    function SuaDuLieuChucNang()
    {
        var MaChucNang = document.getElementById("MaChucNang").value;
        var TenChucNang = document.getElementById("TenChucNang").value;
        // alert(TenChucNang)
        $.ajax({
            url: "http://localhost/WebBanHangMoHinhMVC/AjaxChucNang/SuaDuLieu",
            type: "post",
            dataType: "html",
            data:{
                MaChucNang:MaChucNang,
                TenChucNang:TenChucNang,
            },
            success:function(data)
            {
                if(data == -1)
                {
                    document.getElementById("errorTen").innerHTML = "Tên Chức Năng Đã Tồn Tại!";
                }else
                {
                    document.getElementById("errorTen").innerHTML = "";
                    if(data == 1)
                    {
                        alert("Sửa chức năng thành công!")
                        window.location = "http://localhost/WebBanHangMoHinhMVC/admin/default/ChucNangPage,1,4";
                    }
                    else if(data == 0 )
                    {
                        alert("Sửa chức năng thất bại!")
                    }

                }


            }
        }
        )
    }
</script>