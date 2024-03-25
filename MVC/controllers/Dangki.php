<?php
class Dangki extends controller
{
   

   function dangki(){
      
    $tl = $this->model("TheloaiModel");
    $this->view("trangchu/block/header",[]);
    // $this->view("trangchu/block/navbar",["TL"=>$tl->GetTheLoaiModel()]);
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
      $tl = $this->model("TheloaiModel");
      $this->view("trangchu/block/header",[]);
      $this->view("trangchu/block/navbar",["TL"=>$tl->GetTheLoaiModel()]);
      $this->view("trangchu/Trangchu",["TC" => $tc->GetTrangChuKHModel()]);
     }
     else {
      $this->dangki();
     }
     
    
    
  }


}
?>