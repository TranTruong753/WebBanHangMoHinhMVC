<?php
class AjaxMauSac extends controller{
    public $MauSacModel;
    public function __construct(){
       $this->MauSacModel= $this->model("MauSacModel");
    }

    public function DoiTrangThai(){
        $ma=$_POST["ma"];
        $trangThai = $_POST["trangThai"];
        
        $this->MauSacModel->updateTrangThai($ma,$trangThai);
    }

    public function InsertMS(){
        $tenms=$_POST["tenms"];
        if($this->MauSacModel->InsertMS($tenms)){
            echo "true";
        }
        else echo "false";
    }

    // public function UpdateCL(){
    //     $macl=$_POST["macl"];
    //     $tencl=$_POST["tencl"];
    //     $this->ChatLieuModel->UpdateCL($macl,$tencl);
    // }

    // public function DeleteCL(){
    //     $macl=$_POST["macl"];
    //     $this->ChatLieuModel->DeleteCL($macl);
    // }
}
?>