<?php

class KhuyenMaiModel extends DB {
    public function getDanhSach($key,$index,$size) {
        trim($key);
        if($index == "" || $index <= 0 ) $index =1;
        $start = ($index - 1) * $size;
        
        $qr = "SELECT * FROM khuyenmai";

        if($key != "")
        {
            $qr .= " WHERE concat(MaKhuyenMai,TenKhuyenMai,MucKhuyenMai)";
        }

        $qr .= " ORDER BY MaKhuyenMai DESC ";
        $qr .= " LIMIT $start,$size ";

        return $this->con->query($qr);
    }

    public function insert($TenKhuyenMai,$MucKhuyenMai)
    {
        $qr = "INSERT INTO khuyenmai VALUES('null','$TenKhuyenMai','$MucKhuyenMai','1')";
        if($this->con->query($qr))
        {
            return 1;
        }
        else return 0;
    }

    public function update($MaKhuyenMai,$TenKhuyenMai,$MucKhuyenMai)
    {
        $qr = "UPDATE khuyenmai SET TenKhuyenMai = '$TenKhuyenMai', MucKhuyenMai = '$MucKhuyenMai' where MaKhuyenMai = '$MaKhuyenMai'";
        if($this->con->query($qr))
        {
            return 1;
        }
        else return 0;
    }
}
?>
