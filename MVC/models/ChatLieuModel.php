<?php
class ChatLieuModel extends DB
{

    public function getDanhSach()
    {
        $qr = "SELECT * from chatlieu";
        return $this->con->query($qr);
    }

    public function updateTrangThai($ma,$trangThai)
    {
      
        // echo $ma;
        // echo $trangThai;
        $qr = "UPDATE chatlieu set TrangThai = $trangThai where MaChatLieu = $ma ";
        
        if($this->con->query($qr))
        {
              echo "Đổi trạng thái thành công!";
        }else
        {
            echo "Dổi trạng thái không thành công!";
        }
    }

    public function UpdateCL($machatlieu,$tenchatlieu){
        $qr = 'UPDATE chatlieu set TenChatLieu = '.$tenchatlieu.' where MaChatLieu = "'.$machatlieu.'"';
        if(mysqli_query($this->con, $qr))
           return true;
        return false;
    }

    public function InsertCL($tenchatlieu){
        $qr = "INSERT INTO chatlieu VALUES (NULL,'$tenchatlieu','1')";
        if(mysqli_query($this->con, $qr))
           return true;
        return false;
    }

    public function DeleteCL($machatlieu){
        $qr = 'DELETE FROM chatlieu where MaChatLieu= "'.$machatlieu.'"';
        if(mysqli_query($this->con, $qr))
           return true;
        return false;
    }
}
?>