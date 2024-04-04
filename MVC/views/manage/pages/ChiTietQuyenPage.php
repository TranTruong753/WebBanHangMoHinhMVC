<style>
  /* .formThemChiTietQuyen {
    width: 100%;
    min-height: 300px;
    background-color: red;
    display: none;
  }

  .hidden {
    display: block;
  } */
</style>

<?php
$NhomQuyenModel = new NhomQuyenModel();
$ChiTietQuyenModel = new ChiTietQuyenModel();
$ChucNangModel = new ChucNangModel();
// echo $NhomQuyenModel->getTenNhomQuyenTuMa(1);
// echo $ChiTietQuyenModel->KiemTraHanhDong(3,6,"Xem");
?>
<div style="text-align: center;">
  <h1 style=" margin-bottom: 20px;">Quản Lý Chi Tiết Quyền</h1>
</div>
<!-- <input type="button" onclick="hienThiFrom()" value="Thêm Chi Tiết Quyền"> -->
<div class="formThemChiTietQuyen" id="formThemChiTietQuyen">
  <form action="">
    <!-- Selected Nhóm Quyền -->
    <label for="SelectNhomQuyen">Nhóm Quyền</label>
    <select name="NhomQuyen" id="SelectNhomQuyen" size="6">
      <option value="">--Hãy chọn một nhóm quyền--</option>
      <?php
      $DanhSachNhomQuyen = $NhomQuyenModel->getDanhSachCoTrangThai();
      if ($DanhSachNhomQuyen->num_rows > 0) {
        while ($row = $DanhSachNhomQuyen->fetch_assoc()) {
      ?>
          <option value="<?php echo $row["MaNhomQuyen"] ?>"><?php echo $row["TenNhomQuyen"] ?></option>
      <?php
        }
      }
      ?>
    </select>
    <!-- selected Chức Năng -->
    <br>
    <label for="SelectChucNang">Chức Năng</label>
    <select name="SelectChucNang" id="SelectChucNang" size="6">
      <option value="">--Hãy chọn một nhóm quyền--</option>
      <?php
      $DanhSachChucNang = $ChucNangModel->getDanhSach();
      if ($DanhSachChucNang->num_rows > 0) {
        while ($row = $DanhSachChucNang->fetch_assoc()) {
      ?>
          <option value="<?php echo $row["MaChucNang"] ?>"><?php echo $row["TenChucNang"] ?></option>
      <?php
        }
      }
      ?>
    </select>

    <br>
  
  
     <!-- selected Hành Động -->
     <label for="HanhDong">Hành Động</label>
     <br>
      <div class="CheckBoxHanhDong">
        <input type="checkbox" class="ThemCheckBoxHanhDong" name="ThemCheckBoxHanhDong" value="Xem">Xem</input>
        <input type="checkbox" class="ThemCheckBoxHanhDong" name="ThemCheckBoxHanhDong" value="Thêm">Thêm</input>
        <input type="checkbox" class="ThemCheckBoxHanhDong" name="ThemCheckBoxHanhDong" value="Xóa">Xóa</input>
        <input type="checkbox" class="ThemCheckBoxHanhDong" name="ThemCheckBoxHanhDong" value="Sửa">Sửa</input>
      </div>


    <!-- button -->

    <input type="button" class="btnThem" onclick="ThemDuLieuChiTietQuyen()" value="Thêm">

  </form>
</div>

<table class="table">
  <style></style>

  <thead>

    <div style="background-color: black;">
      <input type="button" id="btnLuu" value="Lưu">
      <input type="button" id="btnXoa" onclick="XoaDuLieuChiTietQuyenDaChon()" value="Xóa">

    </div>
    <tr>
    <th><input type="checkbox" name="" id=""></th>
      <th scope="col" style="text-align: center;">Nhóm Quyền</th>
      <th scope="col" style="text-align: center;">Chức Năng</th>
      <th scope="col" style="text-align: center;">Xem</th>
      <th scope="col" style="text-align: center;">Thêm</th>
      <th scope="col" style="text-align: center;">Xóa</th>
      <th scope="col" style="text-align: center;">Sửa</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">

    <?php
    if ($data["DanhSach"]->num_rows > 0) {
      while ($row = $data["DanhSach"]->fetch_assoc()) {
    ?>
        <tr>
        <th><input type="checkbox" class="CheckBoxXoa" id="<?php echo $row["MaNhomQuyen"] . "/" . $row["MaChucNang"] ?>"></th>
          <th style="text-align: center;" scope="row"><?php echo $NhomQuyenModel->getTenNhomQuyenTuMa($row["MaNhomQuyen"]) ?></th>
          <td style="text-align: center;"><?php echo $ChucNangModel->getTenTuMa($row["MaChucNang"])  ?></td>
          <td style="text-align: center;"><input class="CheckBoxHanhDongTrongTable" type="checkbox" id="<?php echo $row["MaNhomQuyen"] . "/" . $row["MaChucNang"] . "/Xem" ?>" <?php if ($ChiTietQuyenModel->KiemTraHanhDong($row["MaNhomQuyen"], $row["MaChucNang"], "Xem")) echo "checked = 'checked'"; ?>></td>
          <td style="text-align: center;"><input class="CheckBoxHanhDongTrongTable" type="checkbox" id="<?php echo $row["MaNhomQuyen"] . "/" . $row["MaChucNang"] . "/Thêm" ?>" <?php if ($ChiTietQuyenModel->KiemTraHanhDong($row["MaNhomQuyen"], $row["MaChucNang"], "Thêm")) echo "checked = 'checked'"; ?>></td>
          <td style="text-align: center;"><input class="CheckBoxHanhDongTrongTable" type="checkbox" id="<?php echo $row["MaNhomQuyen"] . "/" . $row["MaChucNang"] . "/Xóa" ?>" <?php if ($ChiTietQuyenModel->KiemTraHanhDong($row["MaNhomQuyen"], $row["MaChucNang"], "Xóa")) echo "checked = 'checked'"; ?>></td>
          <td style="text-align: center;"><input class="CheckBoxHanhDongTrongTable" type="checkbox" id="<?php echo $row["MaNhomQuyen"] . "/" . $row["MaChucNang"] . "/Sửa" ?>" <?php if ($ChiTietQuyenModel->KiemTraHanhDong($row["MaNhomQuyen"], $row["MaChucNang"], "Sửa")) echo "checked = 'checked'"; ?>></td>
        </tr>
    <?php
      }
    }
    ?>
    <!-- end -->
  </tbody>
</table>
<script>
 //xử lý sự kiện cho nút Xóa
 function XoaDuLieuChiTietQuyenDaChon()
 {
    var result = true;
    var ListCheckBoxXoa = document.querySelectorAll(".CheckBoxXoa");
    ListCheckBoxXoa.forEach(element => {
      if(element.checked)
      {
        var arr = element.id.split("/")
        var MaNhomQuyen = arr[0];
        var MaChucNang = arr[1];
        $.post("http://localhost/WebBanHangMoHinhMVC/AjaxChiTietQuyen/XoaDuLieuChiTietQuyen",{
          MaNhomQuyen:MaNhomQuyen,
          MaChucNang:MaChucNang
        },function(data)
        {
          alert(data)
          if(data.length==7)
          {
            result = false;
          }
        })
      }
      
    });
    if(result == false)
    {
      alert("Xóa Dữ Liệu Thất Bại!");
    }
    {
      alert("Xóa Dữ Liệu Thành công");
      window.location = "http://localhost/WebBanHangMoHinhMVC/Admin/default/ChiTietQuyenPage";
    }



  }


  // alert(document.getElementById("SelectNhomQuyen"))
  function hienThiFrom() {
    document.getElementById("formThemChiTietQuyen").classList.toggle("hidden");
  }

  


  // Xử Lý Sự Kiện Khi Nhấn vào Nút Thêm 
  function ThemDuLieuChiTietQuyen() {
    var result=true;
    var MaNhomQuyen = document.getElementById("SelectNhomQuyen").value;
    var MaChucNang = document.getElementById("SelectChucNang").value;
    var ListHanhDong = document.querySelectorAll(".ThemCheckBoxHanhDong");
    var arr = []
    ListHanhDong.forEach(element => {
      if(element.checked)
      {
        arr.push(element.value);
      }
    });
    // alert(MaChucNang);
    if (MaNhomQuyen == '' || MaChucNang == '' || arr.length == 0) {

      var error = "";

      if (MaNhomQuyen == '') {
        error += " +Nhóm Quyền\n";
      }
      if (MaChucNang == '') {
        error += " +Chức Năng\n";
      }
      if(arr.length == 0)
      {
        error += " +Hành Động\n"
      }
      alert("Bạn Chưa Chọn \n" + error);
    } else {

        arr.forEach(element=>{
          var HanhDong =element;
          $.post("http://localhost/WebBanHangMoHinhMVC/AjaxChiTietQuyen/ThemDuLieuChiTietQuyen",{
            MaNhomQuyen:MaNhomQuyen,MaChucNang:MaChucNang,HanhDong:HanhDong
          },function(data){
            // alert("data:"+data);
            if(data.length==7)
            {
              result =false;
            }
          })

        }
        )

        if(result==true)
        {
          alert("Thêm Dữ Liệu Chi Tiết Quyền Thành Công!");
          // $.post("http://localhost/WebBanHangMoHinhMVC/Admin/default/ChiTietQuyenPage")
          window.location="http://localhost/WebBanHangMoHinhMVC/Admin/default/ChiTietQuyenPage";
        }
        else
        {
          alert("Thêm Dữ Liệu Chi Tiết Quyền Thất Bại!");
        }
    }

  }


  
</script>