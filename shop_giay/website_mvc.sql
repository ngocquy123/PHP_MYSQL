-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 08, 2022 lúc 06:26 PM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `website_mvc`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminEmail` varchar(150) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminPass` varchar(255) NOT NULL,
  `level` tinyint(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminName`, `adminEmail`, `adminUser`, `adminPass`, `level`) VALUES
(1, 'ngoc quy', 'quy@gmail.com', 'quy', '202cb962ac59075b964b07152d234b70', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_binhluan`
--

CREATE TABLE `tbl_binhluan` (
  `binhluan_id` int(11) NOT NULL,
  `tenbinhluan` varchar(100) NOT NULL,
  `binhluan` text NOT NULL,
  `productId` int(11) UNSIGNED NOT NULL,
  `blog_id` int(11) UNSIGNED NOT NULL,
  `image` varchar(120) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_binhluan`
--

INSERT INTO `tbl_binhluan` (`binhluan_id`, `tenbinhluan`, `binhluan`, `productId`, `blog_id`, `image`, `status`) VALUES
(1, 'quy', 'asdasd', 3, 0, '', 1),
(3, 'quý', 'quý ơi là quý', 3, 0, '', 1),
(10, 'ngọc quý', 'hmm sản phẩm tốt ghê', 3, 0, '', 1),
(11, 'Quy', 'helllooo', 7, 0, '', 1),
(42, 'Ngọc quý', 'hello', 7, 0, '', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_blog`
--

CREATE TABLE `tbl_blog` (
  `id` int(11) UNSIGNED NOT NULL,
  `title_blog` varchar(100) NOT NULL,
  `description` tinytext NOT NULL,
  `content` text NOT NULL,
  `category_post` int(11) UNSIGNED NOT NULL,
  `image` varchar(140) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_blog`
--

INSERT INTO `tbl_blog` (`id`, `title_blog`, `description`, `content`, `category_post`, `image`, `status`) VALUES
(2, 'amd mới cho ra chip mới siêu khủng', '<p>m&ocirc; tả tin tức thứ 1</p>\r\n<div id=\"eJOY__extension_root\" class=\"eJOY__extension_root_class\" style=\"all: unset;\">&nbsp;</div>', '<p>nội dung 1</p>\r\n<div id=\"eJOY__extension_root\" class=\"eJOY__extension_root_class\" style=\"all: unset;\">&nbsp;</div>', 2, 'ec78681899.jpg', 1),
(3, 'Tìm smartphone tầm trung kháng nước để đi biển, đâu là lựa chọn dành cho bạn?', '<h2 class=\"knc-sapo\">Kh&aacute;ng nước l&agrave; t&iacute;nh năng v&ocirc; c&ugrave;ng cần thiết tr&ecirc;n smartphone, nhưng kh&ocirc;ng phải mẫu m&aacute;y n&agrave;o cũng c&oacute;, đặc biệt l&agrave; ở ph&acirc;n kh&uacute;c tầm', '<p>M&ugrave;a h&egrave; l&agrave; khoảng thời gian m&agrave; nhu cầu nghỉ dưỡng tăng cao, trong đ&oacute; c&aacute;c b&atilde;i biển l&agrave; điểm đến l&yacute; tưởng của hầu hết mọi người. Trong chuyến du lịch, smartphone l&agrave; c&ocirc;ng cụ kh&ocirc;ng thể thiếu để ghi lại những khoảnh khắc đẹp.</p>\r\n<p>Mặc d&ugrave; vậy, đa số người d&ugrave;ng vẫn tỏ ra do dự khi d&ugrave;ng smartphone để chụp ảnh ở biển, do t&acirc;m l&yacute; lo ngại rằng m&aacute;y bị hỏng h&oacute;c do lọt nước. Điều n&agrave;y v&ocirc; t&igrave;nh khiến cho họ bỏ lỡ những kỷ niệm đ&aacute;ng nhớ. Ch&iacute;nh v&igrave; vậy, sở hữu một chiếc smartphone với khả năng kh&aacute;ng nước để sẵn s&agrave;ng cho kỳ nghỉ sắp tới l&agrave; v&ocirc; c&ugrave;ng cần thiết.</p>\r\n<p>Thậm ch&iacute;, ngay cả khi bạn kh&ocirc;ng c&oacute; nhu cầu chụp ảnh dưới nước, một chiếc điện thoại kh&aacute;ng nước vẫn l&agrave; v&ocirc; c&ugrave;ng lợi hại. Bởi lẽ, &ldquo;tai nạn&rdquo; trong cuộc sống h&agrave;ng ng&agrave;y l&agrave; điều ho&agrave;n to&agrave;n c&oacute; thể xảy ra, v&agrave; t&iacute;nh năng kh&aacute;ng nước như một lớp bảo vệ để cứu nguy trong nhiều t&iacute;nh huống.</p>\r\n<p><span>Một chiếc smartphone như thế n&agrave;o l&agrave; đạt chuẩn kh&aacute;ng nước?</span></p>\r\n<p>Khả năng kh&aacute;ng nước v&agrave; bụi của một chiếc smartphone được đ&aacute;nh gi&aacute; dựa tr&ecirc;n chuẩn IP, một ti&ecirc;u chuẩn được IEC (International Electrotechnical Commission - Ủy ban kỹ thuật điện quốc tế) đặt ra.&nbsp;</p>\r\n<p>Để c&oacute; khả năng kh&aacute;ng nước, một chiếc smartphone cần đạt chuẩn IP67 (kh&aacute;ng nước ở độ s&acirc;u 1m trong 30 ph&uacute;t) hoặc IP68 (1.5m trong 30 ph&uacute;t). Hiện nay c&oacute; một số smartphone đạt chuẩn IP53, tuy nhi&ecirc;n thực tế mức n&agrave;y chỉ c&oacute; thể bảo vệ khỏi những c&uacute; tạt nước, vậy n&ecirc;n kh&ocirc;ng thật sự hiệu quả.&nbsp;</p>\r\n<div><img id=\"img_456725329140920320\" title=\"T&igrave;m smartphone tầm trung kh&aacute;ng nước để đi biển, đ&acirc;u l&agrave; lựa chọn d&agrave;nh cho bạn? - Ảnh 1.\" src=\"https://genk.mediacdn.vn/thumb_w/640/139269124445442048/2022/6/2/waterproof-phones-1654155797745-1654155798005869824540.jpg\" alt=\"T&igrave;m smartphone tầm trung kh&aacute;ng nước để đi biển, đ&acirc;u l&agrave; lựa chọn d&agrave;nh cho bạn? - Ảnh 1.\" width=\"\" height=\"\" data-original=\"https://genk.mediacdn.vn/139269124445442048/2022/6/2/waterproof-phones-1654155797745-1654155798005869824540.jpg\" /></div>\r\n<p data-placeholder=\"Nhập ch&uacute; th&iacute;ch ảnh\">Khả năng kh&aacute;ng nước của smartphone được quyết định bởi chứng chỉ IP</p>\r\n<p><span>Chọn smartphone tầm trung kh&aacute;ng nước hiệu quả</span></p>\r\n<p>Mặc d&ugrave; đ&oacute;ng vai tr&ograve; cực kỳ thiết yếu, nhưng kh&aacute;ng nước vẫn được coi l&agrave; t&iacute;nh năng cao cấp v&agrave; thường chỉ c&oacute; mặt tr&ecirc;n c&aacute;c d&ograve;ng m&aacute;y đầu bảng, c&oacute; gi&aacute; l&ecirc;n đến v&agrave;i chục triệu đồng. L&yacute; do l&agrave; bởi quy tr&igrave;nh sản xuất smartphone đạt chuẩn kh&aacute;ng nước phức tạp hơn rất nhiều so với những chiếc smartphone th&ocirc;ng thường, ngo&agrave;i ra cũng cần trải qua quy tr&igrave;nh kiểm nghiệm nghi&ecirc;m ngặt m&agrave; chỉ c&aacute;c thương hiệu h&agrave;ng đầu mới đủ sức đ&aacute;p ứng.&nbsp;</p>\r\n<p>Vậy, liệu người d&ugrave;ng ở ph&acirc;n kh&uacute;c trung cấp (dưới 10 triệu đồng) c&oacute; cơ hội được trải nghiệm c&ocirc;ng nghệ cao cấp n&agrave;y kh&ocirc;ng?&nbsp;</p>\r\n<div><img id=\"img_456725841959571456\" title=\"T&igrave;m smartphone tầm trung kh&aacute;ng nước để đi biển, đ&acirc;u l&agrave; lựa chọn d&agrave;nh cho bạn? - Ảnh 2.\" src=\"https://genk.mediacdn.vn/thumb_w/640/139269124445442048/2022/6/2/samsung-galaxy-s22-series-iprating-1024x683-1654155919433-16541559195882131114905.jpg\" alt=\"T&igrave;m smartphone tầm trung kh&aacute;ng nước để đi biển, đ&acirc;u l&agrave; lựa chọn d&agrave;nh cho bạn? - Ảnh 2.\" width=\"\" height=\"\" data-original=\"https://genk.mediacdn.vn/139269124445442048/2022/6/2/samsung-galaxy-s22-series-iprating-1024x683-1654155919433-16541559195882131114905.jpg\" /></div>\r\n<p data-placeholder=\"Nhập ch&uacute; th&iacute;ch ảnh\">Kh&aacute;ng nước l&agrave; t&iacute;nh năng thường chỉ c&oacute; mặt tr&ecirc;n c&aacute;c d&ograve;ng m&aacute;y cao cấp</p>\r\n<p>Nhiều người kỳ vọng sẽ được c&oacute; được t&iacute;nh năng n&agrave;y khi mua những mẫu smartphone cao cấp qua sử dụng. Tuy nhi&ecirc;n, đ&acirc;y thực chất l&agrave; một canh bạc rủi ro, bởi người d&ugrave;ng kh&ocirc;ng thể kiểm so&aacute;t được chất lượng m&aacute;y cũ. Những chiếc m&aacute;y cũ ho&agrave;n to&agrave;n c&oacute; thể đ&atilde; bị &ldquo;mổ bụng&rdquo; trước đ&oacute; v&agrave; ảnh hưởng trực tiếp tới khả năng kh&aacute;ng nước. Ngo&agrave;i ra, khả năng kh&aacute;ng nước của một chiếc smartphone cũng c&oacute; thể bị hao m&ograve;n trong qu&aacute; tr&igrave;nh sử dụng.&nbsp;</p>\r\n<p>V&igrave; vậy, để đảm bảo khả năng kh&aacute;ng nước tuyệt đối, người d&ugrave;ng n&ecirc;n bỏ qua smartphone cũ, m&agrave; n&ecirc;n chọn những mẫu smartphone mới, chưa qua sử dụng.</p>\r\n<p><span>Tr&ecirc;n thị trường hiện nay, Samsung l&agrave; thương hiệu chiếm ưu thế trong lĩnh vực n&agrave;y, với h&agrave;ng loạt model Galaxy A với mức gi&aacute; dễ tiếp cận, nhưng vẫn c&oacute; khả năng kh&aacute;ng nước cao cấp đạt chuẩn IP67.&nbsp;</span></p>\r\n<p><span>Samsung Galaxy A52 -&nbsp;</span><em>Mức gi&aacute; tham khảo: 6.8 triệu đồng</em></p>\r\n<p>Galaxy A52 l&agrave; smartphone với mức gi&aacute; &ldquo;mềm&rdquo; nhất với khả năng kh&aacute;ng nước m&agrave; người d&ugrave;ng c&oacute; thể sở hữu.&nbsp; L&agrave; mẫu m&aacute;y đ&igrave;nh đ&aacute;m ở ph&acirc;n kh&uacute;c tầm trung năm 2021, mặc d&ugrave; đ&atilde; c&oacute; tuổi đời hơn 1 năm tuổi nhưng Galaxy A52 vẫn tương đối hấp dẫn ngay cả ở thời điểm năm 2022.&nbsp;</p>\r\n<div><img id=\"img_456724722740355072\" title=\"T&igrave;m smartphone tầm trung kh&aacute;ng nước để đi biển, đ&acirc;u l&agrave; lựa chọn d&agrave;nh cho bạn? - Ảnh 3.\" src=\"https://genk.mediacdn.vn/thumb_w/640/139269124445442048/2022/6/2/feature-a5272-1654155652639-1654155652924805414599.jpg\" alt=\"T&igrave;m smartphone tầm trung kh&aacute;ng nước để đi biển, đ&acirc;u l&agrave; lựa chọn d&agrave;nh cho bạn? - Ảnh 3.\" width=\"\" height=\"\" data-original=\"https://genk.mediacdn.vn/139269124445442048/2022/6/2/feature-a5272-1654155652639-1654155652924805414599.jpg\" /></div>\r\n<p>M&agrave;n h&igrave;nh 6.5 inch AMOLED tần số qu&eacute;t 90Hz, kết hợp dung lượng RAM 8GB đem đến cho người d&ugrave;ng một trải nghiệm tương đối mượt m&agrave;. Bộ&nbsp;5 camera chuy&ecirc;n nghiệp, trong đ&oacute; bao gồm với camera ch&iacute;nh độ ph&acirc;n giải tới 64MP hỗ trợ c&ocirc;ng nghệ chống rung quang học OIS v&agrave; camera selfie 32MP sẽ gi&uacute;p người d&ugrave;ng ghi lại những khoảnh khắc đẹp trong kỳ nghỉ. Dung lượng pin lớn 4500mAh gi&uacute;p Galaxy A52 đủ sức \"trụ\" cả ng&agrave;y d&agrave;i.</p>\r\n<p><span>Samsung Galaxy A52s 5G -&nbsp;</span><em>Mức gi&aacute; tham khảo: 8 triệu đồng</em></p>\r\n<p>Galaxy A52s 5G l&agrave; phi&ecirc;n bản n&acirc;ng cấp của Galaxy A52, kế thừa đầy đủ ưu điểm về m&agrave;n h&igrave;nh, camera, dung lượng pin v&agrave; kh&aacute;ng nước. Tuy nhi&ecirc;n, Galaxy A52s 5G n&acirc;ng trải nghiệm l&ecirc;n một tầm cao mới với chip Snapdragon 778G mạnh mẽ hơn. Ngo&agrave;i ra, Galaxy A52s 5G cũng hỗ trợ c&ocirc;ng nghệ mạng 5G ti&ecirc;n tiến nhất, sẵn s&agrave;ng cho tương lai.</p>\r\n<p><img src=\"https://genk.mediacdn.vn/139269124445442048/2021/8/18/photo-1-1629257570930349529288.jpg\" alt=\"Galaxy A52s 5G ra mắt: Thiết kế kh&ocirc;ng đổi, Snapdragon 778G, tặng k&egrave;m củ sạc  25W, gi&aacute; 12.9 triệu đồng\" /></p>\r\n<p><span>Samsung Galaxy A53 5G -&nbsp;</span><em>Mức gi&aacute; tham khảo: 9.8 triệu đồng</em></p>\r\n<p>Galaxy A53 5G l&agrave; smartphone tầm trung mới nhất của Samsung, cũng l&agrave; phi&ecirc;n bản kế nhiệm của Galaxy A52. Galaxy A53 5G nhận nhiều n&acirc;ng cấp đ&aacute;ng gi&aacute; về mạng 5G, m&agrave;n h&igrave;nh tần số qu&eacute;t 120Hz mượt m&agrave; v&agrave; dung lượng pin 5000mAh \"tr&acirc;u\" hơn.&nbsp;</p>\r\n<div><img id=\"img_456724987548155904\" title=\"T&igrave;m smartphone tầm trung kh&aacute;ng nước để đi biển, đ&acirc;u l&agrave; lựa chọn d&agrave;nh cho bạn? - Ảnh 4.\" src=\"https://genk.mediacdn.vn/thumb_w/640/139269124445442048/2022/6/2/11271-galaxy-a53-5g-728x410-1654155716638-1654155716843995951452.jpg\" alt=\"T&igrave;m smartphone tầm trung kh&aacute;ng nước để đi biển, đ&acirc;u l&agrave; lựa chọn d&agrave;nh cho bạn? - Ảnh 4.\" width=\"\" height=\"\" data-original=\"https://genk.mediacdn.vn/139269124445442048/2022/6/2/11271-galaxy-a53-5g-728x410-1654155716638-1654155716843995951452.jpg\" /></div>\r\n<p><span>Samsung Galaxy A33 5G -&nbsp;</span><em>Mức gi&aacute; tham khảo: 8.3 triệu đồng</em></p>\r\n<p>Galaxy A33 5G l&agrave; phi&ecirc;n bản r&uacute;t gọn của Galaxy A53 5G, được trang bị chip Exynos 1280 8 nh&acirc;n, RAM 6GB, bộ 4 camera 48MP, m&agrave;n h&igrave;nh 6.4 inch AMOLED tần số qu&eacute;t cao 90Hz v&agrave; pin 5000mAh.</p>\r\n<div><img id=\"img_456725076383514624\" title=\"T&igrave;m smartphone tầm trung kh&aacute;ng nước để đi biển, đ&acirc;u l&agrave; lựa chọn d&agrave;nh cho bạn? - Ảnh 5.\" src=\"https://genk.mediacdn.vn/thumb_w/640/139269124445442048/2022/6/2/006galaxya33535gcombokv2p-1358x960-1654155737497-16541557382191063166407.jpg\" alt=\"T&igrave;m smartphone tầm trung kh&aacute;ng nước để đi biển, đ&acirc;u l&agrave; lựa chọn d&agrave;nh cho bạn? - Ảnh 5.\" width=\"\" height=\"\" data-original=\"https://genk.mediacdn.vn/139269124445442048/2022/6/2/006galaxya33535gcombokv2p-1358x960-1654155737497-16541557382191063166407.jpg\" data-label=\"6654\" /></div>\r\n<p><span>B&ecirc;n cạnh những model Samsung Galaxy A n&oacute;i tr&ecirc;n, đối thủ Apple cũng c&oacute; một mẫu smartphone tầm trung đạt chuẩn kh&aacute;ng nước IP67, tuy c&oacute; c&aacute;c th&ocirc;ng số c&ograve;n lại kh&ocirc;ng hấp dẫn bằng.</span></p>\r\n<p><span>iPhone SE 2020 64GB -&nbsp;</span><em>Mức gi&aacute; tham khảo: 9.5 triệu đồng</em></p>\r\n<p>iPhone SE 2020 c&oacute; thế mạnh về cấu h&igrave;nh với chip A13 Bionic tương đương iPhone 11, kết hợp với hệ điều h&agrave;nh iOS để đem đến trải nghiệm mượt m&agrave;. Tuy nhi&ecirc;n, c&aacute;c yếu tố c&ograve;n lại của chiếc m&aacute;y n&agrave;y kh&ocirc;ng thật sự hấp dẫn, như thiết kế lỗi thời, m&agrave;n h&igrave;nh LCD k&iacute;ch cỡ nhỏ, camera đơn v&agrave; đặc biệt l&agrave; dung lượng pin thấp.&nbsp;</p>\r\n<p><img src=\"https://genk.mediacdn.vn/139269124445442048/2020/8/4/iphone-se-water-resistant-15965335960711996519806.jpg\" alt=\"Pixel 4a vs. iPhone SE (2020): Mẫu smartphone b&igrave;nh d&acirc;n n&agrave;o đ&aacute;ng để bạn lựa  chọn?\" /></p>', 3, 'b741aa17e8.webp', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brandId` int(11) UNSIGNED NOT NULL,
  `brandName` varchar(30) NOT NULL,
  `brand_categoryid` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_brand`
--

INSERT INTO `tbl_brand` (`brandId`, `brandName`, `brand_categoryid`) VALUES
(2, 'apple', 4),
(4, 'samsung', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cartId` int(11) NOT NULL,
  `productId` int(11) UNSIGNED NOT NULL,
  `sId` varchar(255) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` varchar(200) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category`
--

CREATE TABLE `tbl_category` (
  `catId` int(11) UNSIGNED NOT NULL,
  `catName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_category`
--

INSERT INTO `tbl_category` (`catId`, `catName`) VALUES
(2, 'Laptop'),
(3, 'Desktop'),
(4, 'Mobiles Phone');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cate_post`
--

CREATE TABLE `tbl_cate_post` (
  `id_cate_post` int(11) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_cate_post`
--

INSERT INTO `tbl_cate_post` (`id_cate_post`, `title`, `description`, `status`) VALUES
(2, 'tin công nghệ', 'tin công nghệ nổi bật nhất', 1),
(3, 'Tin điện thoại', 'tin điện thoại mới', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_compare`
--

CREATE TABLE `tbl_compare` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) UNSIGNED NOT NULL,
  `productId` int(11) UNSIGNED NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_compare`
--

INSERT INTO `tbl_compare` (`id`, `customer_id`, `productId`, `productName`, `price`, `image`) VALUES
(4, 3, 8, 'samsung galaxy ss20pro', '5600000', '3be65ba2d9.webp');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(30) NOT NULL,
  `zipcode` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `name`, `address`, `city`, `zipcode`, `phone`, `email`, `password`) VALUES
(3, 'Ngọc Quý', 'Bình Chánh, vĩnh lộc A ', 'Hồ Chí Minh ', '700000   ', '02324645   ', 'q1@gmail.com', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `productId` int(11) UNSIGNED NOT NULL,
  `productName` varchar(255) NOT NULL,
  `customer_id` int(11) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `date_order` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `productId`, `productName`, `customer_id`, `quantity`, `price`, `image`, `status`, `date_order`) VALUES
(16, 6, 'Điện thoại Samsung Galaxy A72 4G 8GB/256GB Đen', 3, 2, '24000000', 'fa34cc2b6b.jpg', 2, '2022-05-30 07:45:42'),
(17, 5, 'Điện thoại Samsung Galaxy S20 FE 8GB/256GB Xanh', 3, 1, '11900000', 'c1995ba22b.jpg', 2, '2022-05-30 07:36:25'),
(18, 5, 'Điện thoại Samsung Galaxy S20 FE 8GB/256GB Xanh', 3, 3, '35700000', 'c1995ba22b.jpg', 2, '2022-05-30 07:45:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product`
--

CREATE TABLE `tbl_product` (
  `productId` int(11) UNSIGNED NOT NULL,
  `productName` tinytext NOT NULL,
  `catId` int(11) UNSIGNED NOT NULL,
  `brandId` int(11) UNSIGNED NOT NULL,
  `product_desc` text NOT NULL,
  `type` varchar(255) NOT NULL,
  `price` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`productId`, `productName`, `catId`, `brandId`, `product_desc`, `type`, `price`, `image`, `status`) VALUES
(3, 'iphone 10x', 4, 2, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '0', '10000000', '33c8bf32ab.jpg', 1),
(4, 'Điện thoại Samsung Galaxy A52 4G 8GB/128GB Xanh', 4, 4, '<h3 class=\"featureContent_title\">M&agrave;n h&igrave;nh Super AMOLED chuẩn FHD+ sắc n&eacute;t, cuộn lướt mượt m&agrave;</h3>\r\n<p class=\"featureContent_caption\">Điện thoại Samsung Galaxy A52 4G 8GB/128GB Xanh&nbsp;n&acirc;ng tầm trải nghiệm giải tr&iacute; với m&agrave;n h&igrave;nh v&ocirc; cực Infinity-O thời thượng&nbsp;<span>6.5 inch</span>&nbsp;đưa bạn đắm ch&igrave;m trong kh&ocirc;ng gian của m&agrave;u sắc sống động. C&ocirc;ng nghệ Super AMOLED FHD+ hiển thị h&igrave;nh ảnh sắc n&eacute;t rực rỡ với độ s&aacute;ng l&ecirc;n đến 800 nit. C&ocirc;ng nghệ Eye Comfort Shield giảm thiểu &aacute;nh s&aacute;ng xanh g&acirc;y hại cho mắt, trong khi đ&oacute; c&ocirc;ng nghệ Real Smooth mang đến trải nghiệm mượt m&agrave; tối ưu,&nbsp;cho bạn cảm nhận sự kh&aacute;c biệt ở mỗi lần chạm.</p>\r\n<div id=\"eJOY__extension_root\" class=\"eJOY__extension_root_class\" style=\"all: unset;\">&nbsp;</div>', '1', '7590000', '10b72712a2.webp', 1),
(5, 'Điện thoại Samsung Galaxy S20 FE 8GB/256GB Xanh', 4, 4, '<h3 class=\"featureContent_title\">Trải nghiệm h&igrave;nh ảnh sắc n&eacute;t tr&ecirc;n m&agrave;n h&igrave;nh tr&agrave;n viền 6.5 inch</h3>\r\n<p class=\"featureContent_caption\">Điện thoại Samsung Galaxy S20 FE 8GB/256GB&nbsp;thu h&uacute;t mọi &aacute;nh nh&igrave;n với m&agrave;n h&igrave;nh tr&agrave;n viền sống động Infinity-O Super AMOLED 6.5 inch. Độ ph&acirc;n giải Full HD hiển thị h&igrave;nh ảnh sắc n&eacute;t m&agrave;u sắc ch&acirc;n thực cho&nbsp;cảm gi&aacute;c trải nghiệm thực sự sống động. Đặc biệt, tần số qu&eacute;t m&agrave;n h&igrave;nh của S20 FE l&ecirc;n tới 120 Hz gi&uacute;p cho trải ngiệm cho mọi trải nghiệm chạm, lướt mượt m&agrave; v&agrave; trơn tru.</p>\r\n<div id=\"eJOY__extension_root\" class=\"eJOY__extension_root_class\" style=\"all: unset;\">&nbsp;</div>', '1', '11900000', 'c1995ba22b.jpg', 1),
(6, 'Điện thoại Samsung Galaxy A72 4G 8GB/256GB Đen', 4, 4, '<h3 class=\"featureContent_title\">M&agrave;n h&igrave;nh Super AMOLED chuẩn FHD+ sắc n&eacute;t, cuộn lướt mượt m&agrave;</h3>\r\n<p class=\"featureContent_caption\">Điện thoại Samsung Galaxy A72 4G 8GB/256GB Đen&nbsp;n&acirc;ng tầm trải nghiệm giải tr&iacute; với m&agrave;n h&igrave;nh v&ocirc; cực Infinity-O thời thượng&nbsp;<span>6.7 inch</span>,&nbsp;tấm nền Super AMOLED cao cấp, độ s&aacute;ng l&ecirc;n tới 800 nits, độ ph&acirc;n giải Full HD+ sắc n&eacute;t. C&ocirc;ng nghệ Eye Comfort Shield giảm thiểu &aacute;nh s&aacute;ng xanh g&acirc;y hại cho mắt, trong khi đ&oacute; c&ocirc;ng nghệ Real Smooth mang đến trải nghiệm mượt m&agrave; tối ưu, để mọi thao t&aacute;c vuốt chạm tr&ecirc;n chiếc Samsung A72 đều mượt m&agrave; đ&aacute;ng kinh ngạc.</p>\r\n<div id=\"eJOY__extension_root\" class=\"eJOY__extension_root_class\" style=\"all: unset;\">&nbsp;</div>', '1', '12000000', 'fa34cc2b6b.jpg', 1),
(7, 'Điện thoại Xiaomi Redmi 9A 2GB/32GB Xám', 4, 4, '<h3 class=\"featureContent_title\">M&agrave;n h&igrave;nh HD+ 6.53 inch mở rộng kh&ocirc;ng gian trải nghiệm</h3>\r\n<p class=\"featureContent_caption\">Điện thoại Xiaomi Redmi 9A 2GB/32GB X&aacute;m c&oacute; diện mạo thời trang, m&agrave;u sắc nổi bật, mặt sau&nbsp;thiết kế đường v&acirc;n chống b&aacute;m v&acirc;n tay tốt. M&agrave;n h&igrave;nh lớn 6.53 inch HD+ gi&uacute;p mở rộng kh&ocirc;ng gian trải nghiệm h&igrave;nh ảnh, video. &Aacute;nh s&aacute;ng xanh thấp mang đến trải nghiệm xem thoải m&aacute;i.</p>\r\n<div id=\"eJOY__extension_root\" class=\"eJOY__extension_root_class\" style=\"all: unset;\">&nbsp;</div>', '0', '3540000', 'a61a00c078.webp', 1),
(8, 'samsung galaxy ss20pro', 4, 4, '<p>asdasdsadsadsadasdasds</p>\r\n<div id=\"eJOY__extension_root\" class=\"eJOY__extension_root_class\" style=\"all: unset;\">&nbsp;</div>', '1', '5600000', '3be65ba2d9.webp', 1),
(9, 'Samsung 5sa', 4, 4, '<p>asdasdasd</p>\r\n<div id=\"eJOY__extension_root\" class=\"eJOY__extension_root_class\" style=\"all: unset;\">&nbsp;</div>', 'Chọn Kiểu', '9500000', 'eadb5ab2a0.webp', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `sliderId` int(11) NOT NULL,
  `sliderName` varchar(255) NOT NULL,
  `sliderImage` varchar(255) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_slider`
--

INSERT INTO `tbl_slider` (`sliderId`, `sliderName`, `sliderImage`, `type`) VALUES
(3, 'slider 2', 'ed0f660e7c.png', 1),
(5, 'slider 1', '1a0801c2b4.png', 1),
(6, 'slider 3', 'd53ef0f184.png', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_wishlist`
--

CREATE TABLE `tbl_wishlist` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) UNSIGNED NOT NULL,
  `productId` int(11) UNSIGNED NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Chỉ mục cho bảng `tbl_binhluan`
--
ALTER TABLE `tbl_binhluan`
  ADD PRIMARY KEY (`binhluan_id`),
  ADD KEY `productId` (`productId`,`blog_id`);

--
-- Chỉ mục cho bảng `tbl_blog`
--
ALTER TABLE `tbl_blog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_post` (`category_post`);

--
-- Chỉ mục cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brandId`),
  ADD KEY `brand_categoryid` (`brand_categoryid`);

--
-- Chỉ mục cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cartId`),
  ADD KEY `productId` (`productId`);

--
-- Chỉ mục cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`catId`);

--
-- Chỉ mục cho bảng `tbl_cate_post`
--
ALTER TABLE `tbl_cate_post`
  ADD PRIMARY KEY (`id_cate_post`);

--
-- Chỉ mục cho bảng `tbl_compare`
--
ALTER TABLE `tbl_compare`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`,`productId`),
  ADD KEY `productId` (`productId`);

--
-- Chỉ mục cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productId` (`productId`,`customer_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Chỉ mục cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`productId`),
  ADD KEY `catId` (`catId`,`brandId`),
  ADD KEY `brandId` (`brandId`);

--
-- Chỉ mục cho bảng `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`sliderId`);

--
-- Chỉ mục cho bảng `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`,`productId`),
  ADD KEY `productId` (`productId`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_binhluan`
--
ALTER TABLE `tbl_binhluan`
  MODIFY `binhluan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `tbl_blog`
--
ALTER TABLE `tbl_blog`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brandId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `catId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `tbl_cate_post`
--
ALTER TABLE `tbl_cate_post`
  MODIFY `id_cate_post` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tbl_compare`
--
ALTER TABLE `tbl_compare`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `productId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `sliderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_binhluan`
--
ALTER TABLE `tbl_binhluan`
  ADD CONSTRAINT `tbl_binhluan_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `tbl_product` (`productId`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `tbl_blog`
--
ALTER TABLE `tbl_blog`
  ADD CONSTRAINT `tbl_blog_ibfk_1` FOREIGN KEY (`category_post`) REFERENCES `tbl_cate_post` (`id_cate_post`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD CONSTRAINT `tbl_brand_ibfk_1` FOREIGN KEY (`brand_categoryid`) REFERENCES `tbl_category` (`catId`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD CONSTRAINT `tbl_cart_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `tbl_product` (`productId`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `tbl_compare`
--
ALTER TABLE `tbl_compare`
  ADD CONSTRAINT `tbl_compare_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `tbl_customer` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_compare_ibfk_2` FOREIGN KEY (`productId`) REFERENCES `tbl_product` (`productId`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `tbl_order_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `tbl_customer` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_order_ibfk_2` FOREIGN KEY (`productId`) REFERENCES `tbl_product` (`productId`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `tbl_product_ibfk_1` FOREIGN KEY (`catId`) REFERENCES `tbl_category` (`catId`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_product_ibfk_2` FOREIGN KEY (`brandId`) REFERENCES `tbl_brand` (`brandId`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  ADD CONSTRAINT `tbl_wishlist_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `tbl_customer` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_wishlist_ibfk_2` FOREIGN KEY (`productId`) REFERENCES `tbl_product` (`productId`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
