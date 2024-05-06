<?php
$PhanTrangModel = new PhanTrangModel();
?>
<div>
  <h1 class="styleText-01">Quản Lý Khách Hàng</h1>
</div>

  <div class="search-wrap">
    <div class="search">
      <input type="text" class="input_search" id="txtFind" placeholder="Tìm kiếm theo Mã hoặc Tên khách hàng">
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
      <label for="dieuhuong" class="btn btn_add"> 
        <i class='bx bx-plus'></i>
        <input id="dieuhuong" type="button" class="" onclick="DieuHuong()" value="Thêm">
      </label>
    </div>
  </div>

<table class="table">
  <thead>
    <tr>
      <th>ID</th>
      <th>Tên</th>
      <th>Số Điện Thoại</th>
      <th>Giới Tính</th>
      <th>Trạng Thái</th>
      <th>Thao Tác</th>
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
    //   $.ajax({
    //   url: 'http://localhost/WebBanHangMoHinhMVC/AjaxThongTinKhachHang/XoaDuLieuKhachHang',
    //   type: 'post',
    //   dataType: 'html',
    //   data: {
    //     ma: ma,
    //   },
    //   success: function(data) {
    //     alert(data);
    //   }
    // })
    // loadTable(tmpKey,index,size)
    // loadPhanTrang("khachhang",index,size,"",tmpKey)
    swal({
        title: "Bạn có chắc?",
        text: "Sau khi xóa, bạn sẽ không thể khôi phục tập tin tưởng tượng này!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            $.ajax({
                url: 'http://localhost/WebBanHangMoHinhMVC/AjaxThongTinKhachHang/XoaDuLieuKhachHang',
                type: 'post',
                dataType: 'html',
                data: {
                    ma: ma,
                },
                success: function(data) {
                    swal("Dữ liệu đã xóa thành công!", {
                        icon: "success",
                    });
                    // Sau khi xóa thành công, gọi lại hàm loadTable và loadPhanTrang
                    loadTable(tmpKey, index, size);

                    loadPhanTrang("khachhang", index, size, "", tmpKey);

                }
            });
        } else {
            swal("Dữ liệu của bạn được an toàn!");
        }
    });
  }


  // Hàm Đổi Trạng Thái của Khách Hàng khi tick vào check box Trạng Thái
  function DoiTrangThaiKhachHang(obj) {
    var ma = obj.id;
    var checkBox = document.getElementById(ma)
    // var result = confirm("Bạn có muốn đổi trạng thái?");
    // var trangThai = 1;
    // if (result == true) {
      if (checkBox.checked == true) {
        var trangThai = 1;
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
      // }
    }
    // loadTable(tmpKey, index, size)
    // loadPhanTrang("khachhang", index, size, "", tmpKey)


  }

  function DieuHuong() {
    window.location = "http://localhost/WebBanHangMoHinhMVC/Admin/default/ThemKhachHangPage";
  }
  

</script>