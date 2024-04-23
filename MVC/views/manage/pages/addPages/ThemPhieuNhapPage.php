<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<?php
    $sp=$data["DanhSach"]["SP"];
    $pn=$data["DanhSach"]["PN"];
    $ncc=$data["DanhSach"]["NCC"];
    $dem=0;
    if ($pn->num_rows > 0) {
        while ($row = $pn->fetch_assoc()) {
                $dem++;
        }
    }
    
?>
<form method="post">
    <label for="">Mã Phiếu Nhập</label> <br>
    <input type="text" id="mapn" value="PN00<?php echo $dem+1;?>"> <br>
    <label for="">Chọn Sản Phẩm</label><br>
    <select name="" id="sanpham"  class="">
        <?php
        if ($sp->num_rows > 0) {
            while ($row = $sp->fetch_assoc()) {
                    echo '<option onclick="change(this)" value="'.$row['MaSanPham'].'" >'.$row['MaSanPham'].'-'.$row['TenSanPham'].'</option>
                         ';
            }
        }
        ?>
    </select><br>
    
    
    <label for="">Chọn Nhà Cung Cấp</label><br>
    <select name="" id="ncc"  class="" >
        <?php
        if ($ncc->num_rows > 0) {
            while ($row = $ncc->fetch_assoc()) {
                    echo '<option   value="'.$row['MaNhaCungCap'].'" >'.$row['MaNhaCungCap'].'-'.$row['TenNhaCungCap'].'</option>';
            }
        }
        ?>
    </select><br>
    <label for="">Mã Chi Tiết Sản Phẩm</label> <br>
    <input type="text" id="mactsp" value=""> <br>

    <label for="">Giá nhập</label> <br>
    <input type="text" id="gianhap" value=""> <br>

    <label for="">Nhập số lượng</label> <br>
    <input type="number" name="" id="soluong" class="content__input-number" value="1"  min="1" > <br>

    <label for="">Thành tiền</label> <br>
    <input type="text" id="thanhtien" value=""> <br>

    <label for="">Tổng tiền</label> <br>
    <input type="text" id="tongtien" value=""> <br>

    <label for="">Nhập Mã Nhân Viên</label> <br>
    <input type="text" id="nhanvien" value=""> <br>

    

    <button type = "button" onclick="them()">Thêm</button>
    <button type = "button" onclick="Nhaphang()">Nhập Hàng</button>
    
</form>
    <table class="table">
        <style></style>
        <div style="text-align: center;">
        <h1 >Chi tiết Sản Phẩm</h1>
        </div>
        <div class="search">
        <input type="text" id="txtFind" style="min-width: 300px;" placeholder="Tìm kiếm theo Mã hoặc tên nhóm quyền">
        <input type="button" id="btnSearch" value="Tìm Kiếm">
        </div>
        <thead>
            <tr>
            <th scope="col" style="text-align: center;">Hình ảnh</th>
            <th scope="col" style="text-align: center;">ID</th>
            <th scope="col" style="text-align: center;">Tên</th>
            <th scope="col" style="text-align: center;">Màu sắc</th>
            <th scope="col" style="text-align: center;">Kích cở</th>
            <th scope="col" style="text-align: center;">Số lượng tồn</th>
            
            </tr>
        </thead>
        
        <tbody class="table-group-divider row-table">
        </tbody>
    </table>
    <table class="table">
        <style></style>
        <div style="text-align: center;">
        <h1 >Các sp dc nhập</h1>
        <thead>
            <tr>
            
            <th scope="col" style="text-align: center;">ID</th>
            <th scope="col" style="text-align: center;">ID SP</th>
            <th scope="col" style="text-align: center;">Số lượng</th>
            <th scope="col" style="text-align: center;">Giá Nhập</th>
            <th scope="col" style="text-align: center;">Thành Tiền</th>
            
            </tr>
        </thead>
        
        <tbody class="table-group-divider row-table1">
        </tbody>
    </table>
    

<!-- <script src="http://localhost/WebBanHangMoHinhMVC/public/script/manage/QuanlySPJS.js"></script> -->
<script>
    var arr=[];
    var tmpKey = "";
    var index = 1;
    var size = 4;
    var masp="";
    var mactsp="";
    $(document).ready(function(){
        masp=$('#sanpham').val();
        document.getElementById('mactsp').value=" ";        
        gianhap(masp);        
        $('#sanpham').on('change',(e)=>{
            e.preventDefault();
            masp=$('#sanpham').val();
            index = 1;
            size = 4;
            document.getElementById('mactsp').value=" ";
            gianhap(masp);
            loadTable("", index, size);

        });
        
        $('#soluong').on('change', (event) => {
           sl =$('#soluong').val();
           gn =$('#gianhap').val();
          document.getElementById('thanhtien').value=parseInt(sl)*parseInt(gn);
        });
        loadTable("", index, size);
});
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
function loadTable(key, index, size) {
  $.ajax({
    url: "http://localhost/WebBanHangMoHinhMVC/AjaxCTSP/getDanhSach",
    type: "post",
    dataType: "html",
    data: {
      key: tmpKey,
      index: index,
      size: size,
      masp : masp
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
      masp : masp
    },
    success: function(data) {
      console.log(data)
      $(".row-table").html(data)
    }
  })
})
function loadID(ojt){
    document.getElementById('mactsp').value=ojt.value;
    //alert(ojt.id);
}
function them(){
  masp=$('#sanpham').val();
  mactsp=$("#mactsp").val();
  sl=$("#soluong").val();
  gn=$("#gianhap").val();
  var tt=$("#thanhtien").val();
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
}

function Nhaphang(){
  var mapn=document.getElementById('mapn').value;
  var today = new Date();
  var ngaynhap = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();
  var tongtien=document.getElementById('tongtien').value;
  var ncc=document.getElementById('ncc').value;
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
      //alert(data);
      alert("Nhap hang thanh cong");
      var url = "http://localhost/WebBanHangMoHinhMVC/admin/default/NhapHangPage";
             window.location.assign(url);
    }
  })
}
</script>
