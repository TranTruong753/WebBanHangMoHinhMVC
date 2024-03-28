
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
}
?>
