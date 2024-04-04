<?php 
    class AjaxThongTinKhachHang extends controller {
        public $KhachHangModel ;

        function __construct()
        {
            $this->KhachHangModel= $this->model("KhachHangModel");
        }

        function showInfo()
        {   $userName = "" ;
            $email = "";
            $userPhone ="";
            $sex = "";
            if(isset($_SESSION['email'])){
                $email = $_SESSION['email'] ;
                $Kh = $this->KhachHangModel->TimKHbyID($email);
                if ($Kh->num_rows > 0) { 
                    while ($row = $Kh->fetch_assoc()) {
                        $userName = $row['TenKhachHang'];
                        $userPhone = $row['SoDienThoai'];
                        $sex = $row['GioiTinh'];
                    
                    }
                }
            }
        }
    }
?>