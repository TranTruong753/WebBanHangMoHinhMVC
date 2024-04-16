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

    public function getItemById($MaKhuyenMai)
    {
        $qr = "SELECT * FROM khuyenmai where MaKhuyenMai = '$MaKhuyenMai'";
        $result = $this->con->query($qr);
        if($result->num_rows>0)
        {
            while($row = $result->fetch_assoc())
            {
                return ["MaKhuyenMai"=>$row["MaKhuyenMai"],"TenKhuyenMai"=>$row["TenKhuyenMai"],"MucKhuyenMai"=>$row["MucKhuyenMai"],"TrangThai"=>$row["TrangThai"]];
            }
        }
        
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

    public function KiemTraTonTaiQuaTen($TenKhuyenMai)
    {
        $qr = "SELECT * FROM khuyenmai where TenKhuyenMai = '$TenKhuyenMai'";
        if($this->con->query($qr)->num_rows > 0)
        {
            return 1;
        }
        else return 0;
    }
    public function getAllKM(){
        $qr = "SELECT * FROM khuyenmai where TrangThai=1";
        return $this->con->query($qr);
    }
}
?>
