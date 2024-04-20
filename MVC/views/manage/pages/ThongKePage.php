<script src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<h1 style="text-align: center;">Thống Kê</h1>

<label for="select"></label>
<select name="select" id="selectThongKe">
    <option value="Top5">Top 5 sản phẩm bán chạy nhất trong tháng</option>
    <option value="">Thống kê theo Khoảng tgian</option>
</select>

<div id="content-top-5">
    <?php require_once 'chartPages/Top5SanPham.php'?>
</div>

<script>
    
$(document).ready(function () {
   
   console.log(document.getElementById("content-top-5")) ;
    

})
</script>