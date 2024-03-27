<?php
 class SanPhamModel extends DB{

    public function getDanhSach(){
        $qr = "SELECT * from sanpham";
        return $this->con->query($qr);

    }

    public function getDanhSachAdmin()
    {
        $qr = "SELECT sp.MaSanPham, sp.TenSanPham, tl.TenTheLoai,cl.TenChatLieu,th.TenThuongHieu,sp.TrangThai
        FROM sanpham as sp, theloai as tl, chatlieu as cl, thuonghieu as th  
        WHERE sp.MaTheLoai=tl.MaTheLoai 
        and sp.MaChatLieu = cl.MaChatLieu 
        and sp.MaThuongHieu = th.MaThuongHieu";
        return $this->con->query($qr);
    }

    
}

?>
