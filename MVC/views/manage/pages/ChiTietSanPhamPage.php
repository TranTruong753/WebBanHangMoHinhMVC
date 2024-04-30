<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<table class="table">
<style></style>
<div style="text-align: center;">
<h1 >Quản Lý Sản Phẩm</h1>
</div>
<div class="search">
  <input type="text" id="txtFind" style="min-width: 300px;" placeholder="Tìm kiếm theo Mã hoặc tên nhóm quyền">
  <input type="button" id="btnSearch" value="Tìm Kiếm">
</div>
  <thead>
    <tr>
      <th scope="col" style="text-align: center;">Hình ảnh</th>
      <th scope="col" style="text-align: center;">ID</th>
      <th scope="col" style="text-align: center;">Tên</th>
      <th scope="col" style="text-align: center;">Màu sắc</th>
      <th scope="col" style="text-align: center;">Kích cở</th>
      <th scope="col" style="text-align: center;">Số lượng tồn</th>
      <th scope="col" style="text-align: center;">Trạng thái</th>
      
    </tr>
  </thead>
  <?php
  $masp=$data['DanhSach']["MASP"];
?>
  <tbody class="table-group-divider">
  <input type="submit" id="<?php echo $masp?>"  onclick="DieuHuong(this)" value="Thêm">
  <input type="button"   onclick="Lamtuoi()" value="làm tươi">
  <input type="hidden" id="masp"  value="<?php echo $masp?>">
  <tbody class="table-group-divider row-table">
  </tbody>
</table>
<div class="PhanTrang">

</div>
<script>
  function DieuHuong(ojt)
  { var url="http://localhost/WebBanHangMoHinhMVC/Admin/default/ThemChiTietSanPhamPage,"+ojt.id;
    window.location=url;
  }
  

</script>
<script src="http://localhost/WebBanHangMoHinhMVC/public/script/manage/QuanlyCTSP.js"></script>