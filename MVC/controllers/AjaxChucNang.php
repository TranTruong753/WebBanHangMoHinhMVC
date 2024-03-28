<?php 

class AjaxChucNang extends controller {

    private $ChucNangModel;
    public function __construct() {
        $this->ChucNangModel = $this->model("ChucNangModel");
    }

    public function DoiTrangThai () {
        $ma = $_POST["ma"];
        $trangThai = $_POST["trangThai"];
        $this->ChucNangModel->updateTrangThai($ma,$trangThai);
    }

}