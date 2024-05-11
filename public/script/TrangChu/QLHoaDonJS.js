function GetCTHD(ojt){
    var mahd=ojt.id;
    // alert(mahd);
    $.post("http://localhost/WebBanHangMoHinhMVC/AjaxQuanLyHoaDonKH/GetAllCTHD",{mahd:mahd},function(data){
                $("#client-right__main").html(data);
    })
}