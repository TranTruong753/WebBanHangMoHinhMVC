<?php

// http://localhost/live/Home/Show/1/2

class AjaxLogin extends controller{

    // Must have SayHi()
    public $DangKiModel;
    
    function __construct(){
        $this->DangKiModel= $this->model("DangKiModel");
        
    }
    function addTaiKhoan(){
        $email=$_POST['email'];
        $ten=$_POST['ten'];
        $sdt=$_POST['sdt'];
        $gioitinh=$_POST['gioitinh'];
        $mk=$_POST['mk'];
        if($this->DangKiModel->addDangKiKH($email,$ten,$sdt,$gioitinh)==true and
         $this->DangKiModel->addDangKiTK($email,$mk)== true ){
            echo "true";

        }
        else echo "false";
                

    }



}
?>