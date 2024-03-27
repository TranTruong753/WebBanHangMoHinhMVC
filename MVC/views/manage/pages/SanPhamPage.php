<table class="table">
<style></style>
<div style="text-align: center;">
<h1 >Quản Lý Sản Phẩm</h1>
</div>
  <thead>
    <tr>
      <th scope="col" style="text-align: center;">ID</th>
      <th scope="col" style="text-align: center;">Tên</th>
      <th scope="col" style="text-align: center;">Thể Loại</th>
      <th scope="col" style="text-align: center;">Chất Liệu</th>
      <th scope="col" style="text-align: center;">Thương Hiệu</th>
      <th scope="col" style="text-align: center;">Thao Tác</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">

  <?php
if($data["DanhSach"]->num_rows>0)
{
  while($row = $data["DanhSach"]->fetch_assoc())
  {
    ?>
 <tr>
      <th style="text-align: center;" scope="row"><?php echo $row["MaSanPham"]?></th>
      <td style="text-align: center;"><?php echo $row["TenSanPham"]?></td>
      <td style="text-align: center;"><?php echo $row["TenTheLoai"]?></td>
      <td style="text-align: center;"><?php echo $row["TenChatLieu"]?></td>
      <td style="text-align: center;"><?php echo $row["TenThuongHieu"]?></td>
      <td style="text-align: center;"><pre><a href="">Sửa</a> |  <a href="">Xóa</a> | <a href="">Chi Tiết</a>  <br> <a href="">Sản Phẩm Con</a> </pre></td>
    </tr>
<?php
  }
}
  ?>
   
  </tbody>
</table>