<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<table class="table">
<style></style>
<div style="text-align: center;">
<h1 >Quản Lý Sản Phẩm</h1>
</div>
  <thead>
    <tr>
      <th scope="col" style="text-align: center;">Hình ảnh</th>
      <th scope="col" style="text-align: center;">ID</th>
      <th scope="col" style="text-align: center;">Tên</th>
      <th scope="col" style="text-align: center;">Màu sắc</th>
      <th scope="col" style="text-align: center;">Kích cở</th>
      <th scope="col" style="text-align: center;">Số lượng tồn</th>
      
    </tr>
  </thead>
  <?php

  $masp=$data['DanhSach']["MASP"];


?>
  <tbody class="table-group-divider">
  <input type="submit" id="<?php echo $masp?>"  onclick="DieuHuong(this)" value="Thêm">
  

  <?php
if($data["DanhSach"]["CTSP"]->num_rows > 0)
{
  while($row = $data["DanhSach"]["CTSP"]->fetch_assoc())
  {
    ?>
 <tr> 
      <th style="text-align: center;" scope="row">
        <img weight= 300px height=400px  src="http://localhost/WebBanHangMoHinhMVC/public/img/<?php echo $row["HinhAnh"]?>" alt="">
      </th>
      <th style="text-align: center;" scope="row"><?php echo $row["MaChiTietSanPham"]?></th>
      <td style="text-align: center;"><?php echo $row["TenSanPham"]?></td>
      <td style="text-align: center;"><?php echo $row["TenMauSac"]?></td>
      <td style="text-align: center;"><?php echo $row["TenKichCo"]?></td>
      <td style="text-align: center;"><?php echo $row["SoLuongTon"]?></td>
      <td style="text-align: center;"><pre><a href="http://localhost/WebBanHangMoHinhMVC/Admin/default/SuaChiTietSanPhamPage,<?php echo $row["MaChiTietSanPham"]?>">Sửa</a>|
       <button  onclick="XoaSP(this)" id="<?php echo $row["MaChiTietSanPham"]?>">Xóa</button> | 
      <br> </pre></td>
      
    </tr>
<?php
  }
}
  ?>
   
  </tbody>
</table>
<script>
  function DieuHuong(ojt)
  { var url="http://localhost/WebBanHangMoHinhMVC/Admin/default/ThemChiTietSanPhamPage,"+ojt.id;
    window.location=url;
  }
  

</script>
<script src="http://localhost/WebBanHangMoHinhMVC/public/script/manage/QuanlySPJS.js"></script>