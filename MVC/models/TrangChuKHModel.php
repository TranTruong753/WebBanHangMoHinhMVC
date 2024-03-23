<?php
class TrangChuKHModel extends DB{
    public function GetTrangChuKHModel(){
        $qr = 'SELECT sanpham.MaSanPham ,sanpham.TenSanPham,sanpham.GiaSanPham, chitietsanpham.HinhAnh 
        FROM chitietsanpham INNER JOIN sanpham on chitietsanpham.MaSanPham= sanpham.MaSanPham GROUP BY sanpham.MaSanPham ';
        // $row=mysqli_query($this->con, $qr);
        return $this->con->query($qr);
    }

    public function GetspTL($tl){
        $qr = 'SELECT sanpham.MaSanPham ,sanpham.TenSanPham,sanpham.GiaSanPham, chitietsanpham.HinhAnh 
        FROM chitietsanpham INNER JOIN sanpham on chitietsanpham.MaSanPham= sanpham.MaSanPham where sanpham.MaTheLoai = "'.$tl.'" GROUP BY sanpham.MaSanPham ';
        // $row=mysqli_query($this->con, $qr);
        return $this->con->query($qr);
    }

    

}
?>