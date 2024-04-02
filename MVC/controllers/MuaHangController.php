<?php
class MuaHangController extends controller
{

   function MuaHang()
   { 
    $gh=  $this->model("GioHangModel");
    $this->view("trangchu/pages/formMuaNgay",["GH"=>$gh->GetAll()]);
   }

}
?> 