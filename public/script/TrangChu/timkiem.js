function showAlert() {
    var tensp =document.getElementById("search-form__input").value;
    $.post("http://localhost/WebBanHangMoHinhMVC/Ajax/TimSP",{tensp : tensp},function(data){

         $("#product__list").html(data);
        

    })
    
    };
    $(document).on('keyup keypress', 'form input[type="text"]', function(e) {
        if (e.keyCode === 13) {
            e.preventDefault();
            showAlert();
            return false;
        }
    });