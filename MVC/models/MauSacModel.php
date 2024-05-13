<?php
class MauSacModel extends DB{
    public function GetDanhSach(){
        $qr = "SELECT * FROM mausac";
        $row=mysqli_query($this->con, $qr);
        return $row;
    }

    public function GetDanhSachTT(){
        $qr = "SELECT * FROM mausac where TrangThai=1";
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
    public function UpdateMS($mamausac,$tenmausac){
        $qr = "UPDATE mausac set TenMauSac = '$tenmausac' where MaMauSac = '$mamausac'";
        if(mysqli_query($this->con, $qr))
           return true;
        return false;
    }
    public function DeleteMS($mams)
    {
        $qr = "DELETE FROM mausac where MaMauSac= '$mams'";
        if(mysqli_query($this->con,$qr))
        {
            return 1;
        }else
        {
            return 0;
        }
    }
    public function GettheoMaMauSac($mams){
        $qr = 'SELECT * FROM mausac where MaMauSac="'.$mams.'"';
        $row=mysqli_query($this->con, $qr);
        return $row;
    }
    public function getDanhSachMS($key,$pageIndex,$soLuong)
    {
        trim($key);
        // Kiểm tra đang ở trang
        // echo "pageIndex:".$pageIndex;
        if($pageIndex == "" || $pageIndex <= 0 )
        {
            $pageIndex = 1;
        }

        $batDau = ($pageIndex-1)*$soLuong;
        
        $qr = "SELECT * FROM mausac";

        if($key!="")
        {
            $qr .= " where concat(MaMauSac,TenMauSac) like '%$key%'"; 

            $qr .= " ORDER BY MaMauSac DESC";
            $qr .= " LIMIT $batDau,$soLuong";

            // echo $qr;
            return $this->con->query($qr);
        }
        else
        {
            $qr .= " ORDER BY MaMauSac DESC";
            $qr .= " Limit $batDau,$soLuong";
            // echo $qr;
            return $this->con->query($qr);
        }
        // $qr="SELECT * from nhomquyen";
        // return $this->con->query($qr);
    }
}
?>