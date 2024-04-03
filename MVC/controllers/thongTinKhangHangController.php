<?php 
    class thongTinKhangHangController extends controller {
        function show(){        
            $cl = $this->model("ChungLoaiModel");
            $tl = $this->model("TheLoaiModel");
            $gh=  $this->model("GioHangModel");
            $this->view("trangchu/block/header",[]);
            $this->view("trangchu/block/navbar",["CL"=>$cl->GetChungLoaiModel(),"TL"=>$tl->GetTheLoaiModel(),"GH"=>$gh->GetAll()]);
            $this->view("trangchu/thongTinKhachHang",[]);
            $this->view("trangchu/block/footer",[]);
           
        }
    }
?>