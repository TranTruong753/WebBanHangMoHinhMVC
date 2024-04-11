<?php
    class NhanVienModel extends DB{

        function getDanhSach($key,$pageIndex,$soLuong)
        {
            trim($key);
          
            if($pageIndex == "" || $pageIndex <= 0 )
            {
                $pageIndex = 1;
            }

            $batDau = ($pageIndex-1)*$soLuong;
            
            $qr = "SELECT * FROM nhanvien";

            if($key!="")
            {
                $qr .= " where concat(MaNhanvien,TenNhanvien) like '%$key%'"; 

                $qr .= " ORDER BY MaNhanvien,TrangThai DESC";
                $qr .= " LIMIT $batDau,$soLuong";

        
                return $this->con->query($qr);
            }
            else
            {
                $qr .= " ORDER BY MaNhanvien,TrangThai DESC";
                $qr .= " Limit $batDau,$soLuong";
        
                return $this->con->query($qr);
            }
        
        }
    }
?>