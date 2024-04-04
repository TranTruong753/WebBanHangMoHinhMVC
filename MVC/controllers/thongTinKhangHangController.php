<?php 
    class thongTinKhangHangController extends controller {
        function show(){        
            $cl = $this->model("ChungLoaiModel");
            $tl = $this->model("TheLoaiModel");
            $gh=  $this->model("GioHangModel");
          

            $this->view("trangchu/block/header",[]);
            $this->view("trangchu/block/navbar",["CL"=>$cl->GetChungLoaiModel(),"TL"=>$tl->GetTheLoaiModel(),"GH"=>$gh->GetAll()]);
            $this->view("trangchu/block/link",[]);
        
              
            $this->view("trangchu/thongTinKhachHang",[]);
         
            
            $this->view("trangchu/block/footer",[]);
           
        }

        function showInfo(){
            $cl = $this->model("ChungLoaiModel");
            $tl = $this->model("TheLoaiModel");
            $gh=  $this->model("GioHangModel");
            $kh = $this->model("KhachHangModel");

            $this->view("trangchu/block/header",[]);
            $this->view("trangchu/block/navbar",["CL"=>$cl->GetChungLoaiModel(),"TL"=>$tl->GetTheLoaiModel(),"GH"=>$gh->GetAll()]);
            $this->view("trangchu/block/link",[]);
            if(isset($_SESSION['email'])){
                $email = $_SESSION['email'];
                $this->view("trangchu/thongTinKhachHang",["Page"=>"thongTinCaNhan","KH"=>$kh->TimKHbyID($email)]);
            }
            
            $this->view("trangchu/block/footer",[]);
        }
    }
?>