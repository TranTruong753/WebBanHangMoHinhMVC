<?php
class chitietspmodel extends DB{

    public function Getimgsp($masp){
        $qr = 'SELECT HinhAnh 
        FROM chitietsanpham where MaSanPham="'.$masp.'" GROUP BY HinhAnh';
        $row=mysqli_query($this->con, $qr);
        return $row;

        
    }

    public function Getanhchinhsp($masp){
        $qr = 'SELECT HinhAnh 
        FROM chitietsanpham where MaSanPham="'.$masp.'" limit 1';
        $row=mysqli_query($this->con, $qr);
        return $row;
    }

    public function Getkichcosp($masp){
        $qr = 'SELECT kichco.MaKichCo, kichco.TenKichCo FROM chitietsanpham INNER JOIN kichco 
        on chitietsanpham.MaKichCo= kichco.MaKichCo WHERE chitietsanpham.MaSanPham="'.$masp.'" GROUP BY kichco.MaKichCo;';
        $row=mysqli_query($this->con, $qr);
        return $row;

        
    }

    public function Getmausacsp($masp){
        $qr = 'SELECT mausac.MaMauSac, mausac.TenMauSac FROM chitietsanpham INNER JOIN mausac 
        on chitietsanpham.MaMauSac= mausac.MaMauSac WHERE chitietsanpham.MaSanPham="'.$masp.'" GROUP BY mausac.MaMauSac';
        $row=mysqli_query($this->con, $qr);
        return $row;

        
    }

    public function Getthongtinsp($masp){
        $qr = 'SELECT  MaSanPham,TenSanPham,GiaSanPham
        FROM sanpham  where MaSanPham="'.$masp.'"';
        $row=mysqli_query($this->con, $qr);
        return $row;

        
    }
}
?>