<?php
class LoginModel extends DB{
    
    public function addDangKiKH($email,$ten,$sdt,$gioitinh){
        $qr = "INSERT INTO khachhang
        VALUES ('$email', '$ten','$sdt','$gioitinh','1')";
        if($row=mysqli_query($this->con, $qr)){
            return true;
        }
        return false;
        
    }

    public function addDangKiTK($email,$mk){
        $quyen="1";
        $qr = "INSERT INTO taikhoan
        VALUES (NULL,'$email',NULL, '$mk','$quyen','1')";
        if($row=mysqli_query($this->con, $qr)){
            return true;
        }
        return false;
        
    }

    public function TimTKKH($email,$mk){
        
        $qr ='SELECT * FROM taikhoan INNER JOIN khachhang on taikhoan.MaNguoiDung=khachhang.MaKhachHang  
        where (taikhoan.MaNguoiDung="'.$email.'" and taikhoan.MatKhau="'.$mk.'")';
        $row=mysqli_query($this->con, $qr);
        return $row;
        
    }

    public function TimTKNV($email,$mk){
        
        $qr ='SELECT * FROM taikhoan  
        INNER JOIN nhanvien on taikhoan.MaNhanVien=nhanvien.MaNhanVien where
        (taikhoan.MaNhanVien="'.$email.'" and taikhoan.MatKhau="'.$mk.'")';
        $row=mysqli_query($this->con, $qr);
        return $row;
        
    }



    

}
?>