<?php
class AjaxThuongHieu extends controller{
    public $ThuongHieuModel;
    public function __construct(){
       $this->ThuongHieuModel= $this->model("ThuongHieuModel");
    }

    public function DoiTrangThai(){
        $ma=$_POST["ma"];
        $trangThai = $_POST["trangThai"];
        
        $this->ThuongHieuModel->updateTrangThai($ma,$trangThai);
    }

    public function InsertTH(){
        $tenth=$_POST["tenth"];
        if($this->ThuongHieuModel->InsertTH($tenth)){
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