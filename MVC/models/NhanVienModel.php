<?php
    class NhanVienModel extends DB{

        function getAllDanhSach(){
            $qr = "SELECT * from nhanvien";
            return $this->con->query($qr);
        }

        function getNhanVien($ma){
            $qr = "SELECT * FROM nhanvien where MaNhanVien = '$ma'";
            return $this->con->query($qr);
        }

        function getIdTk($ma){

        }


        public function getItemById($ma)
        {
            $qr = "SELECT * FROM nhanvien where MaNhanVien = '$ma'";
            $result = $this->con->query($qr);
            if($result->num_rows>0)
            {
                while($row = $result->fetch_assoc())
                {
                    return ["MaNhanVien"=>$row["MaNhanVien"],"TenNhanVien"=>$row["TenNhanVien"],"SoDienThoai"=>$row["SoDienThoai"],"CCCD"=>$row["CCCD"],"NgaySinh"=>$row["NgaySinh"],"TrangThai"=>$row["TrangThai"]];
                }
            }
            
        }


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

        public function layMaNhanVienLonNhat()
        {
            $next_id_query = "SELECT MAX(RIGHT(MaNhanvien, 3)) AS max_id FROM nhanvien";
            $result = mysqli_query($this->con, $next_id_query);
            $row = mysqli_fetch_assoc($result);
            $max_id = $row['max_id'];

            if ($max_id === null) {
                return 'NV001'; // Nếu không có mã nào trong bảng
            } else {
                return 'NV' . sprintf('%03d', intval($max_id) + 1);
            }
        }

        public function insert($ten,$sdt,$cccd,$ngaySinh)
        {
            $id = $this->layMaNhanVienLonNhat();
            $qr = "INSERT INTO nhanvien VALUES ('$id','$ten','$sdt','$cccd','$ngaySinh','1')";
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

        public function update($ma,$ten,$sdt,$cccd,$ngaySinh)
        {
            $qr = "UPDATE nhanvien SET TenNhanVien = '$ten', SoDienThoai = '$sdt',  CCCD = '$cccd', NgaySinh = '$ngaySinh' where MaNhanVien = '$ma'";
            if($this->con->query($qr))
            {
                return 1;
            }
            else return 0;
        }
        
        //check sdt update
        public function checkSdtTrung($sdt,$ma) {
            $qr = "SELECT COUNT(*) as total FROM nhanvien WHERE SoDienThoai = '$sdt' AND MaNhanVien !='$ma'";
            $result = $this->con->query($qr);
            $row = $result->fetch_assoc();
            if($row['total']>0)
                return false;
            return true;
        }
        //check cccd update
        public function checkCccdTrung($cccd,$ma) {
            $qr = "SELECT COUNT(*) as total FROM nhanvien WHERE CCCD = '$cccd' AND MaNhanVien !='$ma'";
            $result = $this->con->query($qr);
            $row = $result->fetch_assoc();
            if($row['total']>0)
                return false;
            return true;
        }

        //check insert
        public function checkTrung($key,$str) {
            $qr = "SELECT COUNT(*) as total FROM nhanvien WHERE $str ='$key'";
            $result = $this->con->query($qr);
            $row = $result->fetch_assoc();
            if($row['total']>0)
                return false;
            return true;
        }


        public function kiemTraTaiKhoanNv($ma,&$arr){
            $arr = [];
            $qr = "SELECT * FROM taikhoan where TenDangNhap= '$ma'";
            $result = $this->con->query($qr);
            if($result->num_rows>0)
            {
            //    return  $result ;
            while($row = $result->fetch_assoc())
                {
                    $arr = ["MaTaiKhoan"=>$row["MaTaiKhoan"]];
                    return 1;
                }
            }
            return 0;
        }

        public function xoaTaiKhoanNhanVien($ma) {
            $qr = "DELETE FROM taikhoan where TenDangNhap= '$ma'";
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