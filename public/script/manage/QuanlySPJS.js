function addSP(){
    var masanpham=document.getElementById("masanpham").value;
    var tensanpham=" ";
    var giasanpham= " ";
    giasanpham=document.getElementById("giasanpham").value;
    tensanpham=document.getElementById("tensanpham").value;
    if(!tensanpham){
        alert("Không được để trống tên sản phẩm");
    } else if(!giasanpham){
        alert("Không được để trống giá sản phẩm");
    }
    else if(isNaN(giasanpham)== true){
        alert("Giá sản phẩm không hợp lý");
    }
    else {
    var machatlieu=document.getElementById("chatlieu").value;
    var matheloai=document.getElementById("theloai").value;
    $.post("http://localhost/WebBanHangMoHinhMVC/AjaxSanPham/InsertSP",{masp : masanpham, tensp: tensanpham, giasp: giasanpham,machatlieu: machatlieu,
    matheloai : matheloai},function(data){
        alert("Thêm thành công");
        var url = "http://localhost/WebBanHangMoHinhMVC/admin/container/SanPhamPage";
                window.location.assign(url);
    });
    }
}
function XoaSP(ojt)
  { 
    let choice = confirm("Bạn có chắc muốn xóa không!");
    if (choice) {
        var masp=ojt.id;
    //alert($masp);
    $.post("http://localhost/WebBanHangMoHinhMVC/AjaxSanPham/DeleteSP",{masp : masp},function(data){
        if(data.length==6){
            alert("Xóa thành công");
            var url = "http://localhost/WebBanHangMoHinhMVC/admin/container/SanPhamPage";
             window.location.assign(url);
        }
        else alert(data);
        // var url = "http://localhost/WebBanHangMoHinhMVC/admin/container/SanPhamPage";
        //         window.location.assign(url);
    });
    } else {
        alert("Yêu cầu xóa đã hủy");
    }
    
  }



  var tmpKey = "";
  var index = 1;
  var size = 4;


   // load khi chạy trang
   $(document).ready(function() {
    index = 1;
    size = 4;
    loadTable("", index, size)
    loadPhanTrang("sanpham", index, size, "", "");

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
      url: 'http://localhost/WebBanHangMoHinhMVC/AjaxSanPham/XoaDuLieuNhomQuyen',
      type: 'post',
      dataType: 'html',
      data: {
        ma: ma,
      },
      success: function(data) {
        alert(data);
      }
    })
    loadTable(tmpKey,index,size)
    loadPhanTrang("sanpham",index,size,"",tmpKey)
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
    loadPhanTrang("sanpham", index, size, "", tmpKey);
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
    loadPhanTrang("sanpham", index, size, "", key);

  })

  