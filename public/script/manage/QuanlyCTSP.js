$(document).ready(function(){
    $('#hinhanh').on('change',(e)=>{
        e.preventDefault();
        var formdata=new FormData();
        formdata.append('file',$("#hinhanh")[0].files[0])
        $.ajax({
            
            url: "http://localhost/WebBanHangMoHinhMVC/AjaxCTSP/LoadImg",
            data: formdata,
            dataType: "JSON",
            method: "POST",
            processData:false,
            contentType:false,
            success: function (data) {
                //alert(data.success);
                $("#show").html('<img src="http://localhost/WebBanHangMoHinhMVC/public/img/'+data.src+
                '" weight=200px height=200px alt="">'
            +'<input type="hidden" id ="filename" value ="'+data.src+'"/>');
                
            }
        });
    });
});
function addCTSP(){
    var hinhanh=document.getElementById('filename').value;
    var mactsp=document.getElementById('mactsp').value;
    var masp=document.getElementById('masanpham').value;
    var mamausac=document.getElementById('mausac').value;
    var makichco=document.getElementById('kichco').value;
    //alert(hinhanh+" "+mactsp+" "+masp+" "+mamausac+" "+makichco);
    $.post("http://localhost/WebBanHangMoHinhMVC/AjaxCTSP/InsertCTSP",{mactsp:mactsp,
        masp: masp,mamausac : mamausac, makichco: makichco, hinhanh:hinhanh},function(data){
            var decodedData = JSON.parse(data);
         //alert(decodedData.echo);
         if(decodedData.kq==true){
            alert("them thanh cong");
            $("#ctsp").html(decodedData.echo);
            var soMuoi =parseInt( mactsp.slice(4))+1;
             var mamoi="CTSP"+parseInt(soMuoi);
             $("#mactsp").val(mamoi);
         }
         else {
            alert("chi tiet san pham da ton tại");
         }
        })
}

function updateCTSP(){
    var hinhanh=document.getElementById('filename').value;
    var mactsp=document.getElementById('mactsp').value;
    var masp=document.getElementById('masanpham').value;
    var mamausac=document.getElementById('mausac').value;
    var makichco=document.getElementById('kichco').value;
    //alert(hinhanh+" "+mactsp+" "+mamausac+" "+makichco);
    $.post("http://localhost/WebBanHangMoHinhMVC/AjaxCTSP/UpdateCTSP",{mactsp:mactsp,
    masp: masp,mamausac : mamausac, makichco: makichco, hinhanh:hinhanh},function(data){
        var decodedData = JSON.parse(data);
        //alert(decodedData.echo);
        if(decodedData.kq==true){
           alert(decodedData.echo);
           var url = "http://localhost/WebBanHangMoHinhMVC/Admin/default/ChiTietSanPhamPage,"+masp;
             window.location.assign(url);
           
        }
        else {
           alert(decodedData.echo);
        }
            
        })
}

function DeleteCTSP(ojt){
    
    var mactsp=ojt.id;
    
    alert(mactsp);
    // $.post("http://localhost/WebBanHangMoHinhMVC/AjaxCTSP/UpdateCTSP",{mactsp:mactsp,
    // masp: masp,mamausac : mamausac, makichco: makichco, hinhanh:hinhanh},function(data){
    //     var decodedData = JSON.parse(data);
    //     //alert(decodedData.echo);
    //     if(decodedData.kq==true){
    //        alert(decodedData.echo);
    //        var url = "http://localhost/WebBanHangMoHinhMVC/Admin/default/ChiTietSanPhamPage,"+masp;
    //          window.location.assign(url);
           
    //     }
    //     else {
    //        alert(decodedData.echo);
    //     }
            
    //     })
}