<?php

class KhachHangModel extends DB{
    
    function GetAllHoaDon(){
        $qr = "SELECT *
        from KhachHang";
        return $this->con->query($qr);

    }
    function TimKHbyID($makh){
        $qr = 'SELECT *
        from KhachHang where MaKhachHang="'.$makh.'"' ;
        return $this->con->query($qr);

    }

    

    


}
?>