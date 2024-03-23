<?php

// http://localhost/live/Home/Show/1/2

class Ajax extends controller{

    // Must have SayHi()
    public $TrangChuKHModel;
    function __construct(){
        $this->TrangChuKHModel= $this->model("TrangChuKHModel");
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

}
?>