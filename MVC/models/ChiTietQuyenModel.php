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

    public function getDanhSach()
    {
        $qr = "SELECT DISTINCT ctq.MaNhomQuyen,ctq.MaChucNang
        from chitietquyen as ctq, nhomquyen as nq, chucnang as cn
                where ctq.MaNhomQuyen = nq.MaNhomQuyen
                and ctq.MaChucNang = cn.MaChucNang
                ORDER by ctq.MaNhomQuyen,cn.MaChucNang  ";
        return $this->con->query($qr);
    }

    public function KiemTraHanhDong($MaNhomQuyen,$MaChucNang,$HanhDong)
    {
        $qr = 'SELECT * From chitietquyen Where MaNhomQuyen  = '.$MaNhomQuyen.' and MaChucNang = '.$MaChucNang.' and HanhDong = N\''.$HanhDong.'\'';
        if($this->con->query($qr)->num_rows >0) 
        {
            return 1 ;
        }

        return 0;

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