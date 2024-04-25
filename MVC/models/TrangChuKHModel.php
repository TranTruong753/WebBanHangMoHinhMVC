<?php
class TrangChuKHModel extends DB{
    public function GetTrangChuKHModel(){
        $qr = 'SELECT sanpham.MaSanPham ,sanpham.TenSanPham,sanpham.GiaSanPham, chitietsanpham.HinhAnh 
        FROM chitietsanpham INNER JOIN sanpham on chitietsanpham.MaSanPham= sanpham.MaSanPham GROUP BY sanpham.MaSanPham ';
        // $row=mysqli_query($this->con, $qr);
        return $this->con->query($qr);
    }

    public function GetspCL($key,$pageIndex,$soLuong,$cl){
        // $qr = 'SELECT sanpham.MaSanPham ,sanpham.TenSanPham,sanpham.GiaSanPham, chitietsanpham.HinhAnh FROM chitietsanpham 
        // INNER JOIN sanpham on chitietsanpham.MaSanPham= sanpham.MaSanPham INNER JOIN theloai on sanpham.MaTheLoai=theloai.MaTheLoai
        //  INNER JOIN chungloai on chungloai.MaChungLoai=theloai.MaChungLoai where chungloai.MaChungLoai ="'.$cl.'" GROUP BY sanpham.MaSanPham ';
        // // $row=mysqli_query($this->con, $qr);
        // return $this->con->query($qr);
        trim($key);
        // Kiểm tra đang ở trang
        // echo "pageIndex:".$pageIndex;
        if($pageIndex == "" || $pageIndex <= 0 )
        {
            $pageIndex = 1;
        }

        $batDau = ($pageIndex-1)*$soLuong;
        
        $qr = "SELECT * FROM chitietsanpham";

        if($key!="")
        {
            $qr .= " INNER JOIN sanpham on chitietsanpham.MaSanPham= sanpham.MaSanPham INNER JOIN theloai on sanpham.MaTheLoai=theloai.MaTheLoai
            INNER JOIN chungloai on chungloai.MaChungLoai=theloai.MaChungLoai  
            where chungloai.MaChungLoai ='$cl' AND concat(sanpham.TenSanPham) like '%$key%' AND  
            sanpham.TrangThaiSP= 1 and chitietsanpham.TrangThaiCTSP= 1"; 

            $qr .= " GROUP BY chitietsanpham.MaSanPham ORDER BY sanpham.Masanpham DESC";
            $qr .= " LIMIT $batDau,$soLuong";

            // echo $qr;
            return $this->con->query($qr);
        }
        else
        {
            $qr .= " INNER JOIN sanpham on chitietsanpham.MaSanPham= sanpham.MaSanPham INNER JOIN theloai on sanpham.MaTheLoai=theloai.MaTheLoai
            INNER JOIN chungloai on chungloai.MaChungLoai=theloai.MaChungLoai 
            where chungloai.MaChungLoai ='$cl' AND sanpham.TrangThaiSP= 1 and chitietsanpham.TrangThaiCTSP= 1
             GROUP BY chitietsanpham.MaSanPham ORDER BY sanpham.Masanpham DESC";
            $qr .= " Limit $batDau,$soLuong";
            // echo $qr;
            return $this->con->query($qr);
        }
        // $qr="SELECT * from nhomquyen";
        // return $this->con->query($qr);
    }
    
    public function GetspTL($key,$pageIndex,$soLuong,$tl){
        // $qr = 'SELECT sanpham.MaSanPham ,sanpham.TenSanPham,sanpham.GiaSanPham, chitietsanpham.HinhAnh FROM chitietsanpham 
        // INNER JOIN sanpham on chitietsanpham.MaSanPham= sanpham.MaSanPham  where sanpham.MaTheLoai ="'.$tl.'" GROUP BY sanpham.MaSanPham ';
        // // $row=mysqli_query($this->con, $qr);
        // return $this->con->query($qr);
        trim($key);
        // Kiểm tra đang ở trang
        // echo "pageIndex:".$pageIndex;
        if($pageIndex == "" || $pageIndex <= 0 )
        {
            $pageIndex = 1;
        }

        $batDau = ($pageIndex-1)*$soLuong;
        
        $qr = "SELECT * FROM chitietsanpham";

        if($key!="")
        {
            $qr .= " INNER JOIN sanpham on chitietsanpham.MaSanPham= sanpham.MaSanPham  where sanpham.MaTheLoai ='$tl' 
            AND concat(sanpham.TenSanPham) like '%$key%' AND 
            sanpham.TrangThaiSP= 1 and chitietsanpham.TrangThaiCTSP= 1"; 

            $qr .= " GROUP BY chitietsanpham.MaSanPham ORDER BY sanpham.Masanpham DESC";
            $qr .= " LIMIT $batDau,$soLuong";

            // echo $qr;
            return $this->con->query($qr);
        }
        else
        {
            $qr .= " INNER JOIN sanpham on chitietsanpham.MaSanPham= sanpham.MaSanPham  where sanpham.MaTheLoai ='$tl' 
             AND sanpham.TrangThaiSP= 1 and chitietsanpham.TrangThaiCTSP= 1 GROUP BY chitietsanpham.MaSanPham ORDER BY sanpham.Masanpham DESC";
            $qr .= " Limit $batDau,$soLuong";
            // echo $qr;
            return $this->con->query($qr);
        }
    }
    public function getDanhSach($key,$pageIndex,$soLuong)
    {
        trim($key);
        // Kiểm tra đang ở trang
        // echo "pageIndex:".$pageIndex;
        if($pageIndex == "" || $pageIndex <= 0 )
        {
            $pageIndex = 1;
        }

        $batDau = ($pageIndex-1)*$soLuong;
        
        $qr = "SELECT * FROM chitietsanpham";

        if($key!="")
        {
            $qr .= " INNER JOIN sanpham on chitietsanpham.MaSanPham= sanpham.MaSanPham 
            where concat(sanpham.TenSanPham) like '%$key%' and sanpham.TrangThaiSP= 1 and chitietsanpham.TrangThaiCTSP= 1"; 

            $qr .= " GROUP BY chitietsanpham.MaSanPham ORDER BY sanpham.Masanpham DESC";
            $qr .= " LIMIT $batDau,$soLuong";

            // echo $qr;
            return $this->con->query($qr);
        }
        else
        {
            $qr .= " INNER JOIN sanpham on chitietsanpham.MaSanPham= sanpham.MaSanPham
             where  sanpham.TrangThaiSP= 1 and chitietsanpham.TrangThaiCTSP= 1 GROUP BY chitietsanpham.MaSanPham ORDER BY sanpham.Masanpham DESC";
            $qr .= " Limit $batDau,$soLuong";
            // echo $qr;
            return $this->con->query($qr);
        }
        // $qr="SELECT * from nhomquyen";
        // return $this->con->query($qr);
    }

    public function TimSP($tensp){
        $qr = 'SELECT sanpham.MaSanPham ,sanpham.TenSanPham,sanpham.GiaSanPham, chitietsanpham.HinhAnh 
        FROM chitietsanpham INNER JOIN sanpham on chitietsanpham.MaSanPham= sanpham.MaSanPham  WHERE sanpham.TenSanPham LIKE "%'.$tensp.'%" GROUP BY sanpham.MaSanPham ';
        // $row=mysqli_query($this->con, $qr);
        return $this->con->query($qr);
    }

    

}
?>