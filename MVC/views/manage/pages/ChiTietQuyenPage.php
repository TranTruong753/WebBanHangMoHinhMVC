<style>

.formThemChiTietQuyen{
  width: 100%;
  min-height: 300px;
  background-color: red;
  display: none;
}

.hidden
{
  display: block;
}
</style>

<?php
$NhomQuyenModel = new NhomQuyenModel();
$ChiTietQuyenModel = new ChiTietQuyenModel();
$ChucNangModel = new ChucNangModel();
// echo $NhomQuyenModel->getTenNhomQuyenTuMa(1);
// echo $ChiTietQuyenModel->KiemTraHanhDong(3,6,"Xem");
?>
<div style="text-align: center;">
    <h1 style=" margin-bottom: 20px;">Quản Lý Chi Tiết Quyền</h1>
  </div>
<input type="button" onclick="hienThiFrom()" value="Thêm Chi Tiết Quyền">
<div class="formThemChiTietQuyen" id="formThemChiTietQuyen">

</div>
<hr>

<table class="table">
  <style></style>
  
  <thead>
    <tr>
      <th scope="col" style="text-align: center;">Nhóm Quyền</th>
      <th scope="col" style="text-align: center;">Chức Năng</th>
      <th scope="col" style="text-align: center;">Xem</th>
      <th scope="col" style="text-align: center;">Thêm</th>
      <th scope="col" style="text-align: center;">Xóa</th>
      <th scope="col" style="text-align: center;">Sửa</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
    <?php
    if ($data["DanhSach"]->num_rows > 0) {
      while ($row = $data["DanhSach"]->fetch_assoc()) {
    ?>
        <tr>
          <th style="text-align: center;" scope="row"><?php echo $NhomQuyenModel->getTenNhomQuyenTuMa($row["MaNhomQuyen"]) ?></th>
          <td style="text-align: center;"><?php echo $ChucNangModel->getTenTuMa($row["MaChucNang"])  ?></td>
          <td style="text-align: center;"><input class="checkbox" type="checkbox" id="<?php echo $row["MaNhomQuyen"] . "/" . $row["MaChucNang"] . "/Xem" ?>" <?php if ($ChiTietQuyenModel->KiemTraHanhDong($row["MaNhomQuyen"], $row["MaChucNang"], "Xem")) echo "checked = 'checked'"; ?>></td>
          <td style="text-align: center;"><input class="checkbox" type="checkbox" id="<?php echo $row["MaNhomQuyen"] . "/" . $row["MaChucNang"] . "/Thêm" ?>" <?php if ($ChiTietQuyenModel->KiemTraHanhDong($row["MaNhomQuyen"], $row["MaChucNang"], "Thêm")) echo "checked = 'checked'"; ?>></td>
          <td style="text-align: center;"><input class="checkbox" type="checkbox" id="<?php echo $row["MaNhomQuyen"] . "/" . $row["MaChucNang"] . "/Xóa" ?>" <?php if ($ChiTietQuyenModel->KiemTraHanhDong($row["MaNhomQuyen"], $row["MaChucNang"], "Xóa")) echo "checked = 'checked'"; ?>></td>
          <td style="text-align: center;"><input class="checkbox" type="checkbox" id="<?php echo $row["MaNhomQuyen"] . "/" . $row["MaChucNang"] . "/Sửa" ?>" <?php if ($ChiTietQuyenModel->KiemTraHanhDong($row["MaNhomQuyen"], $row["MaChucNang"], "Sửa")) echo "checked = 'checked'"; ?>></td>
        </tr>
    <?php
      }
    }
    ?>
    <!-- end -->
  </tbody>
</table>
<script>
  function hienThiFrom()
  {
    document.getElementById("formThemChiTietQuyen").classList.toggle("hidden");
  }


</script>