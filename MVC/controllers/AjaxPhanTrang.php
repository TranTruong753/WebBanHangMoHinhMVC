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
        // echo "table: $table <br>";
        // print_r($_POST);
        
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
                $varibleEqual.= " MaNhanVien,TenNhanVien";
            }
            if($table == 'khachhang')
            {
                $varibleEqual.= " MaKhachHang,TenKhachHang";
            }
            if($table == 'sanpham')
            {   
                $varibleEqual.= "  sanpham.MaSanPham,sanpham.TenSanPham,sanpham.GiaSanPham,theloai.TenTheloai,chatlieu.TenChatLieu,khuyenmai.TenKhuyenMai";
            }
            if($table == 'chitietsanpham')
            {  
                 //$masp=$_POST["masp"];
                $varibleEqual.= "  chitietsanpham.MachitietSanPham,mausac.TenMauSac,kichco.TenKichCo";
            }
            if($table == "khuyenmai")
            {
                $varibleEqual .= " MaKhuyenMai,TenKhuyenMai,MucKhuyenMai ";
            }               
            if($table == 'phieunhap')
            {   //$masp=$_POST["masp"];
                $varibleEqual.= "  phieunhap.MaPhieuNhap,phieunhap.NgayNhap,nhacungcap.TenNhaCungCap,nhanvien.TenNhanVien";
            }
           
            if($table == 'mausac')
            {
                $varibleEqual.= "  MaMauSac,TenMauSac";
            }
            if($table == 'chitietphieunhap')
            {   //$masp=$_POST["masp"];
                $varibleEqual.= "  chitietphieunhap.MaChiTietSanPham,sanpham.TenSanPham";
            }
            if($table == 'taikhoan')
            {
                $varibleEqual.= "  taikhoan.MaTaiKhoan";
            }
            if($condition == "")
            {
                $condition.= " where 1=1 AND";
            } 
            else
            {
                $condition.= " AND ";
            } 
            
            
            $condition .= " concat($varibleEqual) like '%$key%'";
            

            //này ko đc xóa của tao nhe mấy con cờ hó
            if($table == 'chitietquyen')
            {
                $condition = " and  concat(nq.TenNhomQuyen,cn.TenChucNang) like '%$key%' ";

            }
            // print_r("condition(AjaxChiTietQUyen): ".$condition) ;
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
    }
?>