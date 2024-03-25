<?php
    class chitietsp extends controller{

        
        function chitiet($masp){
            $detail = $this->model("chitietspmodel");
            
            $tl = $this->model("TheloaiModel");
            $this->view("trangchu/block/header",[]);
            $this->view("trangchu/block/navbar",["TL"=>$tl->GetTheLoaiModel()]);
            
            $this->view("trangchu/pages/chitietsanpham",["img" => $detail->Getimgsp($masp),"imgmain"=>$detail->Getanhchinhsp($masp),
            "kichco"=>$detail->Getkichcosp($masp),"mausac"=> $detail->Getmausacsp($masp),"thongtin"=>$detail->Getthongtinsp($masp)]);
            
    
        }
    }
?>