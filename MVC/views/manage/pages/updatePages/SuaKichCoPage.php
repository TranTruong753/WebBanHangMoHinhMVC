<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<?php
    
    $kichco=$data["DanhSach"]["KC"];
       
?>
<form id="submit_form" method="post" action="">
<?php
    if ($kichco->num_rows > 0) {
        while ($row = $kichco->fetch_assoc()) {
            echo '
            <label for="">Mã Màu Sắc</label><br>
            <input type="text" id="makichco" name="makichco" value="'.$row['MaKichCo'].'" ><br>
            <label for="">Tên Màu Sắc</label><br>
            <input type="text" id="tenkichco" name="tenkichco" value="'.$row['TenKichCo'].'" ><br>
            <input type = "button" onclick="UpdateKC()" value="update"></button>';
        }
    }
?>
    
    

<script src="http://localhost/WebBanHangMoHinhMVC/public/script/manage/QuanlyKCJS.js"></script>