<?php
class AjaxQuanLyHoaDonKH extends controller{
    public $ChiTietHoaDonModel;
    public function __construct(){
       $this->ChiTietHoaDonModel= $this->model("ChiTietHoaDonModel");
    }

    public function GetAllCTHD(){
        $mahd=$_POST['mahd'];
        $makh="";
        if(isset($_SESSION['email'])){
            $makh=$_SESSION['email'];
        }
        $result=$this->ChiTietHoaDonModel->GetAllCTHDKH($mahd,$makh);
        $this->view("trangchu/pages/thongTinChiTietSanPham",["CTHD"=>$result]);
        
    }
}
?>