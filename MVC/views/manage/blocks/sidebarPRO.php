    <div class="sidebar" id="sidebar">
            <div class="sidebar_content">
                    <div class="sidebar_logo">
                            <img src="<?php echo Root ?>public/img/logo.png" alt="" class="">
                    </div>
                    <ul class="sidebar_menu_list">
                            <a href="<?php "http://localhost/WebBanHangMoHinhMVC/admin/default/SanPhamPage"; ?>" class="sidebar_link">
                                    <i class='bx bx-cart sidebar_icon'></i>
                                    <span class="sidebar_text">Quản lý sản phẩm</span>
                            </a>
                            <a href="#" class="sidebar_link" id="submenu1">
                                    <i class='bx bx-user sidebar_icon'></i>
                                    <span class="sidebar_text">Quản lý nhân sự</span>
                                    <i class='bx bx-chevron-down sidebar_left_icon' id="sidebar_left_icon"></i>
                            </a>
                            <ul class="sidebar_submenu_link" id="sublist1">
                                    <a href="http://localhost/WebBanHangMoHinhMVC/admin/default/TaiKhoanPage" class="sidebar_sublink">
                                            <span class="sidebar_text">Tài Khoản</span>
                                    </a>
                                    <a href="http://localhost/WebBanHangMoHinhMVC/admin/default/NhomQuyenPage" class="sidebar_sublink">
                                            <span class="sidebar_text">Nhóm Quyền</span>
                                    </a>
                                    <a href="http://localhost/WebBanHangMoHinhMVC/admin/default/ChucNangPage,1,4" class="sidebar_sublink">
                                            <span class="sidebar_text">Chức Năng</span>
                                    </a>
                                    <a href="http://localhost/WebBanHangMoHinhMVC/admin/default/ChiTietQuyenPage" class="sidebar_sublink">
                                            <span class="sidebar_text">Chi Tiết Quyền</span>
                                    </a>
                            </ul>
                            <a href="http://localhost/WebBanHangMoHinhMVC/admin/default/NhapHangPage" class="sidebar_link">
                                    <i class='bx bx-cart-add sidebar_icon'></i>
                                    <span class="sidebar_text">Nhập hàng</span>
                            </a>
                            <a href="#" class="sidebar_link" id="submenu2">
                                    <i class='bx bx-shopping-bag sidebar_icon'></i>
                                    <span class="sidebar_text">Danh mục sản phẩm</span>
                                    <i class='bx bx-chevron-down sidebar_left_icon' id="sidebar_left_icon2"></i>
                            </a>
                            <ul class="sidebar_submenu_link" id="sublist2">
                                    <a href="http://localhost/WebBanHangMoHinhMVC/admin/default/ThuongHieuPage" class="sidebar_sublink">
                                            <span class="sidebar_text">Thương Hiệu</span>
                                    </a>
                                    <a href="http://localhost/WebBanHangMoHinhMVC/admin/default/TheLoaiPage" class="sidebar_sublink">
                                            <span class="sidebar_text">Thể Loại</span>
                                    </a>
                                    <a href="http://localhost/WebBanHangMoHinhMVC/admin/default/ChatLieuPage" class="sidebar_sublink">
                                            <span class="sidebar_text">Chất Liệu</span>
                                    </a>
                                    <a href="http://localhost/WebBanHangMoHinhMVC/admin/default/KichCoPage" class="sidebar_sublink">
                                            <span class="sidebar_text">Kích Cỡ</span>
                                    </a>
                                    <a href="http://localhost/WebBanHangMoHinhMVC/admin/default/MauSacPage" class="sidebar_sublink">
                                            <span class="sidebar_text">Màu Sắc</span>
                                    </a>
                            </ul>
                            <a href="http://localhost/WebBanHangMoHinhMVC/admin/default/NhaCungCapPage" class="sidebar_link">
                                    <i class='bx bx-task sidebar_icon'></i>
                                    <span class="sidebar_text">Nhà cung cấp</span>
                            </a>
                            <a href="http://localhost/WebBanHangMoHinhMVC/admin/default/NhanVienPage" class="sidebar_link">
                                    <i class='bx bx-group sidebar_icon'></i>
                                    <span class="sidebar_text">Nhân viên</span>
                            </a>
                            <a href="http://localhost/WebBanHangMoHinhMVC/admin/default/KhachHangPage" class="sidebar_link">
                                    <i class='bx bx-user-circle sidebar_icon'></i>
                                    <span class="sidebar_text">Khách hàng</span>
                            </a>
                            <a href="http://localhost/WebBanHangMoHinhMVC/admin/default/KhuyenMaiPage" class="sidebar_link">
                                    <i class='bx bx-wallet sidebar_icon'></i>
                                    <span class="sidebar_text">Khuyến mãi</span>
                            </a>
                            <a href="http://localhost/WebBanHangMoHinhMVC/admin/default/HoaDonPage" class="sidebar_link">
                                    <i class='bx bx-money-withdraw sidebar_icon'></i>
                                    <span class="sidebar_text">Quản lý hoá đơn</span>
                            </a>
                            <a href="http://localhost/WebBanHangMoHinhMVC/admin/default/ThongKePage" class="sidebar_link">
                                    <i class='bx bx-bar-chart-alt-2 sidebar_icon'></i>
                                    <span class="sidebar_text">Thống kê</span>
                            </a>
                    </ul>
            </div>
    </div>
    <script>
            $(document).ready(function() {
                // loadSidebar();
            })

            function loadSidebar() {
                    var sidebbar = ``;
                    $.ajax({
                            url: "http://localhost/WebBanHangMoHinhMVC/AjaxChucNang/getSidebar",
                            type: "post",
                            dataType: "html",
                            success: function(data) {
                                    json = JSON.parse(data.trim());
                                    console.log(json); 
                                    var hrefDefault = "http://localhost/WebBanHangMoHinhMVC/admin/default/";
                                    var hrefMain ="";
                                    var icon = "";
                                    json.forEach(item => {
                                        switch(item){
                                                case 'Sản Phẩm': hrefMain = "SanPhamPage";
                                                icon = "bx bx-cart sidebar_icon";
                                                break;
                                                case 'Tài Khoản': hrefMain = "TaiKhoanPage";
                                                icon = 'bx bx-user sidebar_icon';
                                                break;
                                                case 'Nhóm Quyền': hrefMain = "NhomQuyenPage";
                                                break;
                                                case 'Chức Năng': hrefMain = "ChucNangPage";
                                                break;
                                                case 'Chi Tiết Quyền': hrefMain = "ChiTietQuyenPage";
                                                break;
                                                case 'Nhập Hàng': hrefMain = "NhapHangPage";
                                                icon ='bx bx-cart-add sidebar_icon';
                                                break;
                                                case 'Thương Hiệu': hrefMain = "ThuongHieuPage";
                                                break;
                                                case 'Thể Loại': hrefMain = "TheLoaiPage";
                                                break;
                                                case 'Chất Liệu': hrefMain = "ChatLieuPagePage";
                                                break;
                                                case 'Kích Cỡ': hrefMain = "KichCoPage";
                                                break;
                                                case 'Màu Sắc': hrefMain = "MauSacPage";
                                                break;
                                                case 'Nhà Cung Cấp': hrefMain = "NhaCungCapPage";
                                                icon = 'bx bx-task sidebar_icon';
                                                break;
                                                case 'Nhân Viên': hrefMain = "NhanVienPage";
                                                icon = 'bx bx-group sidebar_icon';
                                                break;
                                                case 'Khách Hàng': hrefMain = "KhachHangPage";
                                                icon = 'bx bx-user-circle sidebar_icon';
                                                break;
                                                case 'Khuyến Mãi': hrefMain = "KhuyenMaiPage";
                                                icon = 'bx bx-wallet sidebar_icon';
                                                break;
                                                case 'Hóa Đơn': hrefMain = "HoaDonPage";
                                                icon = 'bx bx-money-withdraw sidebar_icon';
                                                break;
                                                case 'Thống Kê': hrefMain = "ThongKePage";
                                                icon = 'bx bx-bar-chart-alt-2 sidebar_icon';
                                                break;
                                        }
                                        var href  = hrefDefault + hrefMain;
                                        sidebbar += `  <a href="`+href+`" class="sidebar_link">
                                    <i class='`+icon+`'></i>
                                    <span class="sidebar_text">`+item+`</span>
                            </a>`;
                                    }
                                
                                );
                            document.getElementsByClassName("sidebar_menu_list")[0].innerHTML =sidebbar

                            }


                    })
            }

            
    </script>
    <script src="/public/script/admin/sidebarPRO.js"></script>