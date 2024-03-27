<?php

// http://localhost/live/Home/Show/1/2

class AjaxNhomQuyen extends controller
{

    // Must have SayHi()
    public $NhomQuyenModel;
    function __construct()
    {
        $this->NhomQuyenModel = $this->model("NhomQuyenModel");
    }

    public function DoiTrangThai()
    {
        $ma = $_POST["ma"];
        $trangThai = $_POST["trangThai"];
        $this->NhomQuyenModel->updateTrangThai($ma,$trangThai);
    }





    
}
