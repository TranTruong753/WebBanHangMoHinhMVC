<?php
class NhomQuyenModel extends DB{

    public function getDanhSach()
    {
        $qr = "SELECT * FROM nhomquyen ";
        // $row = mysqli_query($this->con,$qr);
        // return $row;
        return $this->con->query($qr);
    }

    
    public function contains($ten)
    {
        $qr = "SELECT * FROM nhomquyen Where TenNhomQuyen = N\"$ten\"";
        $row = mysqli_query($this->con,$qr);
        while( $row = mysqli_query($this->con,$qr))
        {
            return true;
        }
        return false;
    }

    public function getTenNhomQuyenTuMa($Ma)
    {
        $qr = "SELECT * FROM nhomquyen Where MaNhomQuyen = $Ma";
       
        while( $row = $this->con->query($qr)->fetch_assoc())
        {
            return $row["TenNhomQuyen"];
        }
        return "";
    }

    public function getDanhSachMaCoTrangThai(){
        $qr = "SELECT * from nhomquyen where TrangThai = 1";
        return $this->con->query($qr);
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

    public function insert($ten)
    {
        $qr = "INSERT INTO nhomquyen VALUES (null,'$ten','1')";
        if($row = mysqli_query($this->con,$qr))
        {
            return 1;
        }else
        {
            return 0;
        }
    }

    public function update($ten,$ma)
    {
        $qr = "UPDATE nhomquyen SET TenNhomQuyen= '$ten' where MaNhomQuyen = $ma";
        if(mysqli_query($this->con,$qr))
        {
            return 1;
        }else
        {
            return 0;
        }
    }

    public function delete($ma)
    {
        $qr = "DELETE FROM nhomquyen where MaNhomQuyen = $ma";
        if(mysqli_query($this->con,$qr))
        {
            return 1;
        }else
        {
            return 0;
        }
    }

    // public function insert($ten)
    // {
    //     $qr = "INSERT INTO nhomquyen VALUES (null,'$ten','1')";
    //     if(in_array($ten,$this->GetDanhSachTen()))
    //     {
    //         return "Tên nhóm quyền đã tồn tại!";
    //     }
    //     else
    //     {
    //         if($row = mysqli_query($this->con,$qr))
    //         {
    //             return true;
    //         }else
    //         {
    //             return false;
    //         }
    //     }
       
    // }

    

    public function GetDanhSachTen()
    {
        $qr = "SELECT TenNhomQuyen from nhomquyen";
        $arr = [];
        $i=1;
        if( $this->con->query($qr)->num_rows > 0)
        {
            while($row = $this->con->query($qr)->fetch_assoc())
            {
                $arr[$i] = $row["TenNhomQuyen"];
            }
            return $arr;
        }
        return [];
    }

    public function TimKiemQuaTen($ten)
    {
        $qr = 'SELECT TenNhomQuyen from nhomquyen where TenNhomQuyen = "'.$ten.'"';
       if( mysqli_query($this->con,$qr)->num_rows > 0)
       {
        return 1;
       }
        return 0;
    }

    // public function TimKiemQuaMa($ma)
    // {
    //     $qr = 'SELECT * from nhomquyen where MaNhomQuyen = '.$ma.'';
    //    if( mysqli_query($this->con,$qr)->num_rows > 0)
    //    {
    //     while($row = $this->con->query($qr)->fetch_assoc())
    //     {
    //         return new
    //     }
       
    //     }
       
    //     return 0;
    // }
}

?>