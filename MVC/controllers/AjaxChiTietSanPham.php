<?php
    class AjaxChiTietSanPham extends controller {
        public $chiTietSp ;

        function __construct()
        {
            $this->chiTietSp = $this->model("chitietspmodel");
        }

        function GetCountSizeColor(){
            $masp = $_POST['masp'];
            $mamausac = $_POST['mamausac'];

            // $makichcoArr =$_POST['makichcoArr'];
            $result = $this->chiTietSp->GetSizeColor($masp,$mamausac);
            if ($result->num_rows > 0) {
                echo    '
                    <option>Vui lòng chọn size</option>';
                while ($row = $result->fetch_assoc()) {
                    echo    '
                    <option  value="'.$row['MaKichCo'].'" >'.$row['TenKichCo'].'</option>';
                }
            }
        }
    

    }

?>