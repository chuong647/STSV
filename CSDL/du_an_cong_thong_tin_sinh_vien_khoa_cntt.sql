-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th1 17, 2022 lúc 04:43 AM
-- Phiên bản máy phục vụ: 5.7.31
-- Phiên bản PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `du_an_cong_thong_tin_sinh_vien_khoa_cntt`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chuong_trinh`
--

DROP TABLE IF EXISTS `chuong_trinh`;
CREATE TABLE IF NOT EXISTS `chuong_trinh` (
  `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `MaKhoaHoc` varchar(5) DEFAULT NULL,
  `MaHocPhan` varchar(15) DEFAULT NULL,
  `NamHoc` text,
  `HocKy` tinytext,
  PRIMARY KEY (`ID`),
  KEY `MaKhoaHoc` (`MaKhoaHoc`),
  KEY `MaHocPhan` (`MaHocPhan`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chuong_trinh`
--

INSERT INTO `chuong_trinh` (`ID`, `MaKhoaHoc`, `MaHocPhan`, `NamHoc`, `HocKy`) VALUES
(1, 'K42', '1120004', '2019', '1'),
(2, 'K42', '1010245', '2019', '3');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dang_ky_hoat_dong`
--

DROP TABLE IF EXISTS `dang_ky_hoat_dong`;
CREATE TABLE IF NOT EXISTS `dang_ky_hoat_dong` (
  `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `MaSinhVien` varchar(10) NOT NULL,
  `MaHoatDong` varchar(20) NOT NULL,
  `ThamGiaHD` tinytext,
  PRIMARY KEY (`ID`,`MaSinhVien`,`MaHoatDong`) USING BTREE,
  KEY `MaSinhVien` (`MaSinhVien`),
  KEY `MaHoatDong` (`MaHoatDong`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `dang_ky_hoat_dong`
--

INSERT INTO `dang_ky_hoat_dong` (`ID`, `MaSinhVien`, `MaHoatDong`, `ThamGiaHD`) VALUES
(4, '4251050004', 'HD01', 'Không'),
(7, '4251050004', 'HD07', 'Tham gia');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dang_ky_lop_hp`
--

DROP TABLE IF EXISTS `dang_ky_lop_hp`;
CREATE TABLE IF NOT EXISTS `dang_ky_lop_hp` (
  `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `MaLopHocPhan` varchar(30) NOT NULL,
  `MaSinhVien` varchar(10) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_dki_lop_hp` (`MaSinhVien`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `dang_ky_lop_hp`
--

INSERT INTO `dang_ky_lop_hp` (`ID`, `MaLopHocPhan`, `MaSinhVien`) VALUES
(4, '211105004103', '4251050004'),
(5, '211105002903', '4251050004');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diem_hoc_tap`
--

DROP TABLE IF EXISTS `diem_hoc_tap`;
CREATE TABLE IF NOT EXISTS `diem_hoc_tap` (
  `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `MaHocPhan` varchar(15) NOT NULL,
  `MaSinhVien` varchar(10) NOT NULL,
  `DiemThi` float DEFAULT NULL,
  PRIMARY KEY (`ID`,`MaHocPhan`,`MaSinhVien`),
  KEY `MaHocPhan` (`MaHocPhan`),
  KEY `MaSinhVien` (`MaSinhVien`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `diem_hoc_tap`
--

INSERT INTO `diem_hoc_tap` (`ID`, `MaHocPhan`, `MaSinhVien`, `DiemThi`) VALUES
(1, '1010034', '4251050004', 10),
(3, '1010038', '4251050004', 5),
(4, '1010245', '4251050004', 8),
(5, '1050074', '4251050004', 1),
(6, '1010248', '4251050004', 8),
(7, '1120004', '4251050004', 5),
(8, '1050058', '4251050004', 6),
(18, '1010034', '4251050033', 8),
(24, '1050108', '4251050004', 10),
(25, '1050108', '4251050033', 8),
(53, '1050040', '4251050004', 9),
(54, '1050040', '4251050033', 8);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diem_ren_luyen`
--

DROP TABLE IF EXISTS `diem_ren_luyen`;
CREATE TABLE IF NOT EXISTS `diem_ren_luyen` (
  `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `MaSinhVien` varchar(10) NOT NULL,
  `NamHoc` varchar(12) DEFAULT NULL,
  `HocKy` int(11) DEFAULT NULL,
  `LanCham` int(11) DEFAULT NULL,
  `Muc1_1` int(11) DEFAULT NULL,
  `Muc1_2` int(11) DEFAULT NULL,
  `Muc1_3` int(11) DEFAULT NULL,
  `Muc1_4` int(11) DEFAULT NULL,
  `Muc2_1` int(11) DEFAULT NULL,
  `Muc2_2` int(11) DEFAULT NULL,
  `Muc2_3` int(11) DEFAULT NULL,
  `Muc3_1` int(11) DEFAULT NULL,
  `Muc3_2` int(11) DEFAULT NULL,
  `Muc4_1` int(11) DEFAULT NULL,
  `Muc4_2` int(11) DEFAULT NULL,
  `Muc4_3` int(11) DEFAULT NULL,
  `Muc5_1` int(11) DEFAULT NULL,
  `Muc5_2` int(11) DEFAULT NULL,
  `Muc5_3` int(11) DEFAULT NULL,
  `Muc6` int(11) DEFAULT NULL,
  `TongDiem` int(11) DEFAULT NULL,
  `GhiChu` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`ID`,`MaSinhVien`) USING BTREE,
  KEY `MaSinhVien` (`MaSinhVien`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `diem_ren_luyen`
--

INSERT INTO `diem_ren_luyen` (`ID`, `MaSinhVien`, `NamHoc`, `HocKy`, `LanCham`, `Muc1_1`, `Muc1_2`, `Muc1_3`, `Muc1_4`, `Muc2_1`, `Muc2_2`, `Muc2_3`, `Muc3_1`, `Muc3_2`, `Muc4_1`, `Muc4_2`, `Muc4_3`, `Muc5_1`, `Muc5_2`, `Muc5_3`, `Muc6`, `TongDiem`, `GhiChu`) VALUES
(7, '4251050004', '2018-2019', 1, 1, 12, 8, 3, 4, 20, 5, 0, 9, 6, 15, 20, 3, 5, 5, 3, 6, 100, 'ffff');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giang_vien`
--

DROP TABLE IF EXISTS `giang_vien`;
CREATE TABLE IF NOT EXISTS `giang_vien` (
  `MaGiangVien` varchar(10) NOT NULL,
  `HoTen` tinytext,
  `NgaySinh` date DEFAULT NULL,
  `GioiTinh` tinytext,
  `DanToc` tinytext,
  `SoCMND` varchar(15) DEFAULT NULL,
  `TonGiao` tinytext,
  `QueQuan` text,
  `SDT` varchar(11) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `ChucVu` tinytext,
  `CoVanHocTap` tinytext,
  `MatKhau` varchar(50) DEFAULT NULL,
  `Job` tinytext,
  PRIMARY KEY (`MaGiangVien`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `giang_vien`
--

INSERT INTO `giang_vien` (`MaGiangVien`, `HoTen`, `NgaySinh`, `GioiTinh`, `DanToc`, `SoCMND`, `TonGiao`, `QueQuan`, `SDT`, `Email`, `ChucVu`, `CoVanHocTap`, `MatKhau`, `Job`) VALUES
('103127', 'Há»“ Ngá»c CÆ°á»ng', '1980-02-17', 'Nam', 'kinh', '87675433', 'KhÃ´ng', 'BÃ¬nh Äá»‹nh', '09865433', 'ngoccuong@gmail.com', 'Giáº£ng ViÃªn', 'KhÃ´ng', '103127', 'giảng viên'),
('1031271', 'Nguyễn Quang Nhật', '1998-07-16', 'Nam', 'kinh', '12334', 'không', 'Bình Định', '0337543725', 'nguyen122@gmail.com', 'không', 'không', '7777', ''),
('104123', 'Nguyễn Thị Thanh Hà', '1988-04-09', 'Nữ', 'Kinh', '9742345', 'Không', 'Bình Định', '09475253', 'thanhha@gmail.com', 'giảng viên', 'không', '104123', 'giảng viên'),
('106111', 'Phùng Văn Minh', '1995-08-19', 'Nam', 'Kinh', '12647788', 'Không', 'Bình Định', '08495732', 'VanA@gmail.com', 'Giảng viên', 'Có', '106111', 'Giảng viên'),
('106112', 'Hồ Anh Minh', '1987-02-04', 'Nam', 'Kinh', '6453899', 'Không', 'Bình Định', '2364237', 'BinhBqnu@gmail.com', 'Giảng viên', 'Có', '106112', 'Giảng viên'),
('106113', 'Hồ Văn Lâm', '1989-12-04', 'Nam', 'Kinh', '123467', 'Không', 'Bình Định', '476829', 'hovanlam@qnu.edu.vn', 'Phó trưởng khoa', 'Có', '106113', 'Giảng viên'),
('106114', 'Đinh Thị Mỹ cảnh', '1985-12-03', 'Nữ', 'Kinh', '4875828', 'Không', 'Bình Định', '683843', 'mycanh@qnu.edu.vn', 'Giảng viên', 'Có', '106114', 'Giảng viên'),
('106115', 'Nguyễn Thị Phượng', '0000-00-00', '', 'Kinh', '7867352', 'Không', '-Chọn quê quán-', '53548912', 'Phuong@gmail.com', 'Giảng viên', 'Không', '106115', 'Giảng viên'),
('106117', 'Phan Đình Sinh', '1989-04-06', 'Nam', 'Kinh', '87635428', 'Không', 'Bình Định', '63768928', 'dinhsinh@gmail.com', 'Giảng viên', 'Không', '106117', 'giảng viên'),
('106118', 'Nguyễn Thị Loan', '1991-07-02', 'Nữ', 'Kinh', '867554', 'Không', 'BÌnh Định', '478987656', 'Loan@gmail.com', 'Giảng viên', 'không', '106118', 'giảng viên'),
('106119', 'Vũ Sơn Lâm', '1987-08-09', 'Nam', 'Kinh', '373682', 'KHông', 'Bình Định', '6378902', 'Sonlam@gmail.com', 'Giảng viên', 'Không', '106119', 'giảng viên'),
('106120', 'Trần Đình Luyện', '1987-06-04', 'Nam', 'Kinh', '645432', 'Không', 'Bình Định', '6464789302', 'dinhluyen@gmail.com', 'Giảng viên', 'có', '106120', 'Giảng viên'),
('106121', 'Lê Thị Thu Nga', '1990-07-09', 'Nữ', 'Kinh', '98734567', 'Không', 'Bình Định', '9865455', 'ThuNga@gmail.com', 'Giảng viên', 'có', '106121', 'Giảng viên'),
('106122', 'Nguyễn Ngọc Dũng', '1987-08-04', 'Nam', 'Kinh', '9976543', 'Không', 'Bình Định', '097654', 'ngocdung@gmail.com', 'Giảng vien', 'có', '106122', 'giảng viên'),
('106124', 'Lê Thị Kim Nga', '1987-08-05', 'Nữ', 'Kinh', '542356778', 'không', 'Bình Định', '09542148', 'kimnga@gmail.com', 'giảng viên', 'có', '106124', 'giảng viên'),
('106125', 'Lê Thanh Hiếu', '1987-03-19', 'Nam', 'Kinh', '98763562', 'không', 'Bình Định', '097535647', 'thanhhieu@gmail.com', 'giảng viên', 'không', '106125', 'giảng viên'),
('106126', 'Nguyễn Thị Phương Lan', NULL, 'Nữ', 'Kinh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('106128', 'Ngô Ngọc Nghĩa', NULL, 'Nữ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('106129', 'Nguyễn Thị Tuyết', NULL, 'Nữ', 'Kinh', '97754333', 'Không', 'Bình Định', '0987543333', 'tuyetnguyen@gmail.com', 'Giảng viên', 'Có', '106129', 'Giảng Viên'),
('106130', 'Lê Xuân Việt', NULL, 'Nam', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('106132', 'Lê Quang Hùng', NULL, 'Nam', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('106133', 'Dương Hoàng Huyên', NULL, 'Nam', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('11111', 'Nguyễn Ngọc Nguyên', '2021-10-31', 'Nam', 'kinh', '12334', 'Không', 'Đà Nẵng', '0374766182', 'ngoccuong1@gmail.com', 'quần què', 'không', '66666', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoat_dong`
--

DROP TABLE IF EXISTS `hoat_dong`;
CREATE TABLE IF NOT EXISTS `hoat_dong` (
  `MaHoatDong` varchar(20) NOT NULL,
  `TenHoatDong` text,
  `NgayHoatDong` date DEFAULT NULL,
  `NoiDung` text,
  `NamHoc` text,
  `HocKy` int(11) DEFAULT NULL,
  PRIMARY KEY (`MaHoatDong`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hoat_dong`
--

INSERT INTO `hoat_dong` (`MaHoatDong`, `TenHoatDong`, `NgayHoatDong`, `NoiDung`, `NamHoc`, `HocKy`) VALUES
('HD01', 'Chào đón tân sinh viên K44', '2021-11-23', 'Chào đón tân sinh viên K44 khoa công nghệ thông tin', '2021-2022', 1),
('HD02', 'CHƯƠNG TRÌNH TALKSHOW CÙNG VỚI CHUYÊN GIA', '2021-08-18', NULL, '2021-2022', 1),
('HD03', 'THẮP NẾN TRI ÂN', '2021-07-27', NULL, '2021-2022', 1),
('HD04', 'NGÀY HỘI CÔNG NGHỆ 2021', '2021-03-15', NULL, '2020-2021', 2),
('HD05', 'CHƯƠNG TRÌNH GIAO LƯU HƯỚNG NGHIỆP CÙNG FPT SOFTWARE', '2021-05-20', NULL, '2020-2021', 2),
('HD06', 'Ngày hội IT Day', '2021-05-15', NULL, '2020-2021', 2),
('HD07', 'Ngày Nhà giáo Việt Nam', '2021-11-20', 'Chào mừng ngày nhà giáo Việt Nam', '2020-2021', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoc_phan`
--

DROP TABLE IF EXISTS `hoc_phan`;
CREATE TABLE IF NOT EXISTS `hoc_phan` (
  `MaHocPhan` varchar(15) NOT NULL,
  `TenMonHoc` text,
  `SoTinChi` int(11) DEFAULT NULL,
  PRIMARY KEY (`MaHocPhan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hoc_phan`
--

INSERT INTO `hoc_phan` (`MaHocPhan`, `TenMonHoc`, `SoTinChi`) VALUES
('1010034', 'Đại số số học', 3),
('1010038', 'Đại số tuyến tính', 3),
('1010245', 'Giải tích', 3),
('1010248', 'Xác xuất thống kê', 2),
('1050011', 'Chuyên đề 3. Điện toán đám mây', 2),
('1050016', 'Hệ quản trị cơ sở dữ liệu', 3),
('1050021', 'Kiến trúc máy tính', 3),
('1050024', 'Lập trình hướng đối tượng', 3),
('1050029', 'Lập trình ứng dụng Web', 3),
('1050037', 'Nguyên lý hệ điều hành', 3),
('1050040', 'Nhập môn cơ sở dữ liệu', 3),
('1050041', 'Nhập môn công nghệ phần mềm', 3),
('1050043', 'Nhập môn mạng máy tính', 3),
('1050049', 'Phân tích và thiết kế hệ thống thông tin', 3),
('1050050', 'Chuyên đề 2: Phân tích và thiết kế hướng đối tượng', 3),
('1050051', 'Phân tích và thiết kế thuật toán', 3),
('1050058', 'Quản trị mạng', 3),
('1050064', 'Thực hành lập trình', 2),
('1050074', 'Toán logic', 2),
('1050075', 'Toán rời rạc', 3),
('1050085', 'Lập trình trên Windows', 3),
('1050096', 'Tham quan thực tế', 1),
('1050102', 'Khóa luận tốt nghiệp', 7),
('1050108', 'Đại cương về tin học', 3),
('1050112', 'Nhập môn trí tuệ nhân tạo', 3),
('1050113', 'Công nghệ .NET', 3),
('1050115', 'Chuyên đề 1: Những vấn đề hiện đại của CNTT', 2),
('1050121', 'cấu trúc dữ liệu và giải thuật', 3),
('1050124', 'Thực hành máy tính', 1),
('1050128', 'Lập trình cho thiết bị di động', 3),
('1050133', 'Lập trình cơ bản', 4),
('1050134', 'Kỹ năng mềm trong CNTT', 2),
('1050135', 'Sử dụng tiếng anh trong CNTT', 2),
('1050136', 'Thực hành làm việc nhóm', 2),
('1050137', 'XML và ứng dụng', 2),
('1050138', 'Thực tập tốt nghiệp', 3),
('1050141', 'Hệ quản trị cơ sở dữ liệu Oracle', 3),
('1050142', 'Lập trình quản lý', 3),
('1050143', 'Thương mại điện tử', 2),
('1050144', 'Kho dữ liệu và khai phá dữ liệu', 3),
('1050145', 'An toàn và bảo mật hệ thống thông tin', 2),
('1050146', 'Cơ sở dữ liệu hướng đối tượng', 2),
('1050147', 'Cơ sở dữ liệu NoSQL', 3),
('1050148', 'Phát triển ứng dụng hệ thống thông tin hiện đại', 3),
('1050149', 'Web ngữ nghĩa', 3),
('1050150', 'Ứng dụng phân tán', 3),
('1050151', 'Quản trị hệ thống thông tin', 3),
('1050152', 'Cơ sở dữ liệu suy diễn', 3),
('1050181', 'Chuyên đề 3: cơ sở dữ liệu đa phương tiện', 3),
('1050190', 'Hệ thống thông tin địa lý', 3),
('1050194', 'Lập trình ứng dụng Desktop', 3),
('1050196', 'Hệ điều hành', 3),
('1050199', 'Kỹ nghệ yêu cầu phần mềm', 3),
('1050201', 'Công nghệ phần mềm', 3),
('1050203', 'Thiết kế phần mềm', 3),
('1090061', 'Tiếng Anh 1', 3),
('1090166', 'Tiếng anh 2', 4),
('111', 'aa', 7),
('1120001', 'Giáo dục thể chất', 1),
('1120002', 'Giáo dục thể chất 2', 1),
('1120003', 'Giáo dục thể chất 3', 1),
('1120004', 'Giáo dục thể chất 4', 1),
('1120095', 'Giáo dục quốc phòng - An ninh 1', 3),
('1120096', 'Giáo dục quốc phòng - An ninh 2', 2),
('1120097', 'Giáo dục quốc phòng - An ninh 3', 3),
('1130013', 'Đường lối cách mạng của Đảng CSVN', 3),
('1130045', 'Những NLCB của chủ nghĩa Mác-Lenin 1', 2),
('1130046', 'Những NLCB của chủ nghĩa Mác-Lenin 2', 3),
('1130049', 'Pháp luật đại cương', 2),
('1130091', 'Tư tưởng Hồ Chí Minh', 2),
('1130300', 'Kinh tế chính trị Mác-Lenin', 2),
('1130301', 'Chủ nghĩa xã hội khoa học', 2),
('1130302', 'Lịch sử Đảng Cộng sản Việt Nam', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hom_thu_gop_y`
--

DROP TABLE IF EXISTS `hom_thu_gop_y`;
CREATE TABLE IF NOT EXISTS `hom_thu_gop_y` (
  `ID` bigint(25) NOT NULL AUTO_INCREMENT,
  `MaSinhVien` varchar(10) NOT NULL,
  `Ngay` varchar(10) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `Thang` varchar(10) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `Nam` varchar(10) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `Gio` varchar(10) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `Phut` varchar(10) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `Giay` varchar(10) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `NoiDung` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `TieuDe` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `MaSinhVien` (`MaSinhVien`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hom_thu_gop_y`
--

INSERT INTO `hom_thu_gop_y` (`ID`, `MaSinhVien`, `Ngay`, `Thang`, `Nam`, `Gio`, `Phut`, `Giay`, `NoiDung`, `TieuDe`) VALUES
(1, '4251050004', '3', '10', '2021', '5', '26', '16', 'jbknl', 'nhật'),
(2, '4251050004', '3', '10', '2021', '5', '26', '39', 'nnnn', 'ggg'),
(3, '4251050004', '5', '10', '2021', '3', '9', '32', 'ttt', 'aaaa');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khoa_hoc`
--

DROP TABLE IF EXISTS `khoa_hoc`;
CREATE TABLE IF NOT EXISTS `khoa_hoc` (
  `MaKhoaHoc` varchar(5) NOT NULL,
  `NamBatDau` int(11) DEFAULT NULL,
  `NamKetThuc` int(11) DEFAULT NULL,
  PRIMARY KEY (`MaKhoaHoc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `khoa_hoc`
--

INSERT INTO `khoa_hoc` (`MaKhoaHoc`, `NamBatDau`, `NamKetThuc`) VALUES
('K40', 2017, 2021),
('K41', 2018, 2022),
('K42', 2019, 2023),
('K43', 2020, 2024),
('K44', 2021, 2025),
('K446', 2023, 2027),
('K45', 2022, 2026);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lop`
--

DROP TABLE IF EXISTS `lop`;
CREATE TABLE IF NOT EXISTS `lop` (
  `MaLop` varchar(15) NOT NULL,
  `MaKhoaHoc` varchar(5) DEFAULT NULL,
  `TenLop` tinytext,
  PRIMARY KEY (`MaLop`),
  KEY `MaKhoaHoc` (`MaKhoaHoc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `lop`
--

INSERT INTO `lop` (`MaLop`, `MaKhoaHoc`, `TenLop`) VALUES
('10521011811', 'K41', 'CÃ´ng nghá»‡ thÃ´ng tin K41A'),
('10521021811', 'K41', 'CÃ´ng nghá»‡ thÃ´ng tin K41B'),
('10521031811', 'K41', 'CÃ´ng nghá»‡ thÃ´ng tin K41C'),
('10522011811', 'K41', 'Ká»¹ thuáº­t pháº§n má»m K41'),
('10524011911', 'K42', 'CÃ´ng nghá»‡ thÃ´ng tin k42A'),
('10524021911', 'K42', 'CÃ´ng nghá»‡ thÃ´ng tin K42B'),
('10524031911', 'K42', 'CÃ´ng nghá»‡ thÃ´ng tin K42C'),
('10525011911', 'K42', 'Ká»¹ thuáº­t pháº§n má»m K42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lop_hoc_phan`
--

DROP TABLE IF EXISTS `lop_hoc_phan`;
CREATE TABLE IF NOT EXISTS `lop_hoc_phan` (
  `MaLopHocPhan` varchar(30) NOT NULL,
  `MaGiangVien` varchar(10) DEFAULT NULL,
  `MaHocPhan` varchar(15) DEFAULT NULL,
  `NamHoc` varchar(11) DEFAULT NULL,
  `HocKy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `lop_hoc_phan`
--

INSERT INTO `lop_hoc_phan` (`MaLopHocPhan`, `MaGiangVien`, `MaHocPhan`, `NamHoc`, `HocKy`) VALUES
('211105004103', '103127', '1050040', '2021-2022', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ren_luyen`
--

DROP TABLE IF EXISTS `ren_luyen`;
CREATE TABLE IF NOT EXISTS `ren_luyen` (
  `ID` int(20) NOT NULL AUTO_INCREMENT,
  `NamHoc` text NOT NULL,
  `HocKy` int(2) NOT NULL,
  `NgayBatDau` date NOT NULL,
  `NgayKetThuc` date NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `ren_luyen`
--

INSERT INTO `ren_luyen` (`ID`, `NamHoc`, `HocKy`, `NgayBatDau`, `NgayKetThuc`) VALUES
(1, '2018-2019', 1, '2021-10-03', '2021-10-24'),
(2, '2019-2020', 1, '2021-03-06', '2021-10-29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sinh_vien`
--

DROP TABLE IF EXISTS `sinh_vien`;
CREATE TABLE IF NOT EXISTS `sinh_vien` (
  `MaSinhVien` varchar(10) NOT NULL,
  `HoTen` tinytext,
  `NgaySinh` date DEFAULT NULL,
  `GioiTinh` tinytext,
  `DanToc` tinytext,
  `SoCMND` varchar(15) DEFAULT NULL,
  `TonGiao` tinytext,
  `QueQuan` text,
  `SDT` varchar(11) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `ChucVu` tinytext,
  `MaLop` varchar(15) DEFAULT NULL,
  `TinhTrangHoc` tinytext,
  `MatKhau` varchar(50) DEFAULT NULL,
  `Anh` varchar(250) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `Job` tinytext,
  PRIMARY KEY (`MaSinhVien`),
  KEY `MaLop` (`MaLop`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sinh_vien`
--

INSERT INTO `sinh_vien` (`MaSinhVien`, `HoTen`, `NgaySinh`, `GioiTinh`, `DanToc`, `SoCMND`, `TonGiao`, `QueQuan`, `SDT`, `Email`, `ChucVu`, `MaLop`, `TinhTrangHoc`, `MatKhau`, `Anh`, `Job`) VALUES
('12345', 'Tráº§n Quá»‘c Báº£o', '2001-02-02', 'Nam', 'kinh', '252224244', 'KhÃ´ng', 'BÃ¬nh Äá»‹nh', '036369829', 'quocbaodb12@gmail.com', 'KhÃ´ng', '10521011811', 'CÃ²n há»c', '12345', '', ''),
('4251050004', 'Nguyễn Quang Nhật', '2001-05-09', 'Nam', 'Kinh', '11', 'Không', 'Bình Định', '0377407267', 'nguyenquangnhat456@gmail.com', 'Không', '10524011911', 'Còn học', '111', '', 'Sinh viên'),
('4251050033', 'Äáº·ng ThÃ nh ChÆ°Æ¡ng', '2001-02-02', 'Nam', 'Kinh', '215511525', 'KhÃ´ng', 'BÃ¬nh Äá»‹nh', '0363698294', 'chuongdang647@gmail.com', 'KhÃ´ng', '10521011811', 'CÃ²n há»c', '4251050033', '', 'Sinh viên');

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chuong_trinh`
--
ALTER TABLE `chuong_trinh`
  ADD CONSTRAINT `chuong_trinh_ibfk_1` FOREIGN KEY (`MaKhoaHoc`) REFERENCES `khoa_hoc` (`MaKhoaHoc`) ON UPDATE CASCADE,
  ADD CONSTRAINT `chuong_trinh_ibfk_2` FOREIGN KEY (`MaHocPhan`) REFERENCES `hoc_phan` (`MaHocPhan`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `dang_ky_hoat_dong`
--
ALTER TABLE `dang_ky_hoat_dong`
  ADD CONSTRAINT `dang_ky_hoat_dong_ibfk_1` FOREIGN KEY (`MaSinhVien`) REFERENCES `sinh_vien` (`MaSinhVien`) ON UPDATE CASCADE,
  ADD CONSTRAINT `dang_ky_hoat_dong_ibfk_2` FOREIGN KEY (`MaHoatDong`) REFERENCES `hoat_dong` (`MaHoatDong`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_hoat_dong` FOREIGN KEY (`MaHoatDong`) REFERENCES `hoat_dong` (`MaHoatDong`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_ma_sinh_vien` FOREIGN KEY (`MaSinhVien`) REFERENCES `sinh_vien` (`MaSinhVien`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `dang_ky_lop_hp`
--
ALTER TABLE `dang_ky_lop_hp`
  ADD CONSTRAINT `fk_dki_lop_hp` FOREIGN KEY (`MaSinhVien`) REFERENCES `sinh_vien` (`MaSinhVien`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `diem_hoc_tap`
--
ALTER TABLE `diem_hoc_tap`
  ADD CONSTRAINT `diem_hoc_tap_ibfk_1` FOREIGN KEY (`MaHocPhan`) REFERENCES `hoc_phan` (`MaHocPhan`) ON UPDATE CASCADE,
  ADD CONSTRAINT `diem_hoc_tap_ibfk_2` FOREIGN KEY (`MaSinhVien`) REFERENCES `sinh_vien` (`MaSinhVien`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `diem_ren_luyen`
--
ALTER TABLE `diem_ren_luyen`
  ADD CONSTRAINT `diem_ren_luyen_ibfk_1` FOREIGN KEY (`MaSinhVien`) REFERENCES `sinh_vien` (`MaSinhVien`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `hom_thu_gop_y`
--
ALTER TABLE `hom_thu_gop_y`
  ADD CONSTRAINT `fk_hom_thu_gop_y` FOREIGN KEY (`MaSinhVien`) REFERENCES `sinh_vien` (`MaSinhVien`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `lop`
--
ALTER TABLE `lop`
  ADD CONSTRAINT `fk_hoat_dong_11` FOREIGN KEY (`MaKhoaHoc`) REFERENCES `khoa_hoc` (`MaKhoaHoc`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
