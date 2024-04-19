<?php

class TaiKhoanModel extends DB{

    public function getDanhSach()
    {
        $qr = "SELECT tk.MaTaiKhoan,tk.TenDangNhap,tk.MatKhau,nq.TenNhomQuyen,tk.TrangThai
        from taikhoan as tk,nhomquyen as nq where tk.MaNhomQuyen = nq.MaNhomQuyen";
        return $this->con->query($qr);
    }

    public function updateTrangThai($ma,$trangThai)
    {
        $qr = "UPDATE taikhoan set TrangThai = $trangThai where MaTaiKhoan = $ma";
        if( $this->con->query($qr))
        {
             echo "Đổi trạng thái thành công!" ;
        } 
        else  
        {
              echo "Đổi trạng thái thất bại!";
        }
    }
}
?>