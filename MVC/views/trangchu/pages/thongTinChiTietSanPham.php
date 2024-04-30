<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo Root ?>public/css/TrangChu/thongTinSanPham.css">
    <link rel="stylesheet" href="<?php echo Root ?>public/css/TrangChu/thongTinChiTietSanPham.css">
</head>
<body>
    <header class="user__header ">
        <?php
            if($data['CTHD']->num_rows>0){
            $row = $data['CTHD']->fetch_assoc();
            $tongtien=$row['TongTien']-80000;
            $thanhtien=$row['TongTien'];
            echo '<h2 class="client-title-01">Chi Tiết Đơn Hàng # '.$row['MaHoaDon'].'</h2>
            <h3 class="client-title-02 detail-date">Ngày đặt hàng:'.$row['NgayLap'].' </h3>
            </header>
            <main class="user__main">
                <div class="client__product-detail-top">
                    <div class="detail-top__left table">
                        <span class="client-title-02">ĐỊA CHỈ NGƯỜI NHẬN</span>
                        <div class="product-detail__info-wrap">
                            
                            <p>Địa chỉ:'.$row['DiaChi'].'</p>
                            <p>Điện thoại:'.$row['SoDienThoai'].'</p>
                        </div>
                    </div>
                    <div class="detail-top__right table">
                        <span class="client-title-02">HÌNH THỨC THANH TOÁN</span>
                        <div class="product-detail__info-wrap">
                            <p>'.$row['HinhThucThanhToan'].'</p>
                        </div>
                    </div>
                </div>
                <div class="client__product-detail-center">
                <table class="table__product-detail table">
                    <!-- tiêu đề -->
                    <tr class="table table-title">
                        <th style="text-align: left; padding-left:30px;">Sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Đơn giá</th>
                        <th>Tổng tính</th>
                    </tr>'
                ;
                $data['CTHD']->data_seek(0);
            }
                if ($data['CTHD']->num_rows > 0) {
                    while ($row = $data['CTHD']->fetch_assoc()) {
                        echo    '
                <tr class="table-title table-line">
                    <td class="table-product">                             
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
                    '.$row['ThanhTien'].' VNĐ
                    </td>
                    <td>
                    '.$row['SoLuong']*$row['ThanhTien'].' VNĐ
                    </td>
                   
                </tr>';
                
                    }
                }
                  
            echo '
            </table>
        </div>
        <div class="client__product-detail-bottom">
           
            <div class="detail-bottom__price">
                <div class="detail-row">
                        <span>Tổng tiền hàng</span>
                        <span>'.$tongtien.' VND</span>
                </div>
                    
                <div class="detail-row">
                <span>Phí vận chuyển</span>
                <span>80000 VND</span>
                </div>
                <div class="detail-row">
                        <span>Tổng thanh toán</span>
                        <span>'.$thanhtien.' VND</span>
                </div>
            </div>
        </div>
     
    </main>';
    ?>
</body>
</html>