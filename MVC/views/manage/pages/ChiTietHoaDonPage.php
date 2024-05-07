<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<?php
   $mahd=$data['DanhSach']["MAHD"];
?>
<div>
  <h1 class="styleText-02">Chi Tiết Hoá Đơn <?php echo $mahd?></h1>
  <a class="form-add__link" href="http://localhost/WebBanHangMoHinhMVC/admin/default/HoaDonPage"> Quay về Trang Hóa Đơn></a>

</div>
 
<!-- <div class="search">
  <input type="text" id="txtFind" style="min-width: 300px;" placeholder="Tìm kiếm theo Mã hoặc tên nhóm quyền">
  <input type="button" id="btnSearch" value="Tìm Kiếm">
</div> -->

<!-- <input type="submit" id="<?php echo $masp?>"  onclick="DieuHuong(this)" value="Thêm"> -->
<input type="hidden" id="mahd"  value="<?php echo $mahd ;?>">

<table class="table">
  <thead>
    <tr>
      <th>Mã Chi Tiết Sản Phẩm</th>
      <th>Tên Sản Phẩm</th>
      <th>Số Lượng</th>
      <th>Thành Tiền</th>
    </tr>
  </thead>
 
  <tbody class="table-group-divider">
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