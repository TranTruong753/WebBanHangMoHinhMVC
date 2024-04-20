// var Top5 = `<style>
// .main {

//     margin-left: 50px;
//     text-align: center;
// }
// </style>
// <div class="grid main ">

// <div class="row">
//     <div class=" col so-do-cot l-12" style="min-height: 50px; background-color: red;">
//         <div id="myChart" style="width:100%; max-width:1280px; height:500px; border: 5px solid ;"></div>
//     </div>

// </div>
// </div>`;

// //load sơ đồ cột Top 5 sản phẩm
// google.charts.load('current', {
//     'packages': ['corechart']
// });
// google.charts.setOnLoadCallback(drawChart);

// function drawChart() {
//     const data = google.visualization.arrayToDataTable([
//         ['Sản Phẩm', 'Số Lượng'],
//         ['Italy', 100],
//         ['France', 49],
//         ['Spain', 44],
//         ['USA', 24],
//         ['Argentina', 15]
//     ]);

//     const options = {
//         title: 'Top 5 sản phẩm bán chạy trong tháng'
//     };

//     const chart = new google.visualization.BarChart(document.getElementById('myChart'));
//     chart.draw(data, options);
// }
// $(document).ready(function(){
//     document.getElementsByClassName("content")[0].innerHTML=Top5;
   
// })


var arrThongKe=[['Sản Phẩm', 'Số Lượng']];
$(document).ready(function(){
    $.ajax({
        url:"http://localhost/WebBanHangMoHinhMVC/AjaxHoaDon/getDanhSachThongKeTrong1Thang",
        type:"post",
        dataType:"html",
        data:{},
        success:function(data)
        {
            // console.log("trước")
            // console.log("data:"+ data.trim()  );
            // console.log("xong")


            var json = JSON.parse(data.trim())
            console.log(json)
            arrThongKe = [...arrThongKe, ...json]
            
            // concat(arrThongKe,json)
            console.log(arr);
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
