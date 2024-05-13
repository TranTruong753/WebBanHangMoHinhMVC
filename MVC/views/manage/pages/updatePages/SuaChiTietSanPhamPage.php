<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<?php
    
    $ctsp=$data["DanhSach"]["CTSP"];
    $mausac=$data["DanhSach"]["MS"];
    $kichco=$data["DanhSach"]["KC"];  
    $maSp=''; 
?>
<h1 class = 'styleText-02' >Sửa Chi Tiết Sản Phẩm</h1>
<?php 
if ($ctsp->num_rows > 0) {
    while ($row = $ctsp->fetch_assoc()) {
        $maSp = $row['MaSanPham'];
    }
    $ctsp->data_seek(0);
    
}
?>
<a class="form-add__link" href="http://localhost/WebBanHangMoHinhMVC/admin/default/ChiTietSanPhamPage,<?php echo $maSp ?>"> Quay về Trang Chi Tiết Sản Phẩm></a>


<form id="submit_form" method="post" action="" class="form_add">
<?php
    if ($ctsp->num_rows > 0) {
        while ($row = $ctsp->fetch_assoc()) {
            $maSp = $row['MaSanPham'];
            echo '
           <div class = "input-add_wrap">
                <label class="styleText-04 label-add" for="masanpham">Mã sản phẩm</label>
                <input class="input-add" type="text" id="masanpham" value="'.$row['MaSanPham'].'" readonly >
           </div>
            <div class = "input-add_wrap">
                <label class="styleText-04 label-add" for="tensanpham">Ten sản phẩm</label>
                <input class="input-add" type="text" id="tensanpham" name="tensanpham" value="'.$row['TenSanPham'].'" readonly >
    
            </div>

        
            <div class = "input-add_wrap">
                <label class="styleText-04 label-add" for="mactsp">Ma chi tiet san pham</label>
                <input class="input-add" type="text" id="mactsp" value="'.$row['MaChiTietSanPham'].'" readonly> 
            </div>
        
           <div class = "input-add_wrap">
                <label class="styleText-04 label-add" for="hinhanh">Hinh anh</label>
                <input type="file" name="hinhanh" id="hinhanh"  > 
           </div>
            <div class="show input-add_wrap" id="show">
                <img src="http://localhost/WebBanHangMoHinhMVC/public/img/'.$row['HinhAnh'].'
                    " alt="">
                <input type="hidden" id ="filename" value ="'.$row['HinhAnh'].'"/>
            </div>

            <div class = "input-add_wrap" style = "display:flex; column-gap:20px">

                <div>
                    <label for="mausac">Mau sac</label> 
                    <div class = "custom-select">
                            <select name="" id="mausac"  class="">
                                <option  value="'.$row['MaMauSac'].'" >'.$row['TenMauSac'].'</option>';
                                if ($mausac->num_rows > 0) {
                                    while ($row1 = $mausac->fetch_assoc()) {
                                        if($row1['MaMauSac']!=$row['MaMauSac'])
                                            echo '<option  value="'.$row1['MaMauSac'].'" >'.$row1['TenMauSac'].'</option>';
                                    }
                                }
                                echo '
                            </select>
                    </div>
                </div>
           
            
               <div>
                    <label for="kichco">kich co</label> 
                    <div class = "custom-select">
                        <select name="" id="kichco"  class="">
                        <option  value="'.$row['MaKichCo'].'" >'.$row['TenKichCo'].'</option>';
                        if ($kichco->num_rows > 0) {
                            while ($row2 = $kichco->fetch_assoc()) {
                                if($row2['MaKichCo']!=$row['MaKichCo'])
                                    echo '<option  value="'.$row2['MaKichCo'].'" >'.$row2['TenKichCo'].'</option>';
                            }
                        }
                        echo'
                        </select>
                   </div>
               </div>

            </div>

            <div class = "input-add_wrap">
                <button class = "btn" type = "button" onclick="updateCTSP()" value="update">Cập nhật</button>
            </div>
           
        </form>';
        }
    }
?>
    
    

<script src="http://localhost/WebBanHangMoHinhMVC/public/script/manage/QuanlyCTSP.js"></script>