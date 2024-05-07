<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<table class="table">
  <style></style>
  <div>
    <h1 class="styleText-01">Quản Lý Nhập Hàng</h1>
  </div>

  <!-- <div class="search">
  <input type="text" id="txtFind" style="min-width: 300px;" placeholder="Tìm kiếm theo Mã hoặc tên nhóm quyền">
  <input type="button" id="btnSearch" value="Tìm Kiếm">
</div>
<input type="submit" onclick="DieuHuong()" value="Nhập Hàng"> -->


  <div class="search-wrap">
    <div class="search">
      <input type="text" class="input_search" id="txtFind" placeholder="Tìm kiếm theo Mã hoặc tên nhóm quyền">
      <label class="btn btn_search" for="btnSearch">
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
      if ($this->data["Data"]["ChiTietQuyenModel"]->KiemTraHanhDong('Thêm', $_SESSION['MaNhomQuyen'], $_SESSION['Nhập Hàng']) == 1) {
      ?>
        <div class="btn btn_add" style="--width-btn: 180px;">
          <i class='bx bx-plus'></i>
          <input type="button" class="" onclick="DieuHuong()" value="Nhập Hàng">
        </div>
      <?php
      }
      ?>
    </div>
  </div>

  <thead>
    <tr>
      <th>ID
      <button value="MaPhieuNhap" onclick="getArrange(this)">^</button>
      </th>
      <th>Ngày nhập
      <button value="NgayNhap" onclick="getArrange(this)">^</button>
      </th>
      <th>Tông tiền
      <button value="TongTien" onclick="getArrange(this)">^</button>
      </th>
      <th>Nhà cung cấp
      <button value="TenNhaCungCap" onclick="getArrange(this)">^</button>
      </th>
      <th>Nhân viên
      <button value="TenNhanVien" onclick="getArrange(this)">^</button>
      </th>
      <th>Thao tác</th>

    </tr>
  <tbody class="table-group-divider">

  <tbody class="table-group-divider row-table">
  </tbody>
</table>

<div class="PhanTrang">

</div>
<script>
  function DieuHuong() {
    window.location = "http://localhost/WebBanHangMoHinhMVC/Admin/default/ThemPhieuNhapPage";
  }
</script>
<script src="http://localhost/WebBanHangMoHinhMVC/public/script/manage/QuanlyPN.js"></script>