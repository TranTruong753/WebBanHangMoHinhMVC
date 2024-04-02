<?php
class Dangki extends controller
{
   

   function dangki(){
    $cl = $this->model("ChungLoaiModel");
    $tl = $this->model("TheloaiModel");
    $gh=  $this->model("GioHangModel");
    $this->view("trangchu/block/header",[]);
    $this->view("trangchu/block/navbar",["CL"=>$cl->GetChungLoaiModel(),"TL"=>$tl->GetTheLoaiModel(),"GH"=>$gh->GetAll()]);
    $this->view("login/dangki",[]);
  }

  function dangkiDB(){
    $ten=$_POST["UserName"]; 
    $sdt=$_POST["phone"];
    $email=$_POST["email"];
    $gioitinh=$_POST["sex"];
    $mapin=$_POST['codePIN'];
    $resetpin=$_POST['reCodePIN'];
    
    $kh= $this->model("DangKiModel");
     if( $kh->addDangKiKH($email,$ten,$sdt,$gioitinh,$mapin)==1 and $kh->addDangKiTK($email,$mapin)==1){
      $tc = $this->model("TrangChuKHModel");
      $gh=  $this->model("GioHangModel");
      $cl = $this->model("ChungLoaiModel");
      $tl = $this->model("TheLoaiModel");
      $this->view("trangchu/block/header",[]);
      $this->view("trangchu/block/navbar",["CL"=>$cl->GetChungLoaiModel(),"TL"=>$tl->GetTheLoaiModel(),"GH"=>$gh->GetAll()]);
      $this->view("trangchu/Trangchu",["TC" => $tc->GetTrangChuKHModel()]);
     }
     else {
      $this->dangki();
     }
     
    
    
  }


}
?>