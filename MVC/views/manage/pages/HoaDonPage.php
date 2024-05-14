<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <div>
    <h1 class = 'styleText-01' >Quản Lý Hoá Đơn</h1>
  </div>

  <div class="search-wrap">
    <div class="search">
      <input type="text" class="input_search" id="txtFind" placeholder="Tìm kiếm theo Mã hoặc SĐT">
      <label class="btn btn_search" for="btnSearch">
        <i class='bx bx-search'></i>
        <input type="button" id="btnSearch" value="" hidden>
      </label>
    </div>
    <!-- Nút sang form dữ liệu nhóm quyền  -->
    <div class="block-wrap">
      <label class="btn btn_reset" for="btnRefresh">
        <i class='bx bx-reset'></i>
        <input type="button" id="btnRefresh" onclick="btnRefresh()" value="" hidden>
      </label>
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
    var trangThai = obj.value; // Giá trị trạng thái của radio button mới được chọn
    var radioButtons = document.querySelectorAll("input[type='radio'][id='" + ma + "']");
    var result;

    // Kiểm tra xem radio button nào đang được chọn
    var selectedRadioButton = null;
    radioButtons.forEach(function(radioButton) {
        if (radioButton.checked) {
            selectedRadioButton = radioButton;
        }
    });

    if (selectedRadioButton === null) {
        swal({
            text: "Vui lòng chọn một trạng thái!",
        });
        return;
    }

    // Kiểm tra nếu radioButton đang được chọn có value = 2
    if ((selectedRadioButton.value == 2 || selectedRadioButton.value == -1) && trangThai != selectedRadioButton.value) {
        swal({
            text: "Không thể chuyển đổi trạng thái hiện tại!",
            icon: "error",
        }).then(function(){
            // Khôi phục trạng thái ban đầu của radio button
            obj.checked = false;
            selectedRadioButton.checked = true;
        });
        return;
    }

    swal({
        title: "Thông báo",
        text: "Bạn có muốn đổi trạng thái?!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willChange) => {
        if (willChange) {
            $.post("http://localhost/WebBanHangMoHinhMVC/AjaxHoaDon/DoiTrangThai", {
                ma: ma,
                trangThai: trangThai
            }, function(data) {
                swal({
                    title: data,
                    text: "Nhấn để tiếp tục!",
                    icon: "success",
                }).then(function(){
                    // location.reload();
                    loadTable("", index, size);
                    loadPhanTrang("hoadon", index, size, sql, "");
                });
            });

            // Đảm bảo chỉ một radio button được chọn
            radioButtons.forEach(function(radioButton) {
                if (radioButton != selectedRadioButton) {
                    radioButton.checked = false;
                }
            });
        } else {
            obj.checked = false; // Đảo ngược trạng thái của radio button nếu người dùng không chấp nhận thay đổi
            selectedRadioButton.checked = true;
            swal("Bạn đã hủy đổi trạng thái!");
        }
    });
}




  function DieuHuong()
  {
    window.location="http://localhost/WebBanHangMoHinhMVC/Admin/default/ThemHoaDonPage";
  }

</script>
<script src="http://localhost/WebBanHangMoHinhMVC/public/script/manage/QuanlyHDJS.js"></script>