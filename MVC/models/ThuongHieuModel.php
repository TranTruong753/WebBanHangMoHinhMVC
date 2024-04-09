<?php
class ThuongHieuModel extends DB
{

    public function getDanhSach()
    {
        $qr = "SELECT * from thuonghieu";
        return $this->con->query($qr);
    }

    public function updateTrangThai($ma,$trangThai)
    {
      
        // echo $ma;
        // echo $trangThai;
        $qr = "UPDATE thuonghieu set TrangThai = $trangThai where MaThuongHieu = $ma ";
        
        if($this->con->query($qr))
        {
              echo "Đổi trạng thái thành công!";
        }else
        {
            echo "Dổi trạng thái không thành công!";
        }
    }

    // public function UpdateCL($machatlieu,$tenchatlieu){
    //     $qr = 'UPDATE chatlieu set TenChatLieu = '.$tenchatlieu.' where MaChatLieu = "'.$machatlieu.'"';
    //     if(mysqli_query($this->con, $qr))
    //        return true;
    //     return false;
    // }

    public function InsertTH($tenthuonghieu){
        $qr = "INSERT INTO thuonghieu VALUES (NULL,'$tenthuonghieu','1')";
        if(mysqli_query($this->con, $qr))
           return true;
        return false;
    }

    // public function DeleteCL($machatlieu){
    //     $qr = 'DELETE FROM chatlieu where MaChatLieu= "'.$machatlieu.'"';
    //     if(mysqli_query($this->con, $qr))
    //        return true;
    //     return false;
    // }
}
?>