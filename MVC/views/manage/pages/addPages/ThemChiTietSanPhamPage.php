<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<?php
    $sanpham=$data["DanhSach"]["SP"];
    $ctsp=$data["DanhSach"]["CTSP"];
    $mausac=$data["DanhSach"]["MS"];
    $kichco=$data["DanhSach"]["KC"];
    $dem=1;
    if ($ctsp->num_rows > 0) {
        while ($row = $ctsp->fetch_assoc()) {
                $dem++;
        }
        $ctsp->data_seek(0);
    }
    $masp="";
    $tensp="";
    if ($sanpham->num_rows > 0) {
        $row = $sanpham->fetch_assoc();
        $masp=$row['MaSanPham'];
        $tensp=$row['TenSanPham'];
        $sanpham->data_seek(0);
    }
    
?>
<form id="submit_form" method="post" action="">
    
    <label for="">Mã sản phẩm</label><br>
    <input type="text" id="masanpham" value="<?php echo $masp;?>"> <br>
    <label for="">Ten sản phẩm</label><br>
    <input type="text" id="tensanpham" name="tensanpham" value="<?php echo $tensp;?>"> <br>
    <p>---------------------------------------------</p><br>

    <label for="">Ma chi tiet san pham</label><br>
    <input type="text" id="mactsp" value="CTSP<?php echo $dem;?>"> <br>

    <label for="">Hinh anh</label><br>
    <input type="file" name="hinhanh" id="hinhanh"  > <br>
    <div class="show" id="show">
        
    </div>
    <!-- <p id="test" class="test">cc</p> -->
    <label for="">Mau sac</label> <br>
    <select name="" id="mausac"  class="">
        <?php
        if ($mausac->num_rows > 0) {
            while ($row = $mausac->fetch_assoc()) {
                    echo '<option  value="'.$row['MaMauSac'].'" >'.$row['TenMauSac'].'</option>';
            }
        }
        ?>
    </select><br>

    <label for="">kich co</label> <br>
    <select name="" id="kichco"  class="">
    <?php
        if ($kichco->num_rows > 0) {
            while ($row = $kichco->fetch_assoc()) {
                    echo '<option  value="'.$row['MaKichCo'].'" >'.$row['TenKichCo'].'</option>';
            }
        }
        ?>
    </select><br>

    <input type = "button" onclick="addCTSP()" value="thêm"></button>
</form>
<div id="ctsp"></div>
<script>
//     $(document).ready(function(){
//         $('#hinhanh').on('change',(e)=>{
            
//             e.preventDefault();
//             alert(1);
//             //alert("data");
//             var test= document.getElementsByName('submit_form');
//             // $.post("http://localhost/WebBanHangMoHinhMVC/AjaxCTSP/InsertCTSP",{data:  new FormData(this)},function(data){
//             //     alert(data);
//             // });
//             var formdata=new FormData();
//             formdata.append('file',$("#hinhanh")[0].files[0])
//             $.ajax({
                
//                 url: "http://localhost/WebBanHangMoHinhMVC/AjaxCTSP/InsertCTSP",
//                 data: formdata,
//                 dataType: "JSON",
//                 method: "POST",
//                 processData:false,
//                 contentType:false,
//                 success: function (response) {
//                     $("#show").html('<p id="test" class="test">hello</p>');
                    
                   
                   
                    
//                 }
//             });
//         });
// });
</script>
<script src="http://localhost/WebBanHangMoHinhMVC/public/script/manage/test.js"></script>