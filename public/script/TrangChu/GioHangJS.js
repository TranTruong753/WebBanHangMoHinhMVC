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
        const largeImage = document.getElementById('largeImage');
        const element = document.getElementsByName('content__info-title')[0];
        const masp=element.id;
        var soluong ="";
        var tenmausac="";
        var mamausac = ""; 
        var radioButtons = document.getElementsByName("mausac");
        for (var i = 0; i < radioButtons.length; i++) {
            if (radioButtons[i].checked === true) {
                mamausac=radioButtons[i].value;
                tenmausac=radioButtons[i].id;
            }
        }

        $.post("http://localhost/WebBanHangMoHinhMVC/AjaxChiTietSanPham/GetCountSizeColor",{
            masp: masp,mamausac : mamausac},function(data){
                $("#content__input-select").html(data);
                $("#SoLuong").html(soluong);
        })
        const selectElement = document.getElementById("content__input-select");
        const makichco = selectElement.value;

    
        $.post("http://localhost/WebBanHangMoHinhMVC/Ajax/GetCount",{
            masp: masp,mamausac : mamausac, makichco: makichco},function(data){
            $("#content__info-color").html("Màu sắc : "+tenmausac);   
            $("#SoLuong").html(data);
            soluong = data;
        })
        $.post("http://localhost/WebBanHangMoHinhMVC/AjaxChiTietSanPham/GetImg",{
            masp: masp,mamausac : mamausac},function(data){
            largeImage.src= "http://localhost/WebBanHangMoHinhMVC/public/img/"+data;
        })
}
function changecount(){
    //alert(1);
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
}
//$('#content__input-select').on('click', (event)=> {  // sự kiện lấy số lượng tồn khi chọn size
        //alert(1);
    //     const element = document.getElementsByName('content__info-title')[0];
    //     const masp=element.id;
    //     alert(1);
    //     var mamausac = ""; 
    //     var radioButtons = document.getElementsByName("mausac");
    //     for (var i = 0; i < radioButtons.length; i++) {
    //         if (radioButtons[i].checked === true) {
    //             mamausac=radioButtons[i].value;
    //         }
    //     }
    //     if( mamausac ==""){
            
    //     }
    //     else {
    //     const selectElement = document.getElementById("content__input-select");
    //     const makichco = selectElement.value;
        
    //     $.post("http://localhost/WebBanHangMoHinhMVC/Ajax/GetCount",{
    //         masp: masp,mamausac : mamausac, makichco: makichco},function(data){
                
    //         $("#SoLuong").html(data);
    //     })
    // }
//});

    function thanhtoan() {              
       var url = "http://localhost/WebBanHangMoHinhMVC/MuaHangController/Muahang/none";
        window.location.assign(url);

    }
    function test(ojt) {
        var mactsp=ojt.id;
        //alert(mactsp);
        $.post("http://localhost/WebBanHangMoHinhMVC/Ajax/XoaGioHang",{mactsp: mactsp},function(data){
            // alert("xóa thành công");
            swal({
                title: "Xóa thành công!",
                text: "Nhấn vào nút để tiếp tục!",
                icon: "success",
            }).then(function(){
                 $("#cart-preview").html(data);
            })
            
            // $("#cart-preview").html(data);
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
    var slton=document.getElementById("SoLuong").innerHTML;
    
    var ktmakh = document.getElementsByName("user")[0];
    
    if(ktmakh){
        var makh=ktmakh.id;
        
        const selectElement = document.getElementById("content__input-select");
        const makichco = selectElement.value;
        // alert(makichco);
        
        const sl = document.getElementById('content__input-number').value;
        
        if( parseInt(sl)<= parseInt(slton)){
            
            //alert(1);
            $.post("http://localhost/WebBanHangMoHinhMVC/Ajax/GioHang",{makh : makh,
            masp: masp,mamausac : mamausac, makichco: makichco, sl: sl},function(data){
                const jsonObject = JSON.parse(data);
                // alert("Thêm thanh công");
                //  $("#cart-preview").html(jsonObject.html);

                swal({
                    title: "Thêm thành công!",
                    text: "Nhấn vào nút để tiếp tục!",
                    icon: "success",
                }).then(function(){
                    $("#cart-preview").html(jsonObject.html);
                })

                })
        }
        else if(mamausac==""){
            // alert("bạn chưa chọn màu sắc");
            swal({
                title: "bạn chưa chọn màu sắc!",
                text: "Nhấn vào nút để tiếp tục!",
                icon: "warning",
            })
        }
        else if(makichco=="none"){
            swal({
                title: "bạn chưa chọn size!",
                text: "Nhấn vào nút để tiếp tục!",
                icon: "warning",
            })
        }
        else {
            // alert("Số lượng đã vượt quá số lượng tồn");
            swal({
                title: "Số lượng đã vượt quá số lượng tồn!",
                text: "Nhấn vào nút để tiếp tục!",
                icon: "warning",
            })
        }
    }
        else {
            // alert("Bạn chưa đăng nhập");
            swal({
                title: "Bạn chưa đăng nhập!",
                text: "Nhấn vào nút để tiếp tục!",
                icon: "warning",
            })
        }
    }
function muangay(){
    const element = document.getElementsByName('content__info-title')[0];
    const masp=element.id;
    var mamausac = ""; 
    var radioButtons = document.getElementsByName("mausac");
    for (var i = 0; i < radioButtons.length; i++) {
        if (radioButtons[i].checked === true) {
            mamausac=radioButtons[i].value;
        }
    }
    var slton=document.getElementById("SoLuong").innerHTML;
    
    var ktmakh = document.getElementsByName("user")[0];
    
    if(ktmakh){
        var makh=ktmakh.id;
        
        const selectElement = document.getElementById("content__input-select");
        const makichco = selectElement.value;
        
        const sl = document.getElementById('content__input-number').value;
        
        if( parseInt(sl)<= parseInt(slton)){
            
            //alert(1);
            $.post("http://localhost/WebBanHangMoHinhMVC/Ajax/GioHang",{makh : makh,
            masp: masp,mamausac : mamausac, makichco: makichco, sl: sl},function(data){
                const jsonObject = JSON.parse(data);
                
                 $("#cart-preview").html(jsonObject.html);
                
                var url = "http://localhost/WebBanHangMoHinhMVC/MuaHangController/Muahang/"+jsonObject.mactsp;
                window.location.assign(url);
                })
        }
        else if(mamausac==""){
            // alert("bạn chưa chọn màu sắc");
            swal({
                title: "bạn chưa chọn màu sắc!",
                text: "Nhấn vào nút để tiếp tục!",
                icon: "warning",
            })
        }
        else if(makichco=="none"){
            swal({
                title: "bạn chưa chọn size!",
                text: "Nhấn vào nút để tiếp tục!",
                icon: "warning",
            })
        }
        else{
            // alert("Số lượng đã vượt quá số lượng tồn");
            swal({
                title: "Số lượng đã vượt quá số lượng tồn!",
                text: "Nhấn vào nút để tiếp tục!",
                icon: "warning",
            })
        } 
        
    }
    else {
        swal({
            title: "Bạn chưa đăng nhập!",
            text: "Nhấn vào nút để tiếp tục!",
            icon: "warning",
        })
    }

}                               
                                    
