<?php 
    class thongTinKhangHangController extends controller {
        function show(){  
            $makh="";
            if(isset($_SESSION['email'])){
                $makh=$_SESSION['email'];
            }      
            $cl = $this->model("ChungLoaiModel");
            $tl = $this->model("TheLoaiModel");
            $gh=  $this->model("GioHangModel");
            $hd= $this->model("HoaDonModel");
            $kh = $this->model("KhachHangModel");
            $this->view("trangchu/block/header",[]);
            $this->view("trangchu/block/navbar",["CL"=>$cl->GetChungLoaiModel(),"TL"=>$tl->GetTheLoaiModel(),"GH"=>$gh->GetAll()]);
            $this->view("trangchu/block/link",[]);
            $this->view("trangchu/thongTinKhachHang",["HD"=>$hd->GetAllHoaDonKH($makh),"KH"=>$kh->TimKHbyID($makh)]);
            $this->view("trangchu/block/footer",[]);
           
        }
    

    function  QLHoaDon(){
        $hd= $this->model("HoaDonModel");
        $makh="";
            if(isset($_SESSION['email'])){
                $makh=$_SESSION['email'];
            }
        $this->view("trangchu/pages/thongTinSanPham",["HD"=>$hd->GetAllHoaDonKH($makh)]);
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