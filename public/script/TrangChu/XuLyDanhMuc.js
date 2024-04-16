var chungloai= "";
var theloai=  "";
var timkiem=  "";
var Tensp= "";
var tmpKey = "";
var index = 1;
var size = 4;
var sqlCL="";
var sqlTL="";
$(document).ready(function(){
    //alert(1);
     chungloai= document.getElementById("chungloai").value;
     theloai= document.getElementById("theloai").value;
     timkiem= document.getElementById("tiemkiem").value;
     Tensp=timkiem.replaceAll("_", " ");
    //alert(timkiem);
    if(chungloai== "none" && theloai != "none"){
       
        loadTableTL(tmpKey, index, size);
        sqlTL="INNER JOIN sanpham on chitietsanpham.MaSanPham= sanpham.MaSanPham  where sanpham.MaTheLoai ='"+theloai+"'"+
        " AND sanpham.TrangThai= 1 and chitietsanpham.TrangThai= 1 ";
        loadPhanTrangTL("chitietsanpham", index, size, sqlTL, tmpKey);

    }
    else if(chungloai != "none" && theloai == "none"){
        //alert(chungloai);
        sqlCL="INNER JOIN sanpham on chitietsanpham.MaSanPham= sanpham.MaSanPham INNER JOIN theloai on sanpham.MaTheLoai=theloai.MaTheLoai"+
        " INNER JOIN chungloai on chungloai.MaChungLoai=theloai.MaChungLoai "+
        " where chungloai.MaChungLoai ='"+chungloai+"' AND sanpham.TrangThai= 1 and chitietsanpham.TrangThai= 1 ";
        loadPhanTrangCL("chitietsanpham", index, size, sqlCL, tmpKey);
        loadTableCL(tmpKey, index, size);

    }
    else {
        $.post("http://localhost/WebBanHangMoHinhMVC/Ajax/TimSP",{tensp : Tensp},function(data){
        document.getElementById("search-form__input").value = Tensp;
        $("#product__lista").html(data);

     });

     }
    
    
})

function getSP(ojt){
    
     chungloai = ojt.id;
    alert(chungloai);
    var Tieude =document.getElementById(chungloai).innerText;
    
    sqlCL="INNER JOIN sanpham on chitietsanpham.MaSanPham= sanpham.MaSanPham INNER JOIN theloai on sanpham.MaTheLoai=theloai.MaTheLoai"+
        " INNER JOIN chungloai on chungloai.MaChungLoai=theloai.MaChungLoai "+
        " where chungloai.MaChungLoai ='"+chungloai+"' AND sanpham.TrangThai= 1 and chitietsanpham.TrangThai= 1 ";
        
        loadTableCL(tmpKey, index, size);
        loadPhanTrangCL("chitietsanpham", index, size, sqlCL, tmpKey);
    

};

function getTL(ojt){
     theloai = ojt.id;
    alert(theloai);
    var Tieude =document.getElementById(theloai).innerText;
    
    loadTableTL(tmpKey, index, size);
    sqlTL="INNER JOIN sanpham on chitietsanpham.MaSanPham= sanpham.MaSanPham  where sanpham.MaTheLoai ='"+theloai+"'"+
    " AND sanpham.TrangThai= 1 and chitietsanpham.TrangThai= 1 ";
    loadPhanTrangTL("chitietsanpham", index, size, sqlTL, tmpKey);
    
    

};




 // load khi chạy trang
//  $(document).ready(function() {
//   index = 1;
//   size = 4;
//   loadTable("", index, size)
//   loadPhanTrang("chitietsanpham", index, size, sql, "");

// })


function loadTableTL(key, index, size) {
  $.ajax({
    url: "http://localhost/WebBanHangMoHinhMVC/Ajax/GetSPtheoTL",
    type: "post",
    dataType: "html",
    data: {
      key: tmpKey,
      index: index,
      size: size,
      tl : theloai
    },
    success: function(data) {
        $("#product__lista").html(data);
    }
  })
}
function loadTableCL(key, index, size) {
    
    $.ajax({
      url: "http://localhost/WebBanHangMoHinhMVC/Ajax/GetSPtheoCL",
      type: "post",
      dataType: "html",
      data: {
        key: tmpKey,
        index: index,
        size: size,
        cl : chungloai
      },
      success: function(data) {
         $("#product__lista").html(data);
        //alert(data);
      }
    })
  }


//Xử llys sự kiện khi nhấn bào nút phân trang
$(document).on("click", ".btnPhanTrangCL", function() {

  // alert(this.id)
  var arr = this.id.split("/");
  index = arr[0];
  size = arr[1];
  //xử lý thay đổi bảng khi nhấn vào phân trang
  $.ajax({
    url: "http://localhost/WebBanHangMoHinhMVC/Ajax/GetSPtheoCL",
    type: "post",
    dataType: "html",
    data: {
      key: tmpKey,
      index: index,
      size: size,
      cl : chungloai
      
    },
    success: function(data) {
        $("#product__lista").html(data);
    }
  })
  // xử lý số trang đã chọn
  // alert(tmpKey)
  loadPhanTrang("chitietsanpham", index, size, sql, tmpKey);
})

$(document).on("click", ".btnPhanTrangTL", function() {

    // alert(this.id)
    var arr = this.id.split("/");
    index = arr[0];
    size = arr[1];
    //xử lý thay đổi bảng khi nhấn vào phân trang
    $.ajax({
      url: "http://localhost/WebBanHangMoHinhMVC/Ajax/GetSPtheoTL",
      type: "post",
      dataType: "html",
      data: {
        key: tmpKey,
        index: index,
        size: size,
        tl : theloai
        
      },
      success: function(data) {
          $("#product__lista").html(data);
      }
    })
    // xử lý số trang đã chọn
    // alert(tmpKey)
    loadPhanTrang("chitietsanpham", index, size, sql, tmpKey);
  })
//Xử lý khi nhấn nút tìm kiếm
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
      $("#product__lista").html(data);
    }
  })
  // xử lý số trang đã chọn
  loadPhanTrang("chitietsanpham", index, size, sql, key);

})
function loadPhanTrangCL(tableName, index, size, condition = "", key = "") {
    $.ajax({
      url: "http://localhost/WebBanHangMoHinhMVC/AjaxPhanTrangSP/getPhanTrangCL",
      type: "post",
      dataType: "html",
      data: {
        key: key,
        table: tableName,
        condition: condition,
        index: index,
        size: size,
        
      },
      success: function(data) {
        console.log(data)
        $(".PhanTrang").html(data)
      }
  
  
    })
  }

  function loadPhanTrangTL(tableName, index, size, condition = "", key = "") {
    $.ajax({
      url: "http://localhost/WebBanHangMoHinhMVC/AjaxPhanTrangSP/getPhanTrangTL",
      type: "post",
      dataType: "html",
      data: {
        key: key,
        table: tableName,
        condition: condition,
        index: index,
        size: size,
        
      },
      success: function(data) {
        console.log(data)
        $(".PhanTrang").html(data)
      }
  
  
    })
  }