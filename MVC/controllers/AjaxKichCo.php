<?php
class AjaxKichCo extends controller{
    public $KichCoModel;
    public function __construct(){
       $this->KichCoModel= $this->model("KichCoModel");
    }

    public function DoiTrangThai(){
        $ma=$_POST["ma"];
        $trangThai = $_POST["trangThai"];
        
        $this->KichCoModel->updateTrangThai($ma,$trangThai);
    }

    public function InsertKC(){
        $tenkc=$_POST["tenkc"];
        if($this->KichCoModel->InsertKC($tenkc)){
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