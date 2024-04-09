<?php
class AjaxTheLoai extends controller{
    public $TheLoaiModel;
    public function __construct(){
       $this->TheLoaiModel= $this->model("TheLoaiModel");
    }

    public function DoiTrangThai(){
        $ma=$_POST["ma"];
        $trangThai = $_POST["trangThai"];
        
        $this->TheLoaiModel->updateTrangThai($ma,$trangThai);
    }

    public function InsertTL(){
        $macl=$_POST["macl"];
        $tentl=$_POST["tentl"];
        if($this->TheLoaiModel->InsertTL($macl,$tentl)){
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