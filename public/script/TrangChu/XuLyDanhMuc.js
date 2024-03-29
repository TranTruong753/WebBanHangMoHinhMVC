$(document).ready(function(){
    
    var chungloai= document.getElementById("test").value;
    var theloai= document.getElementById("testa").value;
    var timkiem= document.getElementById("testb").value;
    var Tensp=timkiem.replaceAll("_", " ");
    if(chungloai== "none" && theloai != "none"){
        $.post("http://localhost/WebBanHangMoHinhMVC/Ajax/GetSPtheoTL",{tl : theloai},function(data){
           
          
        $("#product__list").html(data);

    });
    }
    else if(chungloai != "none" && theloai == "none"){
        $.post("http://localhost/WebBanHangMoHinhMVC/Ajax/GetSPtheoCL",{cl : chungloai},function(data){
            
            $("#product__list").html(data);
    
        });
    }
    else {
        $.post("http://localhost/WebBanHangMoHinhMVC/Ajax/TimSP",{tensp : Tensp},function(data){
        document.getElementById("search-form__input").value = Tensp;
        $("#product__list").html(data);

    });

    }
    
    
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