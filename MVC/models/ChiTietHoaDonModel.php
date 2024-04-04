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


    
}
?>