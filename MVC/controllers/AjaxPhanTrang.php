<?php

class AjaxPhanTrang extends controller{
    protected $PhanTrangModel ;

    public function __construct() {
        $this->PhanTrangModel = $this->model("PhanTrangModel");
    }

    public function getPhanTrang() {
        $table = $_POST["table"];
        $condition = $_POST["condition"];
        $index =$_POST["index"];
        $size = $_POST["size"];
        $masp='';
        // echo "table: $table <br>";
        if(isset($_POST["key"]))
        {
            $varibleEqual = "";
            $key=$_POST["key"];


            if($table == 'nhomquyen')
            {
                $varibleEqual.= "  MaNhomQuyen,TenNhomQuyen";
            }
             if($table == 'chucnang')
            {
                $varibleEqual .=" MaChucNang,TenChucNang ";
            }
            if($table == 'nhanvien')
            {
                $varibleEqual.= "  MaNhanVien,TenNhanVien";
            }
            if($table == 'khachhang')
            {
                $varibleEqual.= "  MaKhachHang,TenKhachHang";
            }
            if($table == 'sanpham')
            {   
                $varibleEqual.= "  MaSanPham,TenSanPham";
            }
            if($table == 'chitietsanpham')
            {   //$masp=$_POST["masp"];
                $varibleEqual.= "  chitietsanpham.MachitietSanPham,mausac.TenMauSac,kichco.TenKichCo";
            }
            if($condition == "")
            {
                $condition.= " where ";
            } 
            else
            {
                $condition.= " AND ";
            } 
            
            $condition .= " concat($varibleEqual) like '%$key%'";
            // echo "condition: ".$condition;
            echo $this->PhanTrangModel->PhanTrang($index,$size,$table,$condition);


        }else
        {
            echo $this->PhanTrangModel->PhanTrang($index,$size,$table,$condition);

        }
    }

    // public function getPhanTrangKH() {
    //     $table = $_POST["table"];
    //     $condition = $_POST["condition"];
    //     $index =$_POST["index"];
    //     $size = $_POST["size"];
    //     // echo "table: $table <br>";
    //     if(isset($_POST["key"]))
    //     {
    //         $varibleEqual = "";
    //         $key=$_POST["key"];


    //         if($table == 'khachhang')
    //         {
    //             $varibleEqual.= "  MaKhachHang,TenKhachHang";
    //         }
    //         if($condition == "")
    //         {
    //             $condition.= " where ";
    //         } 
    //         else
    //         {
    //             $condition.= " AND ";
    //         } 
            
    //         $condition .= " concat($varibleEqual) like '%$key%'";
            
    //         // echo "condition: ".$condition;
    //         echo $this->PhanTrangModel->PhanTrang($index,$size,$table,$condition);


    //     }else
    //     {
    //         echo $this->PhanTrangModel->PhanTrang($index,$size,$table,$condition);

    //     }
    // }
}
?>