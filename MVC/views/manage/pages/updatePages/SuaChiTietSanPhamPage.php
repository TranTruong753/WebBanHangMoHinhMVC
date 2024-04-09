<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<?php
    
    $ctsp=$data["DanhSach"]["CTSP"];
    $mausac=$data["DanhSach"]["MS"];
    $kichco=$data["DanhSach"]["KC"];
    
    
?>
<form id="submit_form" method="post" action="">
<?php
    if ($ctsp->num_rows > 0) {
        while ($row = $ctsp->fetch_assoc()) {
            echo '
            <label for="">Mã sản phẩm</label><br>
            <input type="text" id="masanpham" value="'.$row['MaSanPham'].'" ><br>
            <label for="">Ten sản phẩm</label><br>
            <input type="text" id="tensanpham" name="tensanpham" value="'.$row['TenSanPham'].'" ><br>
            <p>---------------------------------------------</p><br>
        
            <label for="">Ma chi tiet san pham</label><br>
            <input type="text" id="mactsp" value="'.$row['MaChiTietSanPham'].'"> <br>
        
            <label for="">Hinh anh</label><br>
            <input type="file" name="hinhanh" id="hinhanh"  > <br>
            <div class="show" id="show">
            <img src="http://localhost/WebBanHangMoHinhMVC/public/img/'.$row['HinhAnh'].'
                " weight=200px height=200px alt="">
            <input type="hidden" id ="filename" value ="'.$row['HinhAnh'].'"/>
            </div>
            <label for="">Mau sac</label> <br>
            <select name="" id="mausac"  class="">
            <option  value="'.$row['MaMauSac'].'" >'.$row['TenMauSac'].'</option>';
            if ($mausac->num_rows > 0) {
                while ($row1 = $mausac->fetch_assoc()) {
                    if($row1['MaMauSac']!=$row['MaMauSac'])
                        echo '<option  value="'.$row1['MaMauSac'].'" >'.$row1['TenMauSac'].'</option>';
                }
            }
            echo '
            </select><br>

            <label for="">kich co</label> <br>
            <select name="" id="kichco"  class="">
            <option  value="'.$row['MaKichCo'].'" >'.$row['TenKichCo'].'</option>';
            if ($kichco->num_rows > 0) {
                while ($row2 = $kichco->fetch_assoc()) {
                    if($row2['MaKichCo']!=$row['MaKichCo'])
                        echo '<option  value="'.$row2['MaKichCo'].'" >'.$row2['TenKichCo'].'</option>';
                }
            }
            echo'
            </select><br>

            <input type = "button" onclick="updateCTSP()" value="update"></button>
        </form>';
        }
    }
?>
    
    

<script src="http://localhost/WebBanHangMoHinhMVC/public/script/manage/QuanlyCTSP.js"></script>