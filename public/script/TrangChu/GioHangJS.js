const largeImage = document.getElementById('largeImage');
const smallImages = document.querySelectorAll('.content__img-item');

    // Xử lý sự kiện khi nhấn vào ảnh nhỏ
    smallImages.forEach((smallImage) => {
        smallImage.addEventListener('click', () => {
            largeImage.src = smallImage.src;
        });
    });
    // $(".cart-item__icon").click(function (e) { 
    //     e.preventDefault();
    //     var mactsp=$(this).attr("id");
    //        alert(mactsp);
    //        $.post("http://localhost/WebBanHangMoHinhMVC/Ajax/XoaGioHang",{mactsp: mactsp},function(data){
    //         alert("xóa thành công");
    //         $("#cart-preview").html(data);
    //         })
        
    // });
    // $(".cart__list").on("click","i",function(){
    //       var mactsp=$(this).attr("id");
    //       alert(mactsp);
    //       $.post("http://localhost/WebBanHangMoHinhMVC/Ajax/XoaGioHang",{mactsp: mactsp},function(data){
    //         alert("xóa thành công");
    //         $("#cart-preview").html(data);
    //         })
    //     });
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
    
    // var radioButtons = document.getElementsByName("mausac");
    // for (var i = 0; i < radioButtons.length; i++) {
    //     if (radioButtons[i].checked === true) {
    //         alert("Giới tính đã chọn: " + radioButtons[i].value);
    //     }
    // }
    var mamausac = "1"; 
    var makh = document.getElementById('username').value;
    
    const selectElement = document.getElementById("content__input-select");
    const makichco = selectElement.value;
    //alert("Giá trị của option được chọn: " + selectedValue);
    const sl = document.getElementById('content__input-number').value;
    if(sl>=1){
        alert(makh+"--"+masp+"--"+mamausac+"--"+makichco+"--"+sl);
        //alert(1);
        $.post("http://localhost/WebBanHangMoHinhMVC/Ajax/GioHang",{makh : makh,
        masp: masp,mamausac : mamausac, makichco: makichco, sl: sl},function(data){
            alert("Thêm thành công");
            $("#cart-preview").html(data);
            })
    }
    else alert("Số lượng chọn cần phải lớn hơn 0");
    };                                   
                                    
