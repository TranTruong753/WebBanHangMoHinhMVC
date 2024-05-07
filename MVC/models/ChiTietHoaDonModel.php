<?php
class ChiTietHoaDonModel extends DB{
    
    public function GetAllCTHDKH($mahd,$makh)
    {
        $qr = 'SELECT * From chitiethoadon INNER JOIN chitietsanpham on 
        chitiethoadon.MaChiTietSanPham=chitietsanpham.MaChiTietSanPham
        INNER JOIN sanpham on chitietsanpham.MaSanPham=sanpham.MaSanPham INNER JOIN hoadon on hoadon.MaHoaDon=chitiethoadon.MaHoaDon 
        INNER JOIN mausac on chitietsanpham.MaMauSac=mausac.MaMauSac
        INNER JOIN kichco on chitietsanpham.MaKichco=kichco.MaKichco where hoadon.MaHoaDon="'.$mahd.'" and hoadon.MaKhachHang="'.$makh.'"';
        return $this->con->query($qr);
    }

    // public function getDanhSach()
    // {
    //     $qr = "SELECT * from chitiethoadon";
    //     return $this->con->query($qr);
    // }

    public function GettheoMaHoaDon($mahd){
        $qr = 'SELECT * FROM chitiethoadon where MaHoaDon="'.$mahd.'"';
        $row=mysqli_query($this->con, $qr);
        return $row;
    }
    
    function GetCTSPHD($mahd){
        $qr = 'SELECT *
        from chitiethoadon INNER JOIN chitietsanpham 
        on chitietsanpham.MaChiTietSanPham= chitiethoadon.MaChiTietSanPham 
        INNER JOIN sanpham on sanpham.MaSanPham=chitietsanpham.MaSanPham 
        WHERE chitiethoadon.MaHoaDon="'.$mahd.'"';
        return $this->con->query($qr);

    }
    public function getDanhSach($key,$pageIndex,$soLuong,$mahd)
    {
        trim($key);
        // Kiểm tra đang ở trang
        // echo "pageIndex:".$pageIndex;
        if($pageIndex == "" || $pageIndex <= 0 )
        {
            $pageIndex = 1;
        }

        $batDau = ($pageIndex-1)*$soLuong;
        
        $qr = "SELECT * FROM chitiethoadon ";

        if($key!="")
        {
            $qr .= " INNER JOIN chitietsanpham
            on chitiethoadon.MaChiTietSanPham= chitietsanpham.MaChiTietSanPham INNER JOIN sanpham 
            on sanpham.MaSanPham=chitietsanpham.MaSanPham
            where concat(chitiethoadon.MaChiTietSanPham,sanpham.TenSanPham) like '%$key%' and chitiethoadon.MaHoaDon= '$mahd'"; 

            $qr .= " ORDER BY chitiethoadon.MaHoaDon DESC";
            $qr .= " LIMIT $batDau,$soLuong";

            echo $qr;
            return $this->con->query($qr);
        }
        else
        {
            $qr .= " INNER JOIN chitietsanpham 
            on chitiethoadon.MaChiTietSanPham= chitietsanpham.MaChiTietSanPham INNER JOIN sanpham 
            on sanpham.MaSanPham=chitietsanpham.MaSanPham where chitiethoadon.MaHoaDon='$mahd'
            ORDER BY chitiethoadon.MaHoaDon DESC";
            $qr .= " Limit $batDau,$soLuong";
            echo $qr;
            return $this->con->query($qr);
        }
    }
    
}
?>