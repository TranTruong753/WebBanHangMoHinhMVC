<?php 
    class AjaxThongTinKhachHang extends controller {
        public $KhachHangModel ;

        function __construct()
        {
            $this->KhachHangModel= $this->model("KhachHangModel");
        }



        function updateKh(){
            $makh=$_POST['makh'];
            $ten=$_POST['ten'];
            $sdt=$_POST['sdt'];
            $gioitinh=$_POST['gioitinh'];
            if($this->KhachHangModel->updateKh($makh,$sdt,$ten,$gioitinh)==true){
                $_SESSION['Ten']=$ten;
                echo 'true';
            }
            else {
                echo 'false';
            }
            



        }

       
    }
?>