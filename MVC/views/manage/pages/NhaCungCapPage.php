<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <div>
    <h1 class="styleText-01">Quản Lý Nhà Cung Cấp</h1>
  </div>

<!-- <div class="search">
  <input type="text" id="txtFind" style="min-width: 300px;" placeholder="Tìm kiếm theo Mã hoặc tên nhóm quyền">
  <input type="button" id="btnSearch" value="Tìm Kiếm">
</div>
<input type="submit" onclick="DieuHuong()" value="Thêm">
<input type="button" id="btnRefresh" onclick="btnRefresh()" value="Làm Tươi"> -->

<div class="search-wrap">
    <div class="search">
      <input type="text" class="input_search" id="txtFind" placeholder="Tìm kiếm theo Mã hoặc Tên nhà cung cấp">
      <label class="btn btn_search" for="btnSearch">
        <i class='bx bx-search'></i>
        <input type="button" id="btnSearch" value="" hidden>
      </label>
    </div>
    <!-- Nút sang form dữ liệu nhóm quyền  -->
     <!-- Nút sang form dữ liệu nhóm quyền  -->
    <div class="block-wrap">
      <label class="btn btn_reset" for="btnRefresh">
        <i class='bx bx-reset'></i>
        <input type="button" id="btnRefresh" onclick="btnRefresh()" value="" hidden>
      </label>
      <div class="btn btn_add"> 
        <i class='bx bx-plus'></i>
        <input type="button" class="" onclick="DieuHuong()" value="Thêm">
      </div>
    </div>
  </div>

<table class="table">
  <thead>
    <tr>
      <th>Mã Nhà Cung Cấp</th>
      <th>Tên Nhà Cung Cấp</th>
      <th>Số điện thoại</th>
      <th>Địa Chỉ</th>
      <th>Trạng Thái</th>
      <th>Thao Tác</th>
    </tr>
  </thead>
  <tbody class="table-group-divider row-table">
  </tbody>
</table>

<div class="PhanTrang">

</div>
<script>
  function DoiTrangThaiNhaCungCap(obj)
  {
    var ma = obj.id;
    var checkBox = document.getElementById(ma)
    var result = confirm("Bạn có muốn đổi trạng thái?");
    if (result == true) {
      if (checkBox.checked == true) {
        var trangThai = 1;
        $.post("http://localhost/WebBanHangMoHinhMVC/AjaxNhaCungCap/DoiTrangThai", {
          ma: ma,
          trangThai: trangThai
        }, function(data) {

          alert(data);
        })
      } else {
        var trangThai = 0;
        $.post("http://localhost/WebBanHangMoHinhMVC/AjaxNhaCungCap/DoiTrangThai", {
          ma: ma,
          trangThai: trangThai
        }, function(data) {
          alert(data);
        })
      }
    }
  }

  function DieuHuong()
  {
    window.location="http://localhost/WebBanHangMoHinhMVC/Admin/default/ThemNhaCungCapPage";
  }

</script>
<script src="http://localhost/WebBanHangMoHinhMVC/public/script/manage/QuanlyNCCJS.js"></script>