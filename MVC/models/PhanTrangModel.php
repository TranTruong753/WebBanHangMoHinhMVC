<?php

class PhanTrangModel extends DB{

    public function PhanTrang($index,$sizePage = 8,$tableName,$condition="")
    {
        $qr = "SELECT * From $tableName $condition";

        // echo $qr;
       
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
}
?>