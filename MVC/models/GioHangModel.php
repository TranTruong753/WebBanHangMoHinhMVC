<?php
class GioHangModel extends DB{
    public function TimkiemCTSP($masp,$mamausac,$makichco){
        $qr = 'SELECT * FROM chitietsanpham where MaSanPham="'.$masp.'" and MaMauSac="'.$mamausac.'" and MaKichCo="'.$makichco.'"';
        $row=mysqli_query($this->con, $qr);
        return $row;
    }
    public function TimctspGioHang($mactsp,$makh){
        $qr = 'SELECT * FROM giohang INNER JOIN ChiTietSanPham on giohang.MaChiTietSanPham=ChiTietSanPham.MaChiTietSanPham  
        INNER JOIN sanpham on sanpham.MaSanPham=ChiTietSanPham.MaSanPham where giohang.MaChiTietSanPham="'.$mactsp.'" and giohang.MaKhachHang="'.$makh.'"';
        $row=mysqli_query($this->con, $qr);
        return $row;
    }
    
    public function GetAll(){
        if(isset($_SESSION['email'])){
            $makh=$_SESSION['email'];
        }
        else 
        {$makh= "none";}
        $qr = 'SELECT * FROM chitietsanpham INNER JOIN sanpham on chitietsanpham.MaSanPham= sanpham.MaSanPham
        INNER JOIN giohang on chitietsanpham.MaChiTietSanPham = giohang.MaChiTietSanPham INNER JOIN mausac on chitietsanpham.MaMauSac=mausac.MaMauSac
        INNER JOIN kichco on chitietsanpham.MaKichco=kichco.MaKichco where giohang.MaKhachHang="'.$makh.'"';
        $row=mysqli_query($this->con, $qr);
        return $row;
    }


    public function addGioHang($makh,$masp,$mamausac,$makichco,$sl){
        $result=$this->TimkiemCTSP($masp,$mamausac,$makichco);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $mactsp=$row['MaChiTietSanPham'];
                $resultsp=$this->TimctspGioHang($mactsp,$makh);
                if ($resultsp->num_rows == 0) {
                    $qr = "INSERT INTO giohang
                    VALUES ('$mactsp', '$makh','$sl',1)";
                    mysqli_query($this->con, $qr);
                }
                else {
                    $qr='UPDATE giohang
                    SET SoLuong = "'.$sl.'" 
                    WHERE MaChiTietSanPham = "'.$mactsp.'" and MaKhachHang="'.$makh.'"';
                    mysqli_query($this->con, $qr);
                }
        }
    }
    }

    public function XoaGioHang($mactsp){
        if(isset($_SESSION['email'])){
            $makh=$_SESSION['email'];
        }
        else 
        {$makh= "none";}
        $qr = 'DELETE FROM giohang WHERE giohang.MaKhachHang="'.$makh.'" and MaChiTietSanPham = "'.$mactsp.'"';
        $row=mysqli_query($this->con, $qr);
        return $row;
    }

    

}
?>