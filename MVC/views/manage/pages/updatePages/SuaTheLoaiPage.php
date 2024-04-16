<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<?php
    
    $theloai=$data["DanhSach"]["TL"];
    $chungloai=$data["DanhSach"]["CL"];
       
?>
<form id="submit_form" method="post" action="">
<?php
    if ($theloai->num_rows > 0) {
        while ($row = $theloai->fetch_assoc()) {
            echo '
            <label for="">Mã thể loại</label><br>
            <input type="text" id="matheloai" name="matheloai" value="'.$row['MaTheLoai'].'" ><br>
            <select name="" id="machungloai"  class="">';
            if ($chungloai->num_rows > 0) {
                while ($rows = $chungloai->fetch_assoc()) {
                        echo '<option  value="'.$rows['MaChungLoai'].'" >'.$rows['TenChungLoai'].'</option>';
                }
            }
            echo '
            </select><br>
            <label for="">Tên thể loại</label><br>
            <input type="text" id="tentheloai" name="tentheloai" value="'.$row['TenTheLoai'].'" ><br>
            <input type = "button" onclick="UpdateTL()" value="update"></button>';
        }
    }
?>
    
    

<script src="http://localhost/WebBanHangMoHinhMVC/public/script/manage/QuanlyTLJS.js"></script>