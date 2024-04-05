<?php

// http://localhost/live/Home/Show/1/2

class AjaxLogin extends controller{

    // Must have SayHi()
    public $LoginModel;
    
    function __construct(){
        $this->LoginModel= $this->model("LoginModel");
        
    }

    function addTaiKhoan(){
        $email=$_POST['email'];
        $ten=$_POST['ten'];
        $sdt=$_POST['sdt'];
        $gioitinh=$_POST['gioitinh'];
        $mk=$_POST['mk'];
        if($this->LoginModel->addDangKiKH($email,$ten,$sdt,$gioitinh)==true and
        $this->LoginModel->addDangKiTK($email,$mk)== true ){
            echo "true";

        }
        else echo "false";
                

    }

    function DangNhap(){
        $email=$_POST['email'];
        $mk=$_POST['mk'];
        $resultKH=$this->LoginModel->TimTKKH($email,$mk);
        $resultNV=$this->LoginModel->TimTKNV($email,$mk);
        if ($resultKH->num_rows > 0) {
            while ($row = $resultKH->fetch_assoc()) {
                $_SESSION['email']=$email;
                $_SESSION['Ten']=$row['TenKhachHang'];
                            
                
                echo "true";
           }
       } else if ($resultNV->num_rows > 0) {
                while ($row = $resultNV->fetch_assoc()) {
                    $_SESSION['email']=$email;
                    $_SESSION['Ten']=$row['TenNhanVien'];
                            
                    echo "NV";
                }
    } else echo "false";
}

    function Logout(){
        
        if(isset($_SESSION['email'])){
            unset($_SESSION['email']);
            unset($_SESSION['Ten']);
    
        }
        
    }



}
?>