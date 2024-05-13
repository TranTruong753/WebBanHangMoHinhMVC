var tmpKey = "";
var index = 1;
var size = 4;
var sql ="INNER JOIN nhacungcap "+
"on phieunhap.MaNhaCungCap= nhacungcap.MaNhaCungCap INNER JOIN nhanvien  "+
"on phieunhap.MaNhanVien= nhanvien.MaNhanVien where nhacungcap.TrangThai=1"
var arrange="ASC";
var properties="MaPhieuNhap";
 // load khi chạy trang
 $(document).ready(function() {
  index = 1;
  size = 4;
  loadTable("", index, size,arrange,properties)
  loadPhanTrang("phieunhap", index, size, sql, "");

})

//hàm load phân trnag 
function loadPhanTrang(tableName, index, size, condition = "", key = "") {
  $.ajax({
    url: "http://localhost/WebBanHangMoHinhMVC/AjaxPhanTrang/getPhanTrang",
    type: "post",
    dataType: "html",
    data: {
      key: key,
      table: tableName,
      condition: condition,
      index: index,
      size: size
    },
    success: function(data) {
      console.log(data)
      $(".PhanTrang").html(data)
    }


  })
}


function btnXoa(obj)
{
  var ma = obj.id;

    $.ajax({
    url: 'http://localhost/WebBanHangMoHinhMVC/AjaxPhieuNhap/XoaDuLieuNhomQuyen',
    type: 'post',
    dataType: 'html',
    data: {
      ma: ma,
    },
    success: function(data) {
      alert(data);
    }
  })
  loadTable("", index, size,arrange,properties)
  loadPhanTrang("phieunhap",index,size,"",tmpKey)
}

function getArrange(ojt){
  //alert(ojt.value);
  //arrange=ojt.value;
  properties=ojt.value;
  if(arrange=="DESC")
    arrange="ASC"
  else arrange="DESC"
  loadTable("", index, size,arrange,properties);
  loadPhanTrang("phieunhap", index, size, sql, "");
  
}
function loadTable(key, index, size,arrange,properties) {
  $.ajax({
    url: "http://localhost/WebBanHangMoHinhMVC/AjaxPhieuNhap/getDanhSach",
    type: "post",
    dataType: "html",
    data: {
      key: tmpKey,
      index: index,
      size: size,
      arrange:arrange,
      properties:properties
    },
    success: function(data) {
      $(".row-table").html(data)
    }
  })
}
function btnRefresh(){
  document.getElementById("txtFind").value = "";
  tmpKey = "";
  index = 1;
  size = 4;
  arrange="ASC";
  properties="MaPhieuNhap";
  loadTable("", index, size,arrange,properties)
  loadPhanTrang("phieunhap", index, size, sql, "");
}


//Xử llys sự kiện khi nhấn bào nút phân trang
$(document).on("click", ".btnPhanTrang", function() {

  // alert(this.id)
  var arr = this.id.split("/");
  index = arr[0];
  size = arr[1];
  //xử lý thay đổi bảng khi nhấn vào phân trang
  $.ajax({
    url: "http://localhost/WebBanHangMoHinhMVC/AjaxPhieuNhap/getDanhSach",
    type: "post",
    dataType: "html",
    data: {
      key: tmpKey,
      index: index,
      size: size,
      arrange:arrange,
      properties:properties
    },
    success: function(data) {
      $(".row-table").html(data)
    }
  })
  // xử lý số trang đã chọn
  // alert(tmpKey)
  loadPhanTrang("phieunhap", index, size, sql, tmpKey);
})
//Xử lý khi nhấn nút tìm kiếm
$(document).on("click", "#btnSearch", function() {
  var key = $("#txtFind").val();
  index = 1;
  size = 4;
  tmpKey = key;
  $.ajax({
    url: 'http://localhost/WebBanHangMoHinhMVC/AjaxPhieuNhap/getDanhSach',
    type: 'post',
    dataType: 'html',
    data: {
      key: key,
      index: index,
      size: size,
      arrange:arrange,
      properties:properties
    },
    success: function(data) {
      console.log(data)
      $(".row-table").html(data)
    }
  })
  // xử lý số trang đã chọn
  loadPhanTrang("phieunhap", index, size, sql, key);

})