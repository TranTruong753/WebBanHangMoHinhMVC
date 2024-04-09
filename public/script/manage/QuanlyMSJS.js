function addMS(){
    // var tenchatlieu=" ";
    var tenmausac=document.getElementById("tenmausac").value;
    if(!tenmausac){
        alert("Không được để trống tên màu sắc");
    } 
    $.post("http://localhost/WebBanHangMoHinhMVC/AjaxMauSac/InsertMS",{tenms: tenmausac},function(data){
        alert(data);
        var url = "http://localhost/WebBanHangMoHinhMVC/admin/container/MauSacPage";
                window.location.assign(url);
    });
    }