<?php

class AjaxChiTietQuyen extends controller{

    private $ChiTietQuyenModel;
    public function __construct() {
    $this->ChiTietQuyenModel = $this->model("ChiTietQuyenModel");
    }

    public function ThemDuLieuChiTietQuyen()
    {
        $MaNhomQuyen =  $_POST["MaNhomQuyen"];
        $MaChucNang =  $_POST["MaChucNang"];
        $HanhDong = $_POST["HanhDong"];
        if($this->ChiTietQuyenModel->KiemTraHanhDong($MaNhomQuyen,$MaChucNang,$HanhDong)==1)
        {
            echo "";
        }else
        {
            if( $this->ChiTietQuyenModel->insert($MaNhomQuyen,$MaChucNang,$HanhDong)==1) 
            {
             echo "true";
            }
            else {
             echo "false";
            }
        }
      
    }

    public function XoaDuLieuChiTietQuyen()
    {
        $MaNhomQuyen =  $_POST["MaNhomQuyen"];
        $MaChucNang =  $_POST["MaChucNang"];
        print_r($_POST);
        if($this->ChiTietQuyenModel->delete($MaNhomQuyen,$MaChucNang)==1)
        {
            echo "true";
        }else
        {
          echo "false";
        }
      
    }
}
?>
