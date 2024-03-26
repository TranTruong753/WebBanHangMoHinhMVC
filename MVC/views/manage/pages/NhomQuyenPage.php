<table class="table">
<style></style>
<div style="text-align: center;">
<h1 style=" margin-bottom: 20px;">Quản Lý Nhóm Quyền</h1>

</div>
  <thead>
    <tr>
      <th scope="col" style="text-align: center;">ID</th>
      <th scope="col" style="text-align: center;">Tên</th>
      <th scope="col" style="text-align: center;">Trạng Thái</th>
      <th scope="col" style="text-align: center;">Thao Tác</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">

    <?php
     if($data['DanhSach']->num_rows >0)
    {
      while($row = $data['DanhSach']->fetch_assoc())
      {
        ?>
      <tr>
      <th style="text-align: center;" scope="row"><?php echo $row["MaNhomQuyen"]?></th>
      <td style="text-align: center;"><?php echo $row["TenNhomQuyen"]?></td>
      <td style="text-align: center;"><?php echo $row["TrangThai"]?></td>
      <td style="text-align: center;"><pre><a href="">Sửa</a> |  <a href="">Xóa</a> | <a href="">Chi Tiết</a></pre></td>
    </tr>
        <?php
      }
    }?>
   
    
  </tbody>
</table>