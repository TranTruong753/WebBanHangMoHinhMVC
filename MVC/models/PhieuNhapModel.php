<?php
class PhieuNhapModel extends DB{
    public function getAllPN(){
        $qr = "SELECT * from phieunhap";
        return $this->con->query($qr);

    }
    public function layMaPNLonNhat()
    {
        $next_id_query = "SELECT MAX(RIGHT(MaPhieuNhap, 3)) AS max_id FROM phieunhap";
        $result = mysqli_query($this->con, $next_id_query);
        $row = mysqli_fetch_assoc($result);
        $max_id = $row['max_id'];

        if ($max_id === null) {
            return 'PN001'; // Nếu không có mã nào trong bảng
        } else {
            return 'PN' . sprintf('%03d', intval($max_id) + 1);
        }
    }
    public function getDanhSach($key,$pageIndex,$soLuong,$arrange,$properties)
    {
        trim($key);
        // Kiểm tra đang ở trang
        // echo "pageIndex:".$pageIndex;
        if($pageIndex == "" || $pageIndex <= 0 )
        {
            $pageIndex = 1;
        }

        $batDau = ($pageIndex-1)*$soLuong;
        
        $qr = "SELECT * FROM phieunhap";

        if($key!="")
        {
            $qr .= " INNER JOIN nhacungcap 
            on phieunhap.MaNhaCungCap= nhacungcap.MaNhaCungCap INNER JOIN nhanvien  
            on phieunhap.MaNhanVien= nhanvien.MaNhanVien  
            where concat(phieunhap.MaPhieuNhap,phieunhap.NgayNhap,nhacungcap.TenNhaCungCap,nhanvien.TenNhanVien) like '%$key%'"; 

            $qr .= " ORDER BY $properties $arrange";
            $qr .= " LIMIT $batDau,$soLuong";

            // echo $qr;
            return $this->con->query($qr);
        }
        else
        {
            $qr .= " INNER JOIN nhacungcap 
            on phieunhap.MaNhaCungCap= nhacungcap.MaNhaCungCap INNER JOIN nhanvien  
            on phieunhap.MaNhanVien= nhanvien.MaNhanVien 
            ORDER BY $properties $arrange";
            $qr .= " Limit $batDau,$soLuong";
            // echo $qr;
            return $this->con->query($qr);
        }
        // $qr="SELECT * from nhomquyen";
        // return $this->con->query($qr);
    }

    public function InsertPN($mapn,$ngaynhap,$tongtien,$ncc,$manv){
        $qr = "INSERT INTO phieunhap VALUES ('$mapn', '$ngaynhap','$tongtien','$ncc','$manv','1')";
        if(mysqli_query($this->con, $qr))
           return true;
        return false;
    }
    
}
?>