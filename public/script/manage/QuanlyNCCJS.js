function addNCC(){
    // var tenchatlieu=" ";
    var tennhacungcap=document.getElementById("tennhacungcap").value;
    var sodienthoai=document.getElementById("sodienthoai").value;
    var diachi=document.getElementById("diachi").value;
    if(!tennhacungcap){
        alert("Không được để trống tên nhà cung cấp");
    } 
    if(!sodienthoai){
        alert("Không được để trống số điện thoại");
    }
    $.post("http://localhost/WebBanHangMoHinhMVC/AjaxNhaCungCap/InsertNCC",{tenncc: tennhacungcap,sdt: sodienthoai,dc: diachi},function(data){
        alert(data);
        var url = "http://localhost/WebBanHangMoHinhMVC/admin/container/NhaCungCapPage";
                window.location.assign(url);
    });
    }