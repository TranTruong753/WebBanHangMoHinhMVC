<?php
class DangNhap extends controller
{
   

   function dangNhap(){
    $tl = $this->model("TheloaiModel");
    $this->view("trangchu/block/header",[]);
    $this->view("trangchu/block/navbar",["TL"=>$tl->GetTheLoaiModel()]);
    $this->view("login/dangNhap",[]);
  }

  


}
?>