function QLHoaDon(){
    var url="http://localhost/WebBanHangMoHinhMVC/thongTinKhangHangController/QLHoaDon";
    $("#client-right__main").load(url);

}

function QLThongTin(){
    var url="http://localhost/WebBanHangMoHinhMVC/thongTinKhangHangController/QLThongTin";
    $("#client-right__main").load(url);

}

function updateKh(){
    var makh = document.getElementById("userEmail").value;
    var ten = document.getElementById("userName").value;
    var sdt = document.getElementById("userPhone").value;
    var radioButtons = document.getElementsByName("sex");
    var gioitinh="";
    // alert(makh+ten+sdt);
    for (var i = 0; i < radioButtons.length; i++) {
        if (radioButtons[i].checked === true) {
           gioitinh= radioButtons[i].value;
        }
    }
    
    $.post("http://localhost/WebBanHangMoHinhMVC/AjaxThongTinKhachHang/updateKh",{makh : makh,
    ten : ten,sdt : sdt, gioitinh: gioitinh},function(data){
        var result=data;
        // alert(typeof(result));
        // alert(result);
        if(result.length == 6){
            alert("Cập nhật thành công");
            location.reload();     
        }
        else {
            alert("mã khách hàng bị trùng");}
    });
}
