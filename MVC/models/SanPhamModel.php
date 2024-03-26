<?php
 class SanPhamModel extends DB{

    public function getDanhSach(){
        $qr = "SELECT * from sanpham";
        return $this->con->query($qr);

    }
}

?>
