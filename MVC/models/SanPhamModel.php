<?php
 class SanPhamModel extends DB{

    public function getDanhSach(){
        $qr = "SELECT * from sanpham";
        return $this->con->query($qr);

    }

    public function GetSP($masp){
        $qr = 'SELECT * from sanpham where MaSanPham="'.$masp.'"';
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
    public function UpdateTTSP($masp){
        $qr = 'UPDATE sanpham set TrangThai = 0 where MaSanPham = "'.$masp.'"';
        if(mysqli_query($this->con, $qr))
           return true;
        return false;
    }

    public function InsertSP($masp,$tensp,$giasp,$matheloai,$machatlieu){
        $qr = "INSERT INTO sanpham VALUES ('$masp', '$matheloai','$tensp','$giasp','0','0','0','0','$machatlieu','1','1')";
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

    public function GetAllDanhSach($key,$pageIndex,$soLuong)
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
            where concat(sanpham.MaSanPham,sanpham.TenSanPham,sanpham.GiaSanPham,theloai.TenTheloai,chatlieu.TenChatLieu) like '%$key%' and sanpham.TrangThai= 1"; 

            $qr .= " ORDER BY MaSanPham DESC";
            $qr .= " LIMIT $batDau,$soLuong";

            // echo $qr;
            return $this->con->query($qr);
        }
        else
        {
            $qr .= " INNER JOIN theloai on  sanpham.MaTheLoai=theloai.MaTheLoai  
            INNER JOIN chatlieu on sanpham.MaChatLieu = chatlieu.MaChatLieu  
            INNER JOIN thuonghieu on sanpham.MaThuongHieu = thuonghieu.MaThuongHieu where sanpham.TrangThai= 1 ORDER BY MaSanPham DESC";
            $qr .= " Limit $batDau,$soLuong";
            // echo $qr;
            return $this->con->query($qr);
        }
        // $qr="SELECT * from nhomquyen";
        // return $this->con->query($qr);
    }

    
}

?>
