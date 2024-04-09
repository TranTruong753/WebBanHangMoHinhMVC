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

function addCTSP(){
    
    var input = document.getElementsByName('hinhanh');
    // var fileName = input.files.item(0).name;
    // var filepath=input.value;
    // alert('Tên file đã chọn: ' + fileName);
    // alert('duong dan: ' + filepath);
    $.post("http://localhost/WebBanHangMoHinhMVC/AjaxCTSP/InsertCTSP",{input: input},function(data){
        alert(data);
    });
    
}