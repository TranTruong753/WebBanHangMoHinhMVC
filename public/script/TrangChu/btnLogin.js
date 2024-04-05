function onclickbtn(){
    var email = document.getElementById("email").value;
    var ten = document.getElementById("UserName").value;
    var sdt = document.getElementById("phone").value;
    var mk = document.getElementById("codePIN").value;
    var radioButtons = document.getElementsByName("sex");
    var gioitinh="";
    for (var i = 0; i < radioButtons.length; i++) {
        if (radioButtons[i].checked === true) {
           gioitinh= radioButtons[i].value;
        }
    }
    
    $.post("http://localhost/WebBanHangMoHinhMVC/AjaxLogin/addTaiKhoan",{email : email,
    ten : ten,sdt : sdt,mk : mk, gioitinh: gioitinh},function(data){
        var result=data;
        // alert(typeof(result));
        // alert(result);
        if(result.length == 6){
            alert("Thêm thành công");
            window.location.assign("http://localhost/WebBanHangMoHinhMVC/home/trangchu");

        }
        else {
            alert("mã khách hàng bị trùng");}
    });
}

function Logout(){    
    $.post("http://localhost/WebBanHangMoHinhMVC/AjaxLogin/Logout",{},function(data){
        alert("Dang xuat thanh cong")
        window.location.assign("http://localhost/WebBanHangMoHinhMVC/DangNhap/dangNhap");
    });

};
function onclickbtnDN(){
    var email = document.getElementById("email").value;
    var mk = document.getElementById("Password").value;
    $.post("http://localhost/WebBanHangMoHinhMVC/AjaxLogin/DangNhap",{email : email,
    mk : mk},function(data){
        // const obj = JSON.parse(data);
        //  alert(data.length);
        
        if(data.length== 6){
            alert("DN thành công");
            window.location.assign("http://localhost/WebBanHangMoHinhMVC/home/trangchu");
        }
        else if(data.length== 4){
            alert("DN thành công");
            window.location.assign("http://localhost/WebBanHangMoHinhMVC/Admin/default");
            
        }
        else alert("Thông tin tài khoản hoặc mật khẩu không chính xác");
    });

};
