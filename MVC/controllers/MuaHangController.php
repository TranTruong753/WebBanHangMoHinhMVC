<?php
class MuaHangController extends controller
{

   function MuaHang($mactsp)
   {
      if (isset($_SESSION['email']) && $_SESSION['user'] == "KH") {
         $makh = $_SESSION['email'];
         
         $gh =  $this->model("GioHangModel");
         $this->view("trangchu/pages/formMuaNgay", ["GH" => $gh->GetAll($makh), "CTSP" => $mactsp]);
      } else {
         $makh = "none";
        
         header("location:http://localhost/WebBanHangMoHinhMVC/DangNhap/dangNhap");
      }

      
   }
}
