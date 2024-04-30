<?php
class MuaHangController extends controller
{

   function MuaHang($mactsp)
   { 
    $gh=  $this->model("GioHangModel");
    $this->view("trangchu/pages/formMuaNgay",["GH"=>$gh->GetAll(),"CTSP"=>$mactsp]);
   }

}
?> 