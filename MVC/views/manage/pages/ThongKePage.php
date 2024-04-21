<script src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<h1 style="text-align: center;">Thống Kê</h1>

<label for="select"></label>
<select name="select" id="selectThongKe">
    <option value="Top5">Top 5 sản phẩm bán chạy nhất trong tháng</option>
    <option value="">Thống kê theo Khoảng tgian</option>
</select>

<div id="content-chart">
</div>

<script>
    
    const RenderTop5Chart = `<style>
    .main {
        margin: auto;
        text-align: center;
    }

    .row {}

    .so-do-tron,.so-do-cot {
        border: 5px solid black;
    }
</style>

<div class="grid main">
<h4>TOP 5 SẢN PHẨM BÁN CHẠY NHẤT TRONG THÁNG</h4>

    <div class="row">
        <div class=" col l-7 so-do-cot" style="min-height: 50px; ">
            <div id="so-do-cot" style="width:100%;  height:500px;"></div>
        </div>
        <div class="col l-5 so-do-tron" style=" min-height: 50px;">
            <div id="so-do-tron" style="width:100%;  height:500px;">
            </div>
        </div>
    </div>

</div>`;

function renderTop5Chart()
{
   document.getElementById("content-chart").innerHTML = RenderTop5Chart ;

}
$(document).ready(function () {
   
    renderTop5Chart()

})
</script>
<script src="http://localhost/WebBanHangMoHinhMVC/public/script/admin/Top5SanPham.js"></script>
