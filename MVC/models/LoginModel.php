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
        VALUES ('$email', '$mk','$quyen','1')";
        if($row=mysqli_query($this->con, $qr)){
            return true;
        }
        return false;
        
    }

    public function TimTK($email,$mk){
        
        $qr ='SELECT * FROM taikhoan where MaNguoiDung="'.$email.'" and MatKhau="'.$mk.'"';
        $row=mysqli_query($this->con, $qr);
        return $row;
        
    }



    

}
?>