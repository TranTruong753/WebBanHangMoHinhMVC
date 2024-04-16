function addNCC(){
    // var tenchatlieu=" ";
    var tennhacungcap=document.getElementById("tennhacungcap").value;
    var sodienthoai=document.getElementById("sodienthoai").value;
    var diachi=document.getElementById("diachi").value;
    if(!tennhacungcap){
        alert("Không được để trống tên nhà cung cấp");
    } 
    $.post("http://localhost/WebBanHangMoHinhMVC/AjaxNhaCungCap/InsertNCC",{tenncc: tennhacungcap,sdt: sodienthoai,dc: diachi},function(data){
        alert(data);
        var url = "http://localhost/WebBanHangMoHinhMVC/admin/container/NhaCungCapPage";
                window.location.assign(url);
    });
    }
    function UpdateNCC(){
        // var tenchatlieu=" ";
        var manhacungcap=document.getElementById("manhacungcap").value;
        var tennhacungcap=document.getElementById("tennhacungcap").value;
        var sodienthoai=document.getElementById("sodienthoai").value;
        var diachi=document.getElementById("diachi").value;
        if(!tennhacungcap){
            alert("Không được để trống tên màu sắc");
        }
        if(!checkPatternPhone(sodienthoai)){
            alert("Số điện thoại không hợp lệ");
        }
        else{
          $.post("http://localhost/WebBanHangMoHinhMVC/AjaxNhaCungCap/UpdateNCC",{mancc: manhacungcap,tenncc: tennhacungcap,sdt: sodienthoai,dc: diachi},function(data){
            alert(data);
            var url = "http://localhost/WebBanHangMoHinhMVC/admin/container/NhaCungCapPage";
                    window.location.assign(url);
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
          loadPhanTrang("nhacungcap", index, size, sql, "");
      
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
            url: "http://localhost/WebBanHangMoHinhMVC/AjaxNhaCungCap/getDanhSachNCC",
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
            url: "http://localhost/WebBanHangMoHinhMVC/AjaxNhaCungCap/getDanhSachNCC",
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
          loadPhanTrang("nhacungcap", index, size, sql, tmpKey);
        })
        //Xử lý khi nhấn nút tìm kiếm
        $(document).on("click", "#btnSearch", function() {
          var key = $("#txtFind").val();
          index = 1;
          size = 4;
          tmpKey = key;
          $.ajax({
            url: 'http://localhost/WebBanHangMoHinhMVC/AjaxNhaCungCap/getDanhSachNCC',
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
          loadPhanTrang("nhacungcap", index, size, sql, key);
      
        })
        //xử lý sự kiện khi click vào nút làm tươi
      $(document).on("click", "#btnRefresh", function() {
        document.getElementById("txtFind").value = "";
        var key = "";
        index = 1;
        size = 4;
        tmpKey = "";
    
        $.ajax({
          url: 'http://localhost/WebBanHangMoHinhMVC/AjaxNhaCungCap/getDanhSachNCC',
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
    
        loadPhanTrang("nhacungcap", index, size, "", key);
      })
   
    function checkPatternPhone(phone) {
        var pattern = /^(0|\+?84)(3|5|7|8|9)[0-9]{8}$/;
        return pattern.test(phone);
    }