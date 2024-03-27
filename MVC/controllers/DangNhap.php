<?php
class DangNhap extends controller
{
   

   function dangNhap(){
    $cl = $this->model("ChungLoaiModel");
    $tl = $this->model("TheloaiModel");
    $this->view("trangchu/block/header",[]);
    $this->view("trangchu/block/navbar",["CL"=>$cl->GetChungLoaiModel(),"TL"=>$tl->GetTheLoaiModel()]);
    $this->view("login/dangNhap",[]);
  }

  


}
?>