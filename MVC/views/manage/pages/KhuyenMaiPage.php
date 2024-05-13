<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<!-- Tiêu Đề -->
<div>
  <h1 class="styleText-01">Quản Lý Khuyến Mãi</h1>
</div>

<div class="search-wrap">
    <div class="search">
      <input type="text" class="input_search" id="txtFind" placeholder="Tìm kiếm theo Mã hoặc Tên">
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
    if ($this->data['Data']['ChiTietQuyenModel']->KiemTraHanhDong('Thêm', $_SESSION['MaNhomQuyen'], $_SESSION['Khuyến Mãi']) == 1) {
    ?>
      <label for="dieuhuong" class="btn btn_add"> 
        <i class='bx bx-plus'></i>
        <input type="button" class="" onclick="DieuHuong()" value="Thêm" id="dieuhuong">
      </label>
    <?php
    }
    ?>
      
    </div>
  </div>

<table class="table">
<style></style>
  <thead>
    <tr>
      <th>ID</th>
      <th>Tên</th>
      <th>Mức Khuyến Mãi</th>
      <th>Trạng Thái</th>
      <th>Thao Tác</th>
    </tr>
  </thead>
  <tbody class="table-group-divider row_table">

    
  </tbody>
</table>
<div class ="PhanTrang"></div>

<script>

var tmpKey = "";
var index  = 1;
var size = 4;
var sql="";

$(document).ready(function() {
    index = 1;
    size = 4;
    loadTable("", index, size)
    loadPhanTrang("khuyenmai", index, size, sql, "");

  })

function btnXoa(obj)
  {
    // var ma = obj.id;

    //   $.ajax({
    //   url: 'http://localhost/WebBanHangMoHinhMVC/AjaxKhuyenMai/delete',
    //   type: 'post',
    //   dataType: 'html',
    //   data: {
    //     ma: ma,
    //   },
    //   success: function(data) {
    //     alert(data);
    //   }
    //  })
    // loadTable(tmpKey,index,size)
    // loadPhanTrang("khuyenmai",index,size,"",tmpKey)

    var ma = obj.id;
    swal({
        title: "Bạn có chắc?",
        text: "Sau khi xóa, bạn sẽ không thể khôi phục tập tin tưởng tượng này!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            $.ajax({
                url: 'http://localhost/WebBanHangMoHinhMVC/AjaxKhuyenMai/delete',
                type: 'post',
                dataType: 'html',
                data: {
                    ma: ma,
                },
                success: function(data) {
                  if(data == true){
                        swal({
                                title: "Dữ liệu đã xóa thành công!",
                                text: "Nhấn vào nút để tiếp tục!",
                                icon: "success",
                        })               
                        // Sau khi xóa thành công, gọi lại hàm loadTable và loadPhanTrang
                        loadTable(tmpKey, index, size);
    
                        loadPhanTrang("khuyenmai", index, size, "", tmpKey);
                      } else{
                        swal({
                                title: "Dữ liệu đã xóa thất bại!(Xung đột dữ liệu)",
                                text: "Nhấn vào nút để tiếp tục!",
                                icon: "error",
                        })                      
                      }
                }
            });
        } else {
            swal("Dữ liệu của bạn được an toàn!");
        }
    });
    
  }

 //hàm load phân trang 
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

  function loadTable(key,index,size)
{
  $.ajax({
    url:"http://localhost/WebBanHangMoHinhMVC/AjaxKhuyenMai/getDanhSachKM",
    type:"post",
    dataType: "html",
    data:{
      key: tmpKey,
      index: index,
      size: size
    },
    success:function(data){
      console.log(data)
      $(".row_table").html(data);
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
  url: "http://localhost/WebBanHangMoHinhMVC/AjaxKhuyenMai/getDanhSachKM",
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
loadPhanTrang("khuyenmai", index, size, sql, tmpKey);
})
//Xử lý khi nhấn nút tìm kiếm
$(document).on("click", "#btnSearch", function() {
 tmpKey = $("#txtFind").val();
 var key =tmpKey;
index = 1;
size = 4;
tmpKey = key;
$.ajax({
  url: 'http://localhost/WebBanHangMoHinhMVC/AjaxKhuyenMai/getDanhSach',
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
loadPhanTrang("khuyenmai", index, size, "", key);

    //Xử lý khi nhấn nút tìm kiếm
    $(document).on("click", "#btnSearch", function() {
        var key = $("#txtFind").val();
        index = 1;
        size = 4;
        tmpKey = key;
        $.ajax({
        url: 'http://localhost/WebBanHangMoHinhMVC/AjaxKhuyenMai/getDanhSachKM',
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
        loadPhanTrang("khuyenmai", index, size, sql, key);
    
    })

//xử lý sự kiện khi click vào nút làm tươi
$(document).on("click", "#btnRefresh", function() {
document.getElementById("txtFind").value = "";
var key = "";
index = 1;
size = 4;
tmpKey = "";

$.ajax({
  url: 'http://localhost/WebBanHangMoHinhMVC/AjaxKhuyenMai/getDanhSachKM',
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

loadPhanTrang("khuyenmai", index, size, "", key);
})

// Hàm Đổi Trạng Thái của Nhóm Quyền khi tick vào check box Trạng Thái
function DoiTrangThaiKhuyenMai(obj) {
var ma = obj.id;
var checkBox = document.getElementById(ma)
// var result = confirm("Bạn có muốn đổi trạng thái?");
// if (result == true) {
  if (checkBox.checked == true) {
    var trangThai = 1;
    $.post("http://localhost/WebBanHangMoHinhMVC/AjaxKhuyenMai/DoiTrangThai", {
      ma: ma,
      trangThai: trangThai
    }, function(data) {

      // alert(data);
    })
  } else {
    var trangThai = 0;
    $.post("http://localhost/WebBanHangMoHinhMVC/AjaxKhuyenMai/DoiTrangThai", {
      ma: ma,
      trangThai: trangThai
    }, function(data) {
      // alert(data);
    })
//   }
}
loadTable(tmpKey, index, size)
loadPhanTrang("khuyenmai", index, size, "", tmpKey)


}
function DieuHuong() {
  window.location = "http://localhost/WebBanHangMoHinhMVC/Admin/default/ThemKhuyenMaiPage";
}
</script>