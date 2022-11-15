-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2020 at 04:56 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `libraryofstudent`
--

-- --------------------------------------------------------

--
-- Table structure for table `accountmanage`
--

CREATE TABLE `accountmanage` (
  `MANAGE_USERNAME` varchar(10) NOT NULL,
  `MANAGE_PASSWORD` varchar(30) DEFAULT NULL,
  `MANAGE_NAME` varchar(30) DEFAULT NULL,
  `MANAGE_PHONE` varchar(30) DEFAULT NULL,
  `MANAGE_EMAIL` varchar(30) DEFAULT NULL,
  `MANAGE_ADDRESS` varchar(50) DEFAULT NULL,
  `MANAGE_BIRTHDAY` date DEFAULT NULL,
  `MANAGE_ROLE` int(10) DEFAULT NULL,
  `MANAGE_IDENTITYCARD` int(12) DEFAULT NULL,
  `MANAGE_ABOUT` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accountmanage`
--

INSERT INTO `accountmanage` (`MANAGE_USERNAME`, `MANAGE_PASSWORD`, `MANAGE_NAME`, `MANAGE_PHONE`, `MANAGE_EMAIL`, `MANAGE_ADDRESS`, `MANAGE_BIRTHDAY`, `MANAGE_ROLE`, `MANAGE_IDENTITYCARD`, `MANAGE_ABOUT`) VALUES
('admin', 'admin', 'Bùi Cảnh Long', '0981249458', 'canhlong1430@gmail.com', 'KTX khu A', '2000-03-14', 0, 1234567899, 'Yeu mau xanh, get mau vang'),
('exchange', 'exchange', 'Lê Võ Đình Kha', '0981249458', 'dinhkha@gmail.com', 'KTX khu B', '2000-05-12', 2, 1234567, 'yêu màu hồng, thích màu tím'),
('library', 'library', 'Lê Long', '0981249457', 'library@gmail.com', 'KTX khu B', '2000-05-12', 1, 1123457899, 'yêu màu hồng, thích màu tím');

-- --------------------------------------------------------

--
-- Table structure for table `bookoflibrary`
--

CREATE TABLE `bookoflibrary` (
  `BOOK_ID` int(10) NOT NULL,
  `BOOK_NAME` varchar(100) DEFAULT NULL,
  `BOOK_TYPE` varchar(100) DEFAULT NULL,
  `BOOK_IMAGE` varchar(200) DEFAULT NULL,
  `DESCRIPTION` varchar(100) DEFAULT NULL,
  `BOOK_COST` int(10) DEFAULT NULL,
  `BOOK_NUMBER` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bookofstudent`
--

CREATE TABLE `bookofstudent` (
  `BOOK_ID` int(10) NOT NULL,
  `STUDENT_ID` int(10) NOT NULL,
  `BOOK_NAME` varchar(50) DEFAULT NULL,
  `BOOK_TYPE` varchar(10) DEFAULT NULL,
  `BOOK_STATUS` int(10) DEFAULT NULL,
  `BOOK_IMAGE` varchar(100) DEFAULT NULL,
  `DESCRIPTION` varchar(100) DEFAULT NULL,
  `BOOK_REQUEST_CREATE` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookofstudent`
--

INSERT INTO `bookofstudent` (`BOOK_ID`, `STUDENT_ID`, `BOOK_NAME`, `BOOK_TYPE`, `BOOK_STATUS`, `BOOK_IMAGE`, `DESCRIPTION`, `BOOK_REQUEST_CREATE`) VALUES
(1, 2, 'Thuật Viết Lách Từ A Đến Z', 'Guide', 1, 'images/sach-thuat-viet-lach-tu-a-den-z.jpg', 'Viết lách là môn giải trí hầu như không tốn tiền. Mà nhiều khi rất hữu ích.', 0),
(2, 3, 'Bạn Có Đủ Thông Minh Để Làm Việc Ở Google?', 'Science', 1, 'images/sach-ban-co-du-thong-minh-de-lam-viec-o-google.jpg', 'Bạn làm gì trong trường hợp này?', 1),
(3, 1, 'Bốn Chiếc Ví Của Tôi', 'Art', 1, 'images/sach-bon-chiec-vi-cua-toi.jpg', 'Chúng ta không biết kiểm soát được đồng tiền thì không thể có được sự Tự Do như chúng ta mong chờ.', 1),
(4, 4, '15 Bức Thư Gửi Tuổi Thanh Xuân - Gửi Những Cô Gái ', 'Romance', 1, 'images/sach-15-buc-thu-gui-tuoi-thanh-xuan-gui-nhung-co-gai-moi-lon.jpg', 'Và khi tuổi thanh xuân đang phơi phới, hẳn bên cạnh những niềm vui giản dị ngây thơ.', 1),
(5, 9, 'Cẩn Trọng Cái Đầu', 'Life skill', 1, 'images/can-trong-cai-dau.jpg', 'Những khó khăn trong cuộc sống mà những người khác có lúc phải trải qua...', 1),
(6, 6, '15 Bức Thư Gửi Tuổi Thanh Xuân - Gửi Những Cô Gái ', 'Life skill', 1, 'images/sach-15-buc-thu-gui-tuoi-thanh-xuan-gui-nhung-co-gai-sap-lon.jpg', 'Phải giao tiếp và kết nối với những người xung quanh ra sao để tránh những hiểu lầm đáng tiếc?', 1),
(7, 8, 'Để Đời Nhàn Tênh', 'Historical', 1, 'images/sach-de-doi-nhan-tenh.jpg', 'Đây là cuốn sách giúp bạn lắng tai nghe Đức Phật', 1),
(8, 7, 'Không Sao Đâu, Ai Rồi Cũng Lớn - Nói Với Bạn Gái T', 'Romance', 1, 'images/sac-khong-sao-dau-ai-roi-cung-lon-noi-voi-ban-gai-tuoi-14.jpg', 'Là cuốn sách dành cho  các  bạn  gái  chuẩn  bị  và  đang  bắt đầu bước vào con đường trưởng thành. ', 1),
(11, 2, 'Hoàn Thành Mọi Việc Không Hề Khó Dành Cho Tuổi Tee', 'Science', 1, 'images/sach-hoan-thanh-moi-viec-khong-he-kho-danh-cho-tuoi-teen.jpg', 'Là một hệ thống tổ chức công việc hiệu quả ở trường mà còn như là bộ công cụ cho cuộc sống hằng ngày', 1),
(13, 1, 'Chiếc Dù Của Bạn Màu Gì? Bí Quyết Chọn Nghề', 'Art', 1, 'images/sach-chiec-du-cua-ban-mau-gi-bi-quyet-chon-nghe.jpg', 'Là một Quyển Sách Hy Vọng, được ẩn đằng sau vỏ bọc của một quyển cẩm nang tìm việc.', 1),
(14, 2, 'Mỗi Tháng 1 Thử Thách, 1 Năm Sống Khỏe Mạnh', 'Thriller', 1, 'images/moi-thang-1-thu-thach-1-nam-song-khoe-manh.jpg', 'Những thói quen không tốt trong nếp sinh hoạt hằng ngày đó sẽ dẫn tới việc sức khỏe của bạn dần trở ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `callcard`
--

CREATE TABLE `callcard` (
  `CARD_ID` int(10) NOT NULL,
  `STUDENT_ID` int(10) DEFAULT NULL,
  `CARD_DATE_CALL` date DEFAULT NULL,
  `CARD_DATE_EXP` date DEFAULT NULL,
  `CARD_NUMBER_BOOK_ID` int(11) DEFAULT NULL,
  `STATUS` int(10) DEFAULT NULL,
  `CLERK` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `detailcallcard`
--

CREATE TABLE `detailcallcard` (
  `CARD_ID` int(10) NOT NULL,
  `BOOK_ID` int(10) NOT NULL,
  `CARD_DATE_RETURN` date DEFAULT NULL,
  `CARD_BOOK_STATUS_CALL` int(11) DEFAULT NULL,
  `CARD_BOOK_STATUS_RETURN` int(11) DEFAULT NULL,
  `NOTES` int(10) DEFAULT NULL,
  `CLERK_RETURN` varchar(10) DEFAULT NULL,
  `MONEY` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `infoexchange`
--

CREATE TABLE `infoexchange` (
  `INFO_ID` int(10) NOT NULL,
  `BOOK_ID_1` int(10) DEFAULT NULL,
  `BOOK_ID_2` int(10) DEFAULT NULL,
  `STUDENT_ID_1` int(10) DEFAULT NULL,
  `STUDENT_ID_2` int(10) DEFAULT NULL,
  `DATE_EXCHANGE` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `infoexchange`
--



-- --------------------------------------------------------

--
-- Table structure for table `rqexchange`
--

CREATE TABLE `rqexchange` (
  `REQUEST_ID` int(10) NOT NULL,
  `STUDENT_ID_1` int(10) DEFAULT NULL,
  `STUDENT_ID_2` int(10) DEFAULT NULL,
  `BOOK_ID_1` int(10) DEFAULT NULL,
  `BOOK_ID_2` int(10) DEFAULT NULL,
  `REQUEST_STATUS` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rqexchange`
--

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `STUDENT_ID` int(10) NOT NULL,
  `STUDENT_NAME` varchar(50) DEFAULT NULL,
  `UNIVERSITY` varchar(50) DEFAULT NULL,
  `STUDENT_EMAIL` varchar(50) DEFAULT NULL,
  `STUDENT_PASSWORD` varchar(50) DEFAULT NULL,
  `STUDENT_PHONE` varchar(50) DEFAULT NULL,
  `STUDENT_ADDRESS` varchar(50) DEFAULT NULL,
  `STUDENT_LOSTBOOK` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`STUDENT_ID`, `STUDENT_NAME`, `UNIVERSITY`, `STUDENT_EMAIL`, `STUDENT_PASSWORD`, `STUDENT_PHONE`, `STUDENT_ADDRESS`, `STUDENT_LOSTBOOK`) VALUES
(1, 'Bùi Cảnh Long', 'UIT', 'canhlong1430@gmail.com', 'canhlong', '0981249458', 'KTX Khu A', NULL),
(2, 'Lê Công Minh', 'UEL', 'congminh@gmail.com', 'congminh', '0362846839', 'TP.Thủ Đức', NULL),
(3, 'Phan Ngọc Phương Nhi', 'USSH', 'phuongnhi@gmail.com', 'phuongnhi', '0362863729', 'Quận Cam, SG', NULL),
(4, 'Nguyễn Thị Hiền', 'IU', 'thihien@gmail.com', 'thihien', '0378888980', 'Con Rua Lake, Distric 1', NULL),
(5, 'Bùi Thị Minh', 'USSH', 'thiminh@gmail.com', 'thiminh', '0892823729', 'Bình Dương', NULL),
(6, 'Lê Võ Đình Kha', 'UIT', 'dinhkha@gmail.com', 'dinhkha', '0909699842', 'KTX KHU ', NULL),
(7, 'Lê Hoàng Anh', 'IU', 'hoanganh@gmail.com', 'hoanganh', '0378888210', 'Ba Be Lake, Distric 3', NULL),
(8, 'Phan Trọng Tuấn', 'SGU', 'trongtuan@gmail.com', 'trongtuan', '0662863517', 'Quận 2', NULL),
(9, 'Trần Thị Ly', 'IU', 'thily@gmail.com', 'thily', '0281683923', 'Guom Lake, Distric Ba Dinh', NULL),
(10, 'Phan Nhi Huỳnh', 'UIT', 'nhihuynh@gmail.com', 'nhihuynh', '0368293729', 'Quận 12, SG', NULL),
(11, 'Huỳnh Ngọc Thị Hiếu', 'IU', 'thihieu@gmail.com', 'thihieu', '0888762109', 'Stone Lake, Distric 9', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accountmanage`
--
ALTER TABLE `accountmanage`
  ADD PRIMARY KEY (`MANAGE_USERNAME`),
  ADD UNIQUE KEY `MANAGE_PHONE` (`MANAGE_PHONE`,`MANAGE_EMAIL`),
  ADD UNIQUE KEY `MANAGE_IDENTITYCARD` (`MANAGE_IDENTITYCARD`),
  ADD KEY `MANAGE_PHONE_2` (`MANAGE_PHONE`),
  ADD KEY `MANAGE_EMAIL` (`MANAGE_EMAIL`);
ALTER TABLE `accountmanage` ADD FULLTEXT KEY `MANAGE_PHONE_3` (`MANAGE_PHONE`,`MANAGE_EMAIL`);

--
-- Indexes for table `bookoflibrary`
--
ALTER TABLE `bookoflibrary`
  ADD PRIMARY KEY (`BOOK_ID`);

--
-- Indexes for table `bookofstudent`
--
ALTER TABLE `bookofstudent`
  ADD PRIMARY KEY (`BOOK_ID`,`STUDENT_ID`),
  ADD KEY `FK_BOOK_ST` (`STUDENT_ID`);

--
-- Indexes for table `callcard`
--
ALTER TABLE `callcard`
  ADD PRIMARY KEY (`CARD_ID`),
  ADD KEY `CLERK` (`CLERK`);

--
-- Indexes for table `detailcallcard`
--
ALTER TABLE `detailcallcard`
  ADD PRIMARY KEY (`CARD_ID`,`BOOK_ID`),
  ADD KEY `CLERK_RETURN` (`CLERK_RETURN`),
  ADD KEY `BOOK_ID` (`BOOK_ID`);

--
-- Indexes for table `infoexchange`
--
ALTER TABLE `infoexchange`
  ADD PRIMARY KEY (`INFO_ID`),
  ADD KEY `FK_EX_B1_RQ` (`BOOK_ID_1`),
  ADD KEY `FK_EX_B2_RQ` (`BOOK_ID_2`),
  ADD KEY `FK_EX_ST1_RQ` (`STUDENT_ID_1`),
  ADD KEY `FK_EX_ST2_RQ` (`STUDENT_ID_2`);

--
-- Indexes for table `rqexchange`
--
ALTER TABLE `rqexchange`
  ADD PRIMARY KEY (`REQUEST_ID`),
  ADD KEY `FK_ST1_ST` (`STUDENT_ID_1`),
  ADD KEY `FK_ST2_ST` (`STUDENT_ID_2`),
  ADD KEY `FK_B1_B` (`BOOK_ID_1`),
  ADD KEY `FK_B2_B` (`BOOK_ID_2`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`STUDENT_ID`),
  ADD UNIQUE KEY `STUDENT_EMAIL` (`STUDENT_EMAIL`,`STUDENT_PHONE`),
  ADD KEY `STUDENT_EMAIL_2` (`STUDENT_EMAIL`,`STUDENT_ADDRESS`),
  ADD KEY `STUDENT_ADDRESS` (`STUDENT_ADDRESS`),
  ADD KEY `STUDENT_EMAIL_5` (`STUDENT_EMAIL`);
ALTER TABLE `student` ADD FULLTEXT KEY `STUDENT_EMAIL_3` (`STUDENT_EMAIL`,`STUDENT_PHONE`);
ALTER TABLE `student` ADD FULLTEXT KEY `STUDENT_EMAIL_4` (`STUDENT_EMAIL`);
ALTER TABLE `student` ADD FULLTEXT KEY `STUDENT_PHONE` (`STUDENT_PHONE`);
ALTER TABLE `student` ADD FULLTEXT KEY `STUDENT_ADDRESS_2` (`STUDENT_ADDRESS`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookoflibrary`
--
ALTER TABLE `bookoflibrary`
  MODIFY `BOOK_ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bookofstudent`
--
ALTER TABLE `bookofstudent`
  MODIFY `BOOK_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `callcard`
--
ALTER TABLE `callcard`
  MODIFY `CARD_ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `infoexchange`
--
ALTER TABLE `infoexchange`
  MODIFY `INFO_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rqexchange`
--
ALTER TABLE `rqexchange`
  MODIFY `REQUEST_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `STUDENT_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112112;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookofstudent`
--
ALTER TABLE `bookofstudent`
  ADD CONSTRAINT `FK_BOOK_ST` FOREIGN KEY (`STUDENT_ID`) REFERENCES `student` (`STUDENT_ID`);

--
-- Constraints for table `callcard`
--
ALTER TABLE `callcard`
  ADD CONSTRAINT `callcard_ibfk_1` FOREIGN KEY (`CLERK`) REFERENCES `accountmanage` (`MANAGE_USERNAME`);

--
-- Constraints for table `detailcallcard`
--
ALTER TABLE `detailcallcard`
  ADD CONSTRAINT `detailcallcard_ibfk_1` FOREIGN KEY (`CLERK_RETURN`) REFERENCES `accountmanage` (`MANAGE_USERNAME`),
  ADD CONSTRAINT `detailcallcard_ibfk_2` FOREIGN KEY (`CARD_ID`) REFERENCES `callcard` (`CARD_ID`),
  ADD CONSTRAINT `detailcallcard_ibfk_3` FOREIGN KEY (`BOOK_ID`) REFERENCES `bookoflibrary` (`BOOK_ID`);

--
-- Constraints for table `infoexchange`
--
ALTER TABLE `infoexchange`
  ADD CONSTRAINT `FK_EX_B1_RQ` FOREIGN KEY (`BOOK_ID_1`) REFERENCES `rqexchange` (`BOOK_ID_1`),
  ADD CONSTRAINT `FK_EX_B2_RQ` FOREIGN KEY (`BOOK_ID_2`) REFERENCES `rqexchange` (`BOOK_ID_2`),
  ADD CONSTRAINT `FK_EX_ST1_RQ` FOREIGN KEY (`STUDENT_ID_1`) REFERENCES `rqexchange` (`STUDENT_ID_1`),
  ADD CONSTRAINT `FK_EX_ST2_RQ` FOREIGN KEY (`STUDENT_ID_2`) REFERENCES `rqexchange` (`STUDENT_ID_2`);

--
-- Constraints for table `rqexchange`
--
ALTER TABLE `rqexchange`
  ADD CONSTRAINT `FK_B1_B` FOREIGN KEY (`BOOK_ID_1`) REFERENCES `bookofstudent` (`BOOK_ID`),
  ADD CONSTRAINT `FK_B2_B` FOREIGN KEY (`BOOK_ID_2`) REFERENCES `bookofstudent` (`BOOK_ID`),
  ADD CONSTRAINT `FK_ST1_ST` FOREIGN KEY (`STUDENT_ID_1`) REFERENCES `student` (`STUDENT_ID`),
  ADD CONSTRAINT `FK_ST2_ST` FOREIGN KEY (`STUDENT_ID_2`) REFERENCES `student` (`STUDENT_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
