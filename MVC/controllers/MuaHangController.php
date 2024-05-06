<?php
class MuaHangController extends controller
{

   function MuaHang($mactsp)
   { if(isset($_SESSION['email'])){
      $makh=$_SESSION['email'];
  }
  else 
  {$makh= "none";}
    $gh=  $this->model("GioHangModel");
    $this->view("trangchu/pages/formMuaNgay",["GH"=>$gh->GetAll($makh),"CTSP"=>$mactsp]);
   }

}
?> 