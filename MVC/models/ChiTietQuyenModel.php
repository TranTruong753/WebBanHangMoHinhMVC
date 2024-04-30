<?php

class ChiTietQuyenModel extends DB{
    
 

    // public function getDanhSach()
    // {
    //     $qr = "SELECT DISTINCT ctq.Id,ctq.MaNhomQuyen,ctq.MaChucNang,ctq.HanhDong,nq.TenNhomQuyen,cn.TenChucNang
    //     from chitietquyen as ctq, nhomquyen as nq, chucnang as cn
    //             where ctq.MaNhomQuyen = nq.MaNhomQuyen
    //             and ctq.MaChucNang = cn.MaChucNang
    //             ORDER by ctq.MaNhomQuyen,cn.MaChucNang  ";
    //     return $this->con->query($qr);
    // }

    // public function getDanhSach()
    // {
    //     $qr = "SELECT DISTINCT ctq.MaNhomQuyen,ctq.MaChucNang
    //     from chitietquyen as ctq, nhomquyen as nq, chucnang as cn
    //             where ctq.MaNhomQuyen = nq.MaNhomQuyen
    //             and ctq.MaChucNang = cn.MaChucNang
    //             ORDER by ctq.MaNhomQuyen,cn.MaChucNang  ";
    //     return $this->con->query($qr);
    // }

    public function getDanhSach($key,$index,$size)
    {
        trim($key);

        if($index == "" || $index <= 0)
        {
            $index = 1;
        }
        $start = ($index - 1)*$size;
        $qr = "SELECT DISTINCT ctq.MaNhomQuyen,ctq.MaChucNang
        from chitietquyen as ctq, nhomquyen as nq, chucnang as cn
                where ctq.MaNhomQuyen = nq.MaNhomQuyen
                and ctq.MaChucNang = cn.MaChucNang";

            if($key != "")
            {
                $qr .= " and concat(nq.TenNhomQuyen,cn.TenChucNang) like '%$key%'";
            }

                $qr .=" ORDER by ctq.Id DESC LIMIT $start,$size";
        return $this->con->query($qr);
    }

    public function getMaChiTietQuyenTuMaNhomQuyenVaMaChucNang($MaNhomQuyen,$MaChucNang)
    {
        $qr = "SELECT * from chitietquyen where MaNhomQuyen = $MaNhomQuyen and MaChucNang = $MaChucNang ";
        if($this->con->query($qr)->num_rows > 0 )
        {
            while($row = $this->con->query($qr)->fetch_assoc())
            {
                return $row["Id"];
            }
        }
        return 0;
    }

    public function delete($MaNhomQuyen,$MaChucNang)
    {
        $qr = "DELETE FROM chitietQuyen where MaNhomQuyen = $MaNhomQuyen and MaChucNang = $MaChucNang ";
        if($this->con->query($qr))
        {
            return 1;
        }
        return 0;
    }

    public function XoaKhiCapNhatTrangThaiCheckBox($MaNhomQuyen,$MaChucNang,$HanhDong)
    {
        $qr = "DELETE FROM chitietQuyen where MaNhomQuyen = $MaNhomQuyen and MaChucNang = $MaChucNang and HanhDong = '$HanhDong'" ;
        if($this->con->query($qr))
        {
            return 1;
        }
        return 0;
    }

    public function KiemTraHanhDong($HanhDong,$MaNhomQuyen,$MaChucNang) {
        $qr = 'SELECT * FROM chitietquyen where MaNhomQuyen = "'.$MaNhomQuyen.'" and MaChucNang = "'.$MaChucNang.'" and HanhDong = "'.$HanhDong.'" ';
        if($this->con->query($qr)->num_rows > 0 )
        {
            return 1;
        } else return 0;
        
    }

    

    public function updateTrangThai($MaNhomQuyen,$MaChucNang,$HanhDong)
    {
      

    }

    public function insert($MaNhomQuyen,$MaChucNang,$HanhDong) {
        $qr = "INSERT INTO chitietquyen VALUES (null,'$MaNhomQuyen','$MaChucNang','$HanhDong')";
        if($this->con->query($qr))
        {
            return 1;
        }
        return 0;
        
    }
}

?>