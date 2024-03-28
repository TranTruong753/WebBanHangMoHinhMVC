<?php
class TrangChuKHModel extends DB{
    public function GetTrangChuKHModel(){
        $qr = 'SELECT sanpham.MaSanPham ,sanpham.TenSanPham,sanpham.GiaSanPham, chitietsanpham.HinhAnh 
        FROM chitietsanpham INNER JOIN sanpham on chitietsanpham.MaSanPham= sanpham.MaSanPham GROUP BY sanpham.MaSanPham ';
        // $row=mysqli_query($this->con, $qr);
        return $this->con->query($qr);
    }

    public function GetspCL($cl){
        $qr = 'SELECT sanpham.MaSanPham ,sanpham.TenSanPham,sanpham.GiaSanPham, chitietsanpham.HinhAnh FROM chitietsanpham 
        INNER JOIN sanpham on chitietsanpham.MaSanPham= sanpham.MaSanPham INNER JOIN theloai on sanpham.MaTheLoai=theloai.MaTheLoai
         INNER JOIN chungloai on chungloai.MaChungLoai=theloai.MaChungLoai where chungloai.MaChungLoai ="'.$cl.'" GROUP BY sanpham.MaSanPham ';
        // $row=mysqli_query($this->con, $qr);
        return $this->con->query($qr);
    }
    public function GetspTL($tl){
        $qr = 'SELECT sanpham.MaSanPham ,sanpham.TenSanPham,sanpham.GiaSanPham, chitietsanpham.HinhAnh FROM chitietsanpham 
        INNER JOIN sanpham on chitietsanpham.MaSanPham= sanpham.MaSanPham  where sanpham.MaTheLoai ="'.$tl.'" GROUP BY sanpham.MaSanPham ';
        // $row=mysqli_query($this->con, $qr);
        return $this->con->query($qr);
    }

    public function TimSP($tensp){
        $qr = 'SELECT sanpham.MaSanPham ,sanpham.TenSanPham,sanpham.GiaSanPham, chitietsanpham.HinhAnh 
        FROM chitietsanpham INNER JOIN sanpham on chitietsanpham.MaSanPham= sanpham.MaSanPham  WHERE sanpham.TenSanPham LIKE "%'.$tensp.'%" GROUP BY sanpham.MaSanPham ';
        // $row=mysqli_query($this->con, $qr);
        return $this->con->query($qr);
    }

    

}
?>