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
        $result=$this->LoginModel->TimTK($email,$mk);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if($row['MaNhomQuyen']==1){
                    $_SESSION['email']=$email;
                    $_SESSION['Ten']=$row['TenKhachHang'];
                              
                    $KH= 'KH';
                    return 1;
                }
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