<?php
class MauSacModel extends DB
{

    public function GetAll()
    {
        $qr = "SELECT * from mausac";
        return $this->con->query($qr);
    }

    
}
?>