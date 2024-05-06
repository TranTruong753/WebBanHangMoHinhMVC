<?php
class DangNhap extends controller
{
   

   function dangNhap(){
    if(isset($_SESSION['email'])){
      $makh=$_SESSION['email'];
  }
  else 
  {$makh= "none";}
    $cl = $this->model("ChungLoaiModel");
    $tl = $this->model("TheloaiModel");
    $gh=  $this->model("GioHangModel");
    $this->view("trangchu/block/header",[]);
    $this->view("trangchu/block/navbar",["CL"=>$cl->GetChungLoaiModel(),"TL"=>$tl->GetTheLoaiModel(),"GH"=>$gh->GetAll($makh)]);
    $this->view("login/dangNhap",[]);
  }

  


}
?>