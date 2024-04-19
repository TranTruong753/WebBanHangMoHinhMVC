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
        $qr = "UPDATE chatlieu set TenChatLieu = '$tenchatlieu' where MaChatLieu = '$machatlieu'";
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

    public function GettheoMaChatLieu($macl){
        $qr = 'SELECT * FROM chatlieu where MaChatLieu="'.$macl.'"';
        $row=mysqli_query($this->con, $qr);
        return $row;
    }
    public function getDanhSachCL($key,$pageIndex,$soLuong)
    {
        trim($key);
        // Kiểm tra đang ở trang
        // echo "pageIndex:".$pageIndex;
        if($pageIndex == "" || $pageIndex <= 0 )
        {
            $pageIndex = 1;
        }

        $batDau = ($pageIndex-1)*$soLuong;
        
        $qr = "SELECT * FROM chatlieu";

        if($key!="")
        {
            $qr .= " where concat(MaChatLieu,TenChatLieu) like '%$key%'"; 

            $qr .= " ORDER BY MaChatLieu DESC";
            $qr .= " LIMIT $batDau,$soLuong";

            // echo $qr;
            return $this->con->query($qr);
        }
        else
        {
            $qr .= " ORDER BY MaChatLieu DESC";
            $qr .= " Limit $batDau,$soLuong";
            // echo $qr;
            return $this->con->query($qr);
        }
        // $qr="SELECT * from nhomquyen";
        // return $this->con->query($qr);
    }
}
?>