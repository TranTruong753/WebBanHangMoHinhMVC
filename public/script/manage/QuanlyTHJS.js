function addTH(){
    // var tenchatlieu=" ";
    var tenthuonghieu=document.getElementById("tenthuonghieu").value;
    if(!tenthuonghieu){
        alert("Không được để trống tên thương hiệu");
    } 
    $.post("http://localhost/WebBanHangMoHinhMVC/AjaxThuongHieu/InsertTH",{tenth: tenthuonghieu},function(data){
        alert(data);
        var url = "http://localhost/WebBanHangMoHinhMVC/admin/container/ThuongHieuPage";
                window.location.assign(url);
    });
    }