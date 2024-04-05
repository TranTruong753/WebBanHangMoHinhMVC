<?php

$PhanTrangModel = new PhanTrangModel();
?>

<!-- Tiêu Đề -->
<div style="text-align: center;">
    <h1 style=" margin-bottom: 20px;">Quản Lý Nhóm Quyền</h1>
  </div>

  <div class="search">
  <input type="text" id="txtFind" placeholder="Tìm kiếm theo Mã hoặc tên nhóm quyền">
</div>
  <!-- Nút sang form dữ liệu nhóm quyền  -->
  <input type="submit" onclick="DieuHuong()" value="Thêm">
<table class="table">
  <style></style>
 
  <thead>
    <tr>
      <th scope="col" style="text-align: center;">ID</th>
      <th scope="col" style="text-align: center;">Tên</th>
      <th scope="col" style="text-align: center;">Trạng Thái</th>
      <th scope="col" style="text-align: center;">Thao Tác</th>
    </tr>
  </thead>
  <tbody  class="table-group-divider row-table">

    <?php
    if ($data['DanhSach']->num_rows>0 ) {
      while ($row = $data['DanhSach']->fetch_assoc()) {
    ?>
        <tr>
          <th style="text-align: center;" scope="row"><?php echo $row["MaNhomQuyen"] ?></th>
          <td style="text-align: center;"><?php echo $row["TenNhomQuyen"] ; ?></td>
          <td style="text-align: center;">

          <!-- Xử lý đổi khi click vào check Box để đổi trạng thái -- -->
            <input onchange="DoiTrangThaiNhomQuyen(this)" id="<?php echo $row["MaNhomQuyen"] ?>" type="checkbox" value="1" <?php if ($row["TrangThai"] == 1) {
                                                                                                                              echo "checked = 'checked'";
                                                                                                                            }
                                                                                                                            ?> />
          </td>
          <td style="text-align: center;">
          <!-- link  để chuyển sang trang nhóm quyền -->
            <pre><a href="http://localhost/WebBanHangMoHinhMVC/Admin/default/SuaNhomQuyenPage,<?php echo  $row["MaNhomQuyen"]?>">Sửa</a></pre>
          </td>
        </tr>
    <?php
      }
    } ?>


  </tbody>
</table>

<div class="PhanTrang">
    <?php
     echo  $PhanTrangModel->PhanTrang(50,100,8,1);
    ?>

</div>

<script>
  $(document).ready(function(){

  //   $('#txtfind').on('keyup', function(e)
  // {
  //   // alert(1);
  // })
  $(document).on("keyup","#txtFind",function(){
    var key=$(this).val();
    var pageIndex = 1;
    var numberItem = 8;
      
        $.ajax(
          {
            url: 'http://localhost/WebBanHangMoHinhMVC/AjaxNhomQuyen/getDanhSach' ,
            type: 'post',
            dataType: 'html',
            data: {
               key : key,
               pageIndex: pageIndex,
               numberItem: numberItem,
            },
            success:function(data){
              console.log(data)
              $(".row-table").html(data)
            } 
          }
        )

      
    })
    // $("#txtFind").keyup(function(e){
      
    //   var key = $("#txtFind").val();
    //   var pageIndex = 1;
    //   var numberItem = 8;
      
    //     $.ajax(
    //       {
    //         url: 'http://localhost/WebBanHangMoHinhMVC/AjaxNhomQuyen/getDanhSach' ,
    //         type: 'post',
    //         dataType: 'html',
    //         data: {
              
    //            key : key,
    //            pageIndex: pageIndex,
    //            numberItem: numberItem,
    //         },
    //         success:function(data){
    //           console.log(data)
    //         } 
            

    //       }
    //     )

      
    // })
  })
  function DoiTrangThaiNhomQuyen(obj) {
    var ma = obj.id;
    var checkBox = document.getElementById(ma)
    var result = confirm("Bạn có muốn đổi trạng thái?");
    if (result == true) {
      if (checkBox.checked == true) {
        var trangThai = 1;
        $.post("http://localhost/WebBanHangMoHinhMVC/AjaxNhomQuyen/DoiTrangThai", {
          ma: ma,
          trangThai: trangThai
        }, function(data) {

          alert(data);
        })
      } else {
        var trangThai = 0;
        $.post("http://localhost/WebBanHangMoHinhMVC/AjaxNhomQuyen/DoiTrangThai", {
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
    window.location="http://localhost/WebBanHangMoHinhMVC/Admin/default/ThemNhomQuyenPage";
  }
</script>