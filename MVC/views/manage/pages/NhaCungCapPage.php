<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<div style="text-align: center; ">
    <h1 style=" margin-bottom: 20px;">Quản Lý Nhà Cung Cấp</h1>
  </div>

<div class="search">
  <input type="text" id="txtFind" style="min-width: 300px;" placeholder="Tìm kiếm theo Mã hoặc tên nhóm quyền">
  <input type="button" id="btnSearch" value="Tìm Kiếm">
</div>
<input type="submit" onclick="DieuHuong()" value="Thêm">
<input type="button" id="btnRefresh" onclick="btnRefresh()" value="Làm Tươi">
<table class="table">
  <thead>
    <hr>
    <tr>
      <th scope="col" style="text-align: center;">Mã Nhà Cung Cấp</th>
      <th scope="col" style="text-align: center;">Tên Nhà Cung Cấp</th>
      <th scope="col" style="text-align: center;">Số điện thoại</th>
      <th scope="col" style="text-align: center;">Địa Chỉ</th>
      <th scope="col" style="text-align: center;">Trạng Thái</th>
      <th scope="col" style="text-align: center;">Thao Tác</th>
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