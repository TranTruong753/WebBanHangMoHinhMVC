<?php
$KhachHangModel = new KhachHangModel();
$index = $data["DanhSach"]["index"];
if ($index == "Sửa") {
    $MaKhachHang = $data["DanhSach"]["MaKhachHang"];
}
?>

<a href="http://localhost/WebBanHangMoHinhMVC/admin/default/KhachHangPage,0,8"> Trang Khách hàng></a>
<?php if ($index == "Thêm") {
    echo    "<h1>Form Thêm Khách hàng</h1>";
} else if ($index == "Sửa") {
    echo "<h1>Form Sửa Khách hàng</h1>";
}
?>

<form method="post">

    <!-- <label for="MaKhachHang">Mã Nhóm Quyền</label>
    <Br>
    <input id="MaKhachHang" name="MaKhachHang" type="text" disabled="disabled" value="<?php if ($index == "Sửa") echo $MaKhachHang ?>">
    <Br>
    <label for="TenNhomQuyen">Tên Nhóm Quyền</label>
    <Br>
    <input id="TenNhomQuyen" name="TenNhomQuyen" type="text" onkeyup="hienThiBtn()" value="<?php if($index == "Sửa") echo $NhomQuyenModel->getTenNhomQuyenTuMa($MaKhachHang) ?>">
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
    
    "> -->
</form>