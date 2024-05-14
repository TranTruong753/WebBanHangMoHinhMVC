


function addSP(){
    var masanpham=document.getElementById("masanpham").value;
    var tensanpham=" ";
    var gianhap= " ";
    
    gianhap=document.getElementById("gianhap").value;
    tensanpham=document.getElementById("tensanpham").value;
    if(!tensanpham){
        // alert("Không được để trống tên sản phẩm");
        swal({
            title: "Lỗi! Không được để trống tên sản phẩm!",
            text: "Nhấn vào nút để tiếp tục!",
            icon: "error",
        })
    } else if(!gianhap){
        // alert("Không được để trống giá nhập");
        swal({
            title: "Lỗi! Không được để trống giá nhập!",
            text: "Nhấn vào nút để tiếp tục!",
            icon: "error",
        })
    }
    else if(isNaN(gianhap)== true){
        // alert("Giá sản phẩm không hợp lý");
        swal({
            title: "Lỗi! Giá sản phẩm không hợp lý!",
            text: "Nhấn vào nút để tiếp tục!",
            icon: "error",
        })
    }
    else {
      
    var machatlieu=document.getElementById("chatlieu").value;
    var matheloai=document.getElementById("theloai").value;
    var khuyenmai=document.getElementById("khuyenmai").value;
    $.post("http://localhost/WebBanHangMoHinhMVC/AjaxSanPham/InsertSP",{masp : masanpham, tensp: tensanpham, gianhap: gianhap,machatlieu: machatlieu,
    matheloai : matheloai,khuyenmai:khuyenmai},function(data){
        // alert("Thêm thành công");
        var url = "http://localhost/WebBanHangMoHinhMVC/admin/container/SanPhamPage";
        swal({
          title: "Thêm thành công!",
          text: "Nhấn vào nút để tiếp tục!",
          icon: "success",
        }).then(function () {
            window.location.assign(url);
        })
        // window.location.assign(url);
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
        //alert("Không được để trống tên sản phẩm");
        swal({
          title: "Không được để trống tên sản phẩm!",
          text: "Nhấn vào nút để tiếp tục!",
          icon: "success",
        })
    } else if(!gianhap){
        //alert("Không được để trống giá nhập");
        swal({
          title: "Không được để trống giá nhập!",
          text: "Nhấn vào nút để tiếp tục!",
          icon: "success",
        })
    }
    else if(isNaN(gianhap)== true){
        //alert("Giá sản phẩm không hợp lý");
        swal({
          title: "Giá sản phẩm không hợp lý!",
          text: "Nhấn vào nút để tiếp tục!",
          icon: "success",
        })
    }
    else {
      
    var machatlieu=document.getElementById("chatlieu").value;
    var matheloai=document.getElementById("theloai").value;
    var khuyenmai=document.getElementById("khuyenmai").value;
    $.post("http://localhost/WebBanHangMoHinhMVC/AjaxSanPham/UpdateSP",{masp : masanpham, tensp: tensanpham, gianhap: gianhap,machatlieu: machatlieu,
    matheloai : matheloai,khuyenmai:khuyenmai},function(data){
        // alert("Cập nhật thành công");
        var url = "http://localhost/WebBanHangMoHinhMVC/admin/container/SanPhamPage";
        // window.location.assign(url);
        swal({
          title: "Cập nhật thành công!",
          text: "Nhấn vào nút để tiếp tục!",
          icon: "success",
        }).then(function () {
            window.location.assign(url);
        })
        //alert(data);
    });
    }

}
function XoaSP(ojt)
  { 
    // let choice = confirm("Lưu ý: sản phẩm này sẽ bị xóa hoàn toàn.Bạn có chắc muốn xóa không!");
    // if (choice) {
    //     var masp=ojt.id;
    //     //alert(masp);
    //     $.ajax({
    //       url: "http://localhost/WebBanHangMoHinhMVC/AjaxSanPham/DeleteSP",
    //       type: "post",
    //       dataType: "JSON",
    //       data: {

    //         masp : masp
    //       },
    //       success: function(data) {
    //         //alert(data.kq);
    //         if(data.kq== true){
    //           alert("xoa thanh cong");
              
    //           loadTable(tmpKey,index,size,arrange,properties)
    //           loadPhanTrangtest("sanpham",index,size,sql,tmpKey)
    //         }
    //         else {alert("xoa that bai");}
    //       }
    //     })
    // } else {
    //     alert("Yêu cầu xóa đã hủy");
    // }

    swal({
      title: "Bạn có chắc?",
      text: "Sau khi xóa, bạn sẽ không thể khôi phục tập tin tưởng tượng này!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      var masp=ojt.id;
        if (willDelete) {
            $.ajax({
                url: "http://localhost/WebBanHangMoHinhMVC/AjaxSanPham/DeleteSP",
                type: 'post',
                dataType: 'JSON',
                data: {
                  masp : masp
                },
                success: function(data) {                         
                  //alert(data.kq);
                    if(data.kq== true){
                      swal({
                        title: "Dữ liệu đã xóa thành công!",
                        text: "Nhấn vào nút để tiếp tục!",
                        icon: "success",
                      })  ;
                    }
                    else {
                      swal({
                        title: "Dữ liệu đã xóa thất bại!(Xung đột dữ liệu)!",
                        text: "Nhấn vào nút để tiếp tục!",
                        icon: "error",
                      })  ;               
                    }
                  
                    // Sau khi xóa thành công, gọi lại hàm loadTable và loadPhanTrang
                    loadTable(tmpKey,index,size,arrange,properties)
                    loadPhanTrangtest("sanpham",index,size,sql,tmpKey)

                },
                error: function(data){
                  swal({
                    title: "Dữ liệu đã xóa thất bại!(Xung đột dữ liệu)!",
                    text: "Nhấn vào nút để tiếp tục!",
                    icon: "error",
                  })  ;  
                }
            });
        } else {
            swal("Dữ liệu của bạn được an toàn!");
        }
    });
    
  }
  int = 1;
  function changeIcon(classIcon,icon)
  {
    document.getElementsByClassName(classIcon)[0].innerHTML = icon;
  }
  function getArrange(ojt){
    //alert(ojt.value);
    //arrange=ojt.value;
    properties=ojt.value;
    var classIcon = properties+"-icon-order";
    

    if(arrange=="DESC")
      {
        arrange="ASC"
        changeIcon(classIcon,"^")
      }
      
    else 
    {
      arrange="DESC"
      changeIcon(classIcon,"v")
    }
    loadTable("", index, size,arrange,properties);
    loadPhanTrangtest("sanpham", index, size, sql, "");

    
    
  }

  var arrange="ASC";
  var properties="MaSanPham";
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
    
    loadTable("", index, size,arrange,properties)
    loadPhanTrangtest("sanpham", index, size, sql, "");

  })
  function btnRefresh(){

    
    document.getElementById("txtFind").value = "";
    tmpKey = "";
      index = 1;
      size = 4;
      arrange="ASC";
      properties="MaSanPham";
      loadTable("", index, size,arrange,properties)
      loadPhanTrangtest("sanpham", index, size, sql, "");
  
  }
  function DoiTrangThaiSP(ojt){
    var masp = ojt.id;
    var checkBox = document.getElementById(masp);
    // var result = confirm("Bạn có muốn đổi trạng thái?");
    // if (result == true) {
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
      
    // }
    // loadTable("", index, size)
    // loadPhanTrang("sanpham", index, size, sql, tmpKey)
  
  }

  //hàm load phân trnag 
  function loadPhanTrangtest(tableName, index, size, condition = "", key = "") {
    $.ajax({
      url: "http://localhost/WebBanHangMoHinhMVC/AjaxPhanTrang/getPhanTrang",
      type: "post",
      dataType: "html",
      data: {
        //arrange:arrange,
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
 function loadTable(key, index, size,arrange,properties) {
    $.ajax({
      url: "http://localhost/WebBanHangMoHinhMVC/AjaxSanPham/getDanhSach",
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
        arrange:arrange,
        properties:properties
      },
      success: function(data) {
        console.log(data)
        $(".row-table").html(data)
      }
    })
    // xử lý số trang đã chọn
    loadPhanTrang("sanpham", index, size, sql, key);

  })

  