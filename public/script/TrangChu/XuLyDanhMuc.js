$(document).ready(function(){
    $(".product__title").html("HÀNG MỚI VỀ");
    $("#product__list").load("http://localhost/WebBanHangMoHinhMVC/Ajax/GetAllSP");
});

$(".nav__list").on("click","a",function(){
    var chungloai = $(this).attr("id");
    var Tieude =document.getElementById(chungloai).innerText;
    
    $.post("http://localhost/WebBanHangMoHinhMVC/Ajax/GetSPtheoCL",{cl : chungloai},function(data){
        $(".product__title").html(Tieude);
        $("#product__list").html(data);

    })
    

});

$(".sub-menu").on("click","span",function(){
    var theloai = $(this).attr("id");
    var Tieude =document.getElementById(theloai).innerText;
    
    $.post("http://localhost/WebBanHangMoHinhMVC/Ajax/GetSPtheoTL",{tl : theloai},function(data){
        $(".product__title").html(Tieude);    
        $("#product__list").html(data);

    })
    
    

});