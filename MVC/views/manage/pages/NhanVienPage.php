<?php
$PhanTrangModel = new PhanTrangModel();
?>
<div class="">
  <h1 class="styleText-01">Quản Lý Nhân Viên</h1>
</div>

<div class="search-wrap">
  <div class="search">
    <input type="text" class="input_search" id="txtFind" style="min-width: 300px;" placeholder="Tìm kiếm theo Mã hoặc Tên nhân viên">
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
    <div class="btn btn_add"> 
      <i class='bx bx-plus'></i>
      <input type="button" class="" onclick="DieuHuong()" value="Thêm">
    </div>
  </div>
  
</div>


<table class="table">
  <thead>
    <tr>
      <th style="text-align: center;">ID</th>
      <th>Họ và tên</th>
      <th>Số Điện Thoại</th>
      <th>CCCD</th>
      <th>Ngày Sinh</th>
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
  var tmpKey = "";
  var index = 1;
  var size = 8;


   // load khi chạy trang
   $(document).ready(function() {
    index = 1;
    size = 8;
    loadTable("", index, size)
    loadPhanTrang("nhanvien", index, size, "", "");

  })

  
    function loadTable(key, index, size) {
    $.ajax({
      url: "http://localhost/WebBanHangMoHinhMVC/AjaxNhanVien/getDanhSach",
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
    loadPhanTrang("nhanvien", index, size, "", tmpKey);
    })

    //Xử lý khi nhấn nút tìm kiếm
  $(document).on("click", "#btnSearch", function() {
    var key = $("#txtFind").val();
    // index = 1;
    // size = 4;
    tmpKey = key;
    loadTable(tmpKey, index, size);
    // xử lý số trang đã chọn
    loadPhanTrang("nhanvien", index, size, "", tmpKey);

  })

  //xử lý sự kiện khi click vào nút làm tươi
  $(document).on("click", "#btnRefresh", function() {
    document.getElementById("txtFind").value = "";
    // var key = "";
    // index = 1;
    // size = 8;
    tmpKey = "";

  
    loadTable(tmpKey, index, size);

    loadPhanTrang("nhanvien", index, size, "", tmpKey);
  })

  //Xử lý khi nhấn nút xóa
  function btnXoa(obj)
  {
    var ma = obj.id;
      $.ajax({
      url: 'http://localhost/WebBanHangMoHinhMVC/AjaxNhanVien/XoaDuLieuNhanVien',
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
    loadPhanTrang("nhanvien",index,size,"",tmpKey)
  }

  // Xử lý cấp tài khoản
  function btnCap(obj)
  {
    var ma = obj.id;
    var ma = obj.id;
      $.ajax({
      url: 'http://localhost/WebBanHangMoHinhMVC/AjaxNhanVien/XoaDuLieuNhanVien',
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
    loadPhanTrang("nhanvien",index,size,"",tmpKey)
  }


  // Hàm Đổi Trạng Thái của Khách Hàng khi tick vào check box Trạng Thái
  function DoiTrangThaiNhanVien(obj) {
    var ma = obj.id;
    var checkBox = document.getElementById(ma)
    // var result = confirm("Bạn có muốn đổi trạng thái?");
    // if (result == true) {
      if (checkBox.checked == true) {
        var trangThai = 1;
        $.post("http://localhost/WebBanHangMoHinhMVC/AjaxNhanVien/DoiTrangThai", {
          ma: ma,
          trangThai: trangThai
        }, function(data) {
          // alert(data);
        })
      } else {
        var trangThai = 0;
        $.post("http://localhost/WebBanHangMoHinhMVC/AjaxNhanVien/DoiTrangThai", {
          ma: ma,
          trangThai: trangThai
        }, function(data) {
          // alert(data);
        })
      // }
    }
    loadTable(tmpKey, index, size)
    loadPhanTrang("nhanvien", index, size, "", tmpKey)


  }

  function DieuHuong() {
    window.location = "http://localhost/WebBanHangMoHinhMVC/Admin/default/ThemNhanVienPage";
  }
</script>