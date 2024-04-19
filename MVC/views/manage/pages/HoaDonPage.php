<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<div style="text-align: center; ">
    <h1 style=" margin-bottom: 20px;">Quản Lý Hoá Đơn</h1>
  </div>

<div class="search">
  <input type="text" id="txtFind" style="min-width: 300px;" placeholder="Tìm kiếm theo Mã hoặc tên hoá đơn">
  <input type="button" id="btnSearch" value="Tìm Kiếm">
</div>
<input type="submit" onclick="DieuHuong()" value="Thêm">
<input type="button" id="btnRefresh" onclick="btnRefresh()" value="Làm Tươi">
<table class="table">
  <thead>
    <tr>
      <th scope="col" style="text-align: center;">Mã HD</th>
      <th scope="col" style="text-align: center;">Ngày Lập</th>
      <th scope="col" style="text-align: center;">Tổng Tiền</th>
      <th scope="col" style="text-align: center;">Hình Thức TT</th>
      <th scope="col" style="text-align: center;">Mã Thuế</th>
      <th scope="col" style="text-align: center;">Mã Khách Hàng</th>
      <th scope="col" style="text-align: center;">Số Điện Thoại</th>
      <th scope="col" style="text-align: center;">Địa Chỉ</th>
      <th scope="col" style="text-align: center;">Mã Khuyến Mãi</th>
      <th scope="col" style="text-align: center;">Mã Nhân Viên</th>
      <th scope="col" style="text-align: center;">Đã xử lý</th>
      <th scope="col" style="text-align: center;">Đã giao</th>
    </tr>
  </thead>
  <tbody class="table-group-divider row-table">
  </tbody>
</table>

<div class="PhanTrang">

</div>
<script>
function DoiTrangThaiHoaDon(obj) {
    var ma = obj.id;
    var trangThai = obj.value; // Giá trị trạng thái của ô checkbox
    var checkBoxes = document.querySelectorAll("input[type='checkbox'][id='" + ma + "']");
    var result;

    result = confirm("Bạn có muốn đổi trạng thái?");
    
    if (result == true) {
        // Gửi yêu cầu AJAX với trạng thái tương ứng
        $.post("http://localhost/WebBanHangMoHinhMVC/AjaxHoaDon/DoiTrangThai", {
            ma: ma,
            trangThai: trangThai
        }, function(data) {
            alert(data); // Hiển thị thông báo
        });

        // Đảm bảo chỉ một ô checkbox được chọn
        checkBoxes.forEach(function(checkbox) {
            if (checkbox != obj) {
                checkbox.checked = false;
            }
        });
    } else {
        obj.checked = !obj.checked; // Đảo ngược trạng thái của ô checkbox nếu người dùng không chấp nhận thay đổi
    }
}





  function DieuHuong()
  {
    window.location="http://localhost/WebBanHangMoHinhMVC/Admin/default/ThemHoaDonPage";
  }

</script>
<script src="http://localhost/WebBanHangMoHinhMVC/public/script/manage/QuanlyHDJS.js"></script>