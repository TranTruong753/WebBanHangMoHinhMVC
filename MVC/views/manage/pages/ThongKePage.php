<!DOCTYPE html>
<html>
<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<body>
<!-- <input type='text' id='txt'>
<input type='button' value="oke" onclick='btn()'> -->
<p><pre>Top <input type="text" class="top"> Sản Phẩm Bán Chạy Nhất</pre></p>
<p><pre>Trong Khoảng <input type="date" class="start"> đến <input type="date" class="end"></pre></p>
<p><pre id="x"></pre></p>
<input type="button" value="Cập Nhật" onclick="btnCapNhat()">
<div style="display: flex;">
<div id="BieuDoCot" style="width:100%;max-width:700px"></div>
<div id="BieuDoTron" style="width:100%;max-width:700px"></div>
</div>

<div
id="myChart" style="width:100%; max-width:600px; height:500px;">
</div>


<script>

function btnCapNhat()
{
  var top =document.getElementsByClassName('top')[0].value;
  // console.log("top: "+top);

  var start = document.getElementsByClassName('start')[0].value;
  // console.log('start: '+start);

  var end = document.getElementsByClassName('end')[0].value;
  // console.log('end  : '+end);

  getData(top,start,end);
  // console.log("arr: "+arrThongKe);

}

function getData(top,start,end)
    {
        var arr =  $.ajax({
            url: "http://localhost/WebBanHangMoHinhMVC/AjaxHoaDon/getDanhSachThongKeTrong1KhoangThoiGian",
            type: "post",
            dataType: "html",
            data: {
              top:top,
              start:start,
              end:end
            },
            success: function(data) {
            console.log("dataSuccess:"+ data);


             arr = JSON.parse(data.trim())
             var arrLabel=[]
             var arrValue=[]
             arr.forEach(item => {
              arrLabel.push(item[0]);
              arrValue.push(item[1]);
             });
             console.log("arrLabel: "+arrLabel);
            // return json;
            CapNhapBieuDoCot(arrLabel,arrValue)
            CapNhatBieuDoTron(arrLabel,arrValue)

            // arr.unshift(['Sản Phẩm','Số Lượng']);
            // CapNhatBieuDoTron(arr);

            }

        });

        // console.log("arr ngoài :" + arr)
        // return arr;
    }





function CapNhapBieuDoCot(arrLabel,arrValue)
{
const data = [{
  x:arrValue,
  y:arrLabel,
  type:"bar",
  orientation:"h",
  marker: {color:"rgba(255,0,0,0.6)"}
}];

const layout = {title:"World Wide Wine Production"};

Plotly.newPlot("BieuDoCot", data, layout);
}

/////////////////////////////


// google.charts.load('current', {'packages':['corechart']});
// google.charts.setOnLoadCallback(CapNhatBieuDoTron);

// function CapNhatBieuDoTron(data) {
// const data = google.visualization.arrayToDataTable(data);

// const options = {
//   title:'World Wide Wine Production',
//   is3D:true
// };

// const chart = new google.visualization.PieChart(document.getElementById('myChart'));
//   chart.draw(data, options);
// }

function CapNhatBieuDoTron(arrLabel,arrValue)
{
  
const layout = {title:"World Wide Wine Production"};

const data = [{labels:arrLabel, values:arrValue, type:"pie"}];

Plotly.newPlot("BieuDoTron", data, layout);
}

</script>

</body>
</html>
