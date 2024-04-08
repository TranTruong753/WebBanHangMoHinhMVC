$(document).ready(function(){
    $('#hinhanh').on('change',(e)=>{
        e.preventDefault();
        var formdata=new FormData();
        formdata.append('file',$("#hinhanh")[0].files[0])
        $.ajax({
            
            url: "http://localhost/WebBanHangMoHinhMVC/AjaxCTSP/InsertCTSP",
            data: formdata,
            dataType: "JSON",
            method: "POST",
            processData:false,
            contentType:false,
            success: function (data) {
                alert(data.success);
                $("#show").html('<img src="http://localhost/WebBanHangMoHinhMVC/public/img/'+data.src+'" alt="">');
                
            }
        });
    });
});