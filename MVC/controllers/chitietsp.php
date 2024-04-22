<?php
    class chitietsp extends controller{

        
        function chitiet($masp){
            $detail = $this->model("chitietspmodel");
            
            $cl = $this->model("ChungLoaiModel");
            $tl = $this->model("TheLoaiModel");
            $gh=  $this->model("GioHangModel");
            $this->view("trangchu/block/header",[]);
            $this->view("trangchu/block/navbar",["CL"=>$cl->GetChungLoaiModel(),"TL"=>$tl->GetTheLoaiModel(),"GH"=>$gh->GetAll()]);
            
            $this->view("trangchu/pages/chitietsanpham",["imgmain"=>$detail->Getanhchinhsp($masp),
            "kichco"=>$detail->Getkichcosp($masp),"mausac"=> $detail->Getmausacsp($masp),"thongtin"=>$detail->Getthongtinsp($masp)]);
            
    
        }
    }
?>