-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 18, 2020 lúc 12:20 PM
-- Phiên bản máy phục vụ: 10.4.6-MariaDB
-- Phiên bản PHP: 7.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlyphongkham`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `benhnhan`
--

CREATE TABLE `benhnhan` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `sex` int(11) NOT NULL,
  `birthday` date NOT NULL,
  `phone` varchar(225) COLLATE utf8_vietnamese_ci NOT NULL,
  `cmnd` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `benhnhan`
--

INSERT INTO `benhnhan` (`id`, `name`, `sex`, `birthday`, `phone`, `cmnd`) VALUES
(1, 'Hồ Viết Hoàng', 1, '2019-08-08', '0359461686', 241621821),
(2, 'Hồ Thị Cẩm Thơ', 2, '2017-04-04', '0235946868', 241946456),
(3, 'Khủng Long bạo chúa', 2, '2019-04-10', '01234567875', 1234532123),
(4, 'Gao Đỏ', 1, '2020-03-03', '0765432345', 234565432),
(5, 'Siêu nhân Mảnh thú', 1, '2020-03-09', '012345654', 8765434),
(7, 'Cạn Văn', 1, '2020-03-02', '0123456875', 132615),
(9, 'Hết Văn', 1, '2020-03-02', '01234567875', 1234563),
(10, 'Nguyễn Văn Lá', 1, '2020-03-01', '0123451956', 12222),
(12, 'Kiều Thị Cẩm Thơ', 2, '1212-07-06', '0316497777', 23456765),
(16, 'Tỏng Tăng Tôn Nử', 2, '1996-03-04', '0629456126', 2147483647);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dichvu`
--

CREATE TABLE `dichvu` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `uudai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `dichvu`
--

INSERT INTO `dichvu` (`id`, `name`, `uudai`) VALUES
(1, 'Khám bệnh', 0),
(2, 'Thủ thuật', 50),
(3, 'Thuốc', 0),
(4, 'Kính', 30);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dichvucon`
--

CREATE TABLE `dichvucon` (
  `id` int(11) NOT NULL,
  `id_dichvu` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `donvitinh` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `giacuoi` int(11) NOT NULL,
  `uudai` text COLLATE utf8_vietnamese_ci NOT NULL,
  `gianhap` int(11) NOT NULL,
  `cachdung` text COLLATE utf8_vietnamese_ci NOT NULL,
  `soluong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `dichvucon`
--

INSERT INTO `dichvucon` (`id`, `id_dichvu`, `name`, `donvitinh`, `giacuoi`, `uudai`, `gianhap`, `cachdung`, `soluong`) VALUES
(1, 1, 'Khám bệnh tại phòng khám', '', 0, '', 0, '', 0),
(2, 1, 'Khám bệnh tại nhà', '', 700000, '', 0, '', 0),
(3, 2, 'Phẩu thuật', '', 500000, '', 0, '', 0),
(4, 2, 'Thẩm mỷ', '', 500000, '', 0, '', 0),
(5, 2, 'Khúc xạ', '', 500000, '', 0, '', 0),
(6, 3, 'Nước muối', 'chai', 12000, '', 5000, 'Uống luôn', 100),
(7, 3, 'Panadol', 'vỉ', 13000, '', 6000, 'Nuốt luôn', 6),
(8, 4, 'Kính đen', 'chiếc', 100000, '', 20000, 'Đeo lên mắt', 123),
(9, 4, 'Kính áp tròng', 'chiếc', 500000, '', 100000, 'Đeo lên mắt', 12);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donkham`
--

CREATE TABLE `donkham` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `ghichu` text COLLATE utf8_vietnamese_ci NOT NULL,
  `taikham` int(11) NOT NULL,
  `id_benhnhan` int(11) NOT NULL,
  `id_nhanvien` int(11) NOT NULL,
  `ngaykedon` datetime NOT NULL,
  `uudaitongdon` int(11) NOT NULL,
  `uudaidichvu` int(11) NOT NULL,
  `giatruocuudai` int(11) NOT NULL,
  `giacuoi` int(11) NOT NULL,
  `donmau` int(11) NOT NULL,
  `id_dichvucon` int(11) NOT NULL,
  `giadichvu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `donkham`
--

INSERT INTO `donkham` (`id`, `name`, `ghichu`, `taikham`, `id_benhnhan`, `id_nhanvien`, `ngaykedon`, `uudaitongdon`, `uudaidichvu`, `giatruocuudai`, `giacuoi`, `donmau`, `id_dichvucon`, `giadichvu`) VALUES
(138, 'viêm phổi', 'viêm phổi', 0, 16, 1, '2020-05-17 06:43:36', 55, 50, 1160000, 409500, 1, 3, 250000),
(139, 'Viêm phổi siêu cấp', 'Viêm phổi siêu cấp', 1, 9, 1, '2020-05-17 06:44:30', 0, 50, 1168000, 918000, 1, 5, 250000),
(140, 'Viêm phổi siêu cấp', 'ghjkl', 1, 16, 1, '2020-05-18 07:06:25', 0, 50, 1233000, 983000, 0, 3, 250000),
(141, 'm', '', 0, 16, 1, '2020-05-18 07:06:50', 0, 50, 1160000, 910000, 0, 3, 250000),
(142, 'Đau bụng', 'bị Đau bụng đó', 0, 16, 1, '2020-05-18 07:46:41', 10, 50, 525000, 247500, 1, 5, 250000),
(143, 'Tiêu chảy', '', 0, 10, 1, '2020-05-18 08:02:40', 14, 50, 1800000, 1333000, 1, 5, 250000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `password` text COLLATE utf8_vietnamese_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `quyen` int(11) NOT NULL,
  `sdt` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`id`, `name`, `password`, `fullname`, `quyen`, `sdt`, `status`) VALUES
(1, 'hoang', 'hoang', 'Hồ Viết Hoàng', 1, '0359461686', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thuoc_donkham`
--

CREATE TABLE `thuoc_donkham` (
  `id` int(11) NOT NULL,
  `id_donkham` int(11) NOT NULL,
  `id_thuoc` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `dongia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `thuoc_donkham`
--

INSERT INTO `thuoc_donkham` (`id`, `id_donkham`, `id_thuoc`, `soluong`, `dongia`) VALUES
(223, 138, 8, 1, 100000),
(224, 138, 6, 5, 12000),
(225, 138, 9, 1, 500000),
(226, 139, 6, 14, 12000),
(227, 139, 9, 1, 500000),
(228, 140, 6, 14, 12000),
(229, 140, 9, 1, 500000),
(230, 140, 7, 5, 13000),
(231, 141, 8, 1, 100000),
(232, 141, 6, 5, 12000),
(233, 141, 9, 1, 500000),
(234, 142, 7, 1, 13000),
(235, 142, 6, 1, 12000),
(236, 143, 7, 100, 13000);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `benhnhan`
--
ALTER TABLE `benhnhan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dichvu`
--
ALTER TABLE `dichvu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dichvucon`
--
ALTER TABLE `dichvucon`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `donkham`
--
ALTER TABLE `donkham`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `thuoc_donkham`
--
ALTER TABLE `thuoc_donkham`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `benhnhan`
--
ALTER TABLE `benhnhan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `dichvu`
--
ALTER TABLE `dichvu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `dichvucon`
--
ALTER TABLE `dichvucon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `donkham`
--
ALTER TABLE `donkham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `thuoc_donkham`
--
ALTER TABLE `thuoc_donkham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=237;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
