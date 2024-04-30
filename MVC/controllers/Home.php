
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
      $cl = $this->model("ChungLoaiModel");
      $tl = $this->model("TheLoaiModel");
      $gh=  $this->model("GioHangModel");
      $this->view("trangchu/block/header",[]);
      $this->view("trangchu/block/navbar",["CL"=>$cl->GetChungLoaiModel(),"TL"=>$tl->GetTheLoaiModel(),"GH"=>$gh->GetAll()]);
      $this->view("trangchu/Trangchu",["TC" => $tc->GetTrangChuKHModel()]);
      $this->view("trangchu/block/footer",[]);
  }

  function XuLyDanhMuc($CL,$TL,$TK){
   
   $cl = $this->model("ChungLoaiModel");
   $tl = $this->model("TheLoaiModel");
   $gh=  $this->model("GioHangModel");
   $this->view("trangchu/block/header",[]);
   $this->view("trangchu/block/navbar",["CL"=>$cl->GetChungLoaiModel(),"TL"=>$tl->GetTheLoaiModel(),"GH"=>$gh->GetAll()]);
   $this->view("trangchu/pages/ViewDanhMucSP",["cl"=>$CL,"tl"=>$TL,"tk"=>$TK]);
   $this->view("trangchu/block/footer",[]);
}



}
?> 


