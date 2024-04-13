
<?php
class AjaxNhaCungCap extends controller{
    public $NhaCungCapModel;
    public function __construct(){
       $this->NhaCungCapModel= $this->model("NhaCungCapModel");
    }

    public function DoiTrangThai(){
        $ma=$_POST["ma"];
        $trangThai = $_POST["trangThai"];
        
        $this->NhaCungCapModel->updateTrangThai($ma,$trangThai);
    }

    public function InsertNCC(){
        $tenncc=$_POST["tenncc"];
        $sdt=$_POST["sdt"];
        $dc=$_POST["dc"];
        if($this->NhaCungCapModel->InsertNCC($tenncc,$sdt,$dc)){
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
