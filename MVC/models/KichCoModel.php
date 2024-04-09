<?php
class KichCoModel extends DB{
    public function GetDanhSach(){
        $qr = "SELECT * FROM kichco";
        $row=mysqli_query($this->con, $qr);
        return $row;
    }
    public function updateTrangThai($ma,$trangThai)
    {
      
        // echo $ma;
        // echo $trangThai;
        $qr = "UPDATE kichco set TrangThai = $trangThai where MaKichCo = $ma ";
        
        if($this->con->query($qr))
        {
              echo "Đổi trạng thái thành công!";
        }else
        {
            echo "Dổi trạng thái không thành công!";
        }
    }
    public function InsertKC($tenkichco){
        $qr = "INSERT INTO kichco VALUES (NULL,'$tenkichco','1')";
        if(mysqli_query($this->con, $qr))
           return true;
        return false;
    }
}
?>