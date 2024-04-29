

<style></style>
<div style="text-align: center;">
  <h1 style=" margin-bottom: 20px;">Quản Lý Chức Năng</h1>


  <div style="text-align: start;">
    <input type="text" id="txtSearch" style="min-width: 300px;" placeholder="Nhập mã hoặc tên chức năng">
    <input type="button" value="Tìm kiếm" onclick="btnSearch()">
    <input type="button" id="btnThem" onclick="DieuHuongSangTrangThem()" value="Thêm">
    <input type="button" id="btnRefresh" onclick="btnRefresh()" value="Làm tươi">
  </div>
  <table class="table">

</div>
<thead>
  <tr>
    <th scope="col" style="text-align: center;">ID</th>
    <th scope="col" style="text-align: center;">Tên</th>
    <th scope="col" style="text-align: center;">Trạng Thái</th>
    <th scope="col" style="text-align: center;">Thao Tác</th>
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
  var index =1;
  var size=4;
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
    var result = confirm("Bạn có muốn đổi trạng thái?");
    if (result == true) {
      if (checkBox.checked == true) {
        var trangThai = 1;
        $.post("http://localhost/WebBanHangMoHinhMVC/AjaxChucNang/DoiTrangThai", {
          ma: ma,
          trangThai: trangThai
        }, function(data) {
          alert(data);
        })
      } else {
        var trangThai = 0;
        $.post("http://localhost/WebBanHangMoHinhMVC/AjaxChucNang/DoiTrangThai", {
          ma: ma,
          trangThai: trangThai
        }, function(data) {
          alert(data);
        })
      }
    }
    loadTable(index, size, tmpKey)
    loadPhanTrang("chucnang", index, size, "", tmpKey)
  }

  function btnXoa(obj) {
    var MaChucNang = obj.id;
    $.ajax({
      url: 'http://localhost/WebBanHangMoHinhMVC/AjaxChucNang/XoaDuLieu',
      type: 'post',
      dataType: 'html',
      data: {
        MaChucNang: MaChucNang,
      },
      success: function(data) {
        // alert(data);
        if (data == 1) alert("Xóa chức năng thành công!")
        else if (data == 0) alert("Xóa chức năng thất bại!");
        else if (data == -1) alert("Chức năng đang được sử dụng!");
      }
    })
    loadTable(index, size, tmpKey)
    loadPhanTrang("chucnang", index, size, "", tmpKey)
  }

  function DieuHuongSangTrangThem() {
    window.location = "http://localhost/WebBanHangMoHinhMVC/Admin/default/ThemChucNangPage";
  }
</script>