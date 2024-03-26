-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 26, 2024 lúc 10:02 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `webbanhang2`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chatlieu`
--

CREATE TABLE `chatlieu` (
  `MaChatLieu` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `TenChatLieu` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `TrangThai` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chatlieu`
--

INSERT INTO `chatlieu` (`MaChatLieu`, `TenChatLieu`, `TrangThai`) VALUES
('CL1', 'Vải sơ mi', 1),
('CL2', 'Vải cotton', 1),
('CL3', 'Vải kaki', 1),
('CL4', 'Vải jean', 1),
('CL5', 'Vải len', 1),
('CL6', 'Vải da', 1),
('CL7', 'Vải dù', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `MaHoaDon` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `MaChiTietSanPham` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `GiaSanPham` float NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `ThanhTien` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietphieunhap`
--

CREATE TABLE `chitietphieunhap` (
  `MaPhieuNhap` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `MaChiTietSanPham` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `DonViNhap` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `ThanhTien` float NOT NULL,
  `TienNhap` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietphieutra`
--

CREATE TABLE `chitietphieutra` (
  `MaPhieuTra` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `MaChiTietSanPham` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `LyDoTra` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `ThanhTien` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietquyen`
--

CREATE TABLE `chitietquyen` (
  `Id` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `MaNhomQuyen` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `MaChucNang` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `HanhDong` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietquyen`
--

INSERT INTO `chitietquyen` (`Id`, `MaNhomQuyen`, `MaChucNang`, `HanhDong`) VALUES
('CN001', 'QA01', 'ADD', 'Thêm nhân viên'),
('CN002', 'QA01', 'EDIT', 'Chỉnh sửa nhân viên');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietsanpham`
--

CREATE TABLE `chitietsanpham` (
  `MaChiTietSanPham` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `MaSanPham` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `MaMauSac` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `MaKichCo` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `HinhAnh` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `SoLuongNhap` int(11) NOT NULL,
  `SoLuongTon` int(11) NOT NULL,
  `TrangThai` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chucnang`
--

CREATE TABLE `chucnang` (
  `MaChucNang` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `TenChucNang` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `TrangThai` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chucnang`
--

INSERT INTO `chucnang` (`MaChucNang`, `TenChucNang`, `TrangThai`) VALUES
('ADD', 'Thêm', 1),
('DELETE', 'Xoá', 1),
('EDIT', 'Chỉnh Sửa', 1),
('READ', 'Xem', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chungloai`
--

CREATE TABLE `chungloai` (
  `MaChungLoai` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `TenChungLoai` varchar(200) NOT NULL,
  `TrangThai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chungloai`
--

INSERT INTO `chungloai` (`MaChungLoai`, `TenChungLoai`, `TrangThai`) VALUES
('A', 'Áo Nam', 1),
('GD', 'Giày Dép', 1),
('PK', 'Phụ Kiện', 1),
('Q', 'Quần Nam', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `MaChiTietSanPham` int(11) NOT NULL,
  `MaKhachHang` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `Trangthai` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `MaHoaDon` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `TenHoaDon` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `NgayLap` date NOT NULL,
  `TongTien` float NOT NULL,
  `HinhThucThanhToan` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `MaThue` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `MaKhachHang` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `MaKhuyenMai` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `MaNhanVien` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `TrangThai` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`MaHoaDon`, `TenHoaDon`, `NgayLap`, `TongTien`, `HinhThucThanhToan`, `MaThue`, `MaKhachHang`, `MaKhuyenMai`, `MaNhanVien`, `TrangThai`) VALUES
('HD001', 'Hoá đơn 1', '2024-03-20', 500000, 'Trả trực tiếp', 'MT02', 'KH003', 'KM001', 'NV003', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `MaKhachHang` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `TenKhachHang` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `SoDienThoai` int(200) NOT NULL,
  `GioiTinh` varchar(200) NOT NULL,
  `TrangThai` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`MaKhachHang`, `TenKhachHang`, `SoDienThoai`, `GioiTinh`, `TrangThai`) VALUES
('KH001', 'Hồng Mai Trinh', 341978630, 'Nữ', 1),
('KH002', 'Đỗ Trí Minh', 987369410, 'Nam', 1),
('KH003', 'Nguyễn Minh Nhi', 998574362, 'Nữ', 1),
('KH004', 'Lê Quỳnh Nhung', 564915206, 'Nữ', 1),
('KH005', 'Đỗ Tâm Như', 840864192, 'Nữ', 1),
('KH006', 'Lê Thuỵ Long', 818754601, 'Nam', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khuyenmai`
--

CREATE TABLE `khuyenmai` (
  `MaKhuyenMai` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `TenKhuyenMai` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `MucKhuyenMai` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `NgayBatDau` date NOT NULL,
  `NgayKetThuc` date NOT NULL,
  `TrangThai` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khuyenmai`
--

INSERT INTO `khuyenmai` (`MaKhuyenMai`, `TenKhuyenMai`, `MucKhuyenMai`, `NgayBatDau`, `NgayKetThuc`, `TrangThai`) VALUES
('KM001', 'Khuyến mãi mùa hè', '10%', '2024-03-01', '2024-03-20', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kichco`
--

CREATE TABLE `kichco` (
  `MaKichCo` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `TenKichCo` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `TrangThai` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `kichco`
--

INSERT INTO `kichco` (`MaKichCo`, `TenKichCo`, `TrangThai`) VALUES
('KC1', 'Size L', 1),
('KC2', 'Size S', 1),
('KC3', 'Size M', 1),
('KC4', 'Size XL', 1),
('KC5', 'Size XXL', 1),
('KC6', 'Size XXXL', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mausac`
--

CREATE TABLE `mausac` (
  `MaMauSac` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `TenMauSac` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `TrangThai` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `mausac`
--

INSERT INTO `mausac` (`MaMauSac`, `TenMauSac`, `TrangThai`) VALUES
('MS1', 'Đen', 1),
('MS2', 'Trắng', 1),
('MS3', 'Xanh đậm', 1),
('MS4', 'Xám bạc', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhacungcap`
--

CREATE TABLE `nhacungcap` (
  `MaNhaCungCap` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `TenNhaCungCap` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `SoDienThoai` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `DiaChi` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `TrangThai` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhacungcap`
--

INSERT INTO `nhacungcap` (`MaNhaCungCap`, `TenNhaCungCap`, `SoDienThoai`, `DiaChi`, `TrangThai`) VALUES
('NCC001', 'Hoàng Ngọc', '0902928788', 'TP.Hồ Chí Minh', 1),
('NCC002', 'Phú Thịnh', '0283865056', 'TP.Hồ Chí Minh', 1),
('NCC003', 'An Dương', '0243641589', 'Hà Nội', 1),
('NCC004', 'Tân Phạm Gia', '0986452221', 'TP.Hồ Chí Minh', 1),
('NCC005', 'Việt Hùng', '0283918372', 'TP.Hồ Chí Minh', 1),
('NCC006', 'Delta Vina', '0909324068', 'TP.Hồ Chí Minh', 1),
('NCC007', 'HAZZA', '0286682897', 'TP.Hồ Chí Minh', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MaNhanVien` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `TenNhanVien` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `SoDienThoai` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `CCCD` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Tuoi` int(200) NOT NULL,
  `TrangThai` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`MaNhanVien`, `TenNhanVien`, `SoDienThoai`, `CCCD`, `Tuoi`, `TrangThai`) VALUES
('NV001', 'Nguyễn Công Đức', '0368166473', '079203112141', 20, 1),
('NV002', 'Trần Quang Trường', '0367899271', '079203685741', 20, 1),
('NV003', 'Phan Duy Cửu', '0371466203', '079203578413', 20, 1),
('NV004', 'Nguyễn Quang Hà', '0379477271', '079203478513', 20, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhomquyen`
--

CREATE TABLE `nhomquyen` (
  `MaNhomQuyen` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `TenNhomQuyen` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `TrangThai` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhomquyen`
--

INSERT INTO `nhomquyen` (`MaNhomQuyen`, `TenNhomQuyen`, `TrangThai`) VALUES
('QA01', 'Quyền Admin', 1),
('QK001', 'Quyền khách hàng', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieunhap`
--

CREATE TABLE `phieunhap` (
  `MaPhieuNhap` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `TenPhieuNhap` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `NgayNhap` date NOT NULL,
  `TongTien` float NOT NULL,
  `MaNhaCungCap` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `MaNhanVien` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `TrangThai` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phieunhap`
--

INSERT INTO `phieunhap` (`MaPhieuNhap`, `TenPhieuNhap`, `NgayNhap`, `TongTien`, `MaNhaCungCap`, `MaNhanVien`, `TrangThai`) VALUES
('PN01', 'Phiếu nhập 1', '2024-03-05', 500000, 'NCC002', 'NV001', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieutra`
--

CREATE TABLE `phieutra` (
  `MaPhieuTra` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `MaNhanVien` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `MaHoaDon` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `NgayTra` date NOT NULL,
  `TongSoLuong` int(11) NOT NULL,
  `TongTienTra` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phieutra`
--

INSERT INTO `phieutra` (`MaPhieuTra`, `MaNhanVien`, `MaHoaDon`, `NgayTra`, `TongSoLuong`, `TongTienTra`) VALUES
('PT001', 'NV001', 'HD001', '2024-03-12', 10, 10000),
('PT002', 'NV001', 'HD001', '2024-03-12', 10, 10000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `MaSanPham` varchar(50) NOT NULL,
  `MaTheLoai` varchar(200) NOT NULL,
  `TenSanPham` varchar(200) NOT NULL,
  `GiaSanPham` float NOT NULL,
  `SoLuongTon` int(11) NOT NULL,
  `SoLuongNhap` int(11) NOT NULL,
  `GiaNhap` float NOT NULL,
  `TongTienNhap` float NOT NULL,
  `MaChatLieu` varchar(50) NOT NULL,
  `MaThuongHieu` varchar(50) NOT NULL,
  `TrangThai` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `MaTaiKhoan` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `MaNguoiDung` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `MatKhau` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `MaNhomQuyen` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `TrangThai` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `theloai`
--

CREATE TABLE `theloai` (
  `MaTheLoai` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `MaChungLoai` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `TenTheLoai` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `TrangThai` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `theloai`
--

INSERT INTO `theloai` (`MaTheLoai`, `MaChungLoai`, `TenTheLoai`, `TrangThai`) VALUES
('AK', 'A', 'Áo Khoác', 1),
('APL', 'A', 'Áo Polo', 1),
('ASM', 'A', 'Áo sơ mi', 1),
('AT', 'A', 'Áo Thun', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thue`
--

CREATE TABLE `thue` (
  `MaThue` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `MucThue` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `TenThue` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Trangthai` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thue`
--

INSERT INTO `thue` (`MaThue`, `MucThue`, `TenThue`, `Trangthai`) VALUES
('MT01', '20%', 'Thuế nhập khẩu', 1),
('MT02', '8%', 'Thuế giá trị gia tăng VAT', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thuonghieu`
--

CREATE TABLE `thuonghieu` (
  `MaThuongHieu` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `TenThuongHieu` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `TrangThai` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thuonghieu`
--

INSERT INTO `thuonghieu` (`MaThuongHieu`, `TenThuongHieu`, `TrangThai`) VALUES
('TH001', '4MEN', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chatlieu`
--
ALTER TABLE `chatlieu`
  ADD PRIMARY KEY (`MaChatLieu`);

--
-- Chỉ mục cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD PRIMARY KEY (`MaHoaDon`,`MaChiTietSanPham`),
  ADD KEY `MaChiTietSanPham` (`MaChiTietSanPham`);

--
-- Chỉ mục cho bảng `chitietphieunhap`
--
ALTER TABLE `chitietphieunhap`
  ADD PRIMARY KEY (`MaPhieuNhap`),
  ADD KEY `MaChiTietSanPham` (`MaChiTietSanPham`);

--
-- Chỉ mục cho bảng `chitietphieutra`
--
ALTER TABLE `chitietphieutra`
  ADD PRIMARY KEY (`MaPhieuTra`,`MaChiTietSanPham`),
  ADD KEY `MaChiTietSanPham` (`MaChiTietSanPham`);

--
-- Chỉ mục cho bảng `chitietquyen`
--
ALTER TABLE `chitietquyen`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `MaChucNang` (`MaChucNang`),
  ADD KEY `MaNhomQuyen` (`MaNhomQuyen`);

--
-- Chỉ mục cho bảng `chitietsanpham`
--
ALTER TABLE `chitietsanpham`
  ADD PRIMARY KEY (`MaChiTietSanPham`),
  ADD KEY `MaSanPham` (`MaSanPham`),
  ADD KEY `MaKichCo` (`MaKichCo`),
  ADD KEY `MaMauSac` (`MaMauSac`);

--
-- Chỉ mục cho bảng `chucnang`
--
ALTER TABLE `chucnang`
  ADD PRIMARY KEY (`MaChucNang`);

--
-- Chỉ mục cho bảng `chungloai`
--
ALTER TABLE `chungloai`
  ADD PRIMARY KEY (`MaChungLoai`);

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`MaChiTietSanPham`,`MaKhachHang`),
  ADD KEY `MaKhachHang` (`MaKhachHang`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`MaHoaDon`),
  ADD KEY `MaKhachHang` (`MaKhachHang`),
  ADD KEY `MaKhuyenMai` (`MaKhuyenMai`),
  ADD KEY `MaThue` (`MaThue`),
  ADD KEY `MaNhanVien` (`MaNhanVien`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MaKhachHang`);

--
-- Chỉ mục cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD PRIMARY KEY (`MaKhuyenMai`);

--
-- Chỉ mục cho bảng `kichco`
--
ALTER TABLE `kichco`
  ADD PRIMARY KEY (`MaKichCo`);

--
-- Chỉ mục cho bảng `mausac`
--
ALTER TABLE `mausac`
  ADD PRIMARY KEY (`MaMauSac`);

--
-- Chỉ mục cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  ADD PRIMARY KEY (`MaNhaCungCap`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MaNhanVien`);

--
-- Chỉ mục cho bảng `nhomquyen`
--
ALTER TABLE `nhomquyen`
  ADD PRIMARY KEY (`MaNhomQuyen`);

--
-- Chỉ mục cho bảng `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD PRIMARY KEY (`MaPhieuNhap`),
  ADD KEY `MaNhanVien` (`MaNhanVien`),
  ADD KEY `MaNhaCungCap` (`MaNhaCungCap`);

--
-- Chỉ mục cho bảng `phieutra`
--
ALTER TABLE `phieutra`
  ADD PRIMARY KEY (`MaPhieuTra`),
  ADD KEY `MaHoaDon` (`MaHoaDon`),
  ADD KEY `MaNhanVien` (`MaNhanVien`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MaSanPham`),
  ADD KEY `MaChatLieu` (`MaChatLieu`),
  ADD KEY `MaThuongHieu` (`MaThuongHieu`),
  ADD KEY `MaTheLoai` (`MaTheLoai`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`MaTaiKhoan`),
  ADD KEY `MaNhomQuyen` (`MaNhomQuyen`),
  ADD KEY `MaNguoiDung` (`MaNguoiDung`);

--
-- Chỉ mục cho bảng `theloai`
--
ALTER TABLE `theloai`
  ADD PRIMARY KEY (`MaTheLoai`),
  ADD KEY `MaChungLoai` (`MaChungLoai`);

--
-- Chỉ mục cho bảng `thue`
--
ALTER TABLE `thue`
  ADD PRIMARY KEY (`MaThue`);

--
-- Chỉ mục cho bảng `thuonghieu`
--
ALTER TABLE `thuonghieu`
  ADD PRIMARY KEY (`MaThuongHieu`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD CONSTRAINT `chitiethoadon_ibfk_1` FOREIGN KEY (`MaHoaDon`) REFERENCES `hoadon` (`MaHoaDon`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chitiethoadon_ibfk_2` FOREIGN KEY (`MaChiTietSanPham`) REFERENCES `chitietsanpham` (`MaChiTietSanPham`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `chitietphieunhap`
--
ALTER TABLE `chitietphieunhap`
  ADD CONSTRAINT `chitietphieunhap_ibfk_1` FOREIGN KEY (`MaPhieuNhap`) REFERENCES `phieunhap` (`MaPhieuNhap`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chitietphieunhap_ibfk_2` FOREIGN KEY (`MaChiTietSanPham`) REFERENCES `chitietsanpham` (`MaChiTietSanPham`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `chitietphieutra`
--
ALTER TABLE `chitietphieutra`
  ADD CONSTRAINT `chitietphieutra_ibfk_1` FOREIGN KEY (`MaChiTietSanPham`) REFERENCES `chitietsanpham` (`MaChiTietSanPham`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chitietphieutra_ibfk_2` FOREIGN KEY (`MaPhieuTra`) REFERENCES `phieutra` (`MaPhieuTra`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `chitietquyen`
--
ALTER TABLE `chitietquyen`
  ADD CONSTRAINT `chitietquyen_ibfk_1` FOREIGN KEY (`MaChucNang`) REFERENCES `chucnang` (`MaChucNang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chitietquyen_ibfk_2` FOREIGN KEY (`MaNhomQuyen`) REFERENCES `nhomquyen` (`MaNhomQuyen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `chitietsanpham`
--
ALTER TABLE `chitietsanpham`
  ADD CONSTRAINT `chitietsanpham_ibfk_1` FOREIGN KEY (`MaSanPham`) REFERENCES `sanpham` (`MaSanPham`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chitietsanpham_ibfk_2` FOREIGN KEY (`MaKichCo`) REFERENCES `kichco` (`MaKichCo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chitietsanpham_ibfk_3` FOREIGN KEY (`MaMauSac`) REFERENCES `mausac` (`MaMauSac`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`MaKhachHang`) REFERENCES `khachhang` (`MaKhachHang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hoadon_ibfk_2` FOREIGN KEY (`MaKhuyenMai`) REFERENCES `khuyenmai` (`MaKhuyenMai`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hoadon_ibfk_3` FOREIGN KEY (`MaThue`) REFERENCES `thue` (`MaThue`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hoadon_ibfk_4` FOREIGN KEY (`MaNhanVien`) REFERENCES `nhanvien` (`MaNhanVien`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD CONSTRAINT `phieunhap_ibfk_1` FOREIGN KEY (`MaNhanVien`) REFERENCES `nhanvien` (`MaNhanVien`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `phieunhap_ibfk_2` FOREIGN KEY (`MaNhaCungCap`) REFERENCES `nhacungcap` (`MaNhaCungCap`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `phieutra`
--
ALTER TABLE `phieutra`
  ADD CONSTRAINT `phieutra_ibfk_1` FOREIGN KEY (`MaHoaDon`) REFERENCES `hoadon` (`MaHoaDon`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `phieutra_ibfk_2` FOREIGN KEY (`MaNhanVien`) REFERENCES `nhanvien` (`MaNhanVien`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`MaChatLieu`) REFERENCES `chatlieu` (`MaChatLieu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sanpham_ibfk_3` FOREIGN KEY (`MaThuongHieu`) REFERENCES `thuonghieu` (`MaThuongHieu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sanpham_ibfk_4` FOREIGN KEY (`MaTheLoai`) REFERENCES `theloai` (`MaTheLoai`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD CONSTRAINT `taikhoan_ibfk_1` FOREIGN KEY (`MaNhomQuyen`) REFERENCES `nhomquyen` (`MaNhomQuyen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `taikhoan_ibfk_2` FOREIGN KEY (`MaNguoiDung`) REFERENCES `khachhang` (`MaKhachHang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `taikhoan_ibfk_3` FOREIGN KEY (`MaNguoiDung`) REFERENCES `nhanvien` (`MaNhanVien`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `theloai`
--
ALTER TABLE `theloai`
  ADD CONSTRAINT `theloai_ibfk_1` FOREIGN KEY (`MaChungLoai`) REFERENCES `chungloai` (`MaChungLoai`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
