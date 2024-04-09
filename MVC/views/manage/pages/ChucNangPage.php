<input style="display: none;" type="checkbox" id="params" value='<?php echo $data['DanhSach']['index'] . "/" . $data["DanhSach"]['sizePage'] ?>'>


<style></style>
  <div style="text-align: center;">
    <h1 style=" margin-bottom: 20px;">Quản Lý Chức Năng</h1>


    <div style="text-align: start;">
    <input type="button" id="btnThem" onclick="DieuHuongSangTrangThem()" value="Thêm">
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

    <?php
    // if ($data['DanhSach']->num_rows > 0) {
    // while ($row = $data['DanhSach']->fetch_assoc()) {
    ?>
    <!-- <tr>
          <th style="text-align: center;" scope="row"><?php echo $row["MaChucNang"] ?></th>
          <td style="text-align: center;"><?php echo $row["TenChucNang"] ?></td>
          <td style="text-align: center;">
            <input onchange="DoiTrangThaiChucNang(this)" id="<?php echo $row["MaChucNang"] ?>" type="checkbox" value="1" <?php if ($row["TrangThai"] == 1) {
                                                                                                                            echo "checked = 'checked'";
                                                                                                                          }
                                                                                                                          ?> />
          </td>
          <td style="text-align: center;">
            <pre><a href="">Sửa</a></pre>
          </td>
        </tr> -->
    <?php
    //   }
    // } else echo "Bảng Chưa Có Dữ Liệu" 
    ?>


  </tbody>
</table>

<div class="PhanTrang">

</div>


<!-- Java Script -->
<script>
  var tmpKey = ""
  var index ;
    var size ;
  $(document).ready(function() {
    // alert($("#params").val());
    $arrPhanTang = $("#params").val().split("/");
    var index = $arrPhanTang[0];
    var size = $arrPhanTang[1];
    loadBang(index, size);
    loadPhanTrang("chucnang", index, size, "",tmpKey)

  })

  //Xử llys sự kiện khi nhấn bào nút phân trang
  $(document).on("click", ".btnPhanTrang", function() {

    // alert(this.id)
    var arr = this.id.split("/");
    var index = arr[0];
    var size = arr[1];
    //xử lý thay đổi bảng khi nhấn vào phân trang
    loadBang(index, size, tmpKey);
    // xử lý số trang đã chọn
    // alert(tmpKey)
    loadPhanTrang("chucnang", index, size, "", tmpKey);
  })

  //hàm load bảng
  function loadBang(index, size, key = "") {
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

  }


  function DieuHuongSangTrangThem()
  {
    window.location = "http://localhost/WebBanHangMoHinhMVC/Admin/default/ThemChucNangPage";
  }
</script>