<?php
$PhanTrangModel = new PhanTrangModel();
?>
<table class="table">
  <div style="text-align: center;">
    <h1 style=" margin-bottom: 20px;">Quản Lý Khách Hàng</h1>
  </div>
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
  var size = 4;


   // load khi chạy trang
   $(document).ready(function() {
    index = 1;
    size = 4;
    loadTable("", index, size)
    loadPhanTrang("khachhang", index, size, "", "");

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

    function loadTable(key, index, size) {
    $.ajax({
      url: "http://localhost/WebBanHangMoHinhMVC/AjaxThongTinKhachHang/getDanhSach",
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
  }

</script>