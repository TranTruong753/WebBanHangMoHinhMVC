<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<div style="text-align: center; ">
    <h1 style=" margin-bottom: 20px;">Quản Lý Chất Liệu</h1>
  </div>


<input type="submit" onclick="DieuHuong()" value="Thêm">
<table class="table">
  <thead>
    <hr>
    <tr>
      <th scope="col" style="text-align: center;">ID</th>
      <th scope="col" style="text-align: center;">Tên</th>
      <th scope="col" style="text-align: center;">Trạng Thái</th>
      <th scope="col" style="text-align: center;">Thao Tác</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">

    <!-- <?php
          if ($data["DanhSach"]->num_rows > 0) {
            while ($row = $data["DanhSach"]->fetch_assoc()) {
          ?> -->
    <tr>
      <th style="text-align: center;" scope="row"><?php echo $row["MaChatLieu"] ?></th>
      <td style="text-align: center;"><?php echo $row["TenChatLieu"] ?></td>
      <td style="text-align: center;">
       <input onchange="DoiTrangThaiChatLieu(this)" id="<?php echo $row["MaChatLieu"] ?>" type="checkbox"  <?php if ($row["TrangThai"] == 1) 
       {
        echo "checked = 'checked'";
      }
                 ?> />
      </td>
      <td style="text-align: center;">
        <pre><a href="">Sửa</a> | <a href="">Chi Tiết</a></pre>
      </td>
    </tr>
    <!-- <?php
            }
          }
          ?> -->

  </tbody>
</table>

<script>
  function DoiTrangThaiChatLieu(obj)
  {
    var ma = obj.id;
    var checkBox = document.getElementById(ma)
    var result = confirm("Bạn có muốn đổi trạng thái?");
    if (result == true) {
      if (checkBox.checked == true) {
        var trangThai = 1;
        $.post("http://localhost/WebBanHangMoHinhMVC/AjaxChatLieu/DoiTrangThai", {
          ma: ma,
          trangThai: trangThai
        }, function(data) {

          alert(data);
        })
      } else {
        var trangThai = 0;
        $.post("http://localhost/WebBanHangMoHinhMVC/AjaxChatLieu/DoiTrangThai", {
          ma: ma,
          trangThai: trangThai
        }, function(data) {
          alert(data);
        })
      }
    }
  }

  function DieuHuong()
  {
    window.location="http://localhost/WebBanHangMoHinhMVC/Admin/default/ThemChatLieuPage";
  }

</script>
<script src="http://localhost/WebBanHangMoHinhMVC/public/script/manage/QuanlyCLJS.js"></script>