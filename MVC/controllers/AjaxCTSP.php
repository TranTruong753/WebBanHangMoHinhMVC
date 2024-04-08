<?php

class AjaxCTSP extends controller {

    // private $SanPhamModel;
    // private $chitietspmodel;
    // public function __construct() {
    //    $this->SanPhamModel = $this->model("SanPhamModel");
    //    $this->chitietspmodel = $this->model("chitietspmodel");

    // }
    function InsertCTSP(){
        // $ten=$_POST['tensanpham'];
        $file=$_FILES;
        $filepath='public\img\\';       
        move_uploaded_file($file['file']['tmp_name'], $filepath.$file['file']['name']);
        $fileurl=$file['file']['name'];
        $data= json_encode(['success'=>"true",'src'=>$fileurl]);
        echo $data; 
        // $tensp = $_POST["tensp"];
        // $giasp = $_POST["giasp"];
        // $matheloai = $_POST["matheloai"];
        // $machatlieu = $_POST["machatlieu"];
        //echo $masp." cc ".$tensp." ".$giasp." ".$matheloai." ".$machatlieu;
        // if($this->SanPhamModel->InsertSP($masp,$tensp,$giasp,$matheloai,$machatlieu)){
        //     echo "true";
        // }
        // else echo "false";
        
    }
    // function DeleteSP(){
    //     $masp = $_POST["masp"];
    //     $result= $this->chitietspmodel->GetCTSP($masp);
    //     if ($result->num_rows == 0) {
    //         if($this->SanPhamModel->DeleteSP($masp)){
    //             echo "true";
    //         }
    //         else echo "false";
    //     }
    //     else echo "Sản phẩm này không thể xóa";
    //     // else echo "false";
        
    // }

}

?>