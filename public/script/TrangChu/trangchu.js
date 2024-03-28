// $(document).ready(function(){
//     alert(1);
// });

$(document).ready(function(){
    $("#product__list").load("http://localhost/WebBanHangMoHinhMVC/Ajax/GetAllSP");
});

$(".nav__list").on("click","a",function(){
    // var theloai = $(this).attr("id");
    // $.post("http://localhost/WebBanHangMoHinhMVC/Ajax/GetSPtheoTL",{tl : theloai},function(data){
       
    //     $("#product__list").html(data);

    // })
    window.location.assign("http://localhost/WebBanHangMoHinhMVC/home/XuLyDanhMuc");

});
