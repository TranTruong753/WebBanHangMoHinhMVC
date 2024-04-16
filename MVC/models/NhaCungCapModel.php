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

    public function InsertNCC($tennhacungcap,$sodienthoai,$diachi){
        $qr = "INSERT INTO nhacungcap VALUES (NULL,'$tennhacungcap','$sodienthoai','$diachi','1')";
        if(mysqli_query($this->con, $qr))
           return true;
        return false;
    }

    public function UpdateNCC($manhacungcap,$tennhacungcap,$sodienthoai,$diachi){
        $qr = "UPDATE nhacungcap set TenNhaCungCap = '$tennhacungcap',SoDienThoai = '$sodienthoai', DiaChi = '$diachi' where MaNhaCungCap = '$manhacungcap'";
        if(mysqli_query($this->con, $qr))
           return true;
        return false;
    }
    public function GettheoMaNhaCungCap($mancc){
        $qr = 'SELECT * FROM nhacungcap where MaNhaCungCap="'.$mancc.'"';
        $row=mysqli_query($this->con, $qr);
        return $row;
    }
    public function getDanhSachNCC($key,$pageIndex,$soLuong)
    {
        trim($key);
        // Kiểm tra đang ở trang
        // echo "pageIndex:".$pageIndex;
        if($pageIndex == "" || $pageIndex <= 0 )
        {
            $pageIndex = 1;
        }

        $batDau = ($pageIndex-1)*$soLuong;
        
        $qr = "SELECT * FROM nhacungcap";

        if($key!="")
        {
            $qr .= " where concat(MaNhaCungCap,TenNhaCungCap) like '%$key%'"; 

            $qr .= " ORDER BY MaNhaCungCap ASC";
            $qr .= " LIMIT $batDau,$soLuong";

            // echo $qr;
            return $this->con->query($qr);
        }
        else
        {
            $qr .= " ORDER BY MaNhaCungCap ASC";
            $qr .= " Limit $batDau,$soLuong";
            // echo $qr;
            return $this->con->query($qr);
        }
        // $qr="SELECT * from nhomquyen";
        // return $this->con->query($qr);
    }
}
?>