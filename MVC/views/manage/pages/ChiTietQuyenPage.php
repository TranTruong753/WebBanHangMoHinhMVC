<?php
 $NhomQuyenModel = new NhomQuyenModel();
  $ChiTietQuyenModel = new ChiTietQuyenModel();
  $ChucNangModel = new ChucNangModel();
  // echo $NhomQuyenModel->getTenNhomQuyenTuMa(1);
  // echo $ChiTietQuyenModel->KiemTraHanhDong(3,6,"Xem");
?>
<table class="table">
  <style></style>
  <div style="text-align: center;">
    <h1 style=" margin-bottom: 20px;">Quản Lý Chi Tiết Quyền</h1>
  </div>
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
            <th style="text-align: center;" scope="row"><?php  echo $NhomQuyenModel->getTenNhomQuyenTuMa($row["MaNhomQuyen"]) ?></th>
            <td style="text-align: center;"><?php echo $ChucNangModel->getTenTuMa($row["MaChucNang"])  ?></td>
            <td style="text-align: center;"><input type="checkbox" <?php if ($ChiTietQuyenModel->KiemTraHanhDong($row["MaNhomQuyen"],$row["MaChucNang"],"Xem")) echo "checked = 'checked'"; ?>></td>
            <td style="text-align: center;"><input type="checkbox" <?php if ($ChiTietQuyenModel->KiemTraHanhDong($row["MaNhomQuyen"],$row["MaChucNang"],"Thêm")) echo "checked = 'checked'"; ?>></td>
            <td style="text-align: center;"><input type="checkbox" <?php if ($ChiTietQuyenModel->KiemTraHanhDong($row["MaNhomQuyen"],$row["MaChucNang"],"Xóa")) echo "checked = 'checked'"; ?>></td>
            <td style="text-align: center;"><input type="checkbox" <?php if ($ChiTietQuyenModel->KiemTraHanhDong($row["MaNhomQuyen"],$row["MaChucNang"],"Sửa")) echo "checked = 'checked'"; ?>></td>

          </tr>
    <?php
      }
    }
     
    ?>

<!-- end -->

  </tbody>
</table>