
<?php
class AjaxChatLieu extends controller{
    public $ChatLieuModel;
    public function __construct(){
       $this->ChatLieuModel= $this->model("ChatLieuModel");
    }

    public function DoiTrangThai(){
        $ma=$_POST["ma"];
        $trangThai = $_POST["trangThai"];
        
        $this->ChatLieuModel->updateTrangThai($ma,$trangThai);
    }

    public function InsertCL(){
        $tencl=$_POST["tencl"];
        if($this->ChatLieuModel->InsertCL($tencl)){
            echo "true";
        }
        else echo "false";
    }

    public function UpdateCL(){
        $macl=$_POST["macl"];
        $tencl=$_POST["tencl"];
        $this->ChatLieuModel->UpdateCL($macl,$tencl);
    }

    public function DeleteCL(){
        $macl=$_POST["macl"];
        $this->ChatLieuModel->DeleteCL($macl);
    }
}
?>
