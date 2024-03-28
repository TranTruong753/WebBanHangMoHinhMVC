<?php
    class chitietsp extends controller{

        
        function chitiet($masp){
            $detail = $this->model("chitietspmodel");
            
            $cl = $this->model("ChungLoaiModel");
            $tl = $this->model("TheLoaiModel");
            $this->view("trangchu/block/header",[]);
            $this->view("trangchu/block/navbar",["CL"=>$cl->GetChungLoaiModel(),"TL"=>$tl->GetTheLoaiModel()]);
            
            $this->view("trangchu/pages/chitietsanpham",["img" => $detail->Getimgsp($masp),"imgmain"=>$detail->Getanhchinhsp($masp),
            "kichco"=>$detail->Getkichcosp($masp),"mausac"=> $detail->Getmausacsp($masp),"thongtin"=>$detail->Getthongtinsp($masp)]);
            
    
        }
    }
?>