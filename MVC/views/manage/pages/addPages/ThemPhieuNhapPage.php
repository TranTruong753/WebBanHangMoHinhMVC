<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<?php
    $sp=$data["DanhSach"]["SP"];
    $pn=$data["DanhSach"]["PN"];
    $ncc=$data["DanhSach"]["NCC"];
    $dem=0;
    $manv="";
    if ($pn->num_rows > 0) {
        while ($row = $pn->fetch_assoc()) {
                $dem++;
        }
    }   
    if(isset($_SESSION['email'])){
      $manv=$_SESSION['email'];
    }
?>
<h1 class = 'styleText-02' >Nhập hàng</h1>
<a class="form-add__link" href="http://localhost/WebBanHangMoHinhMVC/admin/default/NhapHangPage"> Quay về trang quản lý nhập hàng></a>

<div class="form_header form_add-product">
  <form method="post" class="">
      <div class = "input-add_wrap">
        <label class='styleText-04 label-add' for="mapn">Mã Phiếu Nhập</label> 
        <input class='input-add' type="text" id="mapn" value="PN00<?php echo $dem+1;?>" disabled> 
      </div>
      <div class = "input-add_wrap">
        <label class='styleText-04 label-add' for="sanpham">Chọn Sản Phẩm</label>
        <div class="custom-select select-add">
          <select name="" id=""  class="">
            <option value="">Hãy chọn sản phẩm</option>
              <?php
              if ($sp->num_rows > 0) {
                  while ($row = $sp->fetch_assoc()) {
                          echo '<option onclick="change(this)" value="'.$row['MaSanPham'].'" >'.$row['MaSanPham'].'-'.$row['TenSanPham'].'</option>
                               ';
                  }
              }
              ?>
          </select>
        </div>
      </div>
      
      
      <div class = "input-add_wrap">
        <label class='styleText-04 label-add' for="">Chọn Nhà Cung Cấp</label>
        <div class="custom-select select-add">
      
          <select name="" id="ncc"  class="" >
          <option value="">Hãy chọn nhà cung cấp</option>
              <?php
              if ($ncc->num_rows > 0) {
                  while ($row = $ncc->fetch_assoc()) {
                          echo '<option   value="'.$row['MaNhaCungCap'].'" >'.$row['MaNhaCungCap'].'-'.$row['TenNhaCungCap'].'</option>';
                  }
              }
              ?>
          </select>
        </div>
      </div>
     <div class = "input-add_wrap">
        <label class='styleText-04 label-add' for="mactsp">Mã Chi Tiết Sản Phẩm</label> 
        <input class='input-add' type="text" id="mactsp" value="" disabled> 
     </div>
  
      <div class = "input-add_wrap">
        <label class='styleText-04 label-add' for="gianhap">Giá nhập</label> 
        <input class='input-add' type="text" id="gianhap" value=""> 
      </div>
  
     <div class = "input-add_wrap">
        <label class='styleText-04 label-add' for="soluong">Nhập số lượng</label> 
        <input class='input-add' type="number" name="" id="soluong" class="content__input-number" value="1"  min="1" >
     </div> 
  
     <div class = "input-add_wrap">
        <label class='styleText-04 label-add' for="thanhtien">Thành tiền</label> 
        <input class='input-add' type="text" id="thanhtien" value="0" disabled> 
     </div>
  
     <div class = "input-add_wrap">
        <label class='styleText-04 label-add' for="tongtien">Tổng tiền</label> 
        <input class='input-add' type="text" id="tongtien" value="0" disabled> 
     </div>
  
     <div class = "input-add_wrap">
        <label class='styleText-04 label-add' for="nhanvien">Nhập Mã Nhân Viên</label> 
        <input class='input-add' type="text" id="nhanvien" value="<?php echo $manv?>" readonly> 
     </div>
  
      
  
     <div class = "input-add_wrap">
        <button class="btn" type = "button" onclick="them()">Thêm</button>
        <button class="btn" type = "button" onclick="Nhaphang()">Nhập Hàng</button>
     </div>
      
  </form>
  <div class="table_product">
    <div>
        <h1 class="styleText-03">Chọn Chi tiết Sản Phẩm</h1>
    </div>
    <!-- <div class="search">
        <input type="text" id="txtFind" style="min-width: 300px;" placeholder="Tìm kiếm theo Mã hoặc tên nhóm quyền">
        <input type="button" id="btnSearch" value="Tìm Kiếm">
    </div> -->

   
    <div class="search">
      <input type="text" class="input_search" id="txtFind" placeholder="Tìm kiếm theo Mã hoặc Tên">
      <label class="btn btn_search" for="btnSearch">
        <i class='bx bx-search'></i>
        <input type="button" id="btnSearch" value="" hidden>
      </label>
    </div>
    
    

    <div class="table_scroll">
      <table class="table">
          
          
          <thead>
            <tr>
              <th>Hình ảnh</th>
              <th>ID
                <button value="MaChiTietSanPham" onclick="getArrange(this)">^</button>
              </th>
              <th>
                Tên           
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
    </div>
  </div>
</div>

<div class="form_bottom">
  <h1 class="styleText-03">Danh sách sản phẩm nhập</h1>
  
 <div class="table_scroll-bottom">
    <table class="table">
        
        <thead>
            <tr>
            
              <th>ID</th>
              <th>ID SP</th>
              <th>Số lượng</th>
              <th>Giá Nhập</th>
              <th>Thành Tiền</th>
              <th>Thao tác</th>
            
            </tr>
        </thead>
        
        <tbody class="table-group-divider row-table1">
        </tbody>
    </table>
 </div>
</div>
<br>
    

<!-- <script src="http://localhost/WebBanHangMoHinhMVC/public/script/manage/QuanlySPJS.js"></script> -->
<script>
    var arrange="ASC";
    var properties="MaChiTietSanPham";
    var arr=[];
    var tmpKey = "";
    var index = 1;
    var size = 4;
    var masp="";
    var mactsp="";
    $(document).ready(function(){
        
        document.getElementById('mactsp').value=" ";        
        //gianhap(masp);  
        //thay đổi sản phẩm      
        // $('#sanpham').on('change',(e)=>{
        //     e.preventDefault();
        //     masp=$('#sanpham').val();
        //     index = 1;
        //     size = 4;
        //     document.getElementById('mactsp').value=" ";
            
        //     const Item = arr.find(item => item.masp === masp);
        //     if (Item) {
        //       document.getElementById('gianhap').disabled = true;
        //       document.getElementById('gianhap').value=Item.gn;
        //     } else {
        //       document.getElementById('gianhap').disabled = false;
        //       gianhap(masp);
        //     }
        //     loadTable("", index, size);

        // });
        
        $('#soluong').on('change', (event) => {
           sl =$('#soluong').val();
           gn =$('#gianhap').val();
          document.getElementById('thanhtien').value=parseInt(sl)*parseInt(gn);
        });
        $('#gianhap').on('keyup', (event) => {
           sl =$('#soluong').val();
           gn =$('#gianhap').val();
          document.getElementById('thanhtien').value=parseInt(sl)*parseInt(gn);
        });
        loadTable("", index, size,arrange,properties);
});


function getArrange(ojt){
  //alert(ojt.value);
  //arrange=ojt.value;
  properties=ojt.value;
  if(arrange=="DESC")
    arrange="ASC"
  else arrange="DESC"
  loadTable("", index, size,arrange,properties);
  loadPhanTrang("chitietsanpham", index, size, sql, "");
  
}
function gianhap(masp){
  $.ajax({
  url: "http://localhost/WebBanHangMoHinhMVC/AjaxSanPham/getgianhap",
  type: "post",
  dataType: "html",
  data: {
    
    masp : masp
  },
  success: function(data) {
    
    document.getElementById('gianhap').value=data;
     sl =$('#soluong').val();
     gn =document.getElementById('gianhap').value;
    document.getElementById('thanhtien').value=parseInt(sl)*parseInt(gn);
  }
})
}
function loadTable(key, index, size,arrange,properties) {
  $.ajax({
    url: "http://localhost/WebBanHangMoHinhMVC/AjaxCTSP/getDanhSach",
    type: "post",
    dataType: "html",
    data: {
      key: tmpKey,
      index: index,
      size: size,
      masp : masp,
      arrange:arrange,
      properties:properties
    },
    success: function(data) {
      $(".row-table").html(data)
    }
  })
}
$(document).on("click", "#btnSearch", function() {
  var key = $("#txtFind").val();
  index = 1;
  size = 4;
  tmpKey = key;
  $.ajax({
    url: 'http://localhost/WebBanHangMoHinhMVC/AjaxCTSP/getDanhSach',
    type: 'post',
    dataType: 'html',
    data: {
      key: key,
      index: index,
      size: size,
      masp : masp,
      arrange:arrange,
      properties:properties
    },
    success: function(data) {
      console.log(data)
      $(".row-table").html(data)
    }
  })
})
function loadID(ojt){
    document.getElementById('mactsp').value=ojt.id;
    
}
function them(){
  // masp=$('#sanpham').val();
  mactsp=$("#mactsp").val();
  sl=$("#soluong").val();
  gn=$("#gianhap").val();
  var tt=$("#thanhtien").val();
  if(document.getElementById('mactsp').value!=" "){
  //Hàm này trả về phần tử đầu tiên trong mảng thỏa mãn điều kiện. Nếu tìm thấy, bạn cập nhật lại soluong
    const existingItem = arr.find(item => item.mactsp === mactsp);
    if (existingItem) {
        existingItem.sl = sl;
        existingItem.tt = tt;
    } else {
        arr.push({ mactsp: mactsp,masp:masp,sl: sl,gn: gn,tt:tt });
    }
    //arr.push({ masp: mactsp,sl: sl,gn: gn,tt:tt});
    // alert(JSON.stringify(arr));
    $.ajax({
      url: 'http://localhost/WebBanHangMoHinhMVC/AjaxCTPN/getDanhSach',
      type: 'post',
      dataType: 'JSON',
      data: {
        arr: arr
      },
      success: function(data) {
        
        $(".row-table1").html(data.html);
        document.getElementById('tongtien').value=data.tongtien;
        //alert(data);
      }
    })
    const Item = arr.find(item => item.masp === masp);
    if (Item) {
      document.getElementById('gianhap').disabled = true;
    } else {
      document.getElementById('gianhap').disabled = false;
    }
  }
else{
  // alert("bạn chưa chọn chi tiết sản phẩm");
  swal({
    title: "Lỗi! bạn chưa chọn chi tiết sản phẩm!",
    text: "Nhấn vào nút để tiếp tục!",
    icon: "error",
  })
} 

}
function XoaCTPN(ojt){
  var mactsp=ojt.id;
  const indexToRemove = arr.findIndex(item => item.mactsp === mactsp);
  if (indexToRemove !== -1) {
      arr.splice(indexToRemove, 1); // Xóa 1 phần tử từ vị trí indexToRemove
  }
  $.ajax({
    url: 'http://localhost/WebBanHangMoHinhMVC/AjaxCTPN/getDanhSach',
    type: 'post',
    dataType: 'JSON',
    data: {
      arr: arr
    },
    success: function(data) {
      
      $(".row-table1").html(data.html);
      document.getElementById('tongtien').value=data.tongtien;
      //alert(data);
    }
  })
  const Item = arr.find(item => item.masp === masp);
  if (Item) {
    document.getElementById('gianhap').disabled = true;
  } else {
    document.getElementById('gianhap').disabled = false;
  }
}

function Nhaphang(){
  var ncc=document.getElementById('ncc').value;
  if(arr.length==0 ){
    // alert("Bạn chưa chọn sản phẩm để nhập hàng");
     swal({
        title: "Lỗi! Bạn chưa chọn sản phẩm để nhập hàng",
        text: "Nhấn vào nút để tiếp tục!",
        icon: "error",
      })
  }
  else if(ncc==""){
    // alert("Bạn chưa chọn nhà cung cấp");
     swal({
        title: "Lỗi! Bạn chưa chọn nhà cung cấp!",
        text: "Nhấn vào nút để tiếp tục!",
        icon: "error",
      })
  }
  else {
  var mapn=document.getElementById('mapn').value;
  var today = new Date();
  var ngaynhap = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();
  var tongtien=document.getElementById('tongtien').value;

  var manv=document.getElementById('nhanvien').value;
  //alert(mapn+" "+ngaynhap+" "+tongtien+" "+ncc+" "+manv);
  //alert(JSON.stringify(arr));
  $.ajax({
    url: 'http://localhost/WebBanHangMoHinhMVC/AjaxPhieuNhap/NhapHang',
    type: 'post',
    dataType: 'html',
    data: {
      arr: arr,
      mapn:mapn,
      ngaynhap:ngaynhap,
      tongtien:tongtien,
      ncc:ncc,
      manv:manv
    },
    success: function(data) {
      // alert(data);
      // alert("Nhap hang thanh cong");
      var url = "http://localhost/WebBanHangMoHinhMVC/admin/default/NhapHangPage";
      swal({
        title: "Nhap hang thanh cong!",
        text: "Nhấn vào nút để tiếp tục!",
        icon: "success",
      }).then(function(){
        window.location.assign(url);
      })
      
      //        window.location.assign(url);
    }
  })
}

}

function change(ojt){
  //alert(ojt.id);
  masp=ojt.id;
  index = 1;
  size = 4;
  document.getElementById('mactsp').value=" ";
  
  const Item = arr.find(item => item.masp === masp);
  if (Item) {
    document.getElementById('gianhap').disabled = true;
    document.getElementById('gianhap').value=Item.gn;
  } else {
    document.getElementById('gianhap').disabled = false;
    gianhap(masp);
  }
  loadTable("", index, size,arrange,properties);
}

</script>
