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
      <th scope="col" style="text-align: center;">ID</th>
      <th scope="col" style="text-align: center;">Tên</th>
      <th scope="col" style="text-align: center;">Giá</th>
      <th scope="col" style="text-align: center;">Số lượng tồn</th>
      <th scope="col" style="text-align: center;">Giá nhập</th>
      <th scope="col" style="text-align: center;">Thể Loại</th>
      <th scope="col" style="text-align: center;">Chất Liệu</th>
      <th scope="col" style="text-align: center;">Thương Hiệu</th>
      <th scope="col" style="text-align: center;">Thao Tác</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
  <input type="submit" onclick="DieuHuong()" value="Thêm">
  <tbody class="table-group-divider row-table">
  </tbody>
</table>

<div class="PhanTrang">

</div>
<script>
  function DieuHuong()
  {
    window.location="http://localhost/WebBanHangMoHinhMVC/Admin/default/ThemSanPhamPage";
  }
  

</script>
<script src="http://localhost/WebBanHangMoHinhMVC/public/script/manage/QuanlySPJS.js"></script>