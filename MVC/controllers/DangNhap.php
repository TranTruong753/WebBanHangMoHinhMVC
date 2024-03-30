<?php
class DangNhap extends controller
{
   

   function dangNhap(){
    $cl = $this->model("ChungLoaiModel");
    $tl = $this->model("TheloaiModel");
    $gh=  $this->model("GioHangModel");
    $this->view("trangchu/block/header",[]);
    $this->view("trangchu/block/navbar",["CL"=>$cl->GetChungLoaiModel(),"TL"=>$tl->GetTheLoaiModel(),"GH"=>$gh->GetAll()]);
    $this->view("login/dangNhap",[]);
  }

  


}
?>