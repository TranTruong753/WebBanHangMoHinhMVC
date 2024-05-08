<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<?php
    $theloai=$data["DanhSach"]["TL"];
    $chatlieu=$data["DanhSach"]["CL"];
    $sanpham=$data["DanhSach"]["SP"];
    $km=$data["DanhSach"]["KM"];
   
    
    
?>
<h1 class = 'styleText-02' >Sửa Sản Phẩm</h1>
<a class="form-add__link" href="http://localhost/WebBanHangMoHinhMVC/admin/default/SanPhamPage"> Quay về Trang Sản Phẩm></a>
<form method="post" class="form_add">
<?php
    if ($sanpham->num_rows > 0) {
        while ($row = $sanpham->fetch_assoc()) {
            echo '    
           <div class = "input-add_wrap">
                <label class="styleText-04 label-add" for="">Mã sản phẩm</label>
                <input class="input-add" type="text" id="masanpham" value="'.$row['MaSanPham'].'"> 
           </div>

           <div class = "input-add_wrap">
                <label class="styleText-04 label-add" for="">Tên sản phẩm</label>
                <input class="input-add" type="text" id="tensanpham" value="'.$row['TenSanPham'].'"> 
           </div>

           <div class = "input-add_wrap">
                <label class="styleText-04 label-add" for="">Giá Nhập</label>
                <input class="input-add" type="text" id="gianhap" value="'.$row['GiaNhap'].'"> 
           </div>

           <div class = "input-add_wrap">
                <label for="">Khuyến mãi</label> 
                <select name="" id="khuyenmai"  class="">
                    <option  value="'.$row['MaKhuyenMai'].'" >'.$row['TenKhuyenMai'].'-'.$row['MucKhuyenMai'].'%</option>';
                    
                    if ($km->num_rows > 0) {
                        while ($row1 = $km->fetch_assoc()) {
                            if($row1['MaKhuyenMai']!=$row['MaKhuyenMai'])
                                echo '<option  value="'.$row1['MaKhuyenMai'].'" >'.$row1['TenKhuyenMai'].'-'.$row1['MucKhuyenMai'].'%</option>';
                        }
                    }
                echo'    
                </select>
           </div>

            <div class = "input-add_wrap">
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
                    
                </select>
            </div>

            <div class = "input-add_wrap">
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
                </select>
            </div>
        </form>
        <div class = "input-add_wrap">
            <button class = "btn" type = "button" onclick="updateSP()">Cập nhật</button>
        </div>';
    }
    }
?>
    

<script src="http://localhost/WebBanHangMoHinhMVC/public/script/manage/QuanlySPJS.js"></script>

    
    

