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

    
}

?>
