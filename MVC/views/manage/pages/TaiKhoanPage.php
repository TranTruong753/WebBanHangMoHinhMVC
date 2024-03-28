<table class="table">
  <style></style>
  <div style="text-align: center;">
    <h1 style=" margin-bottom: 20px;">Quản Lý Nhóm Quyền</h1>

  </div>
  <thead>
    <tr>
      <th scope="col" style="text-align: center;">ID</th>
      <th scope="col" style="text-align: center;">Mã Người Dùng</th>
      <th scope="col" style="text-align: center;">Mã Nhân Viên</th>
      <th scope="col" style="text-align: center;">Mật Khẩu</th>
      <th scope="col" style="text-align: center;">Nhóm Quyền</th>
      <th scope="col" style="text-align: center;">Trạng Thái</th>
      <th scope="col" style="text-align: center;">Thao Tác</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">

    <?php
    if ($data['DanhSach']->num_rows > 0) {
      while ($row = $data['DanhSach']->fetch_assoc()) {
    ?>
        <tr>
          <th style="text-align: center;" scope="row"><?php echo $row["MaTaiKhoan"] ?></th>
          <td style="text-align: center;"><?php if($row["MaNguoiDung"] != "") echo $row["MaNguoiDung"]; else echo "x"; ?></td>
          <td style="text-align: center;"><?php  if($row["MaNhanVien"] != "") echo $row["MaNhanVien"]; else echo "x";?></td>
          <td style="text-align: center;"><?php echo $row["MatKhau"] ?></td>
          <td style="text-align: center;"><?php echo $row["TenNhomQuyen"] ?></td>
          <td style="text-align: center;">
            <input onchange="DoiTrangThaiTaiKhoan(this)" id="<?php echo $row["MaTaiKhoan"] ?>" type="checkbox" value="1" <?php if ($row["TrangThai"] == 1) {
                                                                                                                              echo "checked = 'checked'";
                                                                                                                            }
                                                                                                                            ?> />
          </td>
          <td style="text-align: center;">
            <pre><a href="">Sửa</a></pre>
          </td>
        </tr>
    <?php
      }
    } ?>


  </tbody>
</table>

<script>
  function DoiTrangThaiTaiKhoan(obj) {
    var ma = obj.id;
    var checkBox = document.getElementById(ma)
    var result = confirm("Bạn có muốn đổi trạng thái?");
    if (result == true) {
      if (checkBox.checked == true) {
        var trangThai = 1;
        $.post("http://localhost/WebBanHangMoHinhMVC/AjaxTaiKhoan/DoiTrangThai", {
          ma: ma,
          trangThai: trangThai
        }, function(data) {

          alert(data);
        })
      } else {
        var trangThai = 0;
        $.post("http://localhost/WebBanHangMoHinhMVC/AjaxTaiKhoan/DoiTrangThai", {
          ma: ma,
          trangThai: trangThai
        }, function(data) {
          alert(data);
        })
      }
    }

  }
</script>