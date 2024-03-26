<?php
class GioHangModel extends DB{
    public function TimkiemCTSP($masp,$mamausac,$makichco){
        $qr = 'SELECT MaChiTietSanPham FROM chitietsanpham where MaSanPham="'.$masp.'" and MaMauSac="'.$mamausac.'" and MaKichCo="'.$makichco.'"';
        $row=mysqli_query($this->con, $qr);
        return $row;
    }
    public function TimctspGioHang($mactsp){
        $qr = 'SELECT MaChiTietSanPham FROM giohang where MaChiTietSanPham="'.$mactsp.'"';
        $row=mysqli_query($this->con, $qr);
        return $row;
    }
    


    public function addGioHang($makh,$masp,$mamausac,$makichco,$sl){
        $result=$this->TimkiemCTSP($masp,$mamausac,$makichco);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $mactsp=$row['MaChiTietSanPham'];
                $resultsp=$this->TimctspGioHang($mactsp);
                if ($resultsp->num_rows == 0) {
                    $qr = "INSERT INTO giohang
                    VALUES ('$mactsp', '$makh','$sl',1)";
                    if(mysqli_query($this->con, $qr)){
                        echo "Them thanh cong";
                    }
                    else echo "Them that bai";
                }
                else {
                    $qr='UPDATE CUSTOMERS
                    SET SoLuong = "'.$sl.'"
                    WHERE  = "'.$mactsp.'"';
                    if(mysqli_query($this->con, $qr)){
                        echo "cap nhat thanh cong";
                    }
                    else echo "cap nhat thanh cong";
                }
        }
    }
        

}

    

}
?>