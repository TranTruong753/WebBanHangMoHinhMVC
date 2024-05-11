function QLHoaDon(){
    var url="http://localhost/WebBanHangMoHinhMVC/thongTinKhangHangController/QLHoaDon";
    $("#client-right__main").load(url);
   


}

function QLThongTin(){
    var url="http://localhost/WebBanHangMoHinhMVC/thongTinKhangHangController/QLThongTin";
    $("#client-right__main").load(url);
  

}

function updateKh(){
    var makh = document.getElementById("userEmail").value.trim();
    var ten = document.getElementById("userName").value.trim();
    var sdt = document.getElementById("userPhone").value.trim();
    var radioButtons = document.getElementsByName("sex");
    var gioitinh="";
    // alert(makh+ten+sdt);
    for (var i = 0; i < radioButtons.length; i++) {
        if (radioButtons[i].checked === true) {
           gioitinh= radioButtons[i].value;
        }
    }
    // alert(makh+ten+sdt+gioitinh);
    
    $.post("http://localhost/WebBanHangMoHinhMVC/AjaxThongTinKhachHang/updateKh",{makh : makh,
    ten : ten,sdt : sdt, gioitinh: gioitinh},function(data){
        var result=data;
        // alert(typeof(result));
        // alert(result);
        if(result == 1){
            // alert("Cập nhật thành công");
            swal({
                title: "Cập nhật thành công!",
                text: "Nhấn vào nút để tiếp tục!",
                icon: "success",
              }).then(function () {
                location.reload();  
            })
               
        }
        else if(result == -1){
            swal({
                title: "Lỗi! số điện thoại trùng!",
                text: "Nhấn vào nút để tiếp tục!",
                icon: "error",
              })
        }
        else {
            swal({
                title: "Lỗi! cập nhật thất bại!",
                text: "Nhấn vào nút để tiếp tục!",
                icon: "error",
              })
        }
    });
}
