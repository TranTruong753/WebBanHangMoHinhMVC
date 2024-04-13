<?php
class NhaCungCapModel extends DB
{

    public function getDanhSach()
    {
        $qr = "SELECT * from nhacungcap";
        return $this->con->query($qr);
    }

    public function updateTrangThai($ma,$trangThai)
    {
      
        // echo $ma;
        // echo $trangThai;
        $qr = "UPDATE nhacungcap set TrangThai = $trangThai where MaNhaCungCap = $ma ";
        
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

    public function InsertNCC($tennhacungcap,$sodienthoai,$diachi){
        $qr = "INSERT INTO nhacungcap VALUES (NULL,'$tennhacungcap','$sodienthoai','$diachi','1')";
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