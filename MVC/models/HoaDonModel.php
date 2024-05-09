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
        $qr = 'SELECT concat(sp.TenSanPham,"-",kc.TenKichCo,"-",ms.TenMauSac) as TenSanPham, SUM(cthd.SoLuong) as total
        FROM hoadon as hd, chitiethoadon as cthd, sanpham as sp, chitietsanpham as ctsp, mausac as ms, kichco as kc
        WHERE NgayLap >= "' . $start . ' 00:00:01"
        AND NgayLap <= "' . $end . ' 23:59:00"  
        AND hd.MaHoaDon = cthd.MaHoaDon 
        AND cthd.MaChiTietSanPham = ctsp.MaChiTietSanPham
        AND	sp.MaSanPham = ctsp.MaSanPham
        AND ctsp.MaMauSac = ms.MaMauSac
        AND ctsp.MaKichCo = kc.MaKichCo
        GROUP BY sp.TenSanPham,cthd.SoLuong 
        ORDER BY total DESC
        LIMIT 0,' . $top;

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
}
