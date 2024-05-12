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
    public function InsertTL($machungloai,$tentheloai){
        $qr = "INSERT INTO theloai VALUES (NULL,'$machungloai','$tentheloai','1')";
        if(mysqli_query($this->con, $qr))
           return true;
        return false;
    }
    public function UpdateTL($matheloai,$machungloai,$tentheloai){
        $qr = "UPDATE theloai set MaChungLoai = '$machungloai',TenTheLoai = '$tentheloai' where MaTheLoai = '$matheloai'";
        if(mysqli_query($this->con, $qr))
           return true;
        return false;
    }
    public function GettheoMaTheLoai($matl){
        $qr = 'SELECT * FROM theloai where MaTheLoai="'.$matl.'"';
        $row=mysqli_query($this->con, $qr);
        return $row;
    }
    public function DeleteTL($matl)
    {
        $qr = "DELETE FROM theloai where MaTheLoai= '$matl'";
        if(mysqli_query($this->con,$qr))
        {
            return 1;
        }else
        {
            return 0;
        }
    }
    public function getDanhSachTL($key,$pageIndex,$soLuong)
    {
        trim($key);
        // Kiểm tra đang ở trang
        // echo "pageIndex:".$pageIndex;
        if($pageIndex == "" || $pageIndex <= 0 )
        {
            $pageIndex = 1;
        }

        $batDau = ($pageIndex-1)*$soLuong;
        
        $qr = "SELECT * FROM theloai";

        if($key!="")
        {
            $qr .= " where concat(MaTheLoai,TenTheLoai) like '%$key%'"; 

            $qr .= " ORDER BY MaTheLoai DESC";
            $qr .= " LIMIT $batDau,$soLuong";

            // echo $qr;
            return $this->con->query($qr);
        }
        else
        {
            $qr .= " ORDER BY MaTheLoai DESC";
            $qr .= " Limit $batDau,$soLuong";
            // echo $qr;
            return $this->con->query($qr);
        }
        // $qr="SELECT * from nhomquyen";
        // return $this->con->query($qr);
    }
}
?>