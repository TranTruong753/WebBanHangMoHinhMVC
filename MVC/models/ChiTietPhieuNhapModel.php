<?php
class ChiTietPhieuNhapModel extends DB{
    public function getAllPN(){
        $qr = "SELECT * from chitietphieunhap";
        return $this->con->query($qr);

    }
    public function getDanhSach($key,$pageIndex,$soLuong,$mapn)
    {
        trim($key);
        // Kiểm tra đang ở trang
        // echo "pageIndex:".$pageIndex;
        if($pageIndex == "" || $pageIndex <= 0 )
        {
            $pageIndex = 1;
        }

        $batDau = ($pageIndex-1)*$soLuong;
        
        $qr = "SELECT * FROM chitietphieunhap";

        if($key!="")
        {
            $qr .= " INNER JOIN chitietsanpham 
            on chitietphieunhap.MaChiTietSanPham= chitietsanpham.MaChiTietSanPham INNER JOIN sanpham 
            on sanpham.MaSanPham=chitietsanpham.MaSanPham  
            where chitietphieunhap.MaPhieuNhap='$mapn' AND concat(chitietphieunhap.MaChiTietSanPham,sanpham.TenSanPham) like '%$key%'"; 

            $qr .= " ORDER BY MaPhieuNhap DESC";
            $qr .= " LIMIT $batDau,$soLuong";

            // echo $qr;
            return $this->con->query($qr);
        }
        else
        {
            $qr .= " INNER JOIN chitietsanpham 
            on chitietphieunhap.MaChiTietSanPham= chitietsanpham.MaChiTietSanPham INNER JOIN sanpham 
            on sanpham.MaSanPham=chitietsanpham.MaSanPham where chitietphieunhap.MaPhieuNhap='$mapn'
             ORDER BY chitietsanpham.MaSanPham DESC";
            $qr .= " Limit $batDau,$soLuong";
            // echo $qr;
            return $this->con->query($qr);
        }
        // $qr="SELECT * from nhomquyen";
        // return $this->con->query($qr);
    }

    public function InsertCTPN($mapn,$mactsp,$donvinhap,$sl,$tiennhap,$thanhtien){
        $qr = "INSERT INTO chitietphieunhap VALUES ('$mapn', '$mactsp','$donvinhap','$sl','$tiennhap','$thanhtien')";
        if(mysqli_query($this->con, $qr))
           return true;
        return false;
    }
    
}
?>