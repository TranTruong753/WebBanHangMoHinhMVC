<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<?php
    $chungloai=$data["DanhSach"]["CL"];
?>
<form method="post">
<label for="">Chủng Loại</label> <br>
    <select name="" id="machungloai"  class="">
        <?php
        if ($chungloai->num_rows > 0) {
            while ($row = $chungloai->fetch_assoc()) {
                    echo '<option  value="'.$row['MaChungLoai'].'" >'.$row['TenChungLoai'].'</option>';
            }
        }
        ?>
    </select><br>
    <label for="">Tên Thể Loại</label><br>
    <input type="text" id="tentheloai"> <br>

    <button type = "button" onclick="addTL()">Thêm</button>

    <script src="http://localhost/WebBanHangMoHinhMVC/public/script/manage/QuanlyTLJS.js"></script>
</form>