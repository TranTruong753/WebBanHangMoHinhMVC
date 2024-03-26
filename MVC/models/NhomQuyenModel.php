<?php
class NhomQuyenModel extends DB{

    public function DanhSachNhomQuyen()
    {
        $qr = "SELECT * FROM NhomQuyen Where TrangThai = 1";
        $row = mysqli_query($this->con,$qr);
        return $row;
    }

    public function getNhomQuyenTuTen($ten)
    {
        $qr = "SELECT * FROM NhomQuyen Where TenNhomQuyen = N\"$ten\"";
        $row = mysqli_query($this->con,$qr);
        while( $row = mysqli_query($this->con,$qr))
        {
            return true;
        }
        return false;
    }
}

?>