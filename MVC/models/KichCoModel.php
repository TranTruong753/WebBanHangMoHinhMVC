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
    public function UpdateKC($makichco,$tenkichco){
        $qr = "UPDATE kichco set TenKichCo = '$tenkichco' where MaKichCo = '$makichco'";
        if(mysqli_query($this->con, $qr))
           return true;
        return false;
    }
    public function DeleteKC($makc)
    {
        $qr = "DELETE FROM kichco where MaKichCo= '$makc'";
        if(mysqli_query($this->con,$qr))
        {
            return 1;
        }else
        {
            return 0;
        }
    }
    public function GettheoMaKichCo($makc){
        $qr = 'SELECT * FROM kichco where MaKichCo="'.$makc.'"';
        $row=mysqli_query($this->con, $qr);
        return $row;
    }
    public function getDanhSachKC($key,$pageIndex,$soLuong)
    {
        trim($key);
        // Kiểm tra đang ở trang
        // echo "pageIndex:".$pageIndex;
        if($pageIndex == "" || $pageIndex <= 0 )
        {
            $pageIndex = 1;
        }

        $batDau = ($pageIndex-1)*$soLuong;
        
        $qr = "SELECT * FROM kichco";

        if($key!="")
        {
            $qr .= " where concat(MaKichCo,TenKichCo) like '%$key%'"; 

            $qr .= " ORDER BY MaKichCo DESC";
            $qr .= " LIMIT $batDau,$soLuong";

            // echo $qr;
            return $this->con->query($qr);
        }
        else
        {
            $qr .= " ORDER BY MaKichCo DESC";
            $qr .= " Limit $batDau,$soLuong";
            // echo $qr;
            return $this->con->query($qr);
        }
        // $qr="SELECT * from nhomquyen";
        // return $this->con->query($qr);
    }
}
?>