<?php
$NhomQuyenModel = new NhomQuyenModel();
$ChiTietQuyenModel = new ChiTietQuyenModel();
$ChucNangModel = new ChucNangModel();
?>
<div>
  <h1 class="styleText-01">Quản Lý Chi Tiết Quyền</h1>
</div>
<div class="formThemChiTietQuyen" id="formThemChiTietQuyen">

 <div class="block-add">
   <div class="select-wrap">
      <!-- Selected Nhóm Quyền -->
      <div>
        <label for="SelectNhomQuyen">Nhóm Quyền:</label>
      
        <div class="custom-select">
          <select class="" name="NhomQuyen" id="SelectNhomQuyen">
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
        </div>
      </div>
      
      <!-- selected Chức Năng -->
      <div>
        <label for="SelectChucNang">Chức Năng:</label>
      
        <div class="custom-select">
          <select name="SelectChucNang" id="SelectChucNang">
            <option value="">--Hãy chọn một chức năng--</option>
            <?php
            $DanhSachChucNang = $ChucNangModel->getDanhSachCoTrangThai();
            if ($DanhSachChucNang->num_rows > 0) {
              while ($row = $DanhSachChucNang->fetch_assoc()) {
            ?>
                <option value="<?php echo $row["MaChucNang"] ?>"><?php echo $row["TenChucNang"] ?></option>
            <?php
              }
            }
            ?>
          </select>
        </div>
      </div>
  
   </div>
  
    <!-- selected Hành Động -->
    <div class="checkBox-wrap">
      <label for="HanhDong">Hành Động:</label>  
      <div class="CheckBoxHanhDong">
        <div class="checkbox-wrapper-46">
          <input class="inp-cbx ThemCheckBoxHanhDong" name="ThemCheckBoxHanhDong" id="xem" type="checkbox" value="Xem" />
          <label class="cbx" for="xem">
            <span>
              <svg width="12px" height="10px" viewbox="0 0 12 10">
                <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
              </svg>
            </span>
            <span>Xem</span>
          </label>
        </div>
    
        <div class="checkbox-wrapper-46">
          <input class="inp-cbx ThemCheckBoxHanhDong" name="ThemCheckBoxHanhDong" id="them" type="checkbox" value="Thêm" />
          <label class="cbx" for="them">
            <span>
              <svg width="12px" height="10px" viewbox="0 0 12 10">
                <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
              </svg>
            </span>
            <span>Thêm</span>
          </label>
        </div>
    
        <div class="checkbox-wrapper-46">
          <input class="inp-cbx ThemCheckBoxHanhDong" name="ThemCheckBoxHanhDong" id="xoa" type="checkbox" value="Xóa" />
          <label class="cbx" for="xoa">
            <span>
              <svg width="12px" height="10px" viewbox="0 0 12 10">
                <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
              </svg>
            </span>
            <span>Xóa</span>
          </label>
        </div>
    
        <div class="checkbox-wrapper-46">
          <input class="inp-cbx ThemCheckBoxHanhDong" name="ThemCheckBoxHanhDong" id="sua" type="checkbox" value="Sửa" />
          <label class="cbx" for="sua">
            <span>
              <svg width="12px" height="10px" viewbox="0 0 12 10">
                <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
              </svg>
            </span>
            <span>Sửa</span>
          </label>
        </div>
        <!-- 
        <input type="checkbox" class="ThemCheckBoxHanhDong" name="ThemCheckBoxHanhDong" value="Xem">Xem</input>
        <input type="checkbox" class="ThemCheckBoxHanhDong" name="ThemCheckBoxHanhDong" value="Thêm">Thêm</input>
        <input type="checkbox" class="ThemCheckBoxHanhDong" name="ThemCheckBoxHanhDong" value="Xóa">Xóa</input>
        <input type="checkbox" class="ThemCheckBoxHanhDong" name="ThemCheckBoxHanhDong" value="Sửa">Sửa</input> -->
      </div>
    </div>
  
  
    <!-- button -->
  
    <!-- <input type="button" class="btnThem" onclick="ThemDuLieuChiTietQuyen()" value="Thêm"> -->
    <div class="btn btn_add"> 
      <i class='bx bx-plus'></i>
      <input type="button" class="btnThem" onclick="ThemDuLieuChiTietQuyen()" value="Thêm">
    </div>
 </div>

  <div class="search-wrap">
    <div class="search">
      <input type="text" class="input_search" id="txtSearch" placeholder="Tìm kiếm theo Mã hoặc Tên">
      <label class="btn btn_search" for="btnSearch" onclick="btnSearch()">
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
      <!-- <div class="btn btn_add"> 
        <i class='bx bx-plus'></i>
        <input type="button" class="btnThem" onclick="ThemDuLieuChiTietQuyen()" value="Thêm">
      </div> -->
    </div>
  </div>
  

  <!-- </form> -->
</div>

<div>     
      <input type="button" id="btnLuu" onclick="LuuDuLieuHanhDong()" value="Lưu">
      <input type="button" id="btnXoa" onclick="XoaDuLieuChiTietQuyenDaChon()" value="Xóa">    
</div>


<table class="table">
  <thead>
    <tr>
      <th>Chọn</th>
      <th>Nhóm Quyền</th>
      <th>Chức Năng</th>
      <th>Xem</th>
      <th>Thêm</th>
      <th>Xóa</th>
      <th>Sửa</th>
    </tr>
  </thead>
  <tbody class="table-group-divider row_table">


    <!-- end -->
  </tbody>
</table>
<div class="PhanTrang"></div>
<script>
  var index = 1;
  var size = 4;
  var tmpKey = "";

  $(document).ready(function() {
    index = 1;
    size = 4;
    tmpKey = "";
    loadTable(tmpKey, index, size);
    loadPhanTrang("chitietquyen", index, size, "", tmpKey);
  })

  //Hàm reset lại bảng
  function loadTable(key, index, size) {
    $.ajax({
      url: "http://localhost/WebBanHangMoHinhMVC/AjaxChiTietQuyen/getDanhSach",
      type: "post",
      dataType: "html",
      data: {
        key: key,
        index: index,
        size: size
      },
      success: function(data) {
        console.log(data);
        $(".row_table").html(data);
      }
    })
  }

  // xử lý sự kiện nút làm tươi
  function btnRefresh() {
    index = 1;
    tmpKey = "";
    document.getElementById("txtSearch").value = tmpKey;
    loadTable(tmpKey, index, size);
    loadPhanTrang("chitietquyen", index, size, "", tmpKey);
  }
  //xử lý sự kiện cho nút tìm kiếm --
  function btnSearch() {
    // alert("Tìm kiếm")
    index = 1;
    tmpKey = document.getElementById('txtSearch').value;
    // alert(tmpKey);
    loadTable(tmpKey, index, size);
    loadPhanTrang("chitietquyen", index, size, "", tmpKey);

  }
  //xử lý sự kiện cho nút Xóa
  function XoaDuLieuChiTietQuyenDaChon() {
    var result = true;
    var ListCheckBoxXoa = document.querySelectorAll(".CheckBoxXoa");
    ListCheckBoxXoa.forEach(element => {
      if (element.checked) {
        var arr = element.id.split("/")
        var MaNhomQuyen = arr[0];
        var MaChucNang = arr[1];
        $.post("http://localhost/WebBanHangMoHinhMVC/AjaxChiTietQuyen/XoaDuLieuChiTietQuyen", {
          MaNhomQuyen: MaNhomQuyen,
          MaChucNang: MaChucNang
        }, function(data) {
          if (data.length == 7) {
            result = false;
          }
        })
      }

    });
    if (result == false) {
      alert("Xóa Dữ Liệu Thất Bại!");
    } 
    else {
      alert("Xóa Dữ Liệu Thành công");
      loadTable(tmpKey, index, size);
      loadPhanTrang("chitietquyen", index, size, "", tmpKey);
    }

  }


  // function hienThiFrom() {
  //   document.getElementById("formThemChiTietQuyen").classList.toggle("hidden");
  // }


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
    loadPhanTrang("chitietquyen", index, size, "", tmpKey);
  })



  // Xử Lý Sự Kiện Khi Nhấn vào Nút Thêm 
  function ThemDuLieuChiTietQuyen() {
    var result = true;
    var MaNhomQuyen = document.getElementById("SelectNhomQuyen").value;
    var MaChucNang = document.getElementById("SelectChucNang").value;
    var ListHanhDong = document.querySelectorAll(".ThemCheckBoxHanhDong");
    var arr = []
    ListHanhDong.forEach(element => {
      if (element.checked) {
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
      if (arr.length == 0) {
        error += " +Hành Động\n"
      }
      alert("Bạn Chưa Chọn \n" + error);
    } else {

      arr.forEach(element => {
        var HanhDong = element;
        $.post("http://localhost/WebBanHangMoHinhMVC/AjaxChiTietQuyen/ThemDuLieuChiTietQuyen", {
          MaNhomQuyen: MaNhomQuyen,
          MaChucNang: MaChucNang,
          HanhDong: HanhDong
        }, function(data) {
          // alert("data:"+data);
          if (data.length == 7) {
            result = false;
          }
        })

      })

      if (result == true) {
        alert("Thêm Dữ Liệu Chi Tiết Quyền Thành Công!");
        // $.post("http://localhost/WebBanHangMoHinhMVC/Admin/default/ChiTietQuyenPage")
        loadTable(tmpKey, index, size);
        loadPhanTrang("chitietquyen", index, size, "", tmpKey);
      } else {
        alert("Thêm Dữ Liệu Chi Tiết Quyền Thất Bại!");
      }
    }

  }

  //Hàm xử lý ajax để lưu thay đổi của checkbox hành động
  function LuuDuLieuHanhDongCurrent(MaNhomQuyen, MaChucNang, HanhDong, TrangThai) {
    $.ajax({
      url: "http://localhost/WebBanHangMoHinhMVC/AjaxChiTietQuyen/CapNhatTrangThai",
      type: "post",
      dataType: "html",
      data: {
        MaNhomQuyen: MaNhomQuyen,
        MaChucNang: MaChucNang,
        HanhDong: HanhDong,
        TrangThai: TrangThai
      },
      success: function(data) {}
    })
  }


  function LuuDuLieuHanhDong() {
    var arrCheckboxHanhDong = document.querySelectorAll(".CheckBoxHanhDongTrongTable");
    var result = confirm("Lưu các thay đổi?")

    if (result == true) {
      // console.log(arrCheckboxHanhDong);
      arrCheckboxHanhDong.forEach(item => {
        // console.log(item)
        var arrId = item.id.split("/");
        var MaNhomQuyen = arrId[0];
        var MaChucNang = arrId[1];
        var HanhDong = arrId[2];


        if (item.checked == true) {
          LuuDuLieuHanhDongCurrent(MaNhomQuyen, MaChucNang, HanhDong, 1);
        } else {
          LuuDuLieuHanhDongCurrent(MaNhomQuyen, MaChucNang, HanhDong, 0);
        }

      })
      alert("Lưu dữ thay đổi thành công")
      loadTable(tmpKey, index, size);
      loadPhanTrang("chitietquyen", index, size, "", tmpKey);
    }
  }
</script>

