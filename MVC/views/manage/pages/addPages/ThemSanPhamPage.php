<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<?php
    $theloai=$data["DanhSach"]["TL"];
    $chatlieu=$data["DanhSach"]["CL"];
    $sanpham=$data["DanhSach"]["SP"];
    $dem=0;
    if ($sanpham->num_rows > 0) {
        while ($row = $sanpham->fetch_assoc()) {
                $dem++;
        }
    }
    
?>
<form method="post">
    
    <label for="">Mã sản phẩm</label><br>
    <input type="text" id="masanpham" value="SP00<?php echo $dem;?>"> <br>

    <label for="">Tên sản phẩm</label><br>
    <input type="text" id="tensanpham"> <br>

    <label for="">Giá sản phẩm</label><br>
    <input type="text" id="giasanpham"> <br>

    <label for="">Thể loại</label> <br>
    <select name="" id="theloai"  class="">
        <?php
        if ($theloai->num_rows > 0) {
            while ($row = $theloai->fetch_assoc()) {
                    echo '<option  value="'.$row['MaTheLoai'].'" >'.$row['TenTheLoai'].'</option>';
            }
        }
        ?>
    </select><br>

    <label for="">Chất liệu</label> <br>
    <select name="" id="chatlieu"  class="">
    <?php
        if ($chatlieu->num_rows > 0) {
            while ($row = $chatlieu->fetch_assoc()) {
                    echo '<option  value="'.$row['MaChatLieu'].'" >'.$row['TenChatLieu'].'</option>';
            }
        }
        ?>
    </select><br>

    <button type = "button" onclick="addSP()">Thêm</button>

<script src="http://localhost/WebBanHangMoHinhMVC/public/script/manage/QuanlySPJS.js"></script>

    
    

</form>
