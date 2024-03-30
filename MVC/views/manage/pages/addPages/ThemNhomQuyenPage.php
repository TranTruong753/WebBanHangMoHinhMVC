<?php 
$NhomQuyenModel = new NhomQuyenModel();
?>

<a href="http://localhost/WebBanHangMoHinhMVC/admin/container/NhomQuyenPage"> Trang Nhóm Quyền></a>
<h1>Form Thêm Nhóm Quyền</h1>

<form method="post">

<label for="TenNhomQuyen">Tên Nhóm Quyền</label>
<Br>
<input id="TenNhomQuyen" name="TenNhomQuyen" type="text">
<Br>
<span name="errorTen"></span>
<Br>
<input type="button" onclick="ThemDuLieuNhomQuyen()" value="Lưu">
</form>

<script>
    function ThemDuLieuNhomQuyen()
    {
        var TenNhomQuyen =document.getElementById("TenNhomQuyen").value;
        console.log(TenNhomQuyen)
        $.post("http://localhost/WebBanHangMoHinhMVC/AjaxNhomQuyen/ThemDuLieunhomQuyen",{TenNhomQuyen:TenNhomQuyen},function(data)
        {
            
            var result = data;
            alert("result:"+result.length);
            if(result.length==6)
            {
                alert("Thêm Dữ Liệu Nhóm Quyền Thành Công");
                window.location = "http://localhost/WebBanHangMoHinhMVC/admin/default/NhomQuyenPage";
            }
            else
            {
                alert("Thêm Dữ Liệu Nhóm Quyền Thất Bại");
            }
        })
    }
</script>