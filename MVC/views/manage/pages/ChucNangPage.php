<div>
  <h1 class="styleText-01">Quản Lý Chức Năng</h1>
</div>

<!-- <div style="text-align: start;">
    <input type="text" id="txtSearch" style="min-width: 300px;" placeholder="Nhập mã hoặc tên chức năng">
    <input type="button" value="Tìm kiếm" onclick="btnSearch()">
    <input type="button" id="btnThem" onclick="DieuHuongSangTrangThem()" value="Thêm">
    <input type="button" id="btnRefresh" onclick="btnRefresh()" value="Làm tươi">
  </div> -->

<div class="search-wrap">
  <div class="search">
    <input type="text" class="input_search" id="txtSearch" placeholder="Nhập mã hoặc tên chức năng">
    <label class="btn btn_search" for="btnSearch" onclick="btnSearch()">
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
    $ChiTietQuyenModel = $this->data['Data']['ChiTietQuyenModel'];
    if ($ChiTietQuyenModel->KiemTraHanhDong("Thêm", $_SESSION['MaNhomQuyen'], $_SESSION['Chức Năng'])) {
    ?>
      <label for="dieuhuong" class="btn btn_add">
        <i class='bx bx-plus'></i>
        <input type="button" class="" onclick="DieuHuongSangTrangThem()" value="Thêm" id="dieuhuong">
      </label>
    <?php
    }
    ?>


  </div>
</div>





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


<!-- Java Script -->
<script>
  var tmpKey = ""
  var index = 1;
  var size = 4;
  $(document).ready(function() {
    // alert($("#params").val());
    // $arrPhanTang = $("#params").val().split("/");
    loadTable(index, size);
    loadPhanTrang("chucnang", index, size, "", tmpKey)

  })

  // Xử lý sự kiện nút làm tươi
  function btnRefresh() {
    tmpKey = "";
    index = 1;
    loadTable(index, size, tmpKey);
    loadPhanTrang("chucnang", index, size, "", tmpKey)
  }

  // xử lý sự kiện nút tìm kiếm
  function btnSearch() {
    tmpKey = document.getElementById("txtSearch").value;
    loadTable(index, size, tmpKey);
    loadPhanTrang("chucnang", index, size, "", tmpKey)
  }
  //Xử llys sự kiện khi nhấn bào nút phân trang
  $(document).on("click", ".btnPhanTrang", function() {

    // alert(this.id)
    var arr = this.id.split("/");
    index = arr[0];
    size = arr[1];
    //xử lý thay đổi bảng khi nhấn vào phân trang
    loadTable(index, size, tmpKey);
    // xử lý số trang đã chọn
    // alert(tmpKey)
    loadPhanTrang("chucnang", index, size, "", tmpKey);
  })

  //hàm load bảng
  function loadTable(index, size, key = "") {
    $.ajax({
      url: 'http://localhost/WebBanHangMoHinhMVC/AjaxChucNang/getDanhSach',
      type: 'post',
      dataType: 'html',
      data: {
        key: key,
        index: index,
        size: size,
      },
      success: function(data) {
        $(".row-table").html(data);
      }
    })
  }

  function DoiTrangThaiChucNang(obj) {
    var ma = obj.id;
    var checkBox = document.getElementById(ma)
    // var result = confirm("Bạn có muốn đổi trạng thái?");
    // if (result == true) {
    if (checkBox.checked == true) {
      var trangThai = 1;
      $.post("http://localhost/WebBanHangMoHinhMVC/AjaxChucNang/DoiTrangThai", {
        ma: ma,
        trangThai: trangThai
      }, function(data) {
        // alert(data);
      })
    } else {
      var trangThai = 0;
      $.post("http://localhost/WebBanHangMoHinhMVC/AjaxChucNang/DoiTrangThai", {
        ma: ma,
        trangThai: trangThai
      }, function(data) {
        // alert(data);
      })
      // }
    }
    loadTable(index, size, tmpKey)
    loadPhanTrang("chucnang", index, size, "", tmpKey)
  }

  function btnXoa(obj) {
    var MaChucNang = obj.id;
    // $.ajax({
    //   url: 'http://localhost/WebBanHangMoHinhMVC/AjaxChucNang/XoaDuLieu',
    //   type: 'post',
    //   dataType: 'html',
    //   data: {
    //     MaChucNang: MaChucNang,
    //   },
    //   success: function(data) {
    //     // alert(data);
    //     if (data == 1) alert("Xóa chức năng thành công!")
    //     else if (data == 0) alert("Xóa chức năng thất bại!");
    //     else if (data == -1) alert("Chức năng đang được sử dụng!");
    //   }
    // })
    // loadTable(index, size, tmpKey)
    // loadPhanTrang("chucnang", index, size, "", tmpKey)
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
                url: 'http://localhost/WebBanHangMoHinhMVC/AjaxChucNang/XoaDuLieu',
                type: 'post',
                dataType: 'html',
                data: {
                  MaChucNang: MaChucNang,
                },
                success: function(data) {
                 
                  if(data == 1)
                  {
                    // alert("Cập nhật dữ liệu thành công!");
                    swal({
                        title: "Xóa thành công!",
                        text: "Nhấn vào nút để tiếp tục!",
                        icon: "success",
                    })
                  }else if(data == -1){
                    swal({
                          title: "Lỗi! Chức năng đang được sử dụng!",
                          text: "Nhấn vào nút để tiếp tục!",
                          icon: "error",
                      })
                  }else{
                    swal({
                          title: "Lỗi! Xóa thất bại!",
                          text: "Nhấn vào nút để tiếp tục!",
                          icon: "error",
                      })
                  }
                  
                  // Sau khi xóa thành công, gọi lại hàm loadTable và loadPhanTrang
                  loadTable(index, size, tmpKey)
                  loadPhanTrang("chucnang", index, size, "", tmpKey)
                }
            });
        } else {
            swal("Dữ liệu của bạn được an toàn!");
        }
    });
  }

  function DieuHuongSangTrangThem() {
    window.location = "http://localhost/WebBanHangMoHinhMVC/Admin/default/ThemChucNangPage";
  }
</script>