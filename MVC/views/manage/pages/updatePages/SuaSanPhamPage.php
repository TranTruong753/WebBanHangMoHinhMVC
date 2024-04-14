<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<?php
    $theloai=$data["DanhSach"]["TL"];
    $chatlieu=$data["DanhSach"]["CL"];
    $sanpham=$data["DanhSach"]["SP"];
    $km=$data["DanhSach"]["KM"];
   
    
    
?>
<form method="post">
<?php
    if ($sanpham->num_rows > 0) {
        while ($row = $sanpham->fetch_assoc()) {
            echo '    
            <label for="">Mã sản phẩm</label><br>
            <input type="text" id="masanpham" value="'.$row['MaSanPham'].'"> <br>

            <label for="">Tên sản phẩm</label><br>
            <input type="text" id="tensanpham" value="'.$row['TenSanPham'].'"> <br>

            <label for="">Giá Nhập</label><br>
            <input type="text" id="gianhap" value="'.$row['GiaNhap'].'"> <br>

            <label for="">Khuyến mãi</label> <br>
            <select name="" id="khuyenmai"  class="">
                <option  value="'.$row['MaKhuyenMai'].'" >'.$row['TenKhuyenMai'].'-'.$row['MucKhuyenMai'].'%</option>';
                
                if ($km->num_rows > 0) {
                    while ($row1 = $km->fetch_assoc()) {
                        if($row1['MaKhuyenMai']!=$row['MaKhuyenMai'])
                            echo '<option  value="'.$row1['MaKhuyenMai'].'" >'.$row1['TenKhuyenMai'].'-'.$row1['MucKhuyenMai'].'%</option>';
                    }
                }
            echo'    
            </select><br>

            <label for="">Thể loại</label> <br>
            <select name="" id="theloai"  class="">
                <option  value="'.$row['MaTheLoai'].'" >'.$row['TenTheLoai'].'</option>';
                
                if ($theloai->num_rows > 0) {
                    while ($row2 = $theloai->fetch_assoc()) {
                        if($row2['MaTheLoai']!=$row['MaTheLoai'])
                            echo '<option  value="'.$row2['MaTheLoai'].'" >'.$row2['TenTheLoai'].'</option>';
                    }
                }
                echo'
                
            </select><br>

            <label for="">Chất liệu</label> <br>
            <select name="" id="chatlieu"  class="">
                <option  value="'.$row['MaChatLieu'].'" >'.$row['TenChatLieu'].'</option>';
            
                if ($chatlieu->num_rows > 0) {
                    while ($row3 = $chatlieu->fetch_assoc()) {
                        if($row3['MaChatLieu']!=$row['MaChatLieu'])
                            echo '<option  value="'.$row3['MaChatLieu'].'" >'.$row3['TenChatLieu'].'</option>';
                    }
                }
            echo'    
            </select><br>
        </form>
        <button type = "button" onclick="updateSP()">Cập nhật</button>';
    }
    }
?>
    

<script src="http://localhost/WebBanHangMoHinhMVC/public/script/manage/QuanlySPJS.js"></script>

    
    

