<?php
$PhanTrangModel = new PhanTrangModel();
?>
<div style="text-align: center;">
  <h1 style=" margin-bottom: 20px;">Quản Lý Khách Hàng</h1>
</div>

<div class="search">
  <input type="text" id="txtFind" style="min-width: 300px;" placeholder="Tìm kiếm theo Mã hoặc Tên khách hàng">
  <input type="button" id="btnSearch" value="Tìm Kiếm">
</div>
<!-- Nút sang form dữ liệu nhóm quyền  -->
<input type="submit" onclick="DieuHuong()" value="Thêm">

<input type="button" id="btnRefresh" onclick="btnRefresh()" value="Làm Tươi">
<table class="table">
  <thead>
    <tr>
      <th scope="col" style="text-align: center;">ID</th>
      <th scope="col" style="text-align: center;">Tên</th>
      <th scope="col" style="text-align: center;">Số Điện Thoại</th>
      <th scope="col" style="text-align: center;">Giới Tính</th>
      <th scope="col" style="text-align: center;">Trạng Thái</th>
      <th scope="col" style="text-align: center;">Thao Tác</th>
    </tr>
  </thead>
  <tbody class="table-group-divider row-table">

    <!-- <tr>
      <th style="text-align: center;" scope="row">1</th>
      <td style="text-align: center;">Mark</td>
      <td style="text-align: center;">Otto</td>
      <td style="text-align: center;"><pre><a href="">Sửa</a> |  <a href="">Xóa</a> | <a href="">Chi Tiết</a> </pre></td>
    </tr> -->
    
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
    loadPhanTrang("khachhang", index, size, "", "");

  })

  
    function loadTable(key, index, size) {
    $.ajax({
      url: "http://localhost/WebBanHangMoHinhMVC/AjaxThongTinKhachHang/getDanhSach",
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
    loadPhanTrang("khachhang", index, size, "", tmpKey);
    })

    //Xử lý khi nhấn nút tìm kiếm
  $(document).on("click", "#btnSearch", function() {
    var key = $("#txtFind").val();
    // index = 1;
    // size = 4;
    tmpKey = key;
    loadTable(tmpKey, index, size);
    // xử lý số trang đã chọn
    loadPhanTrang("khachhang", index, size, "", tmpKey);

  })

  //xử lý sự kiện khi click vào nút làm tươi
  $(document).on("click", "#btnRefresh", function() {
    document.getElementById("txtFind").value = "";
    // var key = "";
    // index = 1;
    // size = 8;
    tmpKey = "";

  
    loadTable(tmpKey, index, size);

    loadPhanTrang("khachhang", index, size, "", tmpKey);
  })

  //Xử lý khi nhấn nút xóa
  function btnXoa(obj)
  {
    var ma = obj.id;
      $.ajax({
      url: 'http://localhost/WebBanHangMoHinhMVC/AjaxThongTinKhachHang/XoaDuLieuKhachHang',
      type: 'post',
      dataType: 'html',
      data: {
        ma: ma,
      },
      success: function(data) {
        alert(data);
      }
    })
    loadTable(tmpKey,index,size)
    loadPhanTrang("khachhang",index,size,"",tmpKey)
  }


  // Hàm Đổi Trạng Thái của Khách Hàng khi tick vào check box Trạng Thái
  function DoiTrangThaiKhachHang(obj) {
    var ma = obj.id;
    var checkBox = document.getElementById(ma)
    var result = confirm("Bạn có muốn đổi trạng thái?");
    var trangThai = 1;
    if (result == true) {
      if (checkBox.checked == true) {
        // var trangThai = 1;
        $.post("http://localhost/WebBanHangMoHinhMVC/AjaxThongTinKhachHang/DoiTrangThai", {
          ma: ma,
          trangThai: trangThai
        }, function(data) {
          // alert(data);
        })
      } else {
        trangThai = 0;
        $.post("http://localhost/WebBanHangMoHinhMVC/AjaxThongTinKhachHang/DoiTrangThai", {
          ma: ma,
          trangThai: trangThai
        }, function(data) {
          // alert(data);
        })
      }
    }
    loadTable(tmpKey, index, size)
    loadPhanTrang("khachhang", index, size, "", tmpKey)


  }

  function DieuHuong() {
    window.location = "http://localhost/WebBanHangMoHinhMVC/Admin/default/ThemKhachHangPage";
  }
  

</script>