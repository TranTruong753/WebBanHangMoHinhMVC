<?php
 class SanPhamModel extends DB{

    public function getDanhSach(){
        $qr = "SELECT * from sanpham";
        return $this->con->query($qr);

    }

    public function GetSP($masp){
        $qr = 'SELECT * from sanpham INNER JOIN theloai on  sanpham.MaTheLoai=theloai.MaTheLoai  
        INNER JOIN chatlieu on sanpham.MaChatLieu = chatlieu.MaChatLieu  
        INNER JOIN thuonghieu on sanpham.MaThuongHieu = thuonghieu.MaThuongHieu
        INNER JOIN khuyenmai on sanpham.MaKhuyenMai = khuyenmai.MaKhuyenMai where MaSanPham="'.$masp.'"';
        return $this->con->query($qr);

    }

    public function getDanhSachAdmin()
    {
        $qr = "SELECT *
        FROM sanpham as sp, theloai as tl, chatlieu as cl, thuonghieu as th  
        WHERE sp.MaTheLoai=tl.MaTheLoai 
        and sp.MaChatLieu = cl.MaChatLieu 
        and sp.MaThuongHieu = th.MaThuongHieu";
        return $this->con->query($qr);
    }

    public function UpdateSP($masp,$sl){
        $qr = 'UPDATE sanpham set SoLuongTonSP = '.$sl.' where MaSanPham = "'.$masp.'"';
        if(mysqli_query($this->con, $qr))
           return true;
        return false;
    }
    public function UpdateGNSP($masp,$gn,$giasp){
        $qr = 'UPDATE sanpham set GiaNhap = "'.$gn.'",GiaSanPham="'.$giasp.'" where MaSanPham = "'.$masp.'"';
        if(mysqli_query($this->con, $qr))
           return true;
        return false;
    }
    public function UpdateSPMoi($masp,$tensp,$giasp,$matheloai,$machatlieu,$makm){
        $qr = 'UPDATE sanpham set TenSanPham = "'.$tensp.'",MaTheLoai = "'.$matheloai.'",GiaSanPham = "'.$giasp.'",
        MaChatLieu = "'.$machatlieu.'",MaKhuyenMai = "'.$makm.'" where MaSanPham = "'.$masp.'"';
        if(mysqli_query($this->con, $qr))
           return true;
        return false;
    }
    public function updateTrangThai($masp,$trangThai){
        $qr = 'UPDATE sanpham set TrangThaiSP = "'.$trangThai.'" where MaSanPham = "'.$masp.'"';
        if(mysqli_query($this->con, $qr))
           return true;
        return false;
    }

    public function InsertSP($masp,$tensp,$giasp,$gianhap,$matheloai,$machatlieu,$makm){
        $qr = "INSERT INTO sanpham VALUES ('$masp', '$matheloai','$tensp','$giasp','0','$makm','$gianhap','0','$machatlieu','1','1')";
        if(mysqli_query($this->con, $qr))
           return true;
        return false;
    }

    public function DeleteSP($masp){
        $qr = 'DELETE FROM sanpham where MaSanPham= "'.$masp.'"';
        if(mysqli_query($this->con, $qr))
           return true;
        return false;
    }

    public function GetAllDanhSach($key,$pageIndex,$soLuong,$arrange,$properties)
    {
        trim($key);
        // Kiểm tra đang ở trang
        // echo "pageIndex:".$pageIndex;
        if($pageIndex == "" || $pageIndex <= 0 )
        {
            $pageIndex = 1;
        }

        $batDau = ($pageIndex-1)*$soLuong;
        
        $qr = "SELECT * FROM sanpham";

        if($key!="")
        {
            $qr .= " INNER JOIN theloai on  sanpham.MaTheLoai=theloai.MaTheLoai  
            INNER JOIN chatlieu on sanpham.MaChatLieu = chatlieu.MaChatLieu  
            INNER JOIN thuonghieu on sanpham.MaThuongHieu = thuonghieu.MaThuongHieu
            INNER JOIN khuyenmai on sanpham.MaKhuyenMai = khuyenmai.MaKhuyenMai  
            where concat(sanpham.MaSanPham,sanpham.TenSanPham,sanpham.GiaSanPham,theloai.TenTheloai,chatlieu.TenChatLieu,khuyenmai.TenKhuyenMai) like '%$key%'"; 

            $qr .= " ORDER BY $properties $arrange";
            $qr .= " LIMIT $batDau,$soLuong";

            // echo $qr;
            return $this->con->query($qr);
        }
        else
        {
            $qr .= " INNER JOIN theloai on  sanpham.MaTheLoai=theloai.MaTheLoai  
            INNER JOIN chatlieu on sanpham.MaChatLieu = chatlieu.MaChatLieu  
            INNER JOIN thuonghieu on sanpham.MaThuongHieu = thuonghieu.MaThuongHieu
            INNER JOIN khuyenmai on sanpham.MaKhuyenMai = khuyenmai.MaKhuyenMai 
            ORDER BY $properties $arrange";
            $qr .= " Limit $batDau,$soLuong";
            // echo $qr;
            return $this->con->query($qr);
        }
        // $qr="SELECT * from nhomquyen";
        // return $this->con->query($qr);
    }

    
}

?>
