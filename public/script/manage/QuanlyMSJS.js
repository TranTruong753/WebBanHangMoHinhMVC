function addMS(){
    // var tenchatlieu=" ";
    var tenmausac=document.getElementById("tenmausac").value;
    if(!tenmausac){
        // alert("Không được để trống tên màu sắc");
        swal({
            title: "Lôi! Không được để trống tên màu sắc",
            text: "Nhấn vào nút để tiếp tục!",
            icon: "error",
        })
    }else {
      $.post("http://localhost/WebBanHangMoHinhMVC/AjaxMauSac/InsertMS",{tenms: tenmausac},function(data){
        // alert(data);
        // alert(data.length);
        var url = "http://localhost/WebBanHangMoHinhMVC/admin/container/MauSacPage";
        // window.location.assign(url);
        if(data.length >= 5){
                // alert(data);
                swal({
                    title: "Thêm thành công!",
                    text: "Nhấn vào nút để tiếp tục!",
                    icon: "success",
                }).then(function () {
                    window.location.assign(url);
                })
            }else {
                swal({
                    title: "Thêm thất bại!",
                    text: "Nhấn vào nút để tiếp tục!",
                    icon: "error",
                })
            }    
      });
    }
   
    }

function UpdateMS(){
    // var tenchatlieu=" ";
    var mamausac=document.getElementById("mamausac").value;
    var tenmausac=document.getElementById("tenmausac").value;
    if(!tenmausac){
        // alert("Không được để trống tên màu sắc");
        swal({
            title: "Lôi! Không được để trống tên màu sắc",
            text: "Nhấn vào nút để tiếp tục!",
            icon: "error",
        })
    }else {
      $.post("http://localhost/WebBanHangMoHinhMVC/AjaxMauSac/UpdateMS",{mams: mamausac,tenms: tenmausac},function(data){
        // alert(data);
        // alert(data.length);
        var url = "http://localhost/WebBanHangMoHinhMVC/admin/container/MauSacPage";
        // window.location.assign(url);
        if(data.length >= 5){
                    // alert(data);
                    swal({
                        title: "Cập nhật thành công!",
                        text: "Nhấn vào nút để tiếp tục!",
                        icon: "success",
                    }).then(function () {
                        window.location.assign(url);
                    })
                }else {
                    swal({
                        title: "Cập nhật thất bại!",
                        text: "Nhấn vào nút để tiếp tục!",
                        icon: "error",
                    })
                }
    });
    }
  
    }

    var tmpKey = "";
    var index = 1;
    var size = 4;
    var sql="";
  
  
     // load khi chạy trang
     $(document).ready(function() {
      index = 1;
      size = 4;
      loadTable("", index, size)
      loadPhanTrang("mausac", index, size, sql, "");
  
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
   function loadTable(key, index, size) {
      $.ajax({
        url: "http://localhost/WebBanHangMoHinhMVC/AjaxMauSac/getDanhSachMS",
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
        url: "http://localhost/WebBanHangMoHinhMVC/AjaxMauSac/getDanhSachMS",
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
      loadPhanTrang("mausac", index, size, sql, tmpKey);
    })
    //Xử lý khi nhấn nút tìm kiếm
    $(document).on("click", "#btnSearch", function() {
      var key = $("#txtFind").val();
      index = 1;
      size = 4;
      tmpKey = key;
      $.ajax({
        url: 'http://localhost/WebBanHangMoHinhMVC/AjaxMauSac/getDanhSachMS',
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
      loadPhanTrang("mausac", index, size, sql, key);
  
    })
    //xử lý sự kiện khi click vào nút làm tươi
  $(document).on("click", "#btnRefresh", function() {
    document.getElementById("txtFind").value = "";
    var key = "";
    index = 1;
    size = 4;
    tmpKey = "";

    $.ajax({
      url: 'http://localhost/WebBanHangMoHinhMVC/AjaxMauSac/getDanhSachMS',
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

    loadPhanTrang("mausac", index, size, "", key);
  })

    //Xử lý khi nhấn nút xóa
    function btnXoa(obj)
    {
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
                  url: 'http://localhost/WebBanHangMoHinhMVC/AjaxMauSac/DeleteMS',
                  type: 'post',
                  dataType: 'html',
                  data: {
                      mams: ma,
                  },
                  success: function(data) {
                      swal("Dữ liệu đã xóa thành công!", {
                          icon: "success",
                      });
                      // Sau khi xóa thành công, gọi lại hàm loadTable và loadPhanTrang
                      loadTable(tmpKey, index, size);
  
                      loadPhanTrang("mausac", index, size, "", tmpKey);
  
                  }
              });
          } else {
              swal("Dữ liệu của bạn được an toàn!");
          }
      });
    }