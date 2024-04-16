<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<?php
    
    $mausac=$data["DanhSach"]["MS"];
       
?>
<form id="submit_form" method="post" action="">
<?php
    if ($mausac->num_rows > 0) {
        while ($row = $mausac->fetch_assoc()) {
            echo '
            <label for="">Mã Màu Sắc</label><br>
            <input type="text" id="mamausac" name="mamausac" value="'.$row['MaMauSac'].'" ><br>
            <label for="">Tên Màu Sắc</label><br>
            <input type="text" id="tenmausac" name="tenmausac" value="'.$row['TenMauSac'].'" ><br>
            <input type = "button" onclick="UpdateMS()" value="update"></button>';
        }
    }
?>
    
    

<script src="http://localhost/WebBanHangMoHinhMVC/public/script/manage/QuanlyMSJS.js"></script>