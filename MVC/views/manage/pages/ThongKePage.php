<!DOCTYPE html>
<html>
<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<body>
  <h1 class = 'styleText-01' >Quản lý thống kê</h1>
  <a class="form-add__link" href="http://localhost/WebBanHangMoHinhMVC/admin/default/ThongKeKinhDoanhPage">Thống kê kinh doanh của cửa hàng></a>
  <!-- <input type='text' id='txt'>
<input type='button' value="oke" onclick='btn()'> -->
 
 <div class="form_add">
   <div  class="input-add_wrap input-date_wrap"> 
      <label class="styleText-04 label-add" for="top">Top:</label>
      <input class="input-add" id="top" type="text" class="top" placeholder="Top sản phẩm"> Sản Phẩm Bán Chạy Nhất</div>
    
   <div  class="input-add_wrap input-date_wrap">
      <div class="input-date_wrap">
        <label class="styleText-04 label-add">Trong Khoảng:</label><input class="input-add" id="start" type="date" class="start"> 
      </div>
     
      <div class=" input-date_wrap">
        <label class="styleText-04 label-add">đến:</label><input class="input-add" id="end" type="date" class="end">    
      </div>
     
   </div>
    <p>
      <pre id="x"></pre>
    </p>
    
    <div class="input-date_wrap input-add_wrap">
      <button class="btn" type="button" value="Cập Nhật" onclick="btnCapNhat()">Cập Nhật</button>
    </div>
 </div>

  <div class="form_chart">
    <div class="chart_column" id="BieuDoCot"></div>
    <div class="chart_round" id="BieuDoTron"></div>
  </div>

  <div id="myChart" style="width:100%; max-width:600px; height:500px;">
  </div>


  <script>
    function getDateNow() {
      // Tạo một đối tượng Date hiện tại
      var today = new Date();

      // Lấy thông tin về ngày, tháng, năm
      var year = today.getFullYear();
      var month = String(today.getMonth() + 1).padStart(2, '0'); // Thêm '0' nếu tháng là một chữ số
      var day = String(today.getDate()).padStart(2, '0'); // Thêm '0' nếu ngày là một chữ số

      // Định dạng theo yyyy-MM-dd
      var formattedDate = year + '-' + month + '-' + day;
      // alert(formattedDate);
      return formattedDate;
    }
    $(document).ready(function() {
      getData(2, '2000-01-01', getDateNow());
    })

    function btnCapNhat() {
      var top = document.getElementById('top').value;
      // console.log("top: "+top);

      var start = document.getElementById('start').value;
      // console.log('start: '+start);

      var end = document.getElementById('end').value;
      // console.log('end  : '+end);

      getData(top, start, end);
      // console.log("arr: "+arrThongKe);

    }

    function getData(top, start, end) {
      var arr = $.ajax({
        url: "http://localhost/WebBanHangMoHinhMVC/AjaxHoaDon/getDanhSachThongKeTrong1KhoangThoiGian",
        type: "post",
        dataType: "html",
        data: {
          top: top,
          start: start,
          end: end
        },
        success: function(data) {
          console.log("dataSuccess:" + data);


          arr = JSON.parse(data.trim())
          var arrLabel = []
          var arrValue = []
          arr.forEach(item => {
            arrLabel.push(item[0]);
            arrValue.push(item[1]);
          });
          console.log("arrLabel: " + arrLabel);
          // return json;
          CapNhapBieuDoCot(arrLabel, arrValue)
          CapNhatBieuDoTron(arrLabel, arrValue)

          // arr.unshift(['Sản Phẩm','Số Lượng']);
          // CapNhatBieuDoTron(arr);

        }

      });

      // console.log("arr ngoài :" + arr)
      // return arr;
    }





    function CapNhapBieuDoCot(arrLabel, arrValue) {
      

const data = [{
  x:arrLabel,
  y:arrValue,
  type:"bar"
}];

const layout = {title:"Biểu đồ cột"};

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

    function CapNhatBieuDoTron(arrLabel, arrValue) {

      const layout = {
        title: "Biểu đồ tròn"
      };

      const data = [{
        labels: arrLabel,
        values: arrValue,
        type: "pie"
      }];

      Plotly.newPlot("BieuDoTron", data, layout);
    }
  </script>

</body>

</html>