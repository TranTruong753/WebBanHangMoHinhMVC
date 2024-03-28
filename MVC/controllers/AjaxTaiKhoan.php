<?php

class AjaxTaiKhoan extends controller {

    private $TaiKhoanModel;
    public function __construct() {
       $this->TaiKhoanModel = $this->model("TaiKhoanModel");
    }
    function DoiTrangThai(){
        $ma = $_POST["ma"];
        $trangThai =  $_POST["trangThai"];

        $this->TaiKhoanModel->updateTrangThai($ma,$trangThai);
    }

}

?>