function test(){
    var arr=[];
var radioButtons = document.getElementsByName("product");
    for (var i = 0; i < radioButtons.length; i++) {
        if (radioButtons[i].checked === true) {
            arr.push(radioButtons[i].id);
            
        }
    }
    alert("Giới tính đã chọn: " + arr[0]+" "+ arr[1]);
}
