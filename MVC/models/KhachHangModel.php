<?php

class KhachHangModel extends DB{
    
    function GetAllHoaDon(){
        $qr = "SELECT *
        from KhachHang";
        return $this->con->query($qr);

    }

    function TimKHbyID($makh){
        $qr = 'SELECT *
        from khachhang where MaKhachHang="'.$makh.'"' ;
        return $this->con->query($qr);

    }

    function updateKh($makh, $sdt, $ten, $gioitinh) {
        $qr = 'UPDATE khachhang
               SET TenKhachHang = "'.$ten.'", SoDienThoai = "'.$sdt.'", GioiTinh = "'.$gioitinh.'"
               WHERE MaKhachHang = "'.$makh.'"';
        return $this->con->query($qr);
    }
    

    

    

    


}
?>