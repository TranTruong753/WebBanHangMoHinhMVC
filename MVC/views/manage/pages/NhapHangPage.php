<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<table class="table">
<style></style>
<div style="text-align: center;">
<h1 style=" margin-bottom: 20px;">Quản Lý Nhập Hàng</h1>

</div>
<div class="search">
  <input type="text" id="txtFind" style="min-width: 300px;" placeholder="Tìm kiếm theo Mã hoặc tên nhóm quyền">
  <input type="button" id="btnSearch" value="Tìm Kiếm">
</div>
  <thead>
    <tr>
      <th scope="col" style="text-align: center;">ID</th>
      <th scope="col" style="text-align: center;">Ngày nhập</th>
      <th scope="col" style="text-align: center;">Tông tiền</th>
      <th scope="col" style="text-align: center;">Nhà cung cấp</th>
      <th scope="col" style="text-align: center;">Nhân viên</th>
      
    </tr>
    <tbody class="table-group-divider">
  <input type="submit" onclick="DieuHuong()" value="Nhập Hàng">
  <tbody class="table-group-divider row-table">
  </tbody>
</table>

<div class="PhanTrang">

</div>
<script>
  function DieuHuong()
  {
    window.location="http://localhost/WebBanHangMoHinhMVC/Admin/default/ThemPhieuNhapPage";
  }
  

</script>
<script src="http://localhost/WebBanHangMoHinhMVC/public/script/manage/QuanlyPN.js"></script>