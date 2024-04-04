function test(){
    var arr=[];
    var sdt="";
    sdt= document.getElementById('sdt').value;
    var diachi="";
    diachi=document.getElementById('diachi').value;
    var tongtien= document.getElementById('tongtien').innerHTML;
    var today = new Date();
    var date = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();
    var radioButtons = document.getElementsByName("product");
        for (var i = 0; i < radioButtons.length; i++) {
            if (radioButtons[i].checked === true) {
                arr.push(radioButtons[i].id);
                
            }
        }
        var pttt;
        var radioButton = document.getElementsByName("pttt");
        for (var i = 0; i < radioButton.length; i++) {
            if (radioButton[i].checked === true) {
                pttt=radioButton[i].value;
                
            }
        }
        if(diachi==""){
            alert("bạn chưa nhập địa chỉ");
        }
        else if(arr.length==0){
            alert("bạn chưa chọn sản phẩm");
        }
        else{
            $.post("http://localhost/WebBanHangMoHinhMVC/AjaxThanhToan/thanhtoan",{arr: arr,sdt:sdt,diachi:diachi,date:date,pttt: pttt,tongtien: tongtien},function(data){
                $("#procedure-wrap").html(data);
                 alert("thanh toán thành công");
                var url = "http://localhost/WebBanHangMoHinhMVC/Home/trangchu";
                window.location.assign(url);
                
                })
        }
    
}