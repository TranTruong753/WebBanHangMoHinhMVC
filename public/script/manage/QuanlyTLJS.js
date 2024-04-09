function addTL(){
    // var tenchatlieu=" ";
    var machungloai=document.getElementById("machungloai").value;
    var tentheloai=document.getElementById("tentheloai").value;
    if(!tentheloai){
        alert("Không được để trống tên thể loại");
    } 
    $.post("http://localhost/WebBanHangMoHinhMVC/AjaxTheLoai/InsertTL",{macl:machungloai, tentl: tentheloai},function(data){
        alert(data);
        var url = "http://localhost/WebBanHangMoHinhMVC/admin/container/TheLoaiPage";
                window.location.assign(url);
    });
    }