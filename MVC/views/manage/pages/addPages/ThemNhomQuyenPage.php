<?php
$NhomQuyenModel = new NhomQuyenModel();
$index = $data["DanhSach"]["index"];
if ($index == "Sửa") {
    $MaNhomQuyen = $data["DanhSach"]["MaNhomQuyen"];
}
?>


<?php if ($index == "Thêm") {
    echo    "<h1 class = 'styleText-02' >Thêm Nhóm Quyền</h1>";
} else if ($index == "Sửa") {
    echo "<h1 class = 'styleText-02' >Sửa Nhóm Quyền</h1>";
}
?>

<a class="form-add__link" href="http://localhost/WebBanHangMoHinhMVC/admin/default/NhomQuyenPage"> Quay về Trang Nhóm Quyền></a>

<form method="post" class="form_add">

   <div class="input-add_wrap">
        <label class="styleText-04 label-add" for="MaNhomQuyen">Mã Nhóm Quyền</label>
        
        <input class="input-add" id="MaNhomQuyen" name="MaNhomQuyen" type="text" disabled="disabled" value="<?php if ($index == "Sửa") echo $MaNhomQuyen ?>">
        
   </div>
    <div class="input-add_wrap">
        <label class="styleText-04 label-add" for="TenNhomQuyen">Tên Nhóm Quyền</label>
        
        <input class="input-add" id="TenNhomQuyen" name="TenNhomQuyen" type="text" onkeyup="hienThiBtn()" value="<?php if($index == "Sửa") echo $NhomQuyenModel->getTenNhomQuyenTuMa($MaNhomQuyen) ?>">
        
        <span id="errorTen" name="errorTen" style="color: red;"></span>
        
    </div>
   <div class="input-add_wrap">
        <button class="btn" id="btnLuu" type="button" onclick="<?php
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
            <?php
            if ($index == "Thêm") {
                echo "Thêm";
            } else if ($index == "Sửa") {
                echo "Cập Nhật";
            } ?>
        </button>
   </div>
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