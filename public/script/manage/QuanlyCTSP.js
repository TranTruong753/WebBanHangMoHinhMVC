$(document).ready(function(){
    $('#hinhanh').on('change',(e)=>{
        e.preventDefault();
        var formdata=new FormData();
        formdata.append('file',$("#hinhanh")[0].files[0])
        $.ajax({
            
            url: "http://localhost/WebBanHangMoHinhMVC/AjaxCTSP/LoadImg",
            data: formdata,
            dataType: "JSON",
            method: "POST",
            processData:false,
            contentType:false,
            success: function (data) {
                //alert(data.success);
                $("#show").html('<img src="http://localhost/WebBanHangMoHinhMVC/public/img/'+data.src+
                '" weight=200px height=200px alt="">'
            +'<input type="hidden" id ="filename" value ="'+data.src+'"/>');
                
            }
        });
    });
});
function addCTSP(){
    var hinhanh=document.getElementById('filename').value;
    var mactsp=document.getElementById('mactsp').value;
    var masp=document.getElementById('masanpham').value;
    var mamausac=document.getElementById('mausac').value;
    var makichco=document.getElementById('kichco').value;
    //alert(hinhanh+" "+mactsp+" "+masp+" "+mamausac+" "+makichco);
    $.post("http://localhost/WebBanHangMoHinhMVC/AjaxCTSP/InsertCTSP",{mactsp:mactsp,
        masp: masp,mamausac : mamausac, makichco: makichco, hinhanh:hinhanh},function(data){
            var decodedData = JSON.parse(data);
         //alert(decodedData.echo);
         if(decodedData.kq==true){
            alert("them thanh cong");
            $("#ctsp").html(decodedData.echo);
            var soMuoi =parseInt( mactsp.slice(4))+1;
             var mamoi="CTSP"+parseInt(soMuoi);
             $("#mactsp").val(mamoi);
         }
         else {
            alert("chi tiet san pham da ton tại");
         }
        })
}

function updateCTSP(){
    var hinhanh=document.getElementById('filename').value;
    var mactsp=document.getElementById('mactsp').value;
    var masp=document.getElementById('masanpham').value;
    var mamausac=document.getElementById('mausac').value;
    var makichco=document.getElementById('kichco').value;
    //alert(hinhanh+" "+mactsp+" "+mamausac+" "+makichco);
    $.post("http://localhost/WebBanHangMoHinhMVC/AjaxCTSP/UpdateCTSP",{mactsp:mactsp,
    masp: masp,mamausac : mamausac, makichco: makichco, hinhanh:hinhanh},function(data){
        var decodedData = JSON.parse(data);
        //alert(decodedData.echo);
        if(decodedData.kq==true){
           alert(decodedData.echo);
           var url = "http://localhost/WebBanHangMoHinhMVC/Admin/default/ChiTietSanPhamPage,"+masp;
             window.location.assign(url);
           
        }
        else {
           alert(decodedData.echo);
        }
            
        })
}

function DeleteCTSP(ojt){
    
    var mactsp=ojt.id;
    let choice = confirm("Bạn có chắc muốn xóa không!");
    if (choice) {
       
    $.ajax({
      url: "http://localhost/WebBanHangMoHinhMVC/AjaxCTSP/DeleteCTSP",
      type: "post",
      dataType: "JSON",
      data: {

        mactsp : mactsp
      },
      success: function(data) {
        if(data.kq== true){
          alert("xoa thanh cong");
          
          loadTable(tmpKey,index,size)
          loadPhanTrang("chitietsanpham",index,size,sql,tmpKey)
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
var masp=document.getElementById('masp').value;
var sql=" INNER JOIN mausac on chitietsanpham.MaMauSac= mausac.MaMauSac INNER JOIN kichco"+  
" on chitietsanpham.MaKichCo= kichco.MaKichCo INNER JOIN sanpham on sanpham.MaSanPham=chitietsanpham.MaSanPham Where chitietsanpham.MaSanPham ='"+masp+"' ";



 // load khi chạy trang
 $(document).ready(function() {
  index = 1;
  size = 4;
  loadTable("", index, size)
  loadPhanTrang("chitietsanpham", index, size, sql, "");

})

function DoiTrangThaiCTSP(ojt){
  var mactsp = ojt.value;
  alert(mactsp);
  var checkBox = document.getElementById("trangthai");
  var result = confirm("Bạn có muốn đổi trạng thái?");
  if (result == true) {
    if (checkBox.checked == true) {
      var trangThai = 1;
      $.post("http://localhost/WebBanHangMoHinhMVC/AjaxCTSP/DoiTrangThai", {
        mactsp: mactsp,
        trangThai: trangThai
      }, function(data) {
        // alert(data);
      })
    } else {
      var trangThai = 0;
      $.post("http://localhost/WebBanHangMoHinhMVC/AjaxCTSP/DoiTrangThai", {
        mactsp: mactsp,
        trangThai: trangThai
      }, function(data) {
        // alert(data);
      })
    }
    alert(checkBox.checked);// alert(trangThai);
  }
  loadTable("", index, size)
  loadPhanTrang("chitietsanpham", index, size, sql, tmpKey)

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


//Xử llys sự kiện khi nhấn bào nút phân trang
$(document).on("click", ".btnPhanTrang", function() {

  // alert(this.id)
  var arr = this.id.split("/");
  index = arr[0];
  size = arr[1];
  //xử lý thay đổi bảng khi nhấn vào phân trang
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
      $(".row-table").html(data)
    }
  })
  // xử lý số trang đã chọn
  loadPhanTrang("chitietsanpham", index, size, sql, key);

})
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
        size: size,
        masp : masp
      },
      success: function(data) {
        console.log(data)
        $(".PhanTrang").html(data)
      }
  
  
    })
  }
