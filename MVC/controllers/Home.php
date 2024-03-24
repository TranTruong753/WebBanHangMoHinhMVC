
<?php
class Home extends controller
{
   function default()
   {
      echo "default";
   }
//viết API 
    function showManage()
   { 
      $this->view("manage/manage",["a"=> "a","b"=> "b"]);
   }

   function showManage1()
   { 
      echo "1";
   }

   function trangchu(){
      $tc = $this->model("TrangChuKHModel");
      $tl = $this->model("TheloaiModel");
      $this->view("trangchu/block/header",[]);
      $this->view("trangchu/block/navbar",["TL"=>$tl->GetTheLoaiModel()]);
      $this->view("trangchu/Trangchu",["TC" => $tc->GetTrangChuKHModel()]);
  }
}
?> 


