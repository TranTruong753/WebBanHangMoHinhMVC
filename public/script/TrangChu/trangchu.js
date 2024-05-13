// $(document).ready(function(){
//     alert(1);
// });

$(document).ready(function(){
    $("#product__list").load("http://localhost/WebBanHangMoHinhMVC/Ajax/GetAllSP");
});
function getAllSP(ojt){
    var chungloai = ojt.id;
    // alert
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
        // alert("Hãy nhập tên sản phẩm");
        swal({
           text:"Hãy nhập tên sản phẩm"
        })
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

    function nextHero(){
        let slide = document.getElementById('slide-hero');
        let lists = document.querySelectorAll('.item-hero');
     
        // slide.appendChild(lists[0]);
          // Thêm sự kiện transitionend vào slide
        slide.addEventListener('transitionend', function() {
            // Xóa sự kiện transitionend để tránh gọi nó nhiều lần
            slide.removeEventListener('transitionend', arguments.callee);

            // Sau khi transition kết thúc, thêm phần tử đầu tiên vào cuối danh sách
            slide.appendChild(lists[0]);
            
            // Reset transform để slide quay lại vị trí ban đầu
            slide.style.transition = 'none';
            slide.style.transform = 'translateX(0)';
            
            // Kích hoạt lại transition để tạo hiệu ứng mượt mà
            setTimeout(function() {
                slide.style.transition = 'transform 0.5s ease';
            });
        });
    
        // Di chuyển slide sang trái
        slide.style.transform = 'translateX(-100%)';
        

    }

    
    function preHero(){
        let slide = document.getElementById('slide-hero');
        let lists = document.querySelectorAll('.item-hero');
        slide.prepend(lists[lists.length-1]);
   
   
        

    }


 
    function next() {
        let slide = document.getElementById('slide');
        let lists = document.querySelectorAll('.item');
    
        // Thêm sự kiện transitionend vào slide
        slide.addEventListener('transitionend', function() {
            // Xóa sự kiện transitionend để tránh gọi nó nhiều lần
            slide.removeEventListener('transitionend', arguments.callee);
    
            // Sau khi transition kết thúc, thêm phần tử đầu tiên vào cuối danh sách
            slide.appendChild(lists[0]);
            
            // Reset transform để slide quay lại vị trí ban đầu
            slide.style.transition = 'none';
            slide.style.transform = 'translateX(0)';
            
            // Kích hoạt lại transition để tạo hiệu ứng mượt mà
            setTimeout(function() {
                slide.style.transition = 'transform 0.5s ease';
            });
        });
    
        // Di chuyển slide sang trái
        slide.style.transform = 'translateX(-300px)';
    }

   function prev() {
        let slide = document.getElementById('slide');
        let lists = document.querySelectorAll('.item');
    
        // Thêm phần tử cuối cùng vào đầu danh sách
       
    
        // Thêm sự kiện transitionend vào slide
        slide.addEventListener('transitionend', function() {
            // Xóa sự kiện transitionend để tránh gọi nó nhiều lần
            slide.prepend(lists[lists.length-1]);
            slide.removeEventListener('transitionend', arguments.callee);
    
            // Sau khi transition kết thúc, reset transform để slide quay lại vị trí ban đầu
            slide.style.transition = 'none';
            slide.style.transform = 'translateX(0)';
            
            // Kích hoạt lại transition để tạo hiệu ứng mượt mà
            setTimeout(function() {
                slide.style.transition = 'transform 0.5s ease';
            });
        });
    
        // Di chuyển slide sang phải
        slide.style.transform = 'translateX(300px)';
    }

    //  document.getElementById('next-hero').onclick = function() {
    //     let slide = document.getElementById('slide-hero');
    //     let lists = document.querySelectorAll('.item-hero');
    
    //     // Thêm sự kiện transitionend vào slide
    //     slide.addEventListener('transitionend', function() {
    //         // Xóa sự kiện transitionend để tránh gọi nó nhiều lần
    //         slide.removeEventListener('transitionend', arguments.callee);
    
    //         // Sau khi transition kết thúc, thêm phần tử đầu tiên vào cuối danh sách
    //         slide.appendChild(lists[0]);
            
    //         // Reset transform để slide quay lại vị trí ban đầu
    //         slide.style.transition = 'none';
    //         slide.style.transform = 'translateX(0)';
            
    //         // Kích hoạt lại transition để tạo hiệu ứng mượt mà
    //         setTimeout(function() {
    //             slide.style.transition = 'transform 0.5s ease';
    //         });
    //     });
    
    //     // Di chuyển slide sang trái
    //     slide.style.transform = 'translateX(-100%)';
    // }

    
   


    