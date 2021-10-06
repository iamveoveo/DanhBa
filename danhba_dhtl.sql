-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 06, 2021 lúc 02:00 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `danhba_dhtl`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_nguoidung`
--

CREATE TABLE `db_nguoidung` (
  `userid` mediumint(6) UNSIGNED NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` char(60) NOT NULL,
  `registration_date` datetime NOT NULL DEFAULT current_timestamp(),
  `user_level` tinyint(1) NOT NULL DEFAULT 0,
  `STATUS` tinyint(1) DEFAULT 0,
  `code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `db_nguoidung`
--

INSERT INTO `db_nguoidung` (`userid`, `name`, `email`, `password`, `registration_date`, `user_level`, `STATUS`, `code`) VALUES
(20, 'Rosoft', 'miker@myisp.com', '$2y$10$VWtLxXTE1ohO1pQJ87tnGeBB1MNfkQ3V87/HIGdanmKhqflRIQEH2', '2018-05-17 17:33:49', 0, 0, 0),
(21, 'Branch', 'obranch@myisp.com.uk', '$2y$10$aAdvrMiVcEFqRn9ISLoy6uEwS.FesiTQZ.IdsHGc/xSi2x.wkuaZ2', '2018-05-17 17:35:21', 0, 0, 0),
(22, 'Insence', 'finsence@myisp.net', '$2y$10$0WbSaI3w.9KjkE28L7ZeN.jEPKvsPLIwRg01M6XkRtWvZkOWaT3R6', '2018-05-17 17:36:46', 0, 0, 0),
(23, 'Versary', 'aversary@myisp.com', '$2y$10$HpUHsg0yoIy08d4./p/tM.ZLOnZ3RLGTb7YjqMEuzwb2yBpEguB9O', '2018-05-17 17:37:47', 0, 0, 0),
(24, 'Fide', 'tfide@myisp.de', '$2y$10$Gh0nTJPXxUkZAKCkOeVC8O8jv3rJ6ZLXrEJ8szvgqDgBxb1F8uVSa', '2018-05-17 17:54:39', 0, 0, 0),
(25, 'Bush', 'rbush@myisp.co.uk', '$2y$10$cASUiiV3w3cKWoaxH0tfmeV7IwXy2fUNJT6lQIdBbUZePmtPY/Wo2', '2018-05-17 17:55:38', 0, 0, 0),
(26, 'Smith', 'jsmith@myisp.co.uk', '$2y$10$pp/Gv2tvaTUlfPKVRb/tSu/25N7mhvj7h2ybRANEvS.I2xg/99wM6', '2018-05-17 17:57:11', 0, 0, 0),
(27, 'Smith', 'jsmith@outcook.com', '$2y$10$GXDlk.GkgdWmPRTUDCb.F.kqD.8dwkH93s0p/g1f0fnK27Z849Ry2', '2018-05-17 17:58:14', 1, 0, 0),
(46, 'Đỗ Thị Ngọc Ánh', 'doanh0712@gmail.com', '$2y$10$BDjC9sngCFoqKoZrJLAjBeQpX7nY5X5vFnbujtP0CBivA1jrGVITm', '2021-10-04 09:08:10', 0, 1, 0),
(60, 'Đặng Quang Vinh', 'vinhveoveo21@gmail.com', '$2y$10$OlOTvlkvPgOKUsIWgsSJmeJxTsU6P5TaS.6r1jgBZXn2GJNXj1WdW', '2021-10-06 18:49:33', 0, 1, 1038688012);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `db_nhanvien`
--

CREATE TABLE `db_nhanvien` (
  `tennv` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chucvu` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mayban` varchar(13) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sodidong` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `madv` int(10) UNSIGNED NOT NULL,
  `manv` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `db_nhanvien`
--

INSERT INTO `db_nhanvien` (`tennv`, `chucvu`, `mayban`, `email`, `sodidong`, `madv`, `manv`) VALUES
('Đặng Quang Vinh', 'Trưởng Khoa', '03345288', 'vinhveoveo21@gmail.com', '0338873927', 7, 1),
('Kiều Tuấn Dũng', 'Giảng viên', NULL, 'dungkt@tlu.edu.vn', '0868600513', 10, 2),
('Nguyễn Văn A', 'Giảng viên', '', 'user@gmail.com', '0334 455 1', 10, 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donvi`
--

CREATE TABLE `donvi` (
  `MaDV` int(10) UNSIGNED NOT NULL,
  `TenDV` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DiaChi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Website` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DienThoai` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MaDV_Cha` int(10) UNSIGNED DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `donvi`
--

INSERT INTO `donvi` (`MaDV`, `TenDV`, `DiaChi`, `Email`, `Website`, `DienThoai`, `MaDV_Cha`) VALUES
(7, 'Khoa CNTT', 'Nhà C1, Trường ĐHTL', 'vpkcntt@tlu.edu.vn', 'cse.tlu.edu.vn', '02433555599', NULL),
(8, 'Khoa Kinh Tế', 'Nhà B1, Trường ĐHTL', 'vpkkt@tlu.edu.vn', 'kt.tlu.edu.vn', '02433555599', NULL),
(9, 'Khoa Cơ khí', 'Nhà B2, Trường ĐHTL', 'vpkck@tlu.edu.vn', 'cke.tlu.edu.vn', '02433555599', NULL),
(10, 'Bộ môn HTT', 'Nhà C1, Trường ĐHTL', 'vpkcntt@tlu.edu.vn', 'cse.tlu.edu.vn', '02433555599', 7);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `db_nguoidung`
--
ALTER TABLE `db_nguoidung`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `unique_email` (`email`);

--
-- Chỉ mục cho bảng `db_nhanvien`
--
ALTER TABLE `db_nhanvien`
  ADD PRIMARY KEY (`manv`),
  ADD KEY `manv` (`manv`),
  ADD KEY `manv_2` (`manv`);

--
-- Chỉ mục cho bảng `donvi`
--
ALTER TABLE `donvi`
  ADD PRIMARY KEY (`MaDV`),
  ADD KEY `MaDV_Cha` (`MaDV_Cha`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `db_nguoidung`
--
ALTER TABLE `db_nguoidung`
  MODIFY `userid` mediumint(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT cho bảng `db_nhanvien`
--
ALTER TABLE `db_nhanvien`
  MODIFY `manv` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `donvi`
--
ALTER TABLE `donvi`
  MODIFY `MaDV` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `donvi`
--
ALTER TABLE `donvi`
  ADD CONSTRAINT `donvi_ibfk_1` FOREIGN KEY (`MaDV_Cha`) REFERENCES `donvi` (`MaDV`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
