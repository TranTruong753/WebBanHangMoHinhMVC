<?php
class ChucNangModel extends DB{
    
    // public function getDanhSach()
    // {
    //     $qr = "SELECT * From chucnang";
    //     return $this->con->query($qr);
    // }

    public function getDanhSach($key,$index,$sizePage)
    {
        trim($index);
        if($index == "" || $index <=0)
        {
            $index = 1;
        }
        $start = ($index - 1)*$sizePage;

        $qr = "SELECT * FROM chucnang ";

        if($key != "")
        {
            $qr .= " where concat(MaChucNang,TenChucNang) like '%$key%'";
        }
        $qr .= " ORDER BY MaChucNang DESC LIMIT $start,$sizePage";
        return $this->con->query($qr);


    }

    
    public function getDanhSachCoTrangThai()
    {
        $qr = "SELECT * From chucnang where TrangThai = 1";
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