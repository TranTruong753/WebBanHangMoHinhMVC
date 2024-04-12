<?php
class ChiTietPhieuNhapModel extends DB{
    // public function getAllPN(){
    //     $qr = "SELECT * from phieunhap";
    //     return $this->con->query($qr);

    // }
    // public function getDanhSach($key,$pageIndex,$soLuong)
    // {
    //     trim($key);
    //     // Kiểm tra đang ở trang
    //     // echo "pageIndex:".$pageIndex;
    //     if($pageIndex == "" || $pageIndex <= 0 )
    //     {
    //         $pageIndex = 1;
    //     }

    //     $batDau = ($pageIndex-1)*$soLuong;
        
    //     $qr = "SELECT * FROM phieunhap";

    //     if($key!="")
    //     {
    //         $qr .= " INNER JOIN nhacungcap 
    //         on phieunhap.MaNhaCungCap= nhacungcap.MaNhaCungCap INNER JOIN nhanvien  
    //         on phieunhap.MaNhanVien= nhanvien.MaNhanVien  
    //         where concat(phieunhap.MaPhieuNhap,phieunhap.NgayNhap,nhacungcap.TenNhaCungCap,nhanvien.TenNhanVien) like '%$key%'"; 

    //         $qr .= " ORDER BY MaPhieuNhap DESC";
    //         $qr .= " LIMIT $batDau,$soLuong";

    //         // echo $qr;
    //         return $this->con->query($qr);
    //     }
    //     else
    //     {
    //         $qr .= " INNER JOIN nhacungcap 
    //         on phieunhap.MaNhaCungCap= nhacungcap.MaNhaCungCap INNER JOIN nhanvien  
    //         on phieunhap.MaNhanVien= nhanvien.MaNhanVien 
    //          ORDER BY MaPhieuNhap DESC";
    //         $qr .= " Limit $batDau,$soLuong";
    //         // echo $qr;
    //         return $this->con->query($qr);
    //     }
    //     // $qr="SELECT * from nhomquyen";
    //     // return $this->con->query($qr);
    // }

    public function InsertCTPN($mapn,$mactsp,$donvinhap,$sl,$tiennhap,$thanhtien){
        $qr = "INSERT INTO chitietphieunhap VALUES ('$mapn', '$mactsp','$donvinhap','$sl','$tiennhap','$thanhtien')";
        if(mysqli_query($this->con, $qr))
           return true;
        return false;
    }
    
}
?>