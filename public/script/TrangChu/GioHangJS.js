const largeImage = document.getElementById('largeImage');
const smallImages = document.querySelectorAll('.content__img-item');

    // Xử lý sự kiện khi nhấn vào ảnh nhỏ
    smallImages.forEach((smallImage) => {
        smallImage.addEventListener('click', () => {
            largeImage.src = smallImage.src;
        });
    });
    // $(".cart__buy-btn").click(function (e) { 
    //     alert(1);
    //     e.preventDefault();
    //     var url = "http://localhost/WebBanHangMoHinhMVC/MuaHangController/Muahang";
    //     window.location.assign(url);
        
    //  });
    // $(".cart__list").on("click","i",function(){
    //       var mactsp=$(this).attr("id");
    //       alert(mactsp);
    //       $.post("http://localhost/WebBanHangMoHinhMVC/Ajax/XoaGioHang",{mactsp: mactsp},function(data){
    //         alert("xóa thành công");
    //         $("#cart-preview").html(data);
    //         })
    //     });

    function change(){   // sự kiện lấy số lượng tồn khi chọn màu săc
        const element = document.getElementsByName('content__info-title')[0];
        const masp=element.id;
        var tenmausac="";
        var mamausac = ""; 
        var radioButtons = document.getElementsByName("mausac");
        for (var i = 0; i < radioButtons.length; i++) {
            if (radioButtons[i].checked === true) {
                mamausac=radioButtons[i].value;
                tenmausac=radioButtons[i].id;
            }
        }
        const selectElement = document.getElementById("content__input-select");
        const makichco = selectElement.value;
       
        $.post("http://localhost/WebBanHangMoHinhMVC/Ajax/GetCount",{
            masp: masp,mamausac : mamausac, makichco: makichco},function(data){
            $("#content__info-color").html("Màu sắc :"+tenmausac);   
            $("#SoLuong").html(data);
        })
        
    }

    document.getElementById("content__input-select").onchange = function() {  // sự kiện lấy số lượng tồn khi chọn size
        const element = document.getElementsByName('content__info-title')[0];
        const masp=element.id;
        var mamausac = ""; 
        var radioButtons = document.getElementsByName("mausac");
        for (var i = 0; i < radioButtons.length; i++) {
            if (radioButtons[i].checked === true) {
                mamausac=radioButtons[i].value;
            }
        }
        if( mamausac ==""){
            
        }
        else {
        const selectElement = document.getElementById("content__input-select");
        const makichco = selectElement.value;
        
        $.post("http://localhost/WebBanHangMoHinhMVC/Ajax/GetCount",{
            masp: masp,mamausac : mamausac, makichco: makichco},function(data){
                
            $("#SoLuong").html(data);
        })
    }
      };

    function thanhtoan() {
        
        
        var url = "http://localhost/WebBanHangMoHinhMVC/MuaHangController/Muahang";
        window.location.assign(url);

    }
    function test(ojt) {
        var mactsp=ojt.id;
        alert(mactsp);
        $.post("http://localhost/WebBanHangMoHinhMVC/Ajax/XoaGioHang",{mactsp: mactsp},function(data){
            alert("xóa thành công");
            
            $("#cart-preview").html(data);
            })

    }
      
function addgiohang() {
    
    
    
    const element = document.getElementsByName('content__info-title')[0];
    const masp=element.id;
    var mamausac = ""; 
    var radioButtons = document.getElementsByName("mausac");
    for (var i = 0; i < radioButtons.length; i++) {
        if (radioButtons[i].checked === true) {
            mamausac=radioButtons[i].value;
        }
    }
    
    
    var ktmakh = document.getElementById('username');
   
    if(ktmakh){
        var makh=ktmakh.value;
        const selectElement = document.getElementById("content__input-select");
        const makichco = selectElement.value;
        //alert("Giá trị của option được chọn: " + selectedValue);
        const sl = document.getElementById('content__input-number').value;
        if(sl>=1){
            
            //alert(1);
            $.post("http://localhost/WebBanHangMoHinhMVC/Ajax/GioHang",{makh : makh,
            masp: masp,mamausac : mamausac, makichco: makichco, sl: sl},function(data){
                alert("Thêm thành công");
                $("#cart-preview").html(data);
                })
        }
        else alert("Số lượng chọn cần phải lớn hơn 0");
    }
    else {
        alert("Bạn chưa đăng nhập");
    }
    };                                   
                                    
