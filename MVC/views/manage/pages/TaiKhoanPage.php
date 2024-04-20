<?php
$PhanTrangModel = new PhanTrangModel();
?>
<table class="table">
  <style></style>
  <div style="text-align: center;">
    <h1 style=" margin-bottom: 20px;">Quản Lý Tài Khoản</h1>
  </div>
  <div class="search">
    <input type="text" id="txtFind" style="min-width: 300px;" placeholder="Tìm kiếm theo Mã hoặc Tên nhân viên">
    <input type="button" id="btnSearch" value="Tìm Kiếm">
  </div>
<!-- Nút sang form dữ liệu nhóm quyền  -->
<input type="submit" class="" onclick="DieuHuong()" value="Tạo tài khoản">

<input type="button" id="btnRefresh" onclick="btnRefresh()" value="Làm Tươi">
  <thead>
    <tr>
      <th scope="col" style="text-align: center;">ID</th>
      <th scope="col" style="text-align: center;">Tên Đăng Nhập</th>
      <th scope="col" style="text-align: center;">Mật Khẩu</th>
      <th scope="col" style="text-align: center;">Nhóm Quyền</th>
      <th scope="col" style="text-align: center;">Trạng Thái</th>
      <th scope="col" style="text-align: center;">Thao Tác</th>
    </tr>
  </thead>
  <tbody class="table-group-divider row-table">

    <!-- <?php
    if ($data['DanhSach']->num_rows > 0) {
      while ($row = $data['DanhSach']->fetch_assoc()) {
    ?>
        <tr>
          <th style="text-align: center;" scope="row"><?php echo $row["MaTaiKhoan"] ?></th>
          <td style="text-align: center;"><?php if($row["TenDangNhap"] != "") echo $row["TenDangNhap"]; else echo "x"; ?></td>
          <td style="text-align: center;"><?php echo $row["MatKhau"] ?></td>
          <td style="text-align: center;"><?php echo $row["TenNhomQuyen"] ?></td>
          <td style="text-align: center;">
            <input onchange="DoiTrangThaiTaiKhoan(this)" id="<?php echo $row["MaTaiKhoan"] ?>" type="checkbox" value="1" <?php if ($row["TrangThai"] == 1) {
                                                                                                                              echo "checked = 'checked'";
                                                                                                                            }
                                                                                                                            ?> />
          </td>
          <td style="text-align: center;">
            <pre><a href="">Sửa</a></pre>
          </td>
        </tr>
    <?php
      }
    } ?> -->


  </tbody>
</table>

<div class="PhanTrang">

</div>

<script>
  var tmpKey = "";
  var index = 1;
  var size = 8;
  // load khi chạy trang
  $(document).ready(function() {
    index = 1;
    size = 8;
    loadTable("", index, size)
    loadPhanTrang("taikhoan", index, size, "", "");

  })

  function loadTable(key, index, size) {
    $.ajax({
      url: "http://localhost/WebBanHangMoHinhMVC/AjaxTaiKhoan/getDanhSach",
      type: "post",
      dataType: "html",
      data: {
        key: key,
        index: index,
        size: size
      },
      success: function(data) {
        $(".row-table").html(data)
      }
    })
  }

   //Xử llys sự kiện khi nhấn bào nút phân trang
   $(document).on("click", ".btnPhanTrang", function() {

    // alert(this.id)
    var arr = this.id.split("/");
    index = arr[0];
    size = arr[1];
    //xử lý thay đổi bảng khi nhấn vào phân trang
    loadTable(tmpKey, index, size);
    // xử lý số trang đã chọn
    // alert(tmpKey)
    loadPhanTrang("taikhoan", index, size, "", tmpKey);
    })

    //Xử lý khi nhấn nút tìm kiếm
  $(document).on("click", "#btnSearch", function() {
    var key = $("#txtFind").val();
    // index = 1;
    // size = 4;
    tmpKey = key;
    loadTable(tmpKey, index, size);
    // xử lý số trang đã chọn
    loadPhanTrang("taikhoan", index, size, "", tmpKey);

  })

  //xử lý sự kiện khi click vào nút làm tươi
  $(document).on("click", "#btnRefresh", function() {
    document.getElementById("txtFind").value = "";
    // var key = "";
    // index = 1;
    // size = 8;
    tmpKey = "";

  
    loadTable(tmpKey, index, size);

    loadPhanTrang("taikhoan", index, size, "", tmpKey);
  })

  //Xử lý khi nhấn nút xóa
  function btnXoa(obj)
  {
    var ma = obj.id;
      $.ajax({
      url: 'http://localhost/WebBanHangMoHinhMVC/AjaxTaiKhoan/delete',
      type: 'post',
      dataType: 'html',
      data: {
        ma: ma,
      },
      success: function(data) {
        alert(data);
      }
    })
    loadTable(tmpKey, index, size);

    loadPhanTrang("taikhoan", index, size, "", tmpKey);
  }

  function DoiTrangThaiTaiKhoan(obj) {
    var ma = obj.id;
    var checkBox = document.getElementById(ma)
    var result = confirm("Bạn có muốn đổi trạng thái?");
    if (result == true) {
      if (checkBox.checked == true) {
        var trangThai = 1;
        $.post("http://localhost/WebBanHangMoHinhMVC/AjaxTaiKhoan/DoiTrangThai", {
          ma: ma,
          trangThai: trangThai
        }, function(data) {

          alert(data);
        })
      } else {
        var trangThai = 0;
        $.post("http://localhost/WebBanHangMoHinhMVC/AjaxTaiKhoan/DoiTrangThai", {
          ma: ma,
          trangThai: trangThai
        }, function(data) {
          alert(data);
        })
      }
    }

  }

  function DieuHuong() {
    window.location = "http://localhost/WebBanHangMoHinhMVC/Admin/default/ThemTaiKhoanPage";
  }
</script>