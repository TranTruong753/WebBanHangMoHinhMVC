<?php
class chitietspmodel extends DB{

    public function Getimgsp($masp,$mamausac){
        $qr = 'SELECT HinhAnh 
        FROM chitietsanpham where MaSanPham="'.$masp.'" and MaMauSac="'.$mamausac.'" and TrangThaiCTSP= 1 GROUP BY MaMauSac';
        $row=mysqli_query($this->con, $qr);
        return $row;

        
    }

    public function Getanhchinhsp($masp){
        $qr = 'SELECT HinhAnh 
        FROM chitietsanpham where MaSanPham="'.$masp.'" and TrangThaiCTSP= 1 limit 1';
        $row=mysqli_query($this->con, $qr);
        return $row;
    }

    public function Getkichcosp($masp){
        $qr = 'SELECT kichco.MaKichCo, kichco.TenKichCo FROM chitietsanpham INNER JOIN kichco 
        on chitietsanpham.MaKichCo= kichco.MaKichCo WHERE chitietsanpham.MaSanPham="'.$masp.'" and chitietsanpham.TrangThaiCTSP= 1 GROUP BY kichco.MaKichCo;';
        $row=mysqli_query($this->con, $qr);
        return $row;

        
    }

    public function Getmausacsp($masp){
        $qr = 'SELECT mausac.MaMauSac, mausac.TenMauSac FROM chitietsanpham INNER JOIN mausac 
        on chitietsanpham.MaMauSac= mausac.MaMauSac WHERE chitietsanpham.MaSanPham="'.$masp.'" and chitietsanpham.TrangThaiCTSP= 1 GROUP BY mausac.MaMauSac';
        $row=mysqli_query($this->con, $qr);
        return $row;

        
    }

    public function Getthongtinsp($masp){
        $qr = 'SELECT  MaSanPham,TenSanPham,GiaSanPham
        FROM sanpham  where MaSanPham="'.$masp.'" and sanpham.TrangThaiSP= 1';
        $row=mysqli_query($this->con, $qr);
        return $row;
    }

    public function UpdateCTSP($mactsp,$sl){
        $qr = 'UPDATE chitietsanpham set SoLuongTon = '.$sl.' where MaChiTietSanPham = "'.$mactsp.'"';
        $row=mysqli_query($this->con, $qr);
        return $row;
    }
    public function UpdateCTSPtheoSLNHAPvaSLTON($mactsp,$slton,$slnhap){
        $qr = 'UPDATE chitietsanpham set SoLuongTon = '.$slton.',SoLuongNhap = '.$slnhap.' where MaChiTietSanPham = "'.$mactsp.'"';
        $row=mysqli_query($this->con, $qr);
        return $row;
    }

    public function UpdateAllCTSP($mactsp,$makichco,$mamausac,$hinhanh){
        $qr = 'UPDATE chitietsanpham set MaKichCo = "'.$makichco.'" ,MaMauSac="'.$mamausac.'" ,HinhAnh="'.$hinhanh.'" where MaChiTietSanPham = "'.$mactsp.'"';
        $row=mysqli_query($this->con, $qr);
        return $row;
    }
    public function updateTrangThai($mactsp,$trangThai){
        $qr = 'UPDATE chitietsanpham set TrangThaiCTSP = "'.$trangThai.'" where MaChiTietSanPham = "'.$mactsp.'"';
        $row=mysqli_query($this->con, $qr);
        return $row;
    }

    public function GetCTSP($masp){
        $qr = 'SELECT *
        FROM chitietsanpham INNER JOIN mausac 
        on chitietsanpham.MaMauSac= mausac.MaMauSac INNER JOIN kichco  
        on chitietsanpham.MaKichCo= kichco.MaKichCo INNER JOIN sanpham 
        on sanpham.MaSanPham=chitietsanpham.MaSanPham  where  sanpham.MaSanPham="'.$masp.'" and chitietsanpham.TrangThaiCTSP= 1';
        $row=mysqli_query($this->con, $qr);
        return $row;
    }

    public function GetCTSPAdmin($masp){
        $qr = 'SELECT *
        FROM chitietsanpham INNER JOIN mausac 
        on chitietsanpham.MaMauSac= mausac.MaMauSac INNER JOIN kichco  
        on chitietsanpham.MaKichCo= kichco.MaKichCo INNER JOIN sanpham 
        on sanpham.MaSanPham=chitietsanpham.MaSanPham  where  sanpham.MaSanPham="'.$masp.'"';
        $row=mysqli_query($this->con, $qr);
        return $row;
    }

    public function GetAllCTSP(){
        $qr = 'SELECT *
        FROM chitietsanpham INNER JOIN mausac 
        on chitietsanpham.MaMauSac= mausac.MaMauSac INNER JOIN kichco  
        on chitietsanpham.MaKichCo= kichco.MaKichCo INNER JOIN sanpham 
        on sanpham.MaSanPham=chitietsanpham.MaSanPham ';
        $row=mysqli_query($this->con, $qr);
        return $row;
    }

    public function GetSizeColor($masp,$mausac){
        $qr = "SELECT * 
        FROM chitietsanpham INNER JOIN kichco 
        ON chitietsanpham.MaKichCo = kichco.MaKichCo 
        AND chitietsanpham.MaSanPham = '$masp'
        AND chitietsanpham.MaMauSac = '$mausac' where chitietsanpham.TrangThaiCTSP= 1
        GROUP BY kichco.MaKichCo"    
        ;
        $row=mysqli_query($this->con, $qr);
        return $row;
    }
    public function InsertCTSP($mactsp,$masp,$mamausac,$makichco,$hinhanh){
        $qr = "INSERT INTO chitietsanpham VALUES ('$mactsp','$masp','$mamausac','$makichco','$hinhanh',0,0,1)";
        $row=mysqli_query($this->con, $qr);
        return $row;
    }

    public function GettheoMactsp($mactsp){
        $qr = 'SELECT *
        FROM chitietsanpham INNER JOIN mausac 
        on chitietsanpham.MaMauSac= mausac.MaMauSac INNER JOIN kichco  
        on chitietsanpham.MaKichCo= kichco.MaKichCo INNER JOIN sanpham 
        on sanpham.MaSanPham=chitietsanpham.MaSanPham  where  chitietsanpham.MaChiTietSanPham="'.$mactsp.'" and chitietsanpham.TrangThaiCTSP= 1';
        $row=mysqli_query($this->con, $qr);
        return $row;
    }

    public function DeleteCTSP($mactsp){
        $qr = 'DELETE FROM chitietsanpham where MaChiTietSanPham= "'.$mactsp.'"';
        if(mysqli_query($this->con, $qr))
           return true;
        return false;
    }
    public function getDanhSach($key,$pageIndex,$soLuong,$masp,$arrange,$properties)
    {
        trim($key);
        // Kiểm tra đang ở trang
        // echo "pageIndex:".$pageIndex;
        if($pageIndex == "" || $pageIndex <= 0 )
        {
            $pageIndex = 1;
        }

        $batDau = ($pageIndex-1)*$soLuong;
        
        $qr = "SELECT * FROM chitietsanpham";

        if($key!="")
        {
            $qr .= " INNER JOIN mausac 
            on chitietsanpham.MaMauSac= mausac.MaMauSac INNER JOIN kichco  
            on chitietsanpham.MaKichCo= kichco.MaKichCo INNER JOIN sanpham 
            on sanpham.MaSanPham=chitietsanpham.MaSanPham 
            where concat(chitietsanpham.Machitietsanpham,mausac.TenMauSac,kichco.TenKichCo) like '%$key%' and 
            chitietsanpham.MaSanPham= '$masp' "; 

            $qr .= " ORDER BY $properties $arrange";
            $qr .= " LIMIT $batDau,$soLuong";

            // echo $qr;
            return $this->con->query($qr);
        }
        else
        {
            $qr .= " INNER JOIN mausac 
            on chitietsanpham.MaMauSac= mausac.MaMauSac INNER JOIN kichco  
            on chitietsanpham.MaKichCo= kichco.MaKichCo INNER JOIN sanpham 
            on sanpham.MaSanPham=chitietsanpham.MaSanPham where  chitietsanpham.MaSanPham= '$masp'  ORDER BY $properties $arrange";
            $qr .= " Limit $batDau,$soLuong";
            // echo $qr;
            return $this->con->query($qr);
        }
        // $qr="SELECT * from nhomquyen";
        // return $this->con->query($qr);
    }


}
?>