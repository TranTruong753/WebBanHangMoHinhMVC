<?php
class MauSacModel extends DB{
    public function GetDanhSach(){
        $qr = "SELECT * FROM mausac";
        $row=mysqli_query($this->con, $qr);
        return $row;
    }
    public function updateTrangThai($ma,$trangThai)
    {
      
        // echo $ma;
        // echo $trangThai;
        $qr = "UPDATE mausac set TrangThai = $trangThai where MaMauSac = $ma ";
        
        if($this->con->query($qr))
        {
              echo "Đổi trạng thái thành công!";
        }else
        {
            echo "Dổi trạng thái không thành công!";
        }
    }
    public function InsertMS($tenmausac){
        $qr = "INSERT INTO mausac VALUES (NULL,'$tenmausac','1')";
        if(mysqli_query($this->con, $qr))
           return true;
        return false;
    }
}
?>