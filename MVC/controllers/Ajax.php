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
        
        if(isset($_POST['size'])){
            $key = $_POST['key'];
        $pageIndex = $_POST['index'];
        $numberItem = $_POST['size'];
        }
        else {
            $numberItem = 8;
            $key = "";
        $pageIndex = 1;
        }
       
        $html="";
        $tc = $this->TrangChuKHModel->getDanhSach($key,$pageIndex,$numberItem);
        if ($tc->num_rows > 0) {
            while ($row = $tc->fetch_assoc()) {
                $html.=    '
                    <section class="product__item">
                        <a href="http://localhost/WebBanHangMoHinhMVC/chitietsp/chitiet/'.$row["MaSanPham"].'" class="product__link">
                        
                            <div class="product__img-wrap">
                                <img
                                src="http://localhost/WebBanHangMoHinhMVC/public/img/'. $row["HinhAnh"].'"
                                    alt=""
                                    class="product__img"
                                />
                                <span class="product__img-sale"
                                    >-'. $row["MucKhuyenMai"].'%</span
                                >
                            </div>

                            <div class="product__content">
                                <div class="product__content-price">'
                                .number_format($row["GiaSanPham"], 0, ',', '.').
                                // number: Số cần định dạng.
                                // decimals: Số lượng chữ số sau dấu thập phân. Nếu không được chỉ định, mặc định là 0.
                                // decimal_separator: Dấu phân cách thập phân. 
                                // thousand_separator: Dấu phân cách hàng nghìn. 
                                
                                ' VNĐ</div>
                                <p class="product__content-title">'
                                    .$row["TenSanPham"].'
                                </p>
                            </div>
                        </a>
                    </section>';
            }
            $tc->data_seek(0);
        }
        echo $html;

    }

    function GetSPtheoCL(){
        $key = $_POST['key'];
        $pageIndex = $_POST['index'];
        $numberItem = $_POST['size'];
        $cl=$_POST['cl'];
        $html="";
        
       
        if($this->TrangChuKHModel->GetspCL($key,$pageIndex,$numberItem,$cl)->num_rows >0)
        {
            $result=$this->TrangChuKHModel->GetspCL($key,$pageIndex,$numberItem,$cl);
            while($row = $result->fetch_assoc())
            {
              $html .=  '
              <section class="product__item">
                  <a href="http://localhost/WebBanHangMoHinhMVC/chitietsp/chitiet/'.$row["MaSanPham"].'" class="product__link">
                      <div class="product__img-wrap">
                          <img
                          src="http://localhost/WebBanHangMoHinhMVC/public/img/'. $row["HinhAnh"].'"
                              alt=""
                              class="product__img"
                          />
                          <span class="product__img-sale"
                          >-'. $row["MucKhuyenMai"].'%</span
                          >
                      </div>

                      <div class="product__content">
                          <div class="product__content-price">'
                          .number_format($row["GiaSanPham"], 0, ',', '.').' VNĐ
                          </div>
                          <p class="product__content-title">'
                              .$row["TenSanPham"].'
                          </p>
                      </div>
                  </a>
              </section>';
              
            }
            $result->data_seek(0);
            echo $html;
        }
        else
            { if($cl=="hangmoi"){
                $this->GetAllSP();
            }
            else
                echo "Hiện không có sản phẩm để hiển thị";
            }

        // if(isset($_POST['cl'])){
        //     $tl=$_POST['cl'];
        //     $cl = $this->TrangChuKHModel->GetspCL($key,$pageIndex,$soLuong,$cl);
        //     if ($cl->num_rows > 0) {
        //         while ($row = $cl->fetch_assoc()) {
        //             echo    '
        //                 <section class="product__item">
        //                     <a href="http://localhost/WebBanHangMoHinhMVC/chitietsp/chitiet/'.$row["MaSanPham"].'" class="product__link">
        //                         <div class="product__img-wrap">
        //                             <img
        //                             src="http://localhost/WebBanHangMoHinhMVC/public/img/'. $row["HinhAnh"].'"
        //                                 alt=""
        //                                 class="product__img"
        //                             />
        //                             <span class="product__img-sale"
        //                                 >-50%</span
        //                             >
        //                         </div>

        //                         <div class="product__content">
        //                             <div class="product__content-price">'
        //                             .$row["GiaSanPham"].'VNĐ
        //                             </div>
        //                             <p class="product__content-title">'
        //                                 .$row["TenSanPham"].'
        //                             </p>
        //                         </div>
        //                     </a>
        //                 </section>';
        //         }
        //     }
        //     else
        //     { if($tl=="hangmoi"){
        //         $this->GetAllSP();
        //     }
        //     else
        //         echo "Hiện không có sản phẩm để hiển thị";
        //     }
        // }
        
    }

    function GetSPtheoTL(){
        $key = $_POST['key'];
        $pageIndex = $_POST['index'];
        $numberItem = $_POST['size'];
        $tl=$_POST['tl'];
        $html="";
        
       
        if($this->TrangChuKHModel->GetspTL($key,$pageIndex,$numberItem,$tl)->num_rows >0)
        {
            $result=$this->TrangChuKHModel->GetspTL($key,$pageIndex,$numberItem,$tl);
            while($row = $result->fetch_assoc())
            {
              $html .=  '
              <section class="product__item">
                  <a href="http://localhost/WebBanHangMoHinhMVC/chitietsp/chitiet/'.$row["MaSanPham"].'" class="product__link">
                      <div class="product__img-wrap">
                          <img
                          src="http://localhost/WebBanHangMoHinhMVC/public/img/'. $row["HinhAnh"].'"
                              alt=""
                              class="product__img"
                          />
                          <span class="product__img-sale"
                          >-'. $row["MucKhuyenMai"].'%</span
                          >
                      </div>

                      <div class="product__content">
                          <div class="product__content-price">'
                          .number_format($row["GiaSanPham"], 0, ',', '.').' VNĐ
                          </div>
                          <p class="product__content-title">'
                              .$row["TenSanPham"].'
                          </p>
                      </div>
                  </a>
              </section>';
              
            }
            $result->data_seek(0);
            echo $html;
        }
        else
            {
                echo "Hiện không có sản phẩm để hiển thị";
            }

        // if(isset($_POST['tl'])){
        //     $tl=$_POST['tl'];
        //     $cl = $this->TrangChuKHModel->GetspTL($key,$pageIndex,$soLuong,$tl);
        //     if ($cl->num_rows > 0) {
        //         while ($row = $cl->fetch_assoc()) {
        //             echo    '
        //                 <section class="product__item">
        //                     <a href="http://localhost/WebBanHangMoHinhMVC/chitietsp/chitiet/'.$row["MaSanPham"].'" class="product__link">
        //                         <div class="product__img-wrap">
        //                             <img
        //                             src="http://localhost/WebBanHangMoHinhMVC/public/img/'. $row["HinhAnh"].'"
        //                                 alt=""
        //                                 class="product__img"
        //                             />
        //                             <span class="product__img-sale"
        //                                 >-50%</span
        //                             >
        //                         </div>

        //                         <div class="product__content">
        //                             <div class="product__content-price">'
        //                             .$row["GiaSanPham"].'VNĐ
        //                             </div>
        //                             <p class="product__content-title">'
        //                                 .$row["TenSanPham"].'
        //                             </p>
        //                         </div>
        //                     </a>
        //                 </section>';
        //         }
        //     }
        //     else
        //     {
        //         echo "Hiện không có sản phẩm để hiển thị";
        //     }
        // }
        
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
                                    .$row["GiaSanPham"].'VNĐ
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
                echo "Hiện không có sản phẩm để hiển thị";
            }
        }
       
    }
    function GioHang(){
        
        $makh=$_POST['makh'];
        $masp=$_POST['masp'];
        $mamausac=$_POST['mamausac'];
        $makichco=$_POST['makichco'];
        $sl=$_POST['sl'];
        $html='';
        $resultctsp=$this->GioHang->TimkiemCTSP($masp,$mamausac,$makichco);
        if ($resultctsp->num_rows > 0) {
            while ($row = $resultctsp->fetch_assoc()) {
                $mactsp=$row['MaChiTietSanPham'];
            }
        }
        $this->GioHang->addGioHang($makh,$masp,$mamausac,$makichco,$sl);
        $result=$this->GioHang->GetAll();
        
        $SL=0;
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $SL++;
                }
                $result->data_seek(0);
            }

        $html.='       
        <div class="cart-message">Có <span class="cart-message__number">'.$SL.'</span> <span style="color: red;">sản phẩm</span> trong giỏ hàng</div>
        <ul class="cart__list">';
            $thanhtien=0;
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $html.='
                    <li class="cart-item">
                    <img src="http://localhost/WebBanHangMoHinhMVC/public/img/'.$row['HinhAnh'].'" alt="" class="cart-item__img">
                    <div class="cart-item__content">
                        <a href="#!" class="cart-item__link">'.$row['TenSanPham'].'</a>
                        <input type="hidden" id ="test" value ="'.$row['MaChiTietSanPham'].'"/>
                        <div class="cart-item__info">
                            <div class="cart-item__number">'.$row['SoLuong'].'</div>
                            <span>X</span>
                            <span class="cart-item__price">'.number_format($row["GiaSanPham"], 0, ',', '.').' VNĐ</span>
                        </div>
                        <div class="cart-item__icon" id="'.$row['MaChiTietSanPham'].'" onclick="test(this)" value="'.$row['MaChiTietSanPham'].'">
                            <i class="fa-solid fa-trash" id= "'.$row['MaChiTietSanPham'].'" value=""></i>
                        </div>
                        
                    </div>
                </li>';
                $thanhtien= $thanhtien + $row['SoLuong'] * $row['GiaSanPham'];
                }
                $html.='</ul>
                    <div class="cart__buy">
                        <div class="cart__buy-wrap">Tổng: <span class="cart-buy__price">'.number_format($thanhtien, 0, ',', '.').' VNĐ</span></div>
                        <span class="cart__buy-btn" id="cart__buy-btn" onclick="thanhtoan()" title="Thanh toán">Thanh toán</span>
                    </div>';
            }
            else $html.="<div > Bạn Chưa Chọn Sản Phẩm </div>";
            $data=json_encode(["html"=>$html,"mactsp"=>$mactsp]);
            echo $data;
            
                

        
        

    }

    function XoaGioHang(){
        $mactsp=$_POST['mactsp'];
        $this->GioHang->XoaGioHang($mactsp);
        $result=$this->GioHang->GetAll();
        
        $SL=0;
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $SL++;
                }
                $result->data_seek(0);
            }

        echo'       
        <div class="cart-message">Có <span class="cart-message__number">'.$SL.'</span> <span style="color: red;">sản phẩm</span> trong giỏ hàng</div>
        <ul class="cart__list">';
            $thanhtien=0;
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo'
                    <li class="cart-item">
                    <img src="http://localhost/WebBanHangMoHinhMVC/public/img/'.$row['HinhAnh'].'" alt="" class="cart-item__img">
                    <div class="cart-item__content">
                        <a href="#!" class="cart-item__link">'.$row['TenSanPham'].'</a>
                        <input type="hidden" id ="test" value ="'.$row['MaChiTietSanPham'].'"/>
                        <div class="cart-item__info">
                            <div class="cart-item__number">'.$row['SoLuong'].'</div>
                            <span>X</span>
                            <span class="cart-item__price">'.number_format($row["GiaSanPham"], 0, ',', '.').' VNĐ</span>
                        </div>
                        <div class="cart-item__icon" id="'.$row['MaChiTietSanPham'].'" onclick="test(this)" value="'.$row['MaChiTietSanPham'].'">
                            <i class="fa-solid fa-trash" id= "'.$row['MaChiTietSanPham'].'" value=""></i>
                        </div>
                        
                    </div>
                </li>';
                $thanhtien= $thanhtien + $row['SoLuong'] * $row['GiaSanPham'];
                }
                echo'</ul>
                    <div class="cart__buy">
                        <div class="cart__buy-wrap">Tổng: <span class="cart-buy__price">'.number_format($thanhtien, 0, ',', '.').' VNĐ</span></div>
                        <span class="cart__buy-btn" id="cart__buy-btn" onclick="thanhtoan()" title="Thanh toán">Thanh toán</span>
                    </div>';
            }
            else echo "<div > Bạn Chưa Chọn Sản Phẩm </div>";
            
                

       
    }

    function GetCount(){
        $masp=$_POST['masp'];
        $mamausac=$_POST['mamausac'];
        $makichco=$_POST['makichco'];
        $result=$this->GioHang->TimkiemCTSP($masp,$mamausac,$makichco);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo $row['SoLuongTon'];
            }
        }

    }

   


}
?>