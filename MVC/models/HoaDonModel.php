<?php

class HoaDonModel extends DB{
    
    function GetAllHoaDonKH($makh){
        $qr = 'SELECT *
        from hoadon where MaKhachHang="'.$makh.'"';
        return $this->con->query($qr);

    }
    function GetAllHoaDon(){
        $qr = 'SELECT *
        from hoadon ';
        return $this->con->query($qr);

    }

    function InsertHoaDon($mahd,$date,$tongtien,$pttt,$makh,$sdt,$diachi){
        
        $qr = "INSERT INTO hoadon VALUES ('$mahd','$date','$tongtien','$pttt',NULL,'$makh','$sdt','$diachi',NULL,NULL,0)";
        if(mysqli_query($this->con,$qr))
        {
            return true;
        }else
        {
            return false;
        }

    }
    function InsertCTHD($mahd,$mactsp,$sl,$thanhtien){
        $qr = "INSERT INTO chitiethoadon VALUES ('$mahd','$mactsp','$sl','$thanhtien')";
        if(mysqli_query($this->con,$qr))
        {
            return true;
        }else
        {
            return false;
        }

    }

    


}
?>