<?php

class KhachHangModel extends DB{
    
    function GetAllHoaDon(){
        $qr = "SELECT *
        from KhachHang";
        return $this->con->query($qr);

    }

    function getAllDanhSach(){
        $qr = "SELECT * from khachhang";
        return $this->con->query($qr);
    }

    function getDanhSach($key,$pageIndex,$soLuong)
    {
        trim($key);
        // Kiểm tra đang ở trang
        // echo "pageIndex:".$pageIndex;
        if($pageIndex == "" || $pageIndex <= 0 )
        {
            $pageIndex = 1;
        }

        $batDau = ($pageIndex-1)*$soLuong;
        
        $qr = "SELECT * FROM khachhang";

        if($key!="")
        {
            $qr .= " where concat(MaKhachHang,TenKhachHang) like '%$key%'"; 

            $qr .= " ORDER BY MaKhachHang DESC";
            $qr .= " LIMIT $batDau,$soLuong";

            // echo $qr;
            return $this->con->query($qr);
        }
        else
        {
            $qr .= " ORDER BY MaKhachHang DESC";
            $qr .= " Limit $batDau,$soLuong";
            // echo $qr;
            return $this->con->query($qr);
        }
        // $qr="SELECT * from nhomquyen";
        // return $this->con->query($qr);
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