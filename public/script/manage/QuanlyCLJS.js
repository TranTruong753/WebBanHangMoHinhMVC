function addCL(){
    // var tenchatlieu=" ";
    var tenchatlieu=document.getElementById("tenchatlieu").value;
    if(!tenchatlieu){
        alert("Không được để trống tên chất liệu");
    } 
    $.post("http://localhost/WebBanHangMoHinhMVC/AjaxChatLieu/InsertCL",{tencl: tenchatlieu},function(data){
        alert(data);
        var url = "http://localhost/WebBanHangMoHinhMVC/admin/container/ChatLieuPage";
                window.location.assign(url);
    });
    }
// function XoaSP(ojt)
//   {
//     var masp=ojt.id;
//     //alert($masp);
//     $.post("http://localhost/WebBanHangMoHinhMVC/AjaxSanPham/DeleteSP",{masp : masp},function(data){
//         if(data.length==6){
//             alert("Xóa thành công");
//             var url = "http://localhost/WebBanHangMoHinhMVC/admin/container/SanPhamPage";
//              window.location.assign(url);
//         }
//         else alert(data);
//         // var url = "http://localhost/WebBanHangMoHinhMVC/admin/container/SanPhamPage";
//         //         window.location.assign(url);
//     });
//   }