-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 08, 2021 lúc 11:19 AM
-- Phiên bản máy phục vụ: 10.4.19-MariaDB
-- Phiên bản PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `duan1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `cmtt_id` int(11) NOT NULL,
  `id_kh` int(11) NOT NULL,
  `id_sp` int(11) NOT NULL,
  `cmtt_nd` varchar(255) NOT NULL,
  `ngay_cmtt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`cmtt_id`, `id_kh`, `id_sp`, `cmtt_nd`, `ngay_cmtt`) VALUES
(3, 6, 5, 'ngon', '10-11-2021'),
(5, 6, 3, 'ngon', '18-11-2021'),
(8, 7, 4, 'ngon thế\r\n', '25-11-2021'),
(9, 8, 7, 'cho mình oder 1 suất', '03-12-2021'),
(10, 10, 3, 'ngon không', '03-12-2021');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danh_muc`
--

CREATE TABLE `danh_muc` (
  `iddm` int(11) NOT NULL,
  `name_cate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `danh_muc`
--

INSERT INTO `danh_muc` (`iddm`, `name_cate`) VALUES
(1, 'CÀ PHÊ VIỆT '),
(2, 'CÀ PHÊ Ý'),
(3, 'ĐIỂM TÂM'),
(4, 'NƯỚC ÉP-TRÀ'),
(5, 'SINH TỐ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoa_don`
--

CREATE TABLE `hoa_don` (
  `id` int(11) NOT NULL,
  `name_kh` varchar(255) NOT NULL,
  `dia_chi` varchar(255) NOT NULL,
  `sdt_kh` varchar(255) NOT NULL,
  `note` text DEFAULT NULL,
  `id_kh` int(11) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hoa_don`
--

INSERT INTO `hoa_don` (`id`, `name_kh`, `dia_chi`, `sdt_kh`, `note`, `id_kh`, `email`) VALUES
(8, 'Bảo Ninh', 'Toại Ninh', '0983416384', 'ship bao lâu ạ', 7, 'baoninh@gmail.com'),
(10, 'khôi', 'hà giang', '12323124124', 'hi', 6, 'khointph15388@fpt.edu.vn'),
(11, 'Tuân', 'Bắc Giang', '0983416384', 'tầm bao lâu mới có hàng', 9, 'tuan@gmail.com'),
(12, 'Bảo Ninh', 'Trung Hoa', '12323124124', 'heheheheh', 10, 'baoninh@gmail.com'),
(13, 'Ninh', 'Thái Bình', '0983416384', 'hehehehehe', 7, 'baoninh@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khanh_hang`
--

CREATE TABLE `khanh_hang` (
  `id_kh` int(11) NOT NULL,
  `ten_kh` varchar(255) NOT NULL,
  `sdt` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `anh` varchar(255) NOT NULL,
  `dia_chi` varchar(255) NOT NULL,
  `mk` int(11) NOT NULL,
  `kich_hoat` int(11) NOT NULL DEFAULT 1,
  `quyen` int(11) NOT NULL DEFAULT 2,
  `gioi_tinh` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `khanh_hang`
--

INSERT INTO `khanh_hang` (`id_kh`, `ten_kh`, `sdt`, `email`, `anh`, `dia_chi`, `mk`, `kich_hoat`, `quyen`, `gioi_tinh`) VALUES
(5, 'Nguyễn Trần Khôi', '0983416384', 'khoiadmin@gmail.com', '', 'Hà Giang', 123456789, 1, 1, 1),
(6, 'Cúc Tịnh Y', '234241312', 'cuctinhy@gmail.com', 'cuctinhymotmauphimmonamchi4-70.png', 'Toại Ninh, Tứ Xuyên', 12345, 1, 2, 1),
(7, 'Khương Bảo Ninh', '09834163124', 'baoninh@gmail.com', '1537_2.jpg', 'Toại Ninh, Tứ Xuyên, Trung Quốc', 12345, 1, 2, 1),
(8, 'Lý Khiêm', '0983417342', 'lykhiem@gmail.com', 'tải xuống.jfif', 'Trung Quốc', 12345, 1, 2, 1),
(9, 'Lê Văn Tuân', '09876544312', 'tuan@gmail.com', '151005635_1337358523309967_1701712585753219712_n.jpg', 'Bắc Giang', 12345, 1, 2, 1),
(10, 'Bảo Ninh', '1312314124', 'ninh@gmail.com', 'c1ab7d39-af2d-4b9b-b30b-b210a79212da.jpg', 'Trung Hoa', 12345, 1, 2, 2),
(11, 'Nguyễn Ngọc Dương', '0983417364', 'duongnnph15477@fpt.edu.vn\r\n', '', 'Bắc Giang', 12345, 1, 1, 1),
(12, 'Lê Viết Thi', '0987334176', 'thilvph18070@fpt.edu.vn', '', 'Thanh Hoá', 12345, 1, 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `san_pham`
--

CREATE TABLE `san_pham` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `img` varchar(255) NOT NULL,
  `trang_thai` int(11) NOT NULL DEFAULT 0,
  `iddm` int(11) NOT NULL,
  `name_phu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `san_pham`
--

INSERT INTO `san_pham` (`id`, `name`, `price`, `img`, `trang_thai`, `iddm`, `name_phu`) VALUES
(2, 'SINH TỐ CHUỐI', 25000, 'SINH-TO-CHUÓI-25k-300x300.jpg', 0, 5, 'SINH TỐ'),
(3, 'SINH TỐ MÃNG CẦU', 25000, 'SINH-TO-MANG-CAU-25k-300x300.jpg', 0, 5, 'SINH TỐ'),
(4, 'SINH TỐ SAPOCHE', 25000, 'SINH-TO-SAPOCHE-25k-300x300.jpg', 0, 5, 'SINH TỐ'),
(5, 'SINH TỐ BƠ', 25000, 'SINH-TO-BO-25k-300x300.jpg', 0, 5, 'SINH TỐ'),
(6, 'BÁNH CANH CHẢ CUA', 30000, 'BANH-CANH-CHA-CUA-30k-300x300 (1).jpg', 0, 3, 'BÁNH CANH CHẢ CUA'),
(7, 'BÁNH MÌ ỐP LA', 15000, 'bánh-mì-ốp-la-15k-300x300.jpg', 0, 3, 'BÁNH MÌ ỐP LA'),
(8, 'BÁNH MÌ BÒ KHO', 30000, 'BÁNH-MỲ-BÒ-KHO-30k-300x300.jpg', 0, 3, 'BÁNH MÌ ỐP LA'),
(9, 'BÚN BÒ HUẾ', 30000, 'BÚN-BÒ-HUE-30k-300x300.jpg', 0, 3, 'BÚN BÒ HUẾ'),
(10, 'BẠC XỈU', 18000, 'bacsiu.jpg', 0, 1, 'BẠC XỈU/ CÀ PHÊ SỮA TƯƠI'),
(12, 'CA CAO ĐÁ/NÓNG', 18000, 'cacao.jpg', 0, 5, 'CA CAO ĐÁ/NÓNG'),
(13, 'CÀ PHÊ ĐEN ĐÁ/NÓNG', 15000, 'sp8.jpg', 0, 1, 'CÀ PHÊ ĐEN ĐÁ/NÓNG'),
(14, 'CÀ PHÊ SỮA ĐÁ/NÓNG', 18000, 'sp7.jpg', 0, 1, 'CÀ PHÊ SỮA ĐÁ/NÓNG'),
(15, 'CAMPUCHINO', 25000, 'capuchino-25k-300x300.jpg', 0, 5, 'CÀ PHÊ Ý'),
(16, 'CHOCOLATE ĐÁ XAY', 30000, 'sp6.jpg', 0, 5, 'CÀ PHÊ Ý'),
(17, 'COFFEE ĐÁ XAY', 30000, 'sp5.jpg', 1, 5, 'CÀ PHÊ Ý'),
(19, 'ESPRESSO', 25000, 'ESPRESSO-25k-300x300 (1).jpg', 1, 5, 'CÀ PHÊ Ý'),
(21, 'NƯỚC ÉP CÀ RỐT', 20000, 'nước-cà-rốt-20k-300x300.jpg', 0, 4, 'NƯỚC ÉP CÀ RỐT'),
(22, 'NƯỚC CAM', 20000, 'nước-cam-20k-300x300.jpg', 0, 4, 'NƯỚC CAM'),
(23, 'NƯỚC ÉP BƯỞI', 20000, 'nước-ép-bưởi-20k-300x300.jpg', 0, 4, 'NƯỚC ÉP BƯỞI'),
(24, 'NƯỚC ÉP ỔI', 20000, 'nước-ép-ổi-20k-300x300.jpg', 0, 4, 'NƯỚC ÉP ỔI'),
(25, 'SODA CHANH DÂY', 20000, 'soda-chanh-dây-20k-300x300.jpg', 0, 4, 'NƯỚC ÉP-TRÀ'),
(26, 'SODA CHANH TƯƠI', 20000, 'soda-chanh-tươi-20k-300x300.jpg', 0, 4, 'NƯỚC ÉP-TRÀ'),
(27, 'SỮA TƯƠI THẠCH TRÁI CÂY', 20000, 'sữa-tươi-thạch-trái-cây-20k-300x300.jpg', 0, 4, 'NƯỚC ÉP-TRÀ');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`cmtt_id`),
  ADD KEY `fk_kh` (`id_kh`),
  ADD KEY `fk_sp` (`id_sp`);

--
-- Chỉ mục cho bảng `danh_muc`
--
ALTER TABLE `danh_muc`
  ADD PRIMARY KEY (`iddm`);

--
-- Chỉ mục cho bảng `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lk_khanhhang` (`id_kh`);

--
-- Chỉ mục cho bảng `khanh_hang`
--
ALTER TABLE `khanh_hang`
  ADD PRIMARY KEY (`id_kh`);

--
-- Chỉ mục cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lk_sanpham_danhmuc` (`iddm`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `cmtt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `danh_muc`
--
ALTER TABLE `danh_muc`
  MODIFY `iddm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `hoa_don`
--
ALTER TABLE `hoa_don`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `khanh_hang`
--
ALTER TABLE `khanh_hang`
  MODIFY `id_kh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_kh` FOREIGN KEY (`id_kh`) REFERENCES `khanh_hang` (`id_kh`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sp` FOREIGN KEY (`id_sp`) REFERENCES `san_pham` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD CONSTRAINT `lk_khanhhang` FOREIGN KEY (`id_kh`) REFERENCES `khanh_hang` (`id_kh`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  ADD CONSTRAINT `lk_sanpham_danhmuc` FOREIGN KEY (`iddm`) REFERENCES `danh_muc` (`iddm`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
