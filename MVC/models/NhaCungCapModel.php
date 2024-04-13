<?php
 class NhaCungCapModel extends DB{

    public function getAllNCC(){
        $qr = "SELECT * from nhacungcap";
        return $this->con->query($qr);

    }
}
?>