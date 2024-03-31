<?php

// http://localhost/live/Home/Show/1/2

class AjaxNhomQuyen extends controller
{

    // Must have SayHi()
    private $NhomQuyenModel;
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

   public function ThemDuLieunhomQuyen()
   {
    $TenNhomQuyen = $_POST["TenNhomQuyen"];
    print_r($_POST);
    if( $this->NhomQuyenModel->insert($TenNhomQuyen)==1) return 1;
    else return 0;
   }

   public function TimKiemQuaTen()
   {
    $TenNhomQuyen = $_POST["TenNhomQuyen"];
    // print_r($_POST);
    if( $this->NhomQuyenModel->TimKiemQuaTen($TenNhomQuyen)==1) echo "true";
    else echo "false";
   }






    
}
