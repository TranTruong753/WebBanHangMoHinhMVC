<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<table class="table">
<style></style>
<div style="text-align: center;">
<h1 >Quản Lý Sản Phẩm</h1>
</div>
  <thead>
    <tr>
      <th scope="col" style="text-align: center;">ID</th>
      <th scope="col" style="text-align: center;">Tên</th>
      <th scope="col" style="text-align: center;">Màu sắc</th>
      <th scope="col" style="text-align: center;">Kích cở</th>
      <th scope="col" style="text-align: center;">Số lượng tồn</th>
      
    </tr>
  </thead>
  <tbody class="table-group-divider">
  

  <?php
if($data["DanhSach"]->num_rows > 0)
{
  while($row = $data["DanhSach"]->fetch_assoc())
  {
    ?>
 <tr> 
      <th style="text-align: center;" scope="row"><?php echo $row["MaChiTietSanPham"]?></th>
      <td style="text-align: center;"><?php echo $row["TenSanPham"]?></td>
      <td style="text-align: center;"><?php echo $row["TenMauSac"]?></td>
      <td style="text-align: center;"><?php echo $row["TenKichCo"]?></td>
      <td style="text-align: center;"><?php echo $row["SoLuongTon"]?></td>
      
    </tr>
<?php
  }
}
  ?>
   
  </tbody>
</table>
<script>
  function DieuHuong()
  {
    window.location="http://localhost/WebBanHangMoHinhMVC/Admin/default/ThemSanPhamPage";
  }
  

</script>
<script src="http://localhost/WebBanHangMoHinhMVC/public/script/manage/QuanlySPJS.js"></script>