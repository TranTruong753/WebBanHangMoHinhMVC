<?php

class Admin extends controller
{
    protected $pageName;
    protected $data = [];
    protected $params = [];
    function default($params=[])
    {
        // http://localhost/WebBanHangMoHinhMVC/home/trangchu
        $ChiTietQuyenModel = $this->model('ChiTietQuyenModel');
        $this->params = $this->paramsProcess($params);
        if(isset($this->params[0]))
        {
            $this->pageName= $this->params[0];
        }
        if(isset($_SESSION["email"]) && $_SESSION['user']== "NV")
        {
            if ($this->pageName == "SanPhamPage") {
                $SanPhamModel = $this->model("SanPhamModel");
                $ChiTietQuyenModel = $this->model('ChiTietQuyenModel');
    
                // $this->data["Data"] = $SanPhamModel->getDanhSachAdmin();
                $this->data['Data'] = ['ChiTietQuyenModel'=>$ChiTietQuyenModel];
                $this->data["detail"] = "SanPhamPage";
            } 
            else if ($this->pageName == "MainPage") {            
               
                $this->data["Data"]= [];
                $this->data["detail"] = "MainPage";
    
            } 
            //quản lý tài khoản 
            else if ($this->pageName == "TaiKhoanPage") {            
                $TaiKhoanModel = $this->model("TaiKhoanModel");
                $NhomQuyenModel = $this->model("NhomQuyenModel");
                $PhanTrangModel = $this->model("PhanTrangModel");
                // $this->data["Data"]= $TaiKhoanModel->getDanhSach();
                $this->data["Data"]= ["ChiTietQuyenModel"=>$ChiTietQuyenModel];
                $this->data["detail"] = "TaiKhoanPage";
            } 
            else if ($this->pageName == "SuaTaiKhoanPage") {
                $NhanVienModel = $this->model( "NhanVienModel");
                $KhachHangModel = $this->model("KhachHangModel");            
                $TaiKhoanModel = $this->model("TaiKhoanModel");
                $NhomQuyenModel = $this->model("NhomQuyenModel");
                $this->data["detail"] = "addPages/ThemTaiKhoanPage";
                if(isset($this->params[1])) $this->data["MaTaiKhoan"] = $this->params[1];
                $this->data["Data"] = ["index"=> "Sửa","MaTaiKhoan"=>$this->data["MaTaiKhoan"]];
    
            }
            else if ($this->pageName == "ThemTaiKhoanPage") {
                $NhanVienModel = $this->model( "NhanVienModel");
                $KhachHangModel = $this->model("KhachHangModel");
                $TaiKhoanModel = $this->model("TaiKhoanModel");
                $NhomQuyenModel = $this->model("NhomQuyenModel");
                $this->data["detail"] = "addPages/ThemTaiKhoanPage";
                $this->data["Data"] = ["index"=>"Thêm"];
            }
            //Cấp tài khoản nhân viên
            else if ($this->pageName == "CapTaiKhoanNhanVienPage") {
                $NhanVienModel = $this->model( "NhanVienModel");
                $KhachHangModel = $this->model("KhachHangModel");
                $TaiKhoanModel = $this->model("TaiKhoanModel");
                $NhomQuyenModel = $this->model("NhomQuyenModel");
                $this->data["detail"] = "addPages/ThemTaiKhoanPage";
                if(isset($this->params[1])) $this->data["MaNhanVien"] = $this->params[1];
                $this->data["Data"] = ["index"=>"CấpNv","MaNhanVien"=>$this->data["MaNhanVien"]];
            }  
            //Cấp tài khoản khách hàng
            else if ($this->pageName == "CapTaiKhoanKhachHangPage") {
                $NhanVienModel = $this->model( "NhanVienModel");
                $KhachHangModel = $this->model("KhachHangModel");
                $TaiKhoanModel = $this->model("TaiKhoanModel");
                $NhomQuyenModel = $this->model("NhomQuyenModel");
                $this->data["detail"] = "addPages/ThemTaiKhoanPage";
                if(isset($this->params[1])) $this->data["MaKhachHang"] = $this->params[1];
                $this->data["Data"] = ["index"=>"CấpKh","MaKhachHang"=>$this->data["MaKhachHang"]];
            }  
            else if ($this->pageName == "NhomQuyenPage") {
                $NhomQuyenModel = $this->model("NhomQuyenModel");
                $PhanTrangModel = $this->model("PhanTrangModel");
                // $this->data["Data"] = $NhomQuyenModel->getDanhSach("",$this->params[1],$this->params[2]);
                $this->data["Data"]=["ChiTietQuyenModel"=>$ChiTietQuyenModel];
                $this->data["detail"] = "NhomQuyenPage";
            } else if ($this->pageName == "ChucNangPage") {
                $ChucNangModel = $this->model("ChucNangModel");
                // $this->data["Data"]["index"] = $this->params[1];
                // $this->data["Data"]["sizePage"]= $this->params[2];
                // $this->data["Data"] = $ChucNangModel->getDanhSach("",$this->params[1],$this->params[2]);
                $this->data["Data"]=["ChiTietQuyenModel"=>$ChiTietQuyenModel];
                $this->data["detail"] = "ChucNangPage";
            } else if ($this->pageName == "ChiTietQuyenPage") {
                $ChiTietQuyenModel = $this->model("ChiTietQuyenModel");
                $NhomQuyenModel = $this->model( "NhomQuyenModel");
                $ChucNangModel = $this->model("ChucNangModel");
                $this->data["Data"]= [];
                $this->data["detail"] = "ChiTietQuyenPage";
            } else if ($this->pageName == "NhapHangPage") {
                $this->data["detail"] = "NhapHangPage";
                $this->data["Data"]= ["ChiTietQuyenModel"=>$ChiTietQuyenModel];
            } else if ($this->pageName == "ThuongHieuPage") {
                $ThuongHieuModel = $this->model("ThuongHieuModel");
                $this->data["Data"]= $ThuongHieuModel->getDanhSach();
                $this->data["detail"] = "ThuongHieuPage";
            } else if ($this->pageName == "TheLoaiPage") {
                $TheLoaiModel = $this->model("TheLoaiModel");
                // $this->data["Data"]= $TheLoaiModel->GetTheLoaiModel();
                $this->data["Data"]=["ChiTietQuyenModel"=>$ChiTietQuyenModel];
                $this->data["detail"] = "TheLoaiPage";
            } else if ($this->pageName == "ChatLieuPage") {
                $ChatLieuModel = $this->model("ChatLieuModel");
                // $this->data["Data"] = $ChatLieuModel->getDanhSach();
                $this->data["Data"]=["ChiTietQuyenModel"=>$ChiTietQuyenModel];
                $this->data["detail"] = "ChatLieuPage";
            } else if ($this->pageName == "KichCoPage") {
                $KichCoModel = $this->model("KichCoModel");
                // $this->data["Data"] = $KichCoModel->getDanhSach();
                $this->data["Data"]=["ChiTietQuyenModel"=>$ChiTietQuyenModel];
                $this->data["detail"] = "KichCoPage";
            } else if ($this->pageName == "MauSacPage") {
                $MauSacModel = $this->model("MauSacModel");
                // $this->data["Data"] = $MauSacModel->getDanhSach();
                $this->data["Data"]=["ChiTietQuyenModel"=>$ChiTietQuyenModel];
                $this->data["detail"] = "MauSacPage";
            }
            else if ($this->pageName == "NhaCungCapPage") {
                $NhaCungCapModel = $this->model("NhaCungCapModel");
                // $this->data["Data"] = $NhaCungCapModel->getDanhSach();
                $this->data["Data"]=["ChiTietQuyenModel"=>$ChiTietQuyenModel];
                $this->data["detail"] = "NhaCungCapPage";
            }
            // nhân viên
            else if ($this->pageName == "NhanVienPage") {
                // $NhanVienModel = $this->model("NhanVienModel");
                $PhanTrangModel = $this->model("PhanTrangModel");
                // $this->data["Data"] = $NhanVienModel->getDanhSach("",$this->params[1],$this->params[2]);
                $this->data["Data"]=["ChiTietQuyenModel"=>$ChiTietQuyenModel];
                $this->data["detail"] = "NhanVienPage";
            }
            else if($this->pageName == "SuaNhanVienPage"){
                $NhanVienModel = $this->model( "NhanVienModel");
                $this->data["detail"] = "addPages/ThemNhanVienPage";
                if(isset($this->params[1])) $this->data["MaNhanVien"] = $this->params[1];
                $this->data["Data"] = ["index"=> "Sửa","MaNhanVien"=>$this->data["MaNhanVien"]];
            }
            else if ($this->pageName == "ThemNhanVienPage") {
                $NhanVienModel = $this->model( "NhanVienModel");
                $this->data["detail"] = "addPages/ThemNhanVienPage";
                $this->data["Data"] = ["index"=>"Thêm"];
            }
            //Khách hàng page
            else if ($this->pageName == "KhachHangPage") {
                $KhachHangModel = $this->model("KhachHangModel");
                $PhanTrangModel = $this->model("PhanTrangModel");
                // $this->data["Data"] = $KhachHangModel->getDanhSach("",$this->params[1],$this->params[2]);
                $this->data["Data"]=["ChiTietQuyenModel"=>$ChiTietQuyenModel];
                $this->data["detail"] = "KhachHangPage";
            }
            else if($this->pageName == "SuaKhachHangPage"){
                $KhachHangModel = $this->model( "KhachHangModel");
                $this->data["detail"] = "addPages/ThemKhachHangPage";
                if(isset($this->params[1])) $this->data["MaKhachHang"] = $this->params[1];
                $this->data["Data"] = ["index"=> "Sửa","MaKhachHang"=>$this->data["MaKhachHang"]];
            }
            else if ($this->pageName == "ThemKhachHangPage") {
                $KhachHangModel = $this->model( "KhachHangModel");
                $this->data["detail"] = "addPages/ThemKhachHangPage";
                $this->data["Data"] = ["index"=>"Thêm"];
            }
            
            else if ($this->pageName == "KhuyenMaiPage") {
                $KhuyenMaiModel = $this->model("KhuyenMaiModel");
                $this->data["detail"] = "KhuyenMaiPage";
                $this->data["Data"]=["ChiTietQuyenModel"=>$ChiTietQuyenModel];
            }
            else if ($this->pageName == "HoaDonPage") {
                $HoaDonModel = $this->model("HoaDonModel");
                $this->data["Data"]=$HoaDonModel->GetAllHoaDon();
                $this->data["detail"] = "HoaDonPage";
            }
            else if ($this->pageName == "ThongKePage") {
                $this->data["detail"] = "ThongKePage";
                $this->data["Data"]= [];
            }
            else if($this->pageName== "ThongKeKinhDoanhPage")
            {
                $this->data["detail"] = "ThongKeKinhDoanhPage";
                $this->data["Data"]= [];
            }
            //page thêm
            else if ($this->pageName == "ThemKhuyenMaiPage") {
                $KhuyenMaiModel = $this->model( "KhuyenMaiModel");
                $this->data["detail"] = "addPages/ThemKhuyenMaiPage";
                $this->data["Data"] = ["index"=>"Thêm"];
            }
            else if ($this->pageName == "SuaKhuyenMaiPage") {
                $KhuyenMaiModel = $this->model( "KhuyenMaiModel");
                $this->data["detail"] = "addPages/ThemKhuyenMaiPage";
                if(isset($this->params[1])) $this->data["MaKhuyenMai"] = $this->params[1];
                $this->data["Data"] = ["index"=> "Sửa","MaKhuyenMai"=>$this->data["MaKhuyenMai"],"KhuyenMaiModel"=>$KhuyenMaiModel];
            }
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
                $cl=$this->model( "ChatLieuModel")->getDanhSachTT();
                $tl=$this->model( "TheLoaiModel")->GetTheLoaiModelTT();
                //$sp=$this->model( "SanPhamModel")->getDanhSach();
                $masp=$this->model( "SanPhamModel")->layMaSPLonNhat();
                $km=$this->model( "KhuyenMaiModel")->getAllKM();
                $this->data["detail"] = "addPages/ThemSanPhamPage";
                $this->data["Data"] = ["CL"=>$cl,"TL"=>$tl,"MASP"=>$masp,"KM"=>$km];
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
            else if ($this->pageName == "ThemNhaCungCapPage") {
                $this->data["detail"] = "addPages/ThemNhaCungCapPage";
                $this->data["Data"] = ["index"=>"Thêm"];
            }
            else if ($this->pageName == "SuaNhaCungCapPage") {
                $manhacungcap=$this->params[1];
                $ncc=$this->model("NhaCungCapModel")->GettheoMaNhaCungCap($manhacungcap);
                $this->data["detail"] = "updatePages/SuaNhaCungCapPage";
                $this->data["Data"] = ["NCC"=>$ncc];
            }
            else if ($this->pageName == "SuaTheLoaiPage") {
                $matheloai=$this->params[1];
                $cl=$this->model( "ChungLoaiModel")->GetChungLoaiModel();
                $tl=$this->model("TheLoaiModel")->GettheoMaTheLoai($matheloai);
                $this->data["detail"] = "updatePages/SuaTheLoaiPage";
                $this->data["Data"] = ["CL"=>$cl,"TL"=>$tl];
            }
            else if ($this->pageName == "SuaChatLieuPage") {
                $machatlieu=$this->params[1];
                $cl=$this->model("ChatLieuModel")->GettheoMaChatLieu($machatlieu);
                $this->data["detail"] = "updatePages/SuaChatLieuPage";
                $this->data["Data"] = ["CL"=>$cl];
            }
            else if ($this->pageName == "SuaKichCoPage") {
                $makichco=$this->params[1];
                $kc=$this->model("KichCoModel")->GettheoMaKichCo($makichco);
                $this->data["detail"] = "updatePages/SuaKichCoPage";
                $this->data["Data"] = ["KC"=>$kc];
            }
            else if ($this->pageName == "SuaMauSacPage") {
                $mamau=$this->params[1];
                $ms=$this->model("MauSacModel")->GettheoMaMauSac($mamau);
                $this->data["detail"] = "updatePages/SuaMauSacPage";
                $this->data["Data"] = ["MS"=>$ms];
            }
            else if ($this->pageName == "ChiTietSanPhamPage") {
                $masp=$this->params[1];
                $ctsp=$this->model( "chitietspmodel")->GetCTSP($masp);
                $this->data["detail"] = "ChiTietSanPhamPage";
                $this->data["Data"] = ["CTSP"=>$ctsp,"MASP"=>$masp];
            }
            else if ($this->pageName == "ThemChiTietSanPhamPage") {
                $masp=$this->params[1];
                $mactsp=$this->model( "chitietspmodel")->layMaCTSPLonNhat();
                $sp=$this->model( "SanPhamModel")->GetSP($masp);
                $ctsp=$this->model( "chitietspmodel")->GetAllCTSP();
                $dsctsp=$this->model( "chitietspmodel")->GetCTSPAdmin($masp);
                $kc=$this->model( "KichCoModel")->GetDanhSachTT();
                $ms=$this->model( "MauSacModel")->GetDanhSachTT();
                $this->data["detail"] = "addPages/ThemChiTietSanPhamPage";
                $this->data["Data"] = ["SP"=>$sp,"CTSP"=>$ctsp,"KC"=>$kc,"MS"=>$ms,"DSCTSP"=>$dsctsp,"MACTSP"=>$mactsp];
            }
            else if ($this->pageName == "SuaChiTietSanPhamPage") {
                $mactsp=$this->params[1];
                $ctsp=$this->model( "chitietspmodel")->GettheoMactsp($mactsp);
                $kc=$this->model( "KichCoModel")->GetDanhSachTT();
                $ms=$this->model( "MauSacModel")->GetDanhSachTT();
                $this->data["detail"] = "updatePages/SuaChiTietSanPhamPage";
                $this->data["Data"] = ["CTSP"=>$ctsp,"KC"=>$kc,"MS"=>$ms];
            }
            else if ($this->pageName == "ThemPhieuNhapPage") {
                $sp=$this->model( "SanPhamModel")->getDanhSach();
                $mapn=$this->model( "PhieuNhapModel")->layMaPNLonNhat();
                $ncc=$this->model( "NhaCungCapModel")->getDanhSach();
                $this->data["detail"] = "addPages/ThemPhieuNhapPage";
                $this->data["Data"] = ["SP"=>$sp,"MAPN"=>$mapn,"NCC"=>$ncc];
            }
            else if ($this->pageName == "ChiTietPhieuNhapPage") {
                $manp=$this->params[1];
                $this->data["detail"] = "ChiTietPhieuNhapPage";
                $this->data["Data"] = ["MAPN"=>$manp];
            }
            else if ($this->pageName == "SuaSanPhamPage") {
                $masp=$this->params[1];
                $cl=$this->model( "ChatLieuModel")->getDanhSachTT();
                $tl=$this->model( "TheLoaiModel")->GetTheLoaiModelTT();
                $sp=$this->model( "SanPhamModel")->GetSP($masp);
                $km=$this->model( "KhuyenMaiModel")->getAllKM();
                $this->data["detail"] = "updatePages/SuaSanPhamPage";
                $this->data["Data"] = ["CL"=>$cl,"TL"=>$tl,"SP"=>$sp,"KM"=>$km];
            }
            else if ($this->pageName == "ChiTietHoaDonPage") {
                $mahd=$this->params[1];
                // $cthd=$this->model( "ChiTietHoaDonModel")->GettheoMaHoaDon($mahd);
                $this->data["detail"] = "ChiTietHoaDonPage";
                $this->data["Data"] = ["MAHD"=>$mahd];
            }
          //form thống kê
            else if($this->pageName == "Top5SanPham")
            {
                $HoaDonModel = $this->model("HoaDonModel");
                $this->data["detail"] = "chartPages/Top5SanPham";
                $this->data["Data"] = [];
            }
           
    
            // print_r($this->data); 
    
            $this->view("manage/manage", $this->data);
        }
        else

        {
            session_destroy();
            header("location:http://localhost/WebBanHangMoHinhMVC/DangNhap/dangNhap");
        }
     
      
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
