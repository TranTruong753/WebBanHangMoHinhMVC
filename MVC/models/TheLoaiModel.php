<?php
class TheLoaiModel extends DB{
    public function GetTheLoaiModel(){
        $qr = "SELECT * FROM theloai";
        $row=mysqli_query($this->con, $qr);
        return $row;
    }
    public function updateTrangThai($ma,$trangThai)
    {
      
        // echo $ma;
        // echo $trangThai;
        $qr = "UPDATE theloai set TrangThai = $trangThai where MaTheLoai = $ma ";
        
        if($this->con->query($qr))
        {
              echo "Đổi trạng thái thành công!";
        }else
        {
            echo "Dổi trạng thái không thành công!";
        }
    }
    public function InsertTL($machungloai,$tenthuonghieu){
        $qr = "INSERT INTO theloai VALUES (NULL,'$machungloai','$tenthuonghieu','1')";
        if(mysqli_query($this->con, $qr))
           return true;
        return false;
    }
}
?>