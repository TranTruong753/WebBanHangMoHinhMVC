<?php

class Admin extends controller
{
    protected $data = [];

    function default($page = "SanPhamPage",$data=[])
    {
        if ($page == "SanPhamPage") {
            $NhomQuyenModel = $this->model("SanPhamModel");
            $this->data["Data"] = $NhomQuyenModel->getDanhSachAdmin();
            $this->data["page"] = "SanPhamPage";
        } else if ($page == "TaiKhoanPage") {
            
            $TaiKhoanModel = $this->model("TaiKhoanModel");
            $this->data["Data"]= $TaiKhoanModel->getDanhSach();
            $this->data["page"] = "TaiKhoanPage";

        } else if ($page == "ThemSanPhamPage") {
            $this->data["page"] = "ThemSanPhamPage";
        } else if ($page == "NhomQuyenPage") {
            $NhomQuyenModel = $this->model("NhomQuyenModel");
            $this->data["Data"] = $NhomQuyenModel->getDanhSach();
            $this->data["page"] = "NhomQuyenPage";
        } else if ($page == "ChucNangPage") {
            $ChucNangModel = $this->model("ChucNangModel");
            $this->data["Data"] = $ChucNangModel->getDanhSach();
            $this->data["page"] = "ChucNangPage";
        } else if ($page == "ChiTietQuyenPage") {
            $ChiTietQuyenModel = $this->model("ChiTietQuyenModel");
            $NhomQuyenModel = $this->model( "NhomQuyenModel");
            $ChucNangModel = $this->model("ChucNangModel");
            $this->data["Data"]= $ChiTietQuyenModel->getDanhSach();

            $this->data["page"] = "ChiTietQuyenPage";
        } else if ($page == "NhapHangPage") {
            $this->data["page"] = "NhapHangPage";
        } else if ($page == "ThuongHieuPage") {
            $this->data["page"] = "ThuongHieuPage";
        } else if ($page == "TheLoaiPage") {
            $this->data["page"] = "TheLoaiPage";
        } else if ($page == "ChatLieuPage") {
            $ChatLieuModel = $this->model("ChatLieuModel");
            $this->data["Data"] = $ChatLieuModel->getDanhSach();
            $this->data["page"] = "ChatLieuPage";
        } else if ($page == "KichCoPage") {
            $this->data["page"] = "KichCoPage";
        } else if ($page == "MauSacPage") {
            $this->data["page"] = "MauSacPage";
        }
        else if ($page == "NhaCungCapPage") {
            $this->data["page"] = "NhaCungCapPage";
        }
        else if ($page == "NhanVienPage") {
            $this->data["page"] = "NhanVienPage";
        }
        else if ($page == "KhachHangPage") {
            $this->data["page"] = "KhachHangPage";
        }
        else if ($page == "KhuyenMaiPage") {
            $this->data["page"] = "KhuyenMaiPage";
        }
        else if ($page == "ThuePage") {
            $this->data["page"] = "ThuePage";
        }
        else if ($page == "ThongKePage") {
            $this->data["page"] = "ThongKePage";
        }
        //page thêm
        else if ($page == "ThemNhomQuyenPage") {
            $NhomQuyenModel = $this->model( "NhomQuyenModel");
            $this->data["page"] = "addPages/ThemNhomQuyenPage";
            $this->data["Data"] = ["index"=>"Thêm"];
        }
        else if ($page == "SuaNhomQuyenPage") {
            $NhomQuyenModel = $this->model( "NhomQuyenModel");
            $this->data["page"] = "addPages/ThemNhomQuyenPage";
            $this->data["Data"] = ["index"=> "Sửa","MaNhomQuyen"=>$data];
        }

        // print_r($this->data); 

        $this->view("manage/manage", $this->data);
    }
}
