<?php

class PhanTrangModel extends DB{

    public function PhanTrang($index,$sizePage = 8,$tableName,$condition)
    {
        $qr = "";
        // if($tableName == "chitietquyen") $DISTINCT = " DISTINCT ";
        // else $DISTINCT = "";
        // echo "condition: ".$condition."<br>";

        $qr .= " SELECT * From $tableName $condition";
        
        if($tableName == "chitietquyen")
        {
            $qr = "SELECT DISTINCT ctq.MaNhomQuyen,ctq.MaChucNang
            from chitietquyen as ctq, nhomquyen as nq, chucnang as cn
                     ";
        }
      
        echo $qr;   
       
        $result = $this->con->query($qr)->num_rows;
        $total = ceil($result/$sizePage);
       
        $html = "";
        if($index > 3 )
        {
            $html .= "<a href='#' class='btnPhanTrang' id='1/$sizePage'>Trang Đầu Tiên</a>";
        }
        for($num =1; $num <= $total;$num++)
        {
            if($num != $index)
            {
                if( $num >= $index-3 && $num <= $index + 3)
                {
                    $html .= "<a href='#' class='btnPhanTrang' id='$num/$sizePage'>$num</a>";
                }
            }
            else
            {
                $html .= "<b><a href='#' class='btnPhanTrang' id='$num/$sizePage'>$num</a></b>";
            }
        }
        if($index < $total - 3 )
        {
            $html .= " <a href='#' class='btnPhanTrang' id='$total/$sizePage'>Trang Cuối Cùng</a>";
        }
        return $html;
    }
    public function PhanTrangCL($index,$sizePage ,$tableName,$condition="")
    {
        $qr = "SELECT ";

        $qr .= " * From $tableName $condition";

        // echo $qr;
       
        $result = $this->con->query($qr)->num_rows;
        $total = ceil($result/$sizePage);
       
        $html = "";
        if($index > 3 )
        {
            $html .= "<a href='#' class='btnPhanTrangCL' id='1/$sizePage'>Trang Đầu Tiên</a>";
        }
        for($num =1; $num <= $total;$num++)
        {
            if($num != $index)
            {
                if( $num >= $index-3 && $num <= $index + 3)
                {
                    $html .= "<a href='#' class='btnPhanTrangCL' id='$num/$sizePage'>$num</a>";
                }
            }
            else
            {
                $html .= "<b><a href='#' class='btnPhanTrangCL' id='$num/$sizePage'>$num</a></b>";
            }
        }
        if($index < $total - 3 )
        {
            $html .= " <a href='#' class='btnPhanTrangCL' id='$total/$sizePage'>Trang Cuối Cùng</a>";
        }
        return $html;
    }

    public function PhanTrangTL($index,$sizePage = 8,$tableName,$condition="")
    {
        $qr = "SELECT ";

        $qr .= " * From $tableName $condition";

        // echo $qr;
       
        $result = $this->con->query($qr)->num_rows;
        $total = ceil($result/$sizePage);
       
        $html = "";
        if($index > 3 )
        {
            $html .= "<a href='#' class='btnPhanTrangTL' id='1/$sizePage'>Trang Đầu Tiên</a>";
        }
        for($num =1; $num <= $total;$num++)
        {
            if($num != $index)
            {
                if( $num >= $index-3 && $num <= $index + 3)
                {
                    $html .= "<a href='#' class='btnPhanTrangTL' id='$num/$sizePage'>$num</a>";
                }
            }
            else
            {
                $html .= "<b><a href='#' class='btnPhanTrangTL' id='$num/$sizePage'>$num</a></b>";
            }
        }
        if($index < $total - 3 )
        {
            $html .= " <a href='#' class='btnPhanTrangTL' id='$total/$sizePage'>Trang Cuối Cùng</a>";
        }
        return $html;
    }
    public function PhanTrangbt($index,$sizePage = 8,$tableName,$condition="")
    {
        $qr = "SELECT ";
        if($tableName == "chitietquyen") $qr .= " DISTINCT ";

        $qr .= " * From $tableName $condition";

        // echo $qr;
       
        $result = $this->con->query($qr)->num_rows;
        $total = ceil($result/$sizePage);
       
        $html = "";
        if($index > 3 )
        {
            $html .= "<a href='#' class='btnPhanTrangbt' id='1/$sizePage'>Trang Đầu Tiên</a>";
        }
        for($num =1; $num <= $total;$num++)
        {
            if($num != $index)
            {
                if( $num >= $index-3 && $num <= $index + 3)
                {
                    $html .= "<a href='#' class='btnPhanTrangbt' id='$num/$sizePage'>$num</a>";
                }
            }
            else
            {
                $html .= "<b><a href='#' class='btnPhanTrangbt' id='$num/$sizePage'>$num</a></b>";
            }
        }
        if($index < $total - 3 )
        {
            $html .= " <a href='#' class='btnPhanTrangbt' id='$total/$sizePage'>Trang Cuối Cùng</a>";
        }
        return $html;
    }
    
}
?>