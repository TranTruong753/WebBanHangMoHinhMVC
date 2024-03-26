<?php

class Admin extends controller
{
    protected $data = [];

    function default($page = "SanPhamPage")
    {
        if ($page == "SanPhamPage") {
            $NhomQuyenModel = $this->model("SanPhamModel");
            $this->data["DanhSach"] = $NhomQuyenModel->getDanhSach();
            $this->data["page"] = "SanPhamPage";
        } else if ($page == "TaiKhoanPage") {
            
            $this->data["page"] = "TaiKhoanPage";
        } else if ($page == "ThemSanPhamPage") {
            $this->data["page"] = "ThemSanPhamPage";
        } else if ($page == "NhomQuyenPage") {
            $NhomQuyenModel = $this->model("NhomQuyenModel");
            $this->data["DanhSach"] = $NhomQuyenModel->getDanhSach();
            $this->data["page"] = "NhomQuyenPage";
        } else if ($page == "ChucNangPage") {
            $this->data["page"] = "ChucNangPage";
        } else if ($page == "ChiTietQuyenPage") {
            $this->data["page"] = "ChiTietQuyenPage";
        } else if ($page == "NhapHangPage") {
            $this->data["page"] = "NhapHangPage";
        } else if ($page == "ThuongHieuPage") {
            $this->data["page"] = "ThuongHieuPage";
        } else if ($page == "TheLoaiPage") {
            $this->data["page"] = "TheLoaiPage";
        } else if ($page == "ChatLieuPage") {
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

        print_r($this->data);

        $this->view("manage/manage", $this->data);
    }
}
