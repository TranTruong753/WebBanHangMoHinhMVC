<?php
$PhanTrangModel = new PhanTrangModel();
?>

<!-- Tiêu Đề -->
<div>
  <h1 class="styleText-01">Quản Lý Nhóm Quyền</h1>
</div>

<div class="search-wrap">
    <div class="search">
      <input type="text" class="input_search" id="txtFind" placeholder="Tìm kiếm theo Mã hoặc tên nhóm quyền">
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
      <?php
    if ($this->data['Data']['ChiTietQuyenModel']->KiemTraHanhDong('Thêm', $_SESSION['MaNhomQuyen'], $_SESSION['Nhóm Quyền']) == 1) {
    ?>
      <div class="btn btn_add"> 
        <i class='bx bx-plus'></i>
        <input type="button" class="" onclick="DieuHuong()" value="Thêm">
      </div>
    <?php
    }
    ?>
      
    </div>
  </div>


<!-- <div class="search">
  <input type="text" id="txtFind" style="min-width: 300px;" placeholder="Tìm kiếm theo Mã hoặc tên nhóm quyền">
  <input type="button" id="btnSearch" value="Tìm Kiếm">
</div> -->
<!-- Nút sang form dữ liệu nhóm quyền  -->
<!-- <input type="submit" onclick="DieuHuong()" value="Thêm">

<input type="button" id="btnRefresh" onclick="btnRefresh()" value="Làm Tươi"> -->


<table class="table">

  <thead>
    <tr>
      <th>ID</th>
      <th>Tên</th>
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
  var size = 4;


   // load khi chạy trang
   $(document).ready(function() {
    index = 1;
    size = 4;
    loadTable("", index, size)
    loadPhanTrang("nhomquyen", index, size, "", "");

  })

  //hàm load phân trnag 
  function loadPhanTrang(tableName, index, size, condition = "", key = "") {
    $.ajax({
      url: "http://localhost/WebBanHangMoHinhMVC/AjaxPhanTrang/getPhanTrang",
      type: "post",
      dataType: "html",
      data: {
        key: key,
        table: tableName,
        condition: condition,
        index: index,
        size: size
      },
      success: function(data) {
        console.log(data)
        $(".PhanTrang").html(data)
      }


    })
  }

 
  //Xử lý khi nhấn nút xóa
  // $(document).on("click", "#btnXoa", function(obj) {
  //   var ma = obj.val();
  //   console.log(ma);
  //   // $.ajax({
  //   //   url: 'http://localhost/WebBanHangMoHinhMVC/AjaxNhomQuyen/XoaDuLieuNhomQuyen',
  //   //   type: 'post',
  //   //   dataType: 'html',
  //   //   data: {
  //   //     ma: ma,
  //   //   },
  //   //   success: function(data) {
  //   //     alert(data);
  //   //   }
  //   // })
  // })

  function btnXoa(obj)
  {
    var ma = obj.id;

      $.ajax({
      url: 'http://localhost/WebBanHangMoHinhMVC/AjaxNhomQuyen/XoaDuLieuNhomQuyen',
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
    loadPhanTrang("nhomquyen",index,size,"",tmpKey)
  }

  function loadTable(key, index, size) {
    $.ajax({
      url: "http://localhost/WebBanHangMoHinhMVC/AjaxNhomQuyen/getDanhSach",
      type: "post",
      dataType: "html",
      data: {
        key: tmpKey,
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
    $.ajax({
      url: "http://localhost/WebBanHangMoHinhMVC/AjaxNhomQuyen/getDanhSach",
      type: "post",
      dataType: "html",
      data: {
        key: tmpKey,
        index: index,
        size: size
      },
      success: function(data) {
        $(".row-table").html(data)
      }
    })
    // xử lý số trang đã chọn
    // alert(tmpKey)
    loadPhanTrang("nhomquyen", index, size, "", tmpKey);
  })
  //Xử lý khi nhấn nút tìm kiếm
  $(document).on("click", "#btnSearch", function() {
    var key = $("#txtFind").val();
    index = 1;
    size = 4;
    tmpKey = key;
    $.ajax({
      url: 'http://localhost/WebBanHangMoHinhMVC/AjaxNhomQuyen/getDanhSach',
      type: 'post',
      dataType: 'html',
      data: {
        key: key,
        index: index,
        size: size,
      },
      success: function(data) {
        console.log(data)
        $(".row-table").html(data)
      }
    })
    // xử lý số trang đã chọn
    loadPhanTrang("nhomquyen", index, size, "", key);

  })

  //xử lý sự kiện khi click vào nút làm tươi
  $(document).on("click", "#btnRefresh", function() {
    document.getElementById("txtFind").value = "";
    var key = "";
    index = 1;
    size = 4;
    tmpKey = "";

    $.ajax({
      url: 'http://localhost/WebBanHangMoHinhMVC/AjaxNhomQuyen/getDanhSach',
      type: 'post',
      dataType: 'html',
      data: {
        key: key,
        index: index,
        size: size,
      },
      success: function(data) {
        console.log(data)
        $(".row-table").html(data)
      }
    })

    loadPhanTrang("nhomquyen", index, size, "", key);
  })

  // Hàm Đổi Trạng Thái của Nhóm Quyền khi tick vào check box Trạng Thái
  function DoiTrangThaiNhomQuyen(obj) {
    var ma = obj.id;
    var checkBox = document.getElementById(ma)
    // var result = confirm("Bạn có muốn đổi trạng thái?");
    // if (result == true) {
      if (checkBox.checked == true) {
        var trangThai = 1;
        $.post("http://localhost/WebBanHangMoHinhMVC/AjaxNhomQuyen/DoiTrangThai", {
          ma: ma,
          trangThai: trangThai
        }, function(data) {

          // alert(data);
        })
      } else {
        var trangThai = 0;
        $.post("http://localhost/WebBanHangMoHinhMVC/AjaxNhomQuyen/DoiTrangThai", {
          ma: ma,
          trangThai: trangThai
        }, function(data) {
          // alert(data);
        })
    //   }
    }
    loadTable(tmpKey, index, size)
    loadPhanTrang("nhomquyen", index, size, "", tmpKey)


  }

  function DieuHuong() {
    window.location = "http://localhost/WebBanHangMoHinhMVC/Admin/default/ThemNhomQuyenPage";
  }
</script>