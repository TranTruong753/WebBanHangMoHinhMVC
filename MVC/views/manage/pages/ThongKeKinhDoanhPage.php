<!DOCTYPE html>
<html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

<body>
  <!-- <input type='text' id='txt'>
<input type='button' value="oke" onclick='btn()'> -->
<a href="http://localhost/WebBanHangMoHinhMVC/admin/default/ThongKePage">Thống kê sản phẩm bán chạy></a>
<br>
<pre><label for="seletHinhThucThongKe">Hình Thức Thống Kê:</label> <select onchange="changeSelect(this)" name="" id="seletHinhThucThongKe">
    <option value="month">Thống kê theo tháng</option>
    <option value="year">Thống kê theo năm</option>
  </select>
</pre>
 
<form id="form">
<label for="">Tháng: </label><input id="txtThang" type="text">
<label for=""> Của Năm: </label><input id="txtNam" type="text">
<input type="button" onclick="ThongKeTheoThang()" value="Cập Nhật">
</form>
<canvas id="myChart" style="width:100%;max-width:600px"></canvas>


  <script>
    var valueSelected='month';
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

    function changeSelect(obj)
    {
      var render =``;
      valueSelected = obj.value;
      if(valueSelected == 'year')
      {
        render=`<label for="">Năm: </label><input id="txtNam" type="text">
      <input type="button" onclick="ThongKeTheoNam()" value="Cập Nhật">`;
      }
      else if(valueSelected == 'month' )
      {
        render = `<label for="">Tháng: </label><input id="txtThang" type="text">
<label for=""> Của Năm: </label><input id="txtNam" type="text">
<input type="button" onclick="ThongKeTheoThang()" value="Cập Nhật">`;
      }
      document.getElementById('form').innerHTML = render;

    }

    function ThongKeTheoThang(){
      CapNhatBieuDo(['Tháng 1'],[50])
    }
    function ThongKeTheoNam(){
      CapNhatBieuDo(['Tháng 1','Tháng 2','Tháng 3','Tháng 4','Tháng 5','Tháng 6','Tháng 7','Tháng 8','Tháng 9','Tháng 10','Tháng 11','Tháng 12'],
      [100,11,2,3,4,5,6,7,8,9,10,11,12])
    }

   function CapNhatBieuDo(xValues,yValues ){
      

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
    legend: {display: false},
    scales: {
      yAxes: [{ticks: {min: 6, max:16}}],
    }
  }
});
    }

  </script>

</body>

</html>