


function addSP(){
    var masanpham=document.getElementById("masanpham").value;
    var tensanpham=" ";
    var gianhap= " ";
    
    gianhap=document.getElementById("gianhap").value;
    tensanpham=document.getElementById("tensanpham").value;
    if(!tensanpham){
        alert("Không được để trống tên sản phẩm");
    } else if(!gianhap){
        alert("Không được để trống giá nhập");
    }
    else if(isNaN(gianhap)== true){
        alert("Giá sản phẩm không hợp lý");
    }
    else {
      
    var machatlieu=document.getElementById("chatlieu").value;
    var matheloai=document.getElementById("theloai").value;
    var khuyenmai=document.getElementById("khuyenmai").value;
    $.post("http://localhost/WebBanHangMoHinhMVC/AjaxSanPham/InsertSP",{masp : masanpham, tensp: tensanpham, gianhap: gianhap,machatlieu: machatlieu,
    matheloai : matheloai,khuyenmai:khuyenmai},function(data){
        alert("Thêm thành công");
        var url = "http://localhost/WebBanHangMoHinhMVC/admin/container/SanPhamPage";
                window.location.assign(url);
        //alert(data);
    });
    }
}

function updateSP(){
  var masanpham=document.getElementById("masanpham").value;
    var tensanpham=" ";
    gianhap=document.getElementById("gianhap").value;
    tensanpham=document.getElementById("tensanpham").value;
    if(!tensanpham){
        alert("Không được để trống tên sản phẩm");
    } else if(!gianhap){
        alert("Không được để trống giá nhập");
    }
    else if(isNaN(gianhap)== true){
        alert("Giá sản phẩm không hợp lý");
    }
    else {
      
    var machatlieu=document.getElementById("chatlieu").value;
    var matheloai=document.getElementById("theloai").value;
    var khuyenmai=document.getElementById("khuyenmai").value;
    $.post("http://localhost/WebBanHangMoHinhMVC/AjaxSanPham/UpdateSP",{masp : masanpham, tensp: tensanpham, gianhap: gianhap,machatlieu: machatlieu,
    matheloai : matheloai,khuyenmai:khuyenmai},function(data){
        alert("Cập nhật thành công");
        var url = "http://localhost/WebBanHangMoHinhMVC/admin/container/SanPhamPage";
                window.location.assign(url);
        //alert(data);
    });
    }

}
function XoaSP(ojt)
  { 
    let choice = confirm("Lưu ý: sản phẩm này sẽ bị xóa hoàn toàn.Bạn có chắc muốn xóa không!");
    if (choice) {
        var masp=ojt.id;
        //alert(masp);
        $.ajax({
          url: "http://localhost/WebBanHangMoHinhMVC/AjaxSanPham/DeleteSP",
          type: "post",
          dataType: "JSON",
          data: {

            masp : masp
          },
          success: function(data) {
            //alert(data.kq);
            if(data.kq== true){
              alert("xoa thanh cong");
              
              loadTable(tmpKey,index,size)
              loadPhanTrang("sanpham",index,size,sql,tmpKey)
            }
            else {alert("xoa that bai");}
          }
        })
    } else {
        alert("Yêu cầu xóa đã hủy");
    }
    
  }



  var tmpKey = "";
  var index = 1;
  var size = 4;
  var sql=" INNER JOIN theloai on  sanpham.MaTheLoai=theloai.MaTheLoai"+  
  " INNER JOIN chatlieu on sanpham.MaChatLieu = chatlieu.MaChatLieu"+  
  " INNER JOIN thuonghieu on sanpham.MaThuongHieu = thuonghieu.MaThuongHieu"+
  " INNER JOIN khuyenmai on sanpham.MaKhuyenMai = khuyenmai.MaKhuyenMai";


   // load khi chạy trang
   $(document).ready(function() {
    index = 1;
    size = 4;
    loadTable("", index, size)
    loadPhanTrang("sanpham", index, size, sql, "");

  })
  function Lamtuoi(){

    
    document.getElementById("txtFind").value = "";
    tmpKey = "";
      index = 1;
      size = 4;
      loadTable("", index, size)
      loadPhanTrang("sanpham", index, size, sql, "");
  
  }
  function DoiTrangThaiSP(ojt){
    var masp = ojt.id;
    var checkBox = document.getElementById(masp);
    var result = confirm("Bạn có muốn đổi trạng thái?");
    if (result == true) {
      if (checkBox.checked == true) {
        var trangThai = 1;
        $.post("http://localhost/WebBanHangMoHinhMVC/AjaxSanPham/DoiTrangThai", {
          masp: masp,
          trangThai: trangThai
        }, function(data) {
          // alert(data);
        })
      } else {
        var trangThai = 0;
        $.post("http://localhost/WebBanHangMoHinhMVC/AjaxSanPham/DoiTrangThai", {
          masp: masp,
          trangThai: trangThai
        }, function(data) {
          // alert(data);
        })
      }
      
    }
    loadTable("", index, size)
    loadPhanTrang("sanpham", index, size, sql, tmpKey)
  
  }

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
 function loadTable(key, index, size) {
    $.ajax({
      url: "http://localhost/WebBanHangMoHinhMVC/AjaxSanPham/getDanhSach",
      type: "post",
      dataType: "html",
      data: {
        key: tmpKey,
        index: index,
        size: size
      },
      success: function(data) {
        $(".row-table").html(data)
      }
    })
  }


  //Xử llys sự kiện khi nhấn bào nút phân trang
  $(document).on("click", ".btnPhanTrang", function() {

    // alert(this.id)
    var arr = this.id.split("/");
    index = arr[0];
    size = arr[1];
    //xử lý thay đổi bảng khi nhấn vào phân trang
    $.ajax({
      url: "http://localhost/WebBanHangMoHinhMVC/AjaxSanPham/getDanhSach",
      type: "post",
      dataType: "html",
      data: {
        key: tmpKey,
        index: index,
        size: size
      },
      success: function(data) {
        $(".row-table").html(data)
      }
    })
    // xử lý số trang đã chọn
    // alert(tmpKey)
    loadPhanTrang("sanpham", index, size, sql, tmpKey);
  })
  //Xử lý khi nhấn nút tìm kiếm
  $(document).on("click", "#btnSearch", function() {
    var key = $("#txtFind").val();
    index = 1;
    size = 4;
    tmpKey = key;
    $.ajax({
      url: 'http://localhost/WebBanHangMoHinhMVC/AjaxSanPham/getDanhSach',
      type: 'post',
      dataType: 'html',
      data: {
        key: key,
        index: index,
        size: size,
      },
      success: function(data) {
        console.log(data)
        $(".row-table").html(data)
      }
    })
    // xử lý số trang đã chọn
    loadPhanTrang("sanpham", index, size, sql, key);

  })

  