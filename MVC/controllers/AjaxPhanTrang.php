<?php

class AjaxPhanTrang extends controller{

    protected $PhanTrangModel ; 
    public function __construct() {
        $this->PhanTrangModel = $this->model("PhanTrangModel");
    }

    public function getPhanTrang() {
        $table = $_POST["table"];
        $condition = $_POST["condition"];
        $index =$_POST["index"];
        $size = $_POST["size"];
        if(isset($_POST["key"]))
        {
            $key=$_POST["key"];
            $condition.= " where concat(MaNhomQuyen,TenNhomQuyen) like '%$key%'";
            echo $this->PhanTrangModel->PhanTrang($index,$size,$table,$condition);


        }else
        {
            echo $this->PhanTrangModel->PhanTrang($index,$size,$table,$condition);

        }
    }
}
?>