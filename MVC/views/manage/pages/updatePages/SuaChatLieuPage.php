<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<?php
    
    $chatlieu=$data["DanhSach"]["CL"];
       
?>
<form id="submit_form" method="post" action="">
<?php
    if ($chatlieu->num_rows > 0) {
        while ($row = $chatlieu->fetch_assoc()) {
            echo '
            <label for="">Mã Chất Liệu</label><br>
            <input type="text" id="machatlieu" name="machatlieu" value="'.$row['MaChatLieu'].'" ><br>
            <label for="">Tên Chất Liệu</label><br>
            <input type="text" id="tenchatlieu" name="tenchatlieu" value="'.$row['TenChatLieu'].'" ><br>
            <input type = "button" onclick="UpdateCL()" value="update"></button>';
        }
    }
?>
    
    

<script src="http://localhost/WebBanHangMoHinhMVC/public/script/manage/QuanlyCLJS.js"></script>