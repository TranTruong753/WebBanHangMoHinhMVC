<?php
class KichCoModel extends DB
{

    public function GetAll()
    {
        $qr = "SELECT * from kichco";
        return $this->con->query($qr);
    }

    
}
?>