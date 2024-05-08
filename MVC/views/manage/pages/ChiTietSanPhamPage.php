<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<?php
    $masp=$data['DanhSach']["MASP"];
?>
<div>
  <h1 class="styleText-01">Quản Lý Chi Tiết Sản Phẩm</h1>
</div>
<a class="form-add__link" href="http://localhost/WebBanHangMoHinhMVC/admin/default/SanPhamPage"> Quay về Trang Sản Phẩm></a>

<!-- <div class="search">
  <input type="text" id="txtFind" style="min-width: 300px;" placeholder="Tìm kiếm theo Mã hoặc tên nhóm quyền">
  <input type="button" id="btnSearch" value="Tìm Kiếm">
</div> -->
<!-- <input type="submit" id="<?php echo $masp?>"  onclick="DieuHuong(this)" value="Thêm"> -->
<!-- <input type="button"   onclick="Lamtuoi()" value="làm tươi"> -->
<input type="hidden" id="masp"  value="<?php echo $masp?>">

<div class="search-wrap">
    <div class="search">
      <input type="text" class="input_search" id="txtFind" placeholder="Tìm kiếm theo Mã hoặc Tên chi tiết sản phẩm">
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
        <input type="button" id="btnRefresh" onclick="Lamtuoi()" value="" hidden>
      </label>
      <label for="<?php echo $masp?>" class="btn btn_add"> 
        <i class='bx bx-plus'></i>
        <input id="<?php echo $masp?>" type="button" class="" onclick="DieuHuong(this)" value="Thêm">
      </label>
    </div>
  </div>

<table class="table">
  <thead>
    <tr>
      <th>Hình ảnh</th>
      <th>ID
      <button value="MaChiTietSanPham" onclick="getArrange(this)">^</button>
      </th>
      <th>Tên
      
      </th>
      <th>Màu sắc
      <button value="TenMauSac" onclick="getArrange(this)">^</button>
      </th>
      <th>Kích cở
      <button value="TenKichCo" onclick="getArrange(this)">^</button>
      </th>
      <th>Số lượng tồn
      <button value="SoLuongTon" onclick="getArrange(this)">^</button>
      </th>
      <th>Trạng thái</th>
      <th>Thao tác</th>
      
    </tr>
  </thead>
  <tbody class="table-group-divider row-table">
  </tbody>
</table>
<div class="PhanTrang">

</div>
<script>
  function DieuHuong(ojt)
  { var url="http://localhost/WebBanHangMoHinhMVC/Admin/default/ThemChiTietSanPhamPage,"+ojt.id;
    window.location=url;
  }
  

</script>
<script src="http://localhost/WebBanHangMoHinhMVC/public/script/manage/QuanlyCTSP.js"></script>