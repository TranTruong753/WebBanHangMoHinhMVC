<?php
class NhomQuyenModel extends DB{

    public function getDanhSachNhomQuyen()
    {
        $qr = "SELECT * FROM nhomquyen ";
        // $row = mysqli_query($this->con,$qr);
        // return $row;
        return $this->con->query($qr);
    }

    public function getNhomQuyenTuTen($ten)
    {
        $qr = "SELECT * FROM nhomquyen Where TenNhomQuyen = N\"$ten\"";
        $row = mysqli_query($this->con,$qr);
        while( $row = mysqli_query($this->con,$qr))
        {
            return true;
        }
        return false;
    }
}

?>