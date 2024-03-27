<?php
class NhomQuyenModel extends DB{

    public function getDanhSach()
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

    public function updateTrangThai($ma,$trangThai)
    {
        $qr = "UPDATE nhomquyen set TrangThai = $trangThai where MaNhomQuyen = $ma";
        if($this->con->query($qr))
        {
            echo "Đổi Trạng Thái Thành Công!";
        }else
        {
            echo "Đổi Trạng Thái Thất Bại!";
        }
    }
}

?>