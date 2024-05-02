<?php
$ChucNangModel = new ChucNangModel();
$index = $data["DanhSach"]["index"];
if ($index == "Sửa") {
    $MaChucNang = $data["DanhSach"]["MaChucNang"];
    
}
?>
<?php if ($index == "Thêm") {
    echo    "<h1 class = 'styleText-02'>Thêm Chức Năng</h1>";
} else if ($index == "Sửa") {
    echo "<h1 class = 'styleText-02'>Sửa Chức Năng</h1>";
}
?>

<a class="form-add__link" href="http://localhost/WebBanHangMoHinhMVC/admin/default/ChucNangPage"> Quay về trang quản lý chức năng></a>


<form method="post" class="form_add">

   <div class="input-add_wrap">
        <label class="styleText-04 label-add" for="MaChucNang">Mã Chức Năng</label>    
        <input class="input-add" id="MaChucNang" name="MaChucNang" type="text" disabled="disabled" value="<?php if ($index == "Sửa") echo $MaChucNang ?>">    
   </div>
    <div class="input-add_wrap">
        <label class="styleText-04 label-add" for="TenChucNang">Tên Chức Năng</label>    
        <input class="input-add" id="TenChucNang" name="TenChucNang" type="text"  value="<?php if($index == "Sửa") echo $ChucNangModel->getTenChucNangTuMa($MaChucNang) ?>"> 
        <span id="errorTen" name="errorTen" style="color: red;"></span>  
    </div>   
      
    <div class="input-add_wrap">
        <button class="btn" id="btnLuu" type="button" onclick="<?php
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