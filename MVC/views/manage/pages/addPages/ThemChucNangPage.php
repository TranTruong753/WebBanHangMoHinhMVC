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
    <input id="TenChucNang" name="TenChucNang" type="text" onkeyup="hienThiBtn()" value="<?php if($index == "Sửa") echo $ChucNangModel->getTenChucNangTuMa($MaChucNang) ?>">
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