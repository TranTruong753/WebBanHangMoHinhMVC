// $(document).ready(function(){
//     alert(1);
// });

$(document).ready(function(){
    $("#product__list").load("http://localhost/WebBanHangMoHinhMVC/Ajax/GetAllSP");
});
function getAllSP(ojt){
    var chungloai = ojt.id;
    alert
    var url = "http://localhost/WebBanHangMoHinhMVC/home/XuLyDanhMuc/" + chungloai+"/none/none";
    window.location.assign(url);
}
function getSP(ojt){
     var chungloai = ojt.id;
    
    var url = "http://localhost/WebBanHangMoHinhMVC/home/XuLyDanhMuc/" + chungloai+"/none/none";
    window.location.assign(url);

};

function getTL(ojt){
    var theloai = ojt.id;
    
    var url = "http://localhost/WebBanHangMoHinhMVC/home/XuLyDanhMuc/none/" + theloai+"/none";
    window.location.assign(url);
    
    

};

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
