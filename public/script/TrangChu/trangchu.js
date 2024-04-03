// $(document).ready(function(){
//     alert(1);
// });

$(document).ready(function(){
    $("#product__list").load("http://localhost/WebBanHangMoHinhMVC/Ajax/GetAllSP");
});

$(".nav__list").on("click","a",function(){
     var chungloai = $(this).attr("id");
    
    var url = "http://localhost/WebBanHangMoHinhMVC/home/XuLyDanhMuc/" + chungloai+"/none/none";
    window.location.assign(url);

});

$(".sub-menu").on("click","span",function(){
    var theloai = $(this).attr("id");
    
    var url = "http://localhost/WebBanHangMoHinhMVC/home/XuLyDanhMuc/none/" + theloai+"/none";
    window.location.assign(url);
    
    

});

function showAlert() {
    var tensp=" ";
    var tensp =document.getElementById("search-form__input").value;
    if(tensp==""){
        alert("Hãy nhập tên sản phẩm");
    }
    else{
    var Tensp=tensp.replaceAll(" ", "_");
    
    var url = "http://localhost/WebBanHangMoHinhMVC/home/XuLyDanhMuc/none/none/"+Tensp;
    window.location.assign(url);
    }
    
    };
    $(document).on('keyup keypress', 'form input[type="text"]', function(e) {
        if (e.keyCode === 13) {
            e.preventDefault();
            showAlert();
            return false;
        }
    });
