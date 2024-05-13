<!DOCTYPE html>
<html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

<body>
  <!-- <input type='text' id='txt'>
<input type='button' value="oke" onclick='btn()'> -->
  <h1 class = 'styleText-01' >Thống kê kinh doanh</h1>
  <a class="form-add__link" href="http://localhost/WebBanHangMoHinhMVC/admin/default/ThongKePage">Thống kê sản phẩm bán chạy></a>

<div class="form_add">
   <div class="input-chart_wrap">
      <label  class="styleText-04 label-add" for="seletHinhThucThongKe">Hình Thức Thống Kê:</label> 
      <select class="input-add" onchange="changeSelect(this)" name="" id="seletHinhThucThongKe">
        <option value="month">Thống kê theo tháng</option>
        <option value="year">Thống kê theo năm</option>
      </select>
   </div>
  
  
    <form id="form" class="">
      <div class="input-add_wrap">
        <label  class="styleText-04 label-add" for="txtThang">Tháng: </label>
        <input class="input-add" id="txtThang" type="text" placeholder="Nhập tháng...">
      </div>
     <div class="input-add_wrap">
        <label class="styleText-04 label-add" for="txtNam"> Của Năm: </label>
        <input class="input-add" id="txtNam" type="text" placeholder="Nhập năm...">
     </div>
      <div class="input-add_wrap">
        <button class="btn" type="button" onclick="ThongKeTheoThang()" value="Cập Nhật">Cập nhật</button>
      </div>
    </form>
</div>
  <canvas id="myChart" class="form_chart-02 " style="width:100%;max-width:600px"></canvas>


  <script>
    var valueSelected = 'month';

    function getDateNow() {
      // Tạo một đối tượng Date hiện tại
      var today = new Date();

      // Lấy thông tin về ngày, tháng, năm
      var year = today.getFullYear();
      var month = String(today.getMonth() + 1).padStart(2, '0'); // Thêm '0' nếu tháng là một chữ số
      var day = String(today.getDate()).padStart(2, '0'); // Thêm '0' nếu ngày là một chữ số

      // Định dạng theo yyyy-MM-dd
      var formattedDate = year + '-' + month + '-' + day;
      return formattedDate;
    }

    function changeSelect(obj) {
      var render = ``;
      valueSelected = obj.value;
      if (valueSelected == 'year') {
        render = `
       <div class="input-add_wrap">
          <label class="styleText-04 label-add" for="txtNamYear">Năm: </label>
          <input class="input-add" id="txtNamYear" type="text" placeholder="Nhập năm...">
       </div>
      <div class="input-add_wrap">
        <button class="btn" type="button" onclick="ThongKeTheoNam()" value="Cập Nhật">Cập Nhật</button>
      </div>
      `;
      } else if (valueSelected == 'month') {
        render = `
       <div class="input-add_wrap">
          <label  class="styleText-04 label-add" for="">Tháng: </label>
          <input class="input-add" id="txtThangMonth" type="text" placeholder="Nhập tháng...">
       </div>
       <div class="input-add_wrap">
          <label  class="styleText-04 label-add" for=""> Của Năm: </label>
          <input class="input-add" id="txtNamMonth" type="text placeholder="Nhập năm...">
       </div>
      <div class="input-add_wrap">
        <button class="btn" type="button" onclick="ThongKeTheoThang()" value="Cập Nhật">Cập Nhật</button>
      </div>
`;
      }
      document.getElementById('form').innerHTML = render;

    }

    function ThongKeTheoThang() {
      CapNhatBieuDo(['Tháng 1'], [50])
    }

    function ThongKeTheoNam() {
      var year =document.getElementById('txtNamYear').value;
      // alert(year);

      $.ajax({
        url:'http://localhost/WebBanHangMoHinhMVC/AjaxHoaDon/getThongKeTrong1Nam',
        type:'post',
        dataType:'html',
        data:{
          year:year
        },
        success:function(data){
          // alert(data);
          var arrLabel = [];
          var arrValue = [];
          var json =JSON.parse(data.trim());
          json.forEach(item => {
            arrLabel.push(item[0]);
            arrValue.push(item[1]);
          });
          CapNhatBieuDo(arrLabel,arrValue);
          
        }
      })
      // CapNhatBieuDo(['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
      //   [100, 11, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12])
    }

    function CapNhatBieuDo(xValues, yValues) {


      new Chart("myChart", {
        type: "line",
        data: {
          labels: xValues,
          datasets: [{
            fill: false,
            lineTension: 0,
            backgroundColor: "rgba(0,0,255,1.0)",
            borderColor: "rgba(0,0,255,0.1)",
            data: yValues
          }]
        },
        options: {
          legend: {
            display: false
          },
          scales: {
            yAxes: [{
              ticks: {
                min: Math.min(...yValues),
                max: Math.max(...yValues)
              }
            }],
          }
        }
      });
    }
  </script>

</body>

</html>