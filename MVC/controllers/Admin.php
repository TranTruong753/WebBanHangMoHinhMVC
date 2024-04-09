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

        }  else if ($this->pageName == "NhomQuyenPage") {
            $NhomQuyenModel = $this->model("NhomQuyenModel");
            $PhanTrangModel = $this->model("PhanTrangModel");
            $this->data["Data"] = $NhomQuyenModel->getDanhSach("",$this->params[1],$this->params[2]);
            $this->data["detail"] = "NhomQuyenPage";
        } else if ($this->pageName == "ChucNangPage") {
            $ChucNangModel = $this->model("ChucNangModel");
            $this->data["Data"]["index"] = $this->params[1];
            $this->data["Data"]["sizePage"]= $this->params[2];
            // $this->data["Data"] = $ChucNangModel->getDanhSach("",$this->params[1],$this->params[2]);
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
            $ThuongHieuModel = $this->model("ThuongHieuModel");
            $this->data["Data"]= $ThuongHieuModel->getDanhSach();
            $this->data["detail"] = "ThuongHieuPage";
        } else if ($this->pageName == "TheLoaiPage") {
            $TheLoaiModel = $this->model("TheLoaiModel");
            $this->data["Data"]= $TheLoaiModel->GetTheLoaiModel();
            $this->data["detail"] = "TheLoaiPage";
        } else if ($this->pageName == "ChatLieuPage") {
            $ChatLieuModel = $this->model("ChatLieuModel");
            $this->data["Data"] = $ChatLieuModel->getDanhSach();
            $this->data["detail"] = "ChatLieuPage";
        } else if ($this->pageName == "KichCoPage") {
            $KichCoModel = $this->model("KichCoModel");
            $this->data["Data"] = $KichCoModel->getDanhSach();
            $this->data["detail"] = "KichCoPage";
        } else if ($this->pageName == "MauSacPage") {
            $MauSacModel = $this->model("MauSacModel");
            $this->data["Data"] = $MauSacModel->getDanhSach();
            $this->data["detail"] = "MauSacPage";
        }
        else if ($this->pageName == "NhaCungCapPage") {
            $this->data["detail"] = "NhaCungCapPage";
        }
        else if ($this->pageName == "NhanVienPage") {
            $this->data["detail"] = "NhanVienPage";
        }
        else if ($this->pageName == "KhachHangPage") {
            $KhachHangModel = $this->model("KhachHangModel");
            $PhanTrangModel = $this->model("PhanTrangModel");
            $this->data["Data"] = $KhachHangModel->getDanhSach("",$this->params[1],$this->params[2]);
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
        else if ($this->pageName == "ThemChucNangPage") {
            $ChucNangModel = $this->model( "ChucNangModel");
            $this->data["detail"] = "addPages/ThemChucNangPage";
            $this->data["Data"] = ["index"=>"Thêm"];
        }
        else if ($this->pageName == "SuaChucNangPage") {
            $ChucNangModel = $this->model( "ChucNangModel");
            $this->data["detail"] = "addPages/ThemChucNangPage";
            if(isset($this->params[1])) $this->data["MaChucNang"] = $this->params[1];
            $this->data["Data"] = ["index"=> "Sửa","MaChucNang"=>$this->data["MaChucNang"]];
        }
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
        else if ($this->pageName == "ThemSanPhamPage") {
            //$NhomQuyenModel = $this->model( "ThemSanPhamPage");
            $cl=$this->model( "ChatLieuModel")->getDanhSach();
            $tl=$this->model( "TheLoaiModel")->GetTheLoaiModel();
            $sp=$this->model( "SanPhamModel")->getDanhSach();
            $this->data["detail"] = "addPages/ThemSanPhamPage";
            $this->data["Data"] = ["CL"=>$cl,"TL"=>$tl,"SP"=>$sp];
        }
        else if ($this->pageName == "ThemChatLieuPage") {
            $this->data["detail"] = "addPages/ThemChatLieuPage";
            $this->data["Data"] = ["index"=>"Thêm"];
        }
        else if ($this->pageName == "ThemThuongHieuPage") {
            $this->data["detail"] = "addPages/ThemThuongHieuPage";
            $this->data["Data"] = ["index"=>"Thêm"];
        }
        else if ($this->pageName == "ThemTheLoaiPage") {
            $cl=$this->model( "ChungLoaiModel")->GetChungLoaiModel();
            $this->data["detail"] = "addPages/ThemTheLoaiPage";
            $this->data["Data"] = ["CL"=>$cl];
        }
        else if ($this->pageName == "ThemKichCoPage") {
            $this->data["detail"] = "addPages/ThemKichCoPage";
            $this->data["Data"] = ["index"=>"Thêm"];
        }
        else if ($this->pageName == "ThemMauSacPage") {
            $this->data["detail"] = "addPages/ThemMauSacPage";
            $this->data["Data"] = ["index"=>"Thêm"];
        }
        else if ($this->pageName == "ChiTietSanPhamPage") {
            $masp=$this->params[1];
            $ctsp=$this->model( "chitietspmodel")->GetCTSP($masp);
            $this->data["detail"] = "ChiTietSanPhamPage";
            $this->data["Data"] = $ctsp;
        }
        else if ($this->pageName == "ThemChiTietSanPhamPage") {
            $masp=$this->params[1];
            $sp=$this->model( "SanPhamModel")->getDanhSach();
            $ctsp=$this->model( "chitietspmodel")->GetAllCTSP();
            $kc=$this->model( "KichCoModel")->GetAll();
            $ms=$this->model( "MauSacModel")->GetAll();
            $this->data["detail"] = "addPages/ThemChiTietSanPhamPage";
            $this->data["Data"] = ["SP"=>$sp,"CTSP"=>$ctsp,"KC"=>$kc,"MS"=>$ms];
        }

        print_r($this->data); 

        $this->view("manage/manage", $this->data);
    }

    // public function test() {
    //     $this->view("manage/pages/ThongKePage", $this->data);
    // };'ơ

    public function main($x=[])
    {
        print_r($x) ;
    }

    public function paramsProcess($data)
    {
        if (isset($data)) {
            return explode(",", filter_var(trim($data, ",")));
        } else {
            return ",";
        }
    }
}
