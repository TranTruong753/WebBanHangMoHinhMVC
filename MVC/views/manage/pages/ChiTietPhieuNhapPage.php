<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<?php
  $mapn=$data['DanhSach']["MAPN"];
  
?>
<input type="hidden" id="mapn" value="<?php echo $mapn ;?> ">
<div>
  <h1 class="styleText-01" >Chi Tiết Phiếu nhập</h1>
</div>
<a class="form-add__link" href="http://localhost/WebBanHangMoHinhMVC/admin/default/NhapHangPage"> Trang quản lý phiếu nhập></a>

<!-- <div class="search">
  <input type="text" id="txtFind" placeholder="Tìm kiếm theo Mã hoặc tên nhóm quyền">
  <input type="button" id="btnSearch" value="Tìm Kiếm">
</div> -->

<div class="search-wrap">
    <div class="search">
      <input type="text" class="input_search" id="txtFind" placeholder="Tìm kiếm theo Mã hoặc Tên">
      <label class="btn btn_search" for="btnSearch">
        <i class='bx bx-search'></i>
        <input type="button" id="btnSearch" value="Tìm Kiếm" hidden>
      </label>
    </div>
</div>

<table class="table">
  <thead>
    <tr>
      <th>Mã chi tiết sản phẩm</th>
      <th>Tên sản phẩm</th>
      <th>Số lượng</th>
      <th>Tiền nhập</th>
      <th>Thành tiền</th>
      
    </tr>
  </thead>

  <tbody class="table-group-divider">
  
  <tbody class="table-group-divider row-table">
  </tbody>
</table>
<div class="PhanTrang">

</div>

<script>
    var tmpKey = "";
var index = 1;
var size = 4;
var mapn=document.getElementById('mapn').value;
var sql=" INNER JOIN chitietsanpham"+ 
" on chitietphieunhap.MaChiTietSanPham= chitietsanpham.MaChiTietSanPham INNER JOIN sanpham"+ 
" on sanpham.MaSanPham=chitietsanpham.MaSanPham Where chitietphieunhap.MaPhieuNhap='"+mapn+"'";



 // load khi chạy trang
 $(document).ready(function() {
  index = 1;
  size = 4;
  loadTable("", index, size)
  loadPhanTrang("chitietphieunhap", index, size, sql, "");

})


function loadTable(key, index, size) {
  $.ajax({
    url: "http://localhost/WebBanHangMoHinhMVC/AjaxCTPN/HienDanhSach",
    type: "post",
    dataType: "html",
    data: {
      key: tmpKey,
      index: index,
      size: size,
      mapn : mapn
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
    url: "http://localhost/WebBanHangMoHinhMVC/AjaxCTPN/HienDanhSach",
    type: "post",
    dataType: "html",
    data: {
      key: tmpKey,
      index: index,
      size: size,
      mapn : mapn
    },
    success: function(data) {
      $(".row-table").html(data)
    }
  })
  // xử lý số trang đã chọn
  // alert(tmpKey)
  loadPhanTrang("chitietphieunhap", index, size, sql, tmpKey);
})
//Xử lý khi nhấn nút tìm kiếm
$(document).on("click", "#btnSearch", function() {
  var key = $("#txtFind").val();
  index = 1;
  size = 4;
  tmpKey = key;
  $.ajax({
    url: 'http://localhost/WebBanHangMoHinhMVC/AjaxCTPN/HienDanhSach',
    type: 'post',
    dataType: 'html',
    data: {
      key: key,
      index: index,
      size: size,
      mapn : mapn
    },
    success: function(data) {
      console.log(data)
      $(".row-table").html(data)
    }
  })
  // xử lý số trang đã chọn
  loadPhanTrang("chitietphieunhap", index, size, sql, key);

})
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
        size: size,
        mapn : mapn
      },
      success: function(data) {
        console.log(data)
        $(".PhanTrang").html(data)
      }
  
  
    })
  }
</script>