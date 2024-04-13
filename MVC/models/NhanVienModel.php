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

        public function insert($ten)
        {
            $qr = "INSERT INTO khachhang VALUES (null,'$ten','1')";
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
            $qr = "DELETE FROM nhanvien where MaNhanVien= '$ma'";
            if(mysqli_query($this->con,$qr))
            {
                return 1;
            }else
            {
                return 0;
            }
        }

        public function kiemTraTaiKhoanNv($ma){
            $qr = "SELECT * FROM taikhoan where MaNhanVien= '$ma'";
            if(mysqli_query($this->con,$qr)->num_rows > 0)
            {
                return 1;
            }else
            {
                return 0;
            }
        }

        public function xoaTaiKhoanNhanVien($ma) {
            $qr = "DELETE FROM taikhoan where MaNhanVien= '$ma'";
            if(mysqli_query($this->con,$qr))
            {
                return 1;
            }else
            {
                return 0;
            }
        }

    
        public function kiemTraTrangThai($ma){
            $qr = "SELECT * FROM nhanvien WHERE MaNhanVien = '$ma' AND  TrangThai = 1";
            if(mysqli_query($this->con,$qr)->num_rows > 0)
            {
                return 1;
            }else
            {
                return 0;
            }
        }

        public function updateTrangThai($ma,$trangThai)
    {
        $qr = "UPDATE nhanvien set TrangThai = $trangThai where MaNhanVien = '$ma'";
        if($this->con->query($qr))
        {
            echo "Đổi Trạng Thái Thành Công!";
        }else
        {
            echo "Đổi Trạng Thái Thất Bại!";
        }
    }
    }
?>