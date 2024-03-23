<?php
class TheLoaiModel extends DB{
    public function GetTheLoaiModel(){
        $qr = "SELECT * FROM theloai";
        $row=mysqli_query($this->con, $qr);
        return $row;
    }

    

}
?>