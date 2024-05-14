<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<table class="table">
<style></style>

<h1 class="styleText-01">Quản Lý Sản Phẩm</h1>


<div class="search-wrap">
  <div class="search">
    <input type="text" class="input_search" id="txtFind" placeholder="Tìm kiếm theo mã hoặc tên">
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
    <!--  -->
    <?php
    $ChiTietQuyenModel = $this->data['Data']['ChiTietQuyenModel'];
    if( $ChiTietQuyenModel->KiemTraHanhDong("Thêm",$_SESSION['MaNhomQuyen'],$_SESSION['Sản Phẩm']))
    {

      ?>
    <label for="dieuhuong" class="btn btn_add"> 
      <i class='bx bx-plus'></i>
      <input type="button" class="" onclick="DieuHuong()" value="Thêm" id="dieuhuong">
    </label>
      <?php
    }
    ?>
   
    <!--  -->
  </div>
</div>

</div>
<!-- <div class="search">
  <input type="text" id="txtFind" placeholder="Tìm kiếm theo Mã hoặc tên nhóm quyền">
  <input type="button" id="btnSearch" value="Tìm Kiếm">
</div> -->
  <thead>
    <tr>
      <th>
        ID
        <button value="MaSanPham" class="MaSanPham-icon-order"  onclick="getArrange(this)">^</button>
      </th>
      
      <th>Tên
      <button value="TenSanPham" class="TenSanPham-icon-order" onclick="getArrange(this)">^</button>
      </th>
      <th>Giá
      <button value="GiaSanPham" class="GiaSanPham-icon-order" onclick="getArrange(this)">^</button>
      </th>
      <th>Số lượng tồn
      <button value="SoLuongTonSP" class="SoLuongTonSP-icon-order" onclick="getArrange(this)">^</button>
      </th>
      <th>Giá nhập
      <button value="GiaNhap" class="GiaNhap-icon-order" onclick="getArrange(this)">^</button>
      </th>
      <th>Khuyến mãi</th>
      <th>Thể Loại</th>
      <th>Chất Liệu</th>
      <th>Thương Hiệu</th>
      <th>Trạng thái</th>
      <th>Thao Tác</th>
    </tr>
  </thead>
  <tbody class="table-group-divider row-table">
  </tbody>
</table>

<div class="PhanTrang">

</div>

<script>
  function DieuHuong()
  {
    window.location="http://localhost/WebBanHangMoHinhMVC/Admin/default/ThemSanPhamPage";
  }
  

</script>
<script src="http://localhost/WebBanHangMoHinhMVC/public/script/manage/QuanlySPJS.js"></script>