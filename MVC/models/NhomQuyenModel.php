<?php
class NhomQuyenModel extends DB{

    public function getDanhSach($key,$pageIndex,$soLuong)
    {

        trim($key);
        // Kiểm tra đang ở trang
        // echo "pageIndex:".$pageIndex;
        if($pageIndex == "" || $pageIndex <= 0 )
        {
            $pageIndex = 1;
        }

        $batDau = ($pageIndex-1)*$soLuong;
        
        $qr = "SELECT * FROM nhomquyen";

        if($key!="")
        {
            $qr .= " where concat(MaNhomQuyen,TenNhomQuyen) like '%$key%'"; 

            $qr .= " ORDER BY MaNhomQuyen DESC";
            $qr .= " LIMIT $batDau,$soLuong";

            // echo $qr;
            return $this->con->query($qr);
        }
        else
        {
            $qr .= " ORDER BY MaNhomQuyen DESC";
            $qr .= " Limit $batDau,$soLuong";
            // echo $qr;
            return $this->con->query($qr);
        }
        // $qr="SELECT * from nhomquyen";
        // return $this->con->query($qr);
    }

    public function getDanhSachAll()
    {
        $qr = "SELECT * FROM nhomquyen";
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

    public function soLuongBanGhi($key)
    {
        $tmp = trim($key);
        $qr = "SELECT * FROM nhomquyen";
        if($tmp!="")
        {
            $qr .= " where concat(MaNhomQuyen,TenNhomQuyen) like '%$key%'";   
            $qr .= " ORDER BY MaNhomQuyen DESC";
            return $this->con->query($qr)->num_rows;
        }else
        {
            $qr .= " ORDER BY MaNhomQuyen DESC";
        }
        return $this->con->query($qr)->num_rows;
    }

   
    public function getDanhSachCoTrangThai(){
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