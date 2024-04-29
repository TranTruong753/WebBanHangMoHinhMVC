

var arrThongKe=[]
$(document).ready(function(){
    $.ajax({
        url:"http://localhost/WebBanHangMoHinhMVC/AjaxHoaDon/getDanhSachThongKeTrong1Thang",
        type:"post",
        dataType:"html",
        data:{},
        success:function(data)
        {
            console.log("trước")
            console.log("data:"+ data.trim()  );
            console.log("xong")


            var json = JSON.parse(data.trim())
            console.log("json:"+json)
            arrThongKe = [...arrThongKe, ...json]
            
        }
        
    })
})


// Sơ đồ cột
google.charts.load('current', {
    'packages': ['corechart']
});
google.charts.setOnLoadCallback(VeSoDoCot);

function VeSoDoCot() {

    const data = google.visualization.arrayToDataTable(arrThongKe);

    const options = {
        title: 'SƠ ĐỒ CỘT'
    };

    const SoDoCot = new google.visualization.BarChart(document.getElementById('so-do-cot'));
    SoDoCot.draw(data, options);
}

//sơ Đồ tròn



google.charts.load('current', {
    'packages': ['corechart']
});
google.charts.setOnLoadCallback(VeSoDoTron);

function VeSoDoTron() {
    const data = google.visualization.arrayToDataTable(arrThongKe);

    const options = {
        title: 'SƠ ĐỒ BÁNH QUY',
        is3D: true
    };

    const SoDoTron = new google.visualization.PieChart(document.getElementById('so-do-tron'));
    SoDoTron.draw(data, options);
}
