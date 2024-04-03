<?php

// http://localhost/live/Home/Show/1/2

class AjaxThanhToan extends controller{

    // Must have SayHi()
    public $KhachHangModel;
    public $GioHangModel;
    public $HoaDonModel;
    public $chitietspmodel;
    public $SanphamModel;

    function __construct(){
        $this->KhachHangModel= $this->model("TrangChuKHModel");
        $this->GioHangModel= $this->model("GioHangModel");
        $this->HoaDonModel= $this->model("HoaDonModel");
        $this->chitietspmodel= $this->model("chitietspmodel");
        $this->SanPhamModel= $this->model("SanPhamModel");



    }
    
      function thanhtoan(){
        if(isset($_SESSION['email'])){
            $makh=$_SESSION['email'];
        }
        else 
        {$makh= "none";}
        $arr=$_POST['arr'];
        $sdt=$_POST['sdt'];
        $diachi=$_POST['diachi'];
        $date=$_POST['date'];
        $pttt=$_POST['pttt'];
        $tongtien=$_POST['tongtien'];
        $result=$this->HoaDonModel->GetAllHoaDon();
        $dem=0;
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $dem++;
            }
        }
        $makh="";
        if(isset($_SESSION['email'])){
            $makh=$_SESSION['email'];
        }
        else 
        {$makh= "none";}
        if($sdt==""){
            $resultKH=$this->KhachHangModel->TimKHbyID($makh);
            if ($resultKH->num_rows > 0) {
                while ($row = $resultKH->fetch_assoc()) {
                    $sdt=$row['SoDienThoai'];
                }
            }
        }
        $mahd='HD0'.$dem;
        $this->HoaDonModel->InsertHoaDon($mahd,$date,$tongtien,$pttt,$makh,$sdt,$diachi);


        for ($i = 0; $i < count($arr); $i++){
            $resultGH=$this->GioHangModel->TimctspGioHang($arr[$i],$makh);
            if ($resultGH->num_rows > 0) {
                while ($row = $resultGH->fetch_assoc()) {
                    $thanhtien=$row['GiaSanPham']*$row['SoLuong'];
                    $slton=$row['SoLuongTon']-$row['SoLuong'];
                    $sltonsp=$row['SoLuongTonSP']-$row['SoLuong'];
                    $this->HoaDonModel->InsertCTHD($mahd,$arr[$i],$row['SoLuong'],$thanhtien);
                    $this->GioHangModel->XoaGioHang($arr[$i]);
                    $this->chitietspmodel->UpdateCTSP($arr[$i],$slton);
                    $this->SanPhamModel->UpdateSP($row['MaSanPham'],$sltonsp);
                    
                }
            }
        }
        echo '<div class="procedure-left__header">
        <input class="procedure-input__check"  type="checkbox" name="allProduct" id="allProduct">
        <label class="procedure-label__check" for="allProduct"><span class="procedure-label__tick"></span></label>
        <label for="allProduct">Tất cả</label>
    </div>
    <table class="procedure__table table">
        <!-- tiêu đề -->
        <tr class="table table-title">
            <th style="text-align: left; padding-left:30px;">Sản phẩm</th>
            <th>Số lượng</th>
            <th>Đơn giá</th>
            <th>Tổng tính</th>
            <th>Xóa</th>
        </tr>';
        $resultKQ=$this->GioHangModel->GetAll();
        if ($resultKQ->num_rows > 0) {
            while ($row = $resultKQ->fetch_assoc()) {
                echo    '
                <tr class="table-title table-line">
                    <td class="table-product">
                        <input class="procedure-input__check" type="checkbox" name="product" id="'.$row['MaChiTietSanPham'].'">
                        <label class="procedure-label__check" for="'.$row['MaChiTietSanPham'].'"><span class="procedure-label__tick"></span></label>                                  
                        <div class="table-product__info">
                            <img class="table-product__img" src="http://localhost/WebBanHangMoHinhMVC/public/img/'.$row['HinhAnh'].'" alt="">
                            <div class="table-title-wrap">
                                <p class="table__info-title">'.$row['TenSanPham'].'</p>
                                <div class="table__info-input-wrap">
                                    <div class="table__info-size">'.$row['TenKichCo'].'</div>
                                    <div class="table__info-color">Color: '.$row['TenMauSac'].'</div>                                                
                                </div>
                            </div>
                        </div>                                       
                    </td>
                    <td>
                    '.$row['SoLuong'].'
                    </td>
                    <td>
                    '.$row['GiaSanPham'].' VNĐ
                    </td>
                    <td>
                    '.$row['SoLuong']*$row['GiaSanPham'].' VNĐ
                    </td>
                    <td>
                        <div class="table__icon"><i class="fa-solid fa-trash"></i></div>
                    </td>
                </tr>';
            }
        }
      }



}
?>