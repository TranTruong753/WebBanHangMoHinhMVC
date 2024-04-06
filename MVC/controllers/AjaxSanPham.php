<?php

class AjaxSanPham extends controller {

    private $SanPhamModel;
    private $chitietspmodel;
    public function __construct() {
       $this->SanPhamModel = $this->model("SanPhamModel");
       $this->chitietspmodel = $this->model("chitietspmodel");

    }
    function InsertSP(){
        $masp = $_POST["masp"];
        $tensp = $_POST["tensp"];
        $giasp = $_POST["giasp"];
        $matheloai = $_POST["matheloai"];
        $machatlieu = $_POST["machatlieu"];
        //echo $masp." cc ".$tensp." ".$giasp." ".$matheloai." ".$machatlieu;
        if($this->SanPhamModel->InsertSP($masp,$tensp,$giasp,$matheloai,$machatlieu)){
            echo "true";
        }
        else echo "false";
        
    }
    function DeleteSP(){
        $masp = $_POST["masp"];
        $result= $this->chitietspmodel->GetCTSP($masp);
        if ($result->num_rows == 0) {
            if($this->SanPhamModel->DeleteSP($masp)){
                echo "true";
            }
            else echo "false";
        }
        else echo "Sản phẩm này không thể xóa";
        // else echo "false";
        
    }

}

?>