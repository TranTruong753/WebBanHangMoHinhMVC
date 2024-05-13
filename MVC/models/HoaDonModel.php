<?php

class HoaDonModel extends DB
{

    function GetAllHoaDonKH($makh)
    {
        $qr = 'SELECT *
        from hoadon where MaKhachHang="' . $makh . '"';
        return $this->con->query($qr);
    }

    function GetAllHoaDon()
    {
        $qr = 'SELECT *
        from hoadon ';
        return $this->con->query($qr);
    }

    function InsertHoaDon($mahd, $date, $tongtien, $pttt, $makh, $sdt, $diachi)
    {

        $qr = "INSERT INTO hoadon VALUES ('$mahd','$date','$tongtien','$pttt',NULL,'$makh','$sdt','$diachi',NULL,NULL,0)";
        if (mysqli_query($this->con, $qr)) {
            return true;
        } else {
            return false;
        }
    }
    function InsertCTHD($mahd, $mactsp, $sl, $thanhtien)
    {
        $qr = "INSERT INTO chitiethoadon VALUES ('$mahd','$mactsp','$sl','$thanhtien')";
        if (mysqli_query($this->con, $qr)) {
            return true;
        } else {
            return false;
        }
    }
    public function layMaHDLonNhat()
        {
            $next_id_query = "SELECT MAX(RIGHT(MaHoaDon, 2)) AS max_id FROM hoadon";
            $result = mysqli_query($this->con, $next_id_query);
            $row = mysqli_fetch_assoc($result);
            $max_id = $row['max_id'];

            if ($max_id === null) {
                return 'HD01'; // Nếu không có mã nào trong bảng
            } else {
                return 'HD' . sprintf('%02d', intval($max_id) + 1);
            }
        }

    public function updateTrangThai($ma, $trangThai)
    {

        // echo $ma;
        // echo $trangThai;
        $qr = "UPDATE hoadon set TrangThai = $trangThai where MaHoaDon = '$ma' ";

        if (mysqli_query($this->con, $qr)) {
            echo "Đổi trạng thái thành công!";
        } else {
            echo "Dổi trạng thái không thành công!";
        }
    }

    public function getDanhSachHoaDonTrong1Thang()
    {
        $qr = 'SELECT concat(sp.TenSanPham,"-",kc.TenKichCo,"-",ms.TenMauSac) as TenSanPham, SUM(cthd.SoLuong) as total
        FROM hoadon as hd, chitiethoadon as cthd, sanpham as sp, chitietsanpham as ctsp, mausac as ms, kichco as kc
        WHERE NgayLap BETWEEN DATE_SUB(CURDATE(), INTERVAL 1 MONTH) AND CURDATE()
        AND hd.MaHoaDon = cthd.MaHoaDon 
        AND cthd.MaChiTietSanPham = ctsp.MaChiTietSanPham
        AND	sp.MaSanPham = ctsp.MaSanPham
        AND ctsp.MaMauSac = ms.MaMauSac
        AND ctsp.MaKichCo = kc.MaKichCo
        GROUP BY sp.TenSanPham,cthd.SoLuong
        ORDER BY total DESC
        LIMIT 0,5';

        $result = $this->con->query($qr);
        $arr = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($arr, [$row["TenSanPham"], $row["total"]]);
            }
        }
        //   print_r($arr);
        return $arr;
    }

    public function getDanhSachHoaDonTrong1KhoangThoiGian($top, $start, $end)
    {
        $qr = 'SELECT cthd.*,sp.MaSanPham,sp.TenSanPham,SUM(cthd.SoLuong) as total
        FROM hoadon as hd, chitiethoadon as cthd, sanpham as sp, chitietsanpham as ctsp
        WHERE cthd.MaHoaDon = hd.MaHoaDon
        AND sp.MaSanPham = ctsp.MaSanPham
        AND cthd.MaChiTietSanPham = ctsp.MaChiTietSanPham
        AND  NgayLap BETWEEN "'.$start.' 00:00:01"
        AND "'.$end.' 23:59:00" 
        GROUP BY sp.MaSanPham
        ORDER BY total DESC
		LIMIT 0,'.$top;

        $result = $this->con->query($qr);
        $arr = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($arr, [$row["TenSanPham"], $row["total"]]);
            }
        }
        //   print_r($arr);
        return $arr;
    }

    public function getDSHD($key, $pageIndex, $soLuong)
    {
        trim($key);
        // Kiểm tra đang ở trang
        // echo "pageIndex:".$pageIndex;
        if ($pageIndex == "" || $pageIndex <= 0) {
            $pageIndex = 1;
        }

        $batDau = ($pageIndex - 1) * $soLuong;

        $qr = "SELECT * FROM hoadon";

        if ($key != "") {
            $qr .= " where concat(MaHoaDon,SoDienThoai) like '%$key%'";

            $qr .= " ORDER BY MaHoaDon DESC";
            $qr .= " LIMIT $batDau,$soLuong";

            // echo $qr;
            return $this->con->query($qr);
        } else {
            $qr .= " ORDER BY MaHoaDon DESC";
            $qr .= " Limit $batDau,$soLuong";
            // echo $qr;
            return $this->con->query($qr);
        }
        // $qr="SELECT * from nhomquyen";
        // return $this->con->query($qr);
    }

    //     SELECT sp.TenSanPham, SUM(cthd.ThanhTien)
    // FROM hoadon as hd, chitiethoadon as cthd, sanpham as sp, chitietsanpham as ctsp
    // WHERE NgayLap BETWEEN DATE_SUB(CURDATE(), INTERVAL 1 MONTH) AND CURDATE()

    // SELECT sp.TenSanPham, SUM(cthd.ThanhTien) as total
    // FROM hoadon as hd, chitiethoadon as cthd, sanpham as sp, chitietsanpham as ctsp
    // WHERE NgayLap BETWEEN DATE_SUB(CURDATE(), INTERVAL 1 MONTH) AND CURDATE()
    // ORDER BY total DESC


    function DoanhThuTrong1Tuan($week) {
        // Kết nối đến cơ sở dữ liệu
        $conn = mysqli_connect("localhost", "username", "password", "database");
    
        // Kiểm tra kết nối
        if (!$conn) {
            die("Kết nối không thành công: " . mysqli_connect_error());
        }
    
        // Xây dựng câu truy vấn SQL
        $sql = "SELECT SUM(revenue_column) AS hoadon
                FROM your_table_name 
                WHERE YEAR(date_column) = YEAR(CURRENT_DATE()) 
                AND MONTH(date_column) = MONTH(CURRENT_DATE()) 
                AND WEEK(date_column) = $week";
    
        // Thực thi câu truy vấn
        $result = mysqli_query($conn, $sql);
    
        // Kiểm tra kết quả và trả về doanh thu của tuần
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            return $row['weekly_revenue'];
        } else {
            return 0; // Nếu không có doanh thu trong tuần đó, trả về 0
        }
    
        // Đóng kết nối
        mysqli_close($conn);
    }
    
}
