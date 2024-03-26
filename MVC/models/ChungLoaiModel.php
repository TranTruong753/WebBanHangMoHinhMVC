<?php
class ChungLoaiModel extends DB{
    public function GetChungLoaiModel(){
        $qr = "SELECT * FROM chungloai";
        $row=mysqli_query($this->con, $qr);
        return $row;
    }
}
?>