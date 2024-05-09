<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <div>
    <h1 class = 'styleText-01' >Quản Lý Hoá Đơn</h1>
  </div>
  
  <!-- <div class="search">
    <input type="text" id="txtFind" style="min-width: 300px;" placeholder="Tìm kiếm theo Mã hoặc tên hoá đơn">
    <input type="button" id="btnSearch" value="Tìm Kiếm">
  </div>
  <input type="submit" onclick="DieuHuong()" value="Thêm">
  <input type="button" id="btnRefresh" onclick="btnRefresh()" value="Làm Tươi"> -->

  <div class="search-wrap">
    <div class="search">
      <input type="text" class="input_search" id="txtFind" placeholder="Tìm kiếm theo Mã hoặc SĐT">
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
      <!-- <div class="btn btn_add"> 
        <i class='bx bx-plus'></i>
        <input type="button" class="" onclick="DieuHuong()" value="Thêm">
      </div> -->
    </div>
  </div>

<table class="table">
  <thead>
    <tr>
      <th>Mã HD</th>
      <th>Ngày Lập</th>
      <th>Tổng Tiền</th>
      <th>Hình Thức TT</th>
      <!-- <th>Mã Thuế</th> -->
      <th>Mã Khách Hàng</th>
      <th>Số Điện Thoại</th>
      <th>Địa Chỉ</th>
      <!-- <th>Mã Khuyến Mãi</th> -->
      <th>Mã Nhân Viên</th>
      <th>Đã xử lý</th>
      <th>Đã giao</th>
      <th>Đã huỷ</th>
      <th>Thao tác</th>
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
    var trangThai = obj.value; // Giá trị trạng thái của radio button
    var radioButtons = document.querySelectorAll("input[type='radio'][id='" + ma + "']");
    var result;

    // Kiểm tra xem radio button nào được chọn
    var selectedRadioButton = null;
    radioButtons.forEach(function(radioButton) {
        if (radioButton.checked) {
            selectedRadioButton = radioButton;
        }
    });

    if (selectedRadioButton === null) {
        alert("Vui lòng chọn một trạng thái."); // Thông báo nếu không có radio button nào được chọn
        return;
    }

    result = confirm("Bạn có muốn đổi trạng thái?");

    if (result == true) {
        // Gửi yêu cầu AJAX với trạng thái tương ứng
        $.post("http://localhost/WebBanHangMoHinhMVC/AjaxHoaDon/DoiTrangThai", {
            ma: ma,
            trangThai: trangThai
        }, function(data) {
            // alert(data); // Hiển thị thông báo
            location.reload();
        });

        // Đảm bảo chỉ một radio button được chọn
        radioButtons.forEach(function(radioButton) {
            if (radioButton != selectedRadioButton) {
                radioButton.checked = false;
            }
        });
    } else {
        obj.checked = !obj.checked; // Đảo ngược trạng thái của radio button nếu người dùng không chấp nhận thay đổi
    }
}






  function DieuHuong()
  {
    window.location="http://localhost/WebBanHangMoHinhMVC/Admin/default/ThemHoaDonPage";
  }

</script>
<script src="http://localhost/WebBanHangMoHinhMVC/public/script/manage/QuanlyHDJS.js"></script>