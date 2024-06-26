<?php

// http://localhost/live/Home/Show/1/2
require_once "./MVC/core/SentEmail.php";
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
        session_destroy();
        session_start();
        $email=$_POST['email'];
        $mk=$_POST['mk'];
        $resultKH=$this->LoginModel->TimTKKH($email,$mk);
        $resultNV=$this->LoginModel->TimTKNV($email,$mk);
        if ($resultKH->num_rows > 0) {
            while ($row = $resultKH->fetch_assoc()) {
                $_SESSION['email']=$email;
                $_SESSION['Ten']=$row['TenKhachHang'];   
                $_SESSION['user'] = "KH" ;                                       
                echo "true";
           }
       } else if ($resultNV->num_rows > 0) {
                while ($row = $resultNV->fetch_assoc()) {
                    $_SESSION['email']=$email;
                    $_SESSION['Ten']=$row['TenNhanVien'];
                    $_SESSION['MaNhomQuyen']=  $row['MaNhomQuyen'];  
                    $_SESSION['user'] = "NV" ;  
                    echo "NV";
                }
    } else echo "false";
}

    function Logout(){
        
        if(isset($_SESSION['email'])){
            session_destroy();
        }
        
    }
    function SentOtp(){
        $email=$_POST['email'];
        $sent= new Email();
        // $data= json_encode(["code"=>$sent->Sent($email),"kq"=>true]);
        echo $sent->Sent($email);
    }

    function updatemk(){
        $email=$_POST['email'];
        $codePIN=$_POST['codePIN'];
        echo $this->LoginModel->updatemk($email,$codePIN);
    }



}
?>