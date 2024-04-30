<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<table class="table">
<style></style>
<div style="text-align: center;">
<h1 >Quản Lý Chi Tiết Hoá Đơn</h1>
</div>
<div class="search">
  <input type="text" id="txtFind" style="min-width: 300px;" placeholder="Tìm kiếm theo Mã hoặc tên nhóm quyền">
  <input type="button" id="btnSearch" value="Tìm Kiếm">
</div>
  <thead>
    <tr>
      <th scope="col" style="text-align: center;">Mã Chi Tiết Sản Phẩm</th>
      <th scope="col" style="text-align: center;">Tên Sản Phẩm</th>
      <th scope="col" style="text-align: center;">Số Lượng</th>
      <th scope="col" style="text-align: center;">Thành Tiền</th>
      <th scope="col" style="text-align: center;">Thao Tác</th>
    </tr>
  </thead>
  <?php
  $mahd=$data['DanhSach']["MAHD"];
?>
  <tbody class="table-group-divider">
  <input type="submit" id="<?php echo $masp?>"  onclick="DieuHuong(this)" value="Thêm">
  <input type="hidden" id="mahd"  value="<?php echo $mahd ;?>">
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
<script src="http://localhost/WebBanHangMoHinhMVC/public/script/manage/QuanlyCTHD.js"></script>