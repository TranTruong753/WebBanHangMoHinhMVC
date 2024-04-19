<?php

class KhachHangModel extends DB{
    
    function GetAllHoaDon(){
        $qr = "SELECT *
        from KhachHang";
        return $this->con->query($qr);

    }

    function getAllDanhSach(){
        $qr = "SELECT * from khachhang";
        return $this->con->query($qr);
    }

    public function getItemById($ma)
        {
            $qr = "SELECT * FROM khachhang where MaKhachHang = '$ma'";
            $result = $this->con->query($qr);
            if($result->num_rows>0)
            {
                while($row = $result->fetch_assoc())
                {
                    return ["MaKhachHang"=>$row["MaKhachHang"],"TenKhachHang"=>$row["TenKhachHang"],"SoDienThoai"=>$row["SoDienThoai"],"GioiTinh"=>$row["GioiTinh"],"TrangThai"=>$row["TrangThai"]];
                }
            }
            
        }

    function getDanhSach($key,$pageIndex,$soLuong)
    {
        trim($key);
        // Kiểm tra đang ở trang
        // echo "pageIndex:".$pageIndex;
        if($pageIndex == "" || $pageIndex <= 0 )
        {
            $pageIndex = 1;
        }

        $batDau = ($pageIndex-1)*$soLuong;
        
        $qr = "SELECT * FROM khachhang";

        if($key!="")
        {
            $qr .= " where concat(MaKhachHang,TenKhachHang) like '%$key%'"; 

            $qr .= " ORDER BY MaKhachHang,TrangThai DESC";
            $qr .= " LIMIT $batDau,$soLuong";

            // echo $qr;
            return $this->con->query($qr);
        }
        else
        {
            $qr .= " ORDER BY MaKhachHang,TrangThai DESC";
            $qr .= " Limit $batDau,$soLuong";
            // echo $qr;
            return $this->con->query($qr);
        }
        // $qr="SELECT * from nhomquyen";
        // return $this->con->query($qr);
    }

    function TimKHbyID($makh){
        $qr = 'SELECT *
        from khachhang where MaKhachHang="'.$makh.'"' ;
        return $this->con->query($qr);

    }

    function updateKh($makh, $sdt, $ten, $gioitinh) {
        $qr = 'UPDATE khachhang
               SET TenKhachHang = "'.$ten.'", SoDienThoai = "'.$sdt.'", GioiTinh = "'.$gioitinh.'"
               WHERE MaKhachHang = "'.$makh.'"';
        return $this->con->query($qr);
    }

     //check sdt update
     public function checkSdtTrung($sdt,$ma) {
        $qr = "SELECT COUNT(*) as total FROM khachhang WHERE SoDienThoai = '$sdt' AND MaKhachHang !='$ma'";
        $result = $this->con->query($qr);
        $row = $result->fetch_assoc();
        if($row['total']>0)
            return false;
        return true;
    }

    //check insert
    public function checkTrung($key,$str) {
        $qr = "SELECT COUNT(*) as total FROM khachhang WHERE $str ='$key'";
        $result = $this->con->query($qr);
        $row = $result->fetch_assoc();
        if($row['total']>0)
            return false;
        return true;
    }

    

    public function getDanhSachCoTrangThai(){
        $qr = "SELECT * from khachhang where TrangThai = 1";
        return $this->con->query($qr);
    }


    public function updateTrangThai($ma,$trangThai)
    {
        $qr = "UPDATE khachhang set TrangThai = $trangThai where MaKhachHang = '$ma'";
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
        $qr = "INSERT INTO khachhang VALUES (null,'$ten','1')";
        if($row = mysqli_query($this->con,$qr))
        {
            return 1;
        }else
        {
            return 0;
        }
    }

    public function insertKh($makh, $sdt, $ten, $gioitinh)
    {
        $qr = "INSERT INTO khachhang VALUES ('$makh','$ten','$sdt','$gioitinh','1')";
        return $this->con->query($qr);
    }


    public function delete($ma)
    {
        $qr = "DELETE FROM khachhang where MaKhachHang = '$ma'";
        if(mysqli_query($this->con,$qr))
        {
            return 1;
        }else
        {
            return 0;
        }
    }

    public function kiemTraTrangThai($ma){
        $qr = "SELECT * FROM khachhang WHERE MaKhachHang = '$ma' AND  TrangThai = 1";
        if(mysqli_query($this->con,$qr)->num_rows > 0)
        {
            return 1;
        }else
        {
            return 0;
        }
    }
    

    

    

    


}
?>