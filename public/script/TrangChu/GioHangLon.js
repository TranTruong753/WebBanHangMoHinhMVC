function test(){
    var arr=[];
    var sdt="";
    sdt= document.getElementById('sdt').value;
    var diachi="";
    diachi=document.getElementById('diachi').value;
    var tongtien= document.getElementById('thanhtien').value;
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
                //$("#procedure-wrap").html(data);
                 alert("Thanh toán thành công");
                var url = "http://localhost/WebBanHangMoHinhMVC/Home/trangchu";
                window.location.assign(url);
                
                })
        }
    
}

function Delete(ojt){
    //alert(1);
    var ctspchoose=document.getElementById("ctspchoose").value;
    var mactsp=document.getElementById(ojt.id+"x").value;
    var id=document.getElementById(mactsp);
    if($("#tongtien").val()!=0){
        id.checked=false;
        clicka(id);
    }
    
    //alert(mactsp);
    $.post("http://localhost/WebBanHangMoHinhMVC/Ajax/XoaGioHang",{mactsp: mactsp},function(data){
    alert("xóa thành công");
        //$("#cart-preview").html(data);
        $.post("http://localhost/WebBanHangMoHinhMVC/AjaxThanhToan/Delete",{ctspchoose:ctspchoose},function(data1){
        //alert(data);
        $("#procedure-wrap").html(data1);
        
        $("#tongtien").val("0");
        $("#hientongtien").html("0 VNĐ");
        $("#thanhtien").val(80000);
        $("#hienthanhtien").html("0 VNĐ");
        })
    })
    
}

function clicka(ojt){
   // alert(1);
    if(ojt.checked)
    {
        var tongtien=document.getElementById('tongtien').value;
        tongtien= parseFloat(tongtien)+parseFloat(ojt.value);
        var thanhtien=parseFloat(tongtien)+80000;
        $("#tongtien").val(tongtien);
        //alert($("#tongtien").val());
        $("#hientongtien").html(tongtien.toLocaleString('vi-VN')+" VNĐ");
        $("#thanhtien").val(thanhtien);
        $("#hienthanhtien").html(thanhtien.toLocaleString('vi-VN')+" VNĐ");
        //alert(tongtien);
    }
    else {
    var tongtien=document.getElementById('tongtien').value;
    tongtien= parseFloat(tongtien)-parseFloat(ojt.value);
    var thanhtien=parseFloat(tongtien)+80000;
    $("#tongtien").val(tongtien);
    //alert($("#tongtien").val());
    $("#hientongtien").html(tongtien.toLocaleString('vi-VN')+" VNĐ");
    $("#thanhtien").val(thanhtien);
    $("#hienthanhtien").html(thanhtien.toLocaleString('vi-VN')+" VNĐ");
    //alert(tongtien);
    }
}

$(document).ready(function() {
    var mactsp=document.getElementById('mactspgh').value;
    var id=document.getElementById(mactsp);
    //alert(id);
    clicka(id);
  
  })