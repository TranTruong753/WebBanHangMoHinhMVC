<?php

class TaiKhoanModel extends DB{

    // public function getDanhSach()
    // {
    //     $qr = "SELECT tk.MaTaiKhoan,tk.TenDangNhap,tk.MatKhau,nq.TenNhomQuyen,tk.TrangThai
    //     from taikhoan as tk,nhomquyen as nq where tk.MaNhomQuyen = nq.MaNhomQuyen";
    //     return $this->con->query($qr);
    // }
    
    public function getItemByIdTk($maTk,&$arr){
        $qr = "SELECT taikhoan.* , nhomquyen.TenNhomQuyen 
        FROM taikhoan, nhomquyen 
        where taikhoan.MaTaiKhoan = '$maTk' 
        And nhomquyen.MaNhomQuyen = taiKhoan.MaNhomQuyen 
        ";

        $result = $this->con->query($qr);
        if($result->num_rows>0)
        {
        //    return  $result ;
        while($row = $result->fetch_assoc())
            {
                $arr = ["MaTaiKhoan"=>$row["MaTaiKhoan"]
                ,"TenDangNhap"=>$row["TenDangNhap"],"MatKhau"=>$row["MatKhau"]
                ,"MaNhomQuyen"=>$row["MaNhomQuyen"],"TrangThai"=>$row["TrangThai"]
                ,"TenNhomQuyen"=>$row["TenNhomQuyen"]
                ,"MatKhau"=>$row["MatKhau"]];
                return 1;
            }
        }
        return 0;
    }

    public function getItemById($maTk,$table,$maKey,$nameKey,&$arr)
    {
        $arr = [];
        $qr = "SELECT taikhoan.* , $table.$nameKey , nhomquyen.TenNhomQuyen 
        FROM $table,taikhoan, nhomquyen 
        where taikhoan.MaTaiKhoan = '$maTk' 
        And nhomquyen.MaNhomQuyen = taiKhoan.MaNhomQuyen 
        And taikhoan.TenDangNhap = $table.$maKey
        ";

        $result = $this->con->query($qr);
        if($result->num_rows>0)
        {
        //    return  $result ;
           while($row = $result->fetch_assoc())
            {
                $arr = ["MaTaiKhoan"=>$row["MaTaiKhoan"]
                ,"TenDangNhap"=>$row["TenDangNhap"],"MatKhau"=>$row["MatKhau"]
                ,"MaNhomQuyen"=>$row["MaNhomQuyen"],"TrangThai"=>$row["TrangThai"]
                ,"$nameKey" => $row["$nameKey"],"TenNhomQuyen"=>$row["TenNhomQuyen"]
                ,"MatKhau"=>$row["MatKhau"]];
                return 1;
            }
        }
        return 0;
        
    }

  


    function loadDsTenDangNha($table,$column){
        // $qr = "SELECT DISTINCT $table.* FROM $table, taikhoan WHERE $column != TenDangNhap ORDER BY $column";
        $qr = "SELECT $table.*
        FROM $table
        LEFT JOIN taikhoan ON $table.$column = taikhoan.TenDangNhap
        WHERE taikhoan.TenDangNhap IS NULL";
        return $this->con->query($qr);
    }

    function getDanhSach($key,$pageIndex,$soLuong)
        {
            trim($key);
          
            if($pageIndex == "" || $pageIndex <= 0 )
            {
                $pageIndex = 1;
            }

            $batDau = ($pageIndex-1)*$soLuong;
            
          //  $qr = "SELECT * FROM taikhoan";
            $qr = "SELECT tk.MaTaiKhoan,tk.TenDangNhap,tk.MatKhau,nq.TenNhomQuyen,tk.TrangThai
            from taikhoan as tk,nhomquyen as nq where tk.MaNhomQuyen = nq.MaNhomQuyen";

            if($key!="")
            {
                $qr .= " and concat(tk.MaTaikhoan,tk.TenDangNhap) like '%$key%'"; 

                $qr .= " ORDER BY tk.MaTaikhoan,tk.TrangThai DESC";
                $qr .= " LIMIT $batDau,$soLuong";

        
                return $this->con->query($qr);
            }
            else
            {
                $qr .= " ORDER BY tk.MaTaikhoan,tk.TrangThai DESC";
                $qr .= " Limit $batDau,$soLuong";
        
                return $this->con->query($qr);
            }
        
        }

    public function updateTrangThai($ma,$trangThai)
    {
        $qr = "UPDATE taikhoan set TrangThai = $trangThai where MaTaiKhoan = $ma";
        if( $this->con->query($qr))
        {
             echo "Đổi trạng thái thành công!" ;
        } 
        else  
        {
              echo "Đổi trạng thái thất bại!";
        }
    }

    function insert($TenDangNhap, $MatKhau, $MaNhomQuyen){
        $qr = "INSERT INTO taikhoan VALUES (NULL,'$TenDangNhap','$MatKhau','$MaNhomQuyen','1')";
        if($row = mysqli_query($this->con,$qr))
            {
                return 1;
            }else
            {
                return 0;
            }
    }

    public function delete($ma)
        {
            $qr = "DELETE FROM taikhoan where MaTaiKhoan= '$ma'";
            if(mysqli_query($this->con,$qr))
            {
                return 1;
            }else
            {
                return 0;
            }
        }
    

    function update($maTk,$ten, $matKhau, $maNq) {
        $qr = 'UPDATE taikhoan
               SET TenDangNhap = "'.$ten.'", MatKhau = "'.$matKhau.'", MaNhomQuyen = "'.$maNq.'"
               WHERE MaTaiKhoan = "'.$maTk.'"';
               
        return $this->con->query($qr);
    }
}
?>