<?php

class PhanTrangModel extends DB{

    public function PhanTrang($nowPage,$numRow,$soLuong = 8,$linkFirstPage)
    {
        $html = "";
        if($nowPage > 3 )
        {
            $firstPage = 1;
            $html .= "<a href='http://localhost/WebBanHangMoHinhMVC/' >Trang Đầu Tiên</a>";
        }
        for($num =1; $num <= $numRow;$num++)
        {
            if($num != $nowPage)
            {
                if( $num > $nowPage-3 && $num < $nowPage + 3)
                {
                    $html .= "<a>$num</a>";
                }
            }
            else
            {
                $html .= "<b><a>$num</a></b>";
            }
        }
        if($nowPage < $numRow - 3 )
        {
            $endPage = $numRow;
            $html .= "<a href='http://localhost/WebBanHangMoHinhMVC/' >Trang Cuối Cùng</a>";
        }
        return $html;
    }
}
?>