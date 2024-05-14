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
        VALUES (NULL,'$email','$mk','$quyen','1')";
        if($row=mysqli_query($this->con, $qr)){
            return true;
        }
        return false;
        
    }

    public function TimTKKH($email,$mk){
        
        $qr ='SELECT * FROM taikhoan INNER JOIN khachhang on taikhoan.TenDangNhap=khachhang.MaKhachHang  
        where (taikhoan.TenDangNhap="'.$email.'" and taikhoan.MatKhau="'.$mk.'")
        AND taikhoan.TrangThai = 1';
        $row=mysqli_query($this->con, $qr);
        return $row;
        
    }

    public function TimTKNV($email,$mk){
        
        $qr ='SELECT * FROM taikhoan  
        INNER JOIN nhanvien on taikhoan.TenDangNhap=nhanvien.MaNhanVien where
        (taikhoan.TenDangNhap="'.$email.'" and taikhoan.MatKhau="'.$mk.'")
        AND taikhoan.TrangThai = 1';
        $row=mysqli_query($this->con, $qr);
        return $row;
        
    }

    public function updatemk($email,$mk){
        
        $qr = "UPDATE taikhoan set MatKhau='$mk' where TenDangNhap = '$email'";
        if ($this->con->query($qr)) {
            // Kiểm tra số lượng hàng bị ảnh hưởng
            if ($this->con->affected_rows > 0) {
                echo true; // Có ít nhất một hàng đã được cập nhật
            } else {
                echo false; // Không có hàng nào bị ảnh hưởng
            }
        } else {
            echo false; // Truy vấn thất bại
        }
    
        
    }



    

}
?>