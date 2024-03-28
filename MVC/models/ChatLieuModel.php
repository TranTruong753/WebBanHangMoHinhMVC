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
}
?>