<?php
class ChucNangModel extends DB{
    
    public function getDanhSach()
    {
        $qr = "SELECT * From chucnang";
        return $this->con->query($qr);
    }


    public function updateTrangThai($ma,$trangThai)
    {
      
        // echo $ma;
        // echo $trangThai;
        $qr = "UPDATE chucnang set TrangThai = $trangThai where MaChucNang = $ma ";
        if($this->con->query($qr))
        {
              echo "Đổi trạng thái thành công!";
        }else
        {
            echo "Dổi trạng thái không thành công!";
        }
    }

    public function getTenTuMa($ma)
    {
        $qr = "SELECT * from chucnang where MaChucNang = $ma";
        while($row  = $this->con->query($qr)->fetch_assoc())
        {
            return $row["TenChucNang"];
        }
        return "";
    }
}
?>