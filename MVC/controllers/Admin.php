<?php

class Admin extends controller
{
    protected $pageName;
    protected $data = [];
    protected $params = [];
    function default($params=[])
    {

        
        $this->params = $this->paramsProcess($params);
        

        if(isset($this->params[0]))
        {
            $this->pageName= $this->params[0];
        }
     
        if ($this->pageName == "SanPhamPage") {
            $NhomQuyenModel = $this->model("SanPhamModel");
            $this->data["Data"] = $NhomQuyenModel->getDanhSachAdmin();
            $this->data["detail"] = "SanPhamPage";
        } else if ($this->pageName == "TaiKhoanPage") {
            
            $TaiKhoanModel = $this->model("TaiKhoanModel");
            $this->data["Data"]= $TaiKhoanModel->getDanhSach();
            $this->data["detail"] = "TaiKhoanPage";

        } else if ($this->pageName == "ThemSanPhamPage") {
            $this->data["detail"] = "ThemSanPhamPage";
        } else if ($this->pageName == "NhomQuyenPage") {
            $NhomQuyenModel = $this->model("NhomQuyenModel");
            $PhanTrangModel = $this->model("PhanTrangModel");
            $this->data["Data"] = $NhomQuyenModel->getDanhSach("",$this->params[1],$this->params[2]);
            $this->data["detail"] = "NhomQuyenPage";
        } else if ($this->pageName == "ChucNangPage") {
            $ChucNangModel = $this->model("ChucNangModel");
            $this->data["Data"] = $ChucNangModel->getDanhSach();
            $this->data["detail"] = "ChucNangPage";
        } else if ($this->pageName == "ChiTietQuyenPage") {
            $ChiTietQuyenModel = $this->model("ChiTietQuyenModel");
            $NhomQuyenModel = $this->model( "NhomQuyenModel");
            $ChucNangModel = $this->model("ChucNangModel");
            $this->data["Data"]= $ChiTietQuyenModel->getDanhSach();

            $this->data["detail"] = "ChiTietQuyenPage";
        } else if ($this->pageName == "NhapHangPage") {
            $this->data["detail"] = "NhapHangPage";
        } else if ($this->pageName == "ThuongHieuPage") {
            $this->data["detail"] = "ThuongHieuPage";
        } else if ($this->pageName == "TheLoaiPage") {
            $this->data["detail"] = "TheLoaiPage";
        } else if ($this->pageName == "ChatLieuPage") {
            $ChatLieuModel = $this->model("ChatLieuModel");
            $this->data["Data"] = $ChatLieuModel->getDanhSach();
            $this->data["detail"] = "ChatLieuPage";
        } else if ($this->pageName == "KichCoPage") {
            $this->data["detail"] = "KichCoPage";
        } else if ($this->pageName == "MauSacPage") {
            $this->data["detail"] = "MauSacPage";
        }
        else if ($this->pageName == "NhaCungCapPage") {
            $this->data["detail"] = "NhaCungCapPage";
        }
        else if ($this->pageName == "NhanVienPage") {
            $this->data["detail"] = "NhanVienPage";
        }
        else if ($this->pageName == "KhachHangPage") {
            $this->data["detail"] = "KhachHangPage";
        }
        else if ($this->pageName == "KhuyenMaiPage") {
            $this->data["detail"] = "KhuyenMaiPage";
        }
        else if ($this->pageName == "ThuePage") {
            $this->data["detail"] = "ThuePage";
        }
        else if ($this->pageName == "ThongKePage") {
            $this->data["detail"] = "ThongKePage";
        }
        //page thêm
        else if ($this->pageName == "ThemNhomQuyenPage") {
            $NhomQuyenModel = $this->model( "NhomQuyenModel");
            $this->data["detail"] = "addPages/ThemNhomQuyenPage";
            $this->data["Data"] = ["index"=>"Thêm"];
        }
        else if ($this->pageName == "SuaNhomQuyenPage") {
            $NhomQuyenModel = $this->model( "NhomQuyenModel");
            $this->data["detail"] = "addPages/ThemNhomQuyenPage";
            if(isset($this->params[1])) $this->data["MaNhomQuyen"] = $this->params[1];
            $this->data["Data"] = ["index"=> "Sửa","MaNhomQuyen"=>$this->data["MaNhomQuyen"]];
        }

        print_r($this->data); 

        $this->view("manage/manage", $this->data);
    }

    // public function test() {
    //     $this->view("manage/pages/ThongKePage", $this->data);
    // }


    public function paramsProcess($data)
    {
        if (isset($data)) {
            return explode(",", filter_var(trim($data, ",")));
        } else {
            return ",";
        }
    }
}
