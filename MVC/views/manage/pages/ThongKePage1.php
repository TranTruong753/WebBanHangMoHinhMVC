<script src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<h1 class="styleText-02">Thống Kê</h1>

<label for="select"></label>

<!-- <form method="post" action="process.php">
    Từ ngày: <input type="date" name="tuNgay">
    Đến ngày: <input type="date" name="denNgay">
    <input type="submit" value="Submit">
</form> -->

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


   
    function getData()
    {
        var arrThongKe = []
        $.ajax({
            url: "http://localhost/WebBanHangMoHinhMVC/AjaxHoaDon/getDanhSachThongKeTrong1Thang",
            type: "post",
            dataType: "html",
            data: {},
            success: function(data) {
                console.log("trước")
                console.log("data:" + data.trim());
                console.log("xong")


                arrThongKe = JSON.parse(data.trim())
                // console.log("json:" + arrThongKe)
                

            }

        })
        return arrThongKe;
    }

  
</script>
<script src="http://localhost/WebBanHangMoHinhMVC/public/script/admin/Top5SanPham.js"></script>