//Đăng ký tài khoản
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


// đăng xuất
function Logout(){    
    $.post("http://localhost/WebBanHangMoHinhMVC/AjaxLogin/Logout",{},function(data){
        
        // alert("Dang xuat thanh cong")
        // window.location.assign("http://localhost/WebBanHangMoHinhMVC/DangNhap/dangNhap");

        swal({
            title: "Đăng xuất thành công!",
            text: "Nhấn vào nút để tiếp tục!",
            icon: "success",
        }).then(function(){
            window.location.assign("http://localhost/WebBanHangMoHinhMVC/DangNhap/dangNhap");
         })
    });

};

// đăng nhập
function onclickbtnDN(){
    var email = document.getElementById("email").value;
    var mk = document.getElementById("Password").value;
    $.post("http://localhost/WebBanHangMoHinhMVC/AjaxLogin/DangNhap",{email : email,
    mk : mk},function(data){
        // const obj = JSON.parse(data);
        //  alert(data.length);
        
        if(data.length== 6){
            // alert("DN thành công");
            swal({
                title: "Đăng nhập thành công!",
                text: "Nhấn vào nút để tiếp tục!",
                icon: "success",
            }).then(function () {
             window.location.assign("http://localhost/WebBanHangMoHinhMVC/home/trangchu");
            })
        }
        else if(data.length== 4){
            // alert("DN thành công");
            swal({
                title: "Đăng nhập thành công!",
                text: "Nhấn vào nút để tiếp tục!",
                icon: "success",
            }).then(function () {
                window.location.assign("http://localhost/WebBanHangMoHinhMVC/Admin/default/MainPage");
            })
           
            
        }
        else {
            swal({
                title: "Lỗi! Thông tin tài khoản hoặc mật khẩu không chính xác!",
                text: "Nhấn vào nút để tiếp tục!",
                icon: "error",
            })
        }
            // alert("Thông tin tài khoản hoặc mật khẩu không chính xác");
    });

};

function sentOTP(){
    var email=document.getElementById("email").value;
    //alert(email);
    $.ajax({
        url: "http://localhost/WebBanHangMoHinhMVC/AjaxLogin/SentOtp",
        type: "post",
        dataType: "JSON",
        data: {
            email : email
        },
        success: function(data) {
          //alert("gửi thành công");
          swal({
            title: "Gửi thành công!",
            text: "Nhấn vào nút để tiếp tục!",
            icon: "success",
        })
        document.getElementById("codeotp").value=data;
        //alert(document.getElementById("codeotp").value);
          //$(".PhanTrang").html(data)
        }
    })
}
function onclickNext(){
    //alert(1);
    var codeotp= document.getElementById("codeotp").value;
    var maotp= document.getElementById("maotp").value;
    document.getElementById("email").readOnly=true;
    if(codeotp!=maotp){
        swal({
            title: "Mã không hợp lệ",
            text: "Nhấn vào nút để tiếp tục!",
            icon: "error",
        })
    }
    else {
        swal({
            title: "Mã  hợp lệ",
            text: "Nhấn vào nút để tiếp tục!",
            icon: "success",
        }).then(function () {
            document.getElementById("codePIN").readOnly=false;
            document.getElementById("reCodePIN").readOnly=false;
        })

    };
    //alert(codeotp+"-"+maotp);
    //email.readOnly = true;
    
}

function onclickXacNhan(){
    var codePIN=document.getElementById("codePIN").value;
    var reCodePIN=document.getElementById("reCodePIN").value;
    var email=document.getElementById("email").value;
    if(codePIN!=reCodePIN){
        swal({
            title: "reCodePIN không giống codePIN",
            text: "Nhấn vào nút để tiếp tục!",
            icon: "error",
        })
    }
    else {
        $.ajax({
            url: "http://localhost/WebBanHangMoHinhMVC/AjaxLogin/updatemk",
            type: "post",
            dataType: "JSON",
            data: {
                email : email,
                codePIN: codePIN
            },
            success: function(data) {
              //alert(data);
              swal({
                title: "Cập nhật thành công!",
                text: "Nhấn vào nút để tiếp tục!",
                icon: "success",
            }).then(function () {
                window.location.assign("http://localhost/WebBanHangMoHinhMVC/DangNhap/dangNhap");
            })
            
            },
            error: function(data){
                //alert("cc");
              swal({
                title: "Email chưa được đăng kí!",
                text: "Nhấn vào nút để tiếp tục!",
                icon: "error",
              }).then(function () {
                document.getElementById("email").readOnly=false;
            })  ;  
            }
        
        })

    };

}
