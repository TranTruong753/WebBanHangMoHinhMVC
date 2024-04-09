function addKC(){
    // var tenchatlieu=" ";
    var tenkichco=document.getElementById("tenkichco").value;
    if(!tenkichco){
        alert("Không được để trống tên kích cỡ");
    } 
    $.post("http://localhost/WebBanHangMoHinhMVC/AjaxKichCo/InsertKC",{tenkc: tenkichco},function(data){
        alert(data);
        var url = "http://localhost/WebBanHangMoHinhMVC/admin/container/KichCoPage";
                window.location.assign(url);
    });
    }