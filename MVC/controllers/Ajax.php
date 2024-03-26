<?php

// http://localhost/live/Home/Show/1/2

class Ajax extends controller{

    // Must have SayHi()
    public $TrangChuKHModel;
    public $GioHang;
    function __construct(){
        $this->TrangChuKHModel= $this->model("TrangChuKHModel");
        $this->GioHang= $this->model("GioHangModel");
    }
    function GetAllSP(){
        $tc = $this->TrangChuKHModel->GetTrangChuKHModel();
        if ($tc->num_rows > 0) {
            while ($row = $tc->fetch_assoc()) {
                echo    '
                    <section class="product__item">
                        <a href="http://localhost/WebBanHangMoHinhMVC/chitietsp/chitiet/'.$row["MaSanPham"].'" class="product__link">
                        
                            <div class="product__img-wrap">
                                <img
                                src="http://localhost/WebBanHangMoHinhMVC/public/img/'. $row["HinhAnh"].'"
                                    alt=""
                                    class="product__img"
                                />
                                <span class="product__img-sale"
                                    >-50%</span
                                >
                            </div>

                            <div class="product__content">
                                <div class="product__content-price">'
                                .$row["GiaSanPham"].'VND
                                </div>
                                <p class="product__content-title">'
                                    .$row["TenSanPham"].'
                                </p>
                            </div>
                        </a>
                    </section>';
            }
        }

    }

    function GetSPtheoTL(){
        if(isset($_POST['tl'])){
        $tl=$_POST['tl'];
        $tc = $this->TrangChuKHModel->GetspTL($tl);
        if ($tc->num_rows > 0) {
            while ($row = $tc->fetch_assoc()) {
                echo    '
                    <section class="product__item">
                        <a href="http://localhost/WebBanHangMoHinhMVC/chitietsp/chitiet/'.$row["MaSanPham"].'" class="product__link">
                            <div class="product__img-wrap">
                                <img
                                src="http://localhost/WebBanHangMoHinhMVC/public/img/'. $row["HinhAnh"].'"
                                    alt=""
                                    class="product__img"
                                />
                                <span class="product__img-sale"
                                    >-50%</span
                                >
                            </div>

                            <div class="product__content">
                                <div class="product__content-price">'
                                .$row["GiaSanPham"].'VND
                                </div>
                                <p class="product__content-title">'
                                    .$row["TenSanPham"].'
                                </p>
                            </div>
                        </a>
                    </section>';
            }
        }
    }
    else
        {
            $this->GetAllSP();
        }
    }
    function TimSP(){
        if(isset($_POST['tensp'])){
            $tensp=$_POST['tensp'];
            $ds = $this->TrangChuKHModel->TimSP($tensp);
            if ($ds->num_rows > 0) {
                while ($row = $ds->fetch_assoc()) {
                    echo    '
                        <section class="product__item product__item-hot">
                            <a href="http://localhost/WebBanHangMoHinhMVC/chitietsp/chitiet/'.$row["MaSanPham"].'" class="product__link">
                                <div class="product__img-wrap">
                                    <img
                                    src="http://localhost/WebBanHangMoHinhMVC/public/img/'. $row["HinhAnh"].'"
                                        alt=""
                                        class="product__img"
                                    />
                                    <span class="product__img-sale"
                                        >-50%</span
                                    >
                                </div>
    
                                <div class="product__content">
                                    <div class="product__content-price">'
                                    .$row["GiaSanPham"].'VND
                                    </div>
                                    <p class="product__content-title">'
                                        .$row["TenSanPham"].'
                                    </p>
                                </div>
                            </a>
                        </section>';
                }
            }
            else
            {
                $this->GetAllSP();
            }
        }
       
    }
    function GioHang(){
        
        $makh=$_POST['makh'];
        $masp=$_POST['masp'];
        $mamausac=$_POST['mamausac'];
        $makichco=$_POST['makichco'];
        $sl=$_POST['sl'];
        $this->GioHang->addGioHang($makh,$masp,$mamausac,$makichco,$sl);
        //echo $makh." ".$masp." ".$mamausac." ".$makichco." ".$sl;

    }



}
?>