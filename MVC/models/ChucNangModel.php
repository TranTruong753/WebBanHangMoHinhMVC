<?php
class ChucNangModel extends DB{
    
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

    
    public function insert($tenChucNang,$trangThai)
    {
        $qr = "INSERT INTO chucnang VALUES ('null','$tenChucNang','$trangThai')";
        if($this->con->query($qr))
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }

    public function update($maChucNang,$tenChucNang)
    {
        $qr = "UPDATE chucnang SET TenChucNang = '$tenChucNang' where MaChucNang = '$maChucNang'";
        if($this->con->query($qr))
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }


    public function KiemTraChucNang($MaNhomQuyen,$MaChucNang){
        $qr = "SELECT * FROM chitietquyen WHERE MaNhomQuyen = '$MaNhomQuyen' and MaChucNang = '$MaChucNang' ";
        if($this->con->query($qr)->num_rows>0)
        return 1;
        else return 0;

    }

    public function KiemTraChiTietQuyenSuDung($ma) {
        $qr = "SELECT * FROM chitietQuyen where MaChucNang = '$ma'";
        if($this->con->query($qr)->num_rows>0)
        return 1;
        else return 0;
    }

    public function delete($ma) {
        $qr = "DELETE FROM chucnang where MaChucNang = $ma";
        if($this->con->query($qr))
        return 1;
        else return 0;
    }


    public function updateTrangThai($ma,$trangThai)
    {
        $qr = "UPDATE chucnang set TrangThai = $trangThai where MaChucNang = $ma ";
        if($this->con->query($qr))
        {
              echo "Đổi trạng thái thành công!";
        }
        else
        {
            echo "Dổi trạng thái không thành công!";
        }
    }

    public function getTenChucNangTuMa($ma)
    {
        $qr = "SELECT * from chucnang where MaChucNang = $ma";
        while($row  = $this->con->query($qr)->fetch_assoc())
        {
            return $row["TenChucNang"];
        }
        return "";
    }


    public function KiemTraTonTaiQuaTen($tenChucNang)
    {
        $qr = "SELECT * FROM chucnang where TenChucNang ='$tenChucNang'";
        if($this->con->query($qr)->num_rows)
        {
            return 1;
        }else
        return 0;
    }
}

?>