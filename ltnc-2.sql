-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th5 20, 2024 lúc 04:17 PM
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
-- Cơ sở dữ liệu: `ltnc`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `checktable`
--

CREATE TABLE `checktable` (
  `email` varchar(100) DEFAULT NULL,
  `rule` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `checktable`
--

INSERT INTO `checktable` (`email`, `rule`) VALUES
('kimngan21012003@gmail.com', 1),
('lamtieumi010403@gmail.com', 2),
('clonehehe24@gmail.com', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `classes`
--

CREATE TABLE `classes` (
  `class_id` varchar(10) NOT NULL,
  `course_id` varchar(20) NOT NULL,
  `semester` varchar(50) NOT NULL,
  `lecturer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `classes`
--

INSERT INTO `classes` (`class_id`, `course_id`, `semester`, `lecturer_id`) VALUES
('L01', 'CO2039', 'HK232', 13042024),
('L02', 'LA1005', 'HK232', 14042024),
('L07', 'LA1007', 'HK232', 14042024),
('L05', 'LA1009', 'HK232', 14042024),
('L01', 'LA1003', 'HK232', 14042024);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `courses`
--

CREATE TABLE `courses` (
  `course_id` varchar(20) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `credit_hours` int(11) DEFAULT NULL,
  `course_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `courses`
--

INSERT INTO `courses` (`course_id`, `course_name`, `credit_hours`, `course_img`) VALUES
('C01990', 'Nhập môn điện toán', 3, 'https://png.pngtree.com/thumb_back/fh260/background/20201020/pngtree-abstract-red-technology-background-image_427354.jpg'),
('CO1811', 'Mô hình hóa toán học', 3, 'https://images.freeimages.com/365/images/previews/6a5/circuit-board-orange-tech-background-34722.jpg'),
('CO1990', 'Cấu trúc dữ liệu & giải thuật', 4, 'https://img.freepik.com/premium-photo/abstract-cyan-color-high-tech-technology-connection-system-background-with-dark-gray-color-background_824086-80.jpg'),
('CO2039', 'Lập trình nâng cao', 3, 'https://png.pngtree.com/thumb_back/fh260/background/20201020/pngtree-abstract-red-technology-background-image_427354.jpg'),
('LA1003', 'Anh văn 1', 2, 'https://img.freepik.com/free-vector/language-word-concept-with-flat-design_23-2147866926.jpg?w=740&t=st=1713603469~exp=1713604069~hmac=10faff5ce62a8e546079f864d6da034c49b1a76c355652ec5e14750e04aafdbd'),
('LA1005', 'Anh văn 2', 2, 'https://img.freepik.com/free-vector/language-word-concept-with-flat-design_23-2147866926.jpg?w=740&t=st=1713603469~exp=1713604069~hmac=10faff5ce62a8e546079f864d6da034c49b1a76c355652ec5e14750e04aafdbd'),
('LA1007', 'Anh văn 3', 2, 'https://img.freepik.com/free-vector/language-word-concept-with-flat-design_23-2147866926.jpg?w=740&t=st=1713603469~exp=1713604069~hmac=10faff5ce62a8e546079f864d6da034c49b1a76c355652ec5e14750e04aafdbd'),
('LA1009', 'Anh văn 4', 2, 'https://img.freepik.com/free-vector/language-word-concept-with-flat-design_23-2147866926.jpg?w=740&t=st=1713603469~exp=1713604069~hmac=10faff5ce62a8e546079f864d6da034c49b1a76c355652ec5e14750e04aafdbd'),
('SP1007', 'Pháp luật Việt Nam đại cương', 2, 'https://img.freepik.com/free-vector/blue-background-with-dots-lines_23-2147868434.jpg?w=740&t=st=1713603505~exp=1713604105~hmac=631c64dceb4d070075c1725c49f9b04ec4d525813e8075813a70c82e6f45bb90'),
('SP1031', 'Triết học Mác - Lênin', 3, 'https://img.freepik.com/free-vector/blue-background-with-dots-lines_23-2147868434.jpg?w=740&t=st=1713603505~exp=1713604105~hmac=631c64dceb4d070075c1725c49f9b04ec4d525813e8075813a70c82e6f45bb90'),
('SP1033', 'Kinh tế chính trị Mác - Lênin', 2, 'https://img.freepik.com/free-vector/blue-background-with-dots-lines_23-2147868434.jpg?w=740&t=st=1713603505~exp=1713604105~hmac=631c64dceb4d070075c1725c49f9b04ec4d525813e8075813a70c82e6f45bb90'),
('SP1035 ', 'Chủ nghĩa xã hội khoa học', 2, 'https://img.freepik.com/free-vector/blue-background-with-dots-lines_23-2147868434.jpg?w=740&t=st=1713603505~exp=1713604105~hmac=631c64dceb4d070075c1725c49f9b04ec4d525813e8075813a70c82e6f45bb90'),
('SP10357', 'Tư tưởng Hồ Chí Minh', 2, 'https://img.freepik.com/free-vector/blue-background-with-dots-lines_23-2147868434.jpg?w=740&t=st=1713603505~exp=1713604105~hmac=631c64dceb4d070075c1725c49f9b04ec4d525813e8075813a70c82e6f45bb90'),
('SP1039', 'Lịch sử Đảng Cộng sản Việt Nam', 2, 'https://img.freepik.com/free-vector/blue-background-with-dots-lines_23-2147868434.jpg?w=740&t=st=1713603505~exp=1713604105~hmac=631c64dceb4d070075c1725c49f9b04ec4d525813e8075813a70c82e6f45bb90');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `course_content`
--

CREATE TABLE `course_content` (
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `size` int(11) NOT NULL,
  `type` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `grade_id` int(11) NOT NULL,
  `filename` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `data` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `course_content`
--

INSERT INTO `course_content` (`name`, `size`, `type`, `grade_id`, `filename`, `data`) VALUES
('CHương 3', 965166, 'application/pdf', 1, 'tl.pdf', '2024-04-20 12:36:43'),
('haskell', 1732030, 'application/pdf', 1, 'Chapter01.pdf', '2024-05-19 18:42:02'),
('haskell', 1805414, 'application/pdf', 1, 'lab2.pdf', '2024-05-20 07:33:41');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `grades`
--

CREATE TABLE `grades` (
  `class_id` varchar(10) NOT NULL,
  `student_id` int(11) NOT NULL,
  `semester` varchar(50) NOT NULL,
  `lecturer_id` int(11) NOT NULL,
  `course_id` varchar(20) NOT NULL,
  `attendance_score` decimal(5,2) DEFAULT NULL,
  `quizz_score` decimal(5,2) DEFAULT NULL,
  `btl_score` decimal(5,2) DEFAULT NULL,
  `mid_term_score` decimal(5,2) DEFAULT NULL,
  `final_exam_score` decimal(5,2) DEFAULT NULL,
  `grade_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `grades`
--

INSERT INTO `grades` (`class_id`, `student_id`, `semester`, `lecturer_id`, `course_id`, `attendance_score`, `quizz_score`, `btl_score`, `mid_term_score`, `final_exam_score`, `grade_id`) VALUES
('L01', 2115391, 'HK232', 13042024, 'CO2039', 1.00, 1.00, 1.00, 1.00, 10.00, 1),
('L01', 2115391, 'HK232', 14042024, 'LA1003', 1.00, 1.00, 1.00, 1.00, 10.00, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lecturers`
--

CREATE TABLE `lecturers` (
  `lecturer_id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `lecturers`
--

INSERT INTO `lecturers` (`lecturer_id`, `full_name`, `date_of_birth`, `email`, `phone_number`, `address`, `gender`) VALUES
(13042024, 'Lâm Tiểu My', '2003-04-01', 'lamtieumi010403@gmail.com', '0941399108', 'KTX khu B DHQG TP HCM', 'Nữ'),
(14042024, 'Nguyễn Thị Kim Ngân', '1990-12-01', 'kimngan1990@gmail.com', '0966748064', 'TP Thủ Đức TP Hồ Chí Minh', 'Nữ'),
(15042024, 'Phạm Trọng Thanh', '1995-05-01', 'trongthanh@gmail.com', '0944502474', 'Quận 2 TP Hồ Chí Minh', 'Nam'),
(18042024, 'Phạm Võ Tuyết Hằng', '2003-11-23', 'phamvothuyethang2003@gmail.com', '0997777268', 'KTX khu B DHQG TP HCM', 'Nữ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `managers`
--

CREATE TABLE `managers` (
  `manager_id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `managers`
--

INSERT INTO `managers` (`manager_id`, `full_name`, `date_of_birth`, `email`, `phone_number`, `address`, `gender`) VALUES
(2024, 'Dương Khả Cơ', '2003-03-18', 'clonehehe24@gmail.com', '0984962474', 'TP Thủ Đức TP Hồ Chí Minh', 'Nữ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `faculty` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `students`
--

INSERT INTO `students` (`student_id`, `full_name`, `date_of_birth`, `email`, `phone_number`, `address`, `gender`, `faculty`) VALUES
(1915111, 'Phạm Quốc Vinh', '2001-05-01', 'quocvinh@gmail.com', '0335461245', 'Quận 9 TP Hồ Chí Minh ', 'Nam', 'Faculty Of Computer Science And Engineering'),
(1915380, 'Nguyễn Thành Nam', '2001-02-02', 'thanhnam@gmail.com', '0223336512', 'KTX khu A DHQG TP HCM', 'Nam', 'Faculty Of Computer Science And Engineering'),
(1915391, 'Lâm Thị Kim Ngân', '2001-02-21', 'nganlam2001@gmail.com', '0778887692', 'KTX khu A TP HCM', 'Nữ', 'Faculty Of Computer Science And Engineering'),
(2015390, 'Lê Phú Nhanh', '2002-09-10', 'phunhanh@gmail.com', '0779998671', 'Quận 2 TP Hồ Chí Minh', 'Nam', 'Faculty Of Transportation Engineering'),
(2015393, 'Phạm Võ Tuyết Hằng ', '2002-11-23', 'hangpham2002@gmail.com', '0779998108', 'KTX khu B DHQG TP HCM', 'Nữ', 'Industrial Maintenance Training Center'),
(2115391, 'Lê Thị Kim Ngân', '2003-02-21', 'kimngan21012003@gmail.com', '0779998672', 'KTX khu B DHQG TP HCM', 'Nữ', 'Faculty Of Computer Science And Engineering'),
(2215392, 'Lâm Thị Tiểu My', '2004-04-01', 'mylam@gmail.com', '0443214567', 'Quận 2 TP Hồ Chí Minh', 'Nữ', 'Industrial Maintenance Training Center');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `timetables`
--

CREATE TABLE `timetables` (
  `class_id` varchar(10) DEFAULT NULL,
  `course_id` varchar(20) DEFAULT NULL,
  `lecturer_id` int(11) DEFAULT NULL,
  `day_of_week` varchar(20) DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `room` varchar(50) DEFAULT NULL,
  `semester` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `timetables`
--

INSERT INTO `timetables` (`class_id`, `course_id`, `lecturer_id`, `day_of_week`, `start_time`, `end_time`, `room`, `semester`) VALUES
('L01', 'CO2039', 13042024, 'Monday', '07:00:00', '08:50:00', '401-H1', 'HK232'),
('L01', 'LA1003', 14042024, 'Monday', '10:00:00', '11:50:00', '112-H6', 'HK232');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `classes`
--
ALTER TABLE `classes`
  ADD KEY `course_id` (`course_id`),
  ADD KEY `lecturer_id` (`lecturer_id`);

--
-- Chỉ mục cho bảng `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Chỉ mục cho bảng `course_content`
--
ALTER TABLE `course_content`
  ADD KEY `content_grade` (`grade_id`);

--
-- Chỉ mục cho bảng `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`grade_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `lecturer_id` (`lecturer_id`);

--
-- Chỉ mục cho bảng `lecturers`
--
ALTER TABLE `lecturers`
  ADD PRIMARY KEY (`lecturer_id`);

--
-- Chỉ mục cho bảng `managers`
--
ALTER TABLE `managers`
  ADD PRIMARY KEY (`manager_id`);

--
-- Chỉ mục cho bảng `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);

--
-- Chỉ mục cho bảng `timetables`
--
ALTER TABLE `timetables`
  ADD KEY `fk_timetables_lecturer` (`lecturer_id`),
  ADD KEY `fk_timetables_course` (`course_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `grades`
--
ALTER TABLE `grades`
  MODIFY `grade_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `classes`
--
ALTER TABLE `classes`
  ADD CONSTRAINT `classes_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`),
  ADD CONSTRAINT `classes_ibfk_2` FOREIGN KEY (`lecturer_id`) REFERENCES `lecturers` (`lecturer_id`);

--
-- Các ràng buộc cho bảng `course_content`
--
ALTER TABLE `course_content`
  ADD CONSTRAINT `content_grade` FOREIGN KEY (`grade_id`) REFERENCES `grades` (`grade_id`);

--
-- Các ràng buộc cho bảng `timetables`
--
ALTER TABLE `timetables`
  ADD CONSTRAINT `fk_timetables_course` FOREIGN KEY (`course_id`) REFERENCES `classes` (`course_id`),
  ADD CONSTRAINT `fk_timetables_lecturer` FOREIGN KEY (`lecturer_id`) REFERENCES `classes` (`lecturer_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
