-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 19, 2023 lúc 02:03 PM
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
-- Cơ sở dữ liệu: `du_an_mau`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binh_luan`
--

CREATE TABLE `binh_luan` (
  `ma_bl` int(11) NOT NULL,
  `noi_dung` varchar(255) NOT NULL,
  `ma_hh` int(11) NOT NULL,
  `ma_kh` varchar(20) NOT NULL,
  `ngay_bl` varchar(50) NOT NULL,
  `ten_kh` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `binh_luan`
--

INSERT INTO `binh_luan` (`ma_bl`, `noi_dung`, `ma_hh`, `ma_kh`, `ngay_bl`, `ten_kh`) VALUES
(13, 'đẹp quá', 8, 'minhloi2k4', '12:35:17 13/10/2023', 'Minh Lợi');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_don_hang`
--

CREATE TABLE `chi_tiet_don_hang` (
  `id` int(11) NOT NULL,
  `ma_kh_donhang` varchar(255) DEFAULT NULL,
  `ma_sp_donhang` int(11) DEFAULT NULL,
  `hinh` varchar(255) DEFAULT NULL,
  `ten_sp_donhang` varchar(255) DEFAULT NULL,
  `gia` varchar(50) DEFAULT NULL,
  `so_luong` int(11) DEFAULT NULL,
  `thanh_tien` varchar(50) DEFAULT NULL,
  `id_donhang` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chi_tiet_don_hang`
--

INSERT INTO `chi_tiet_don_hang` (`id`, `ma_kh_donhang`, `ma_sp_donhang`, `hinh`, `ten_sp_donhang`, `gia`, `so_luong`, `thanh_tien`, `id_donhang`) VALUES
(7, 'pd08035 ', 12, 'Đồng hồ thông minh Apple Watch SE 2022.jpg', 'Đồng hồ thông minh Apple Watch SE 2022 GPS 40mm', '5992000', 1, '5992000', 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `don_hang`
--

CREATE TABLE `don_hang` (
  `id` int(11) NOT NULL,
  `ten_kh` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `dia_chi_day_du` varchar(255) NOT NULL,
  `phuong_thuc` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0.thanh toán khi nhận hàng 1.thanh toán chuyển khoản\r\n',
  `ngay_dathang` varchar(30) NOT NULL,
  `ghichu` varchar(255) DEFAULT NULL,
  `tong_tatca` varchar(30) NOT NULL,
  `trang_thai_don_hang` tinyint(5) DEFAULT 0 COMMENT '0.chờ xác nhận 1.đang giao 2.đã giao'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `don_hang`
--

INSERT INTO `don_hang` (`id`, `ten_kh`, `email`, `phone`, `dia_chi_day_du`, `phuong_thuc`, `ngay_dathang`, `ghichu`, `tong_tatca`, `trang_thai_don_hang`) VALUES
(6, 'Minh Lợi', 'minhloi921819@gmail.com', '0394382153', 'đád, , , ', 0, '11:18:52 19/10/2023', '', '5.992.000', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hang_hoa`
--

CREATE TABLE `hang_hoa` (
  `ma_hh` int(11) NOT NULL,
  `ten_hh` varchar(50) NOT NULL,
  `don_gia` decimal(10,0) NOT NULL,
  `giam_gia` decimal(10,0) NOT NULL,
  `con_hh` decimal(10,0) NOT NULL,
  `hinh` varchar(50) NOT NULL,
  `ngay_nhap` date DEFAULT NULL,
  `mo_ta` longtext NOT NULL,
  `thong_tin_hh` longtext NOT NULL,
  `dac_biet` bit(1) DEFAULT b'0',
  `so_luot_xem` int(11) NOT NULL,
  `ma_loai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hang_hoa`
--

INSERT INTO `hang_hoa` (`ma_hh`, `ten_hh`, `don_gia`, `giam_gia`, `con_hh`, `hinh`, `ngay_nhap`, `mo_ta`, `thong_tin_hh`, `dac_biet`, `so_luot_xem`, `ma_loai`) VALUES
(2, 'Tai nghe Bluetooth AirPods Pro (2nd Gen) MagSafe C', 6190000, 6, 5818600, 'Tai nghe Bluetooth AirPods Pro.jpeg', '2023-10-09', '<h3>Thông tin sản phẩm</h3><h3>Thiết kế <a href=\"\">tai nghe AirPods Pro 2</a> gọn nhẹ, kiểu dáng hiện đại</h3><p>Về phần thiết kế, nhà Apple vẫn giữ nguyên kiểu dáng quen thuộc của những phiên bản tiền nhiệm trước đó như: Thiết kế gọn nhẹ, đường bo góc tinh tế, gam màu trắng trang nhã bao bọc trọn vẹn <a href=\"\">tai nghe</a> và hộp sạc.</p>', '<ul><li>Thời gian tai nghe: Dùng 6 giờ</li><li>Thời gian hộp sạc: Dùng 30 giờ</li><li>Cổng sạc: Lightning Sạc không dây Qi Sạc Mag Safe</li><li>Công nghệ âm thanh: Adaptive EQA ctive Noise Cancellation Chip Apple H2</li><li>Tương thích: Android, iOS, Windows</li><li>Tiện ích: Chống nước IPX4Sạc không dây Có mic thoại Sạc nhanh Chống ồn chủ động ANC Trợ lý ảo Siri</li><li>Hỗ trợ kết nối: Bluetooth 5.3</li><li>Điều khiển bằng: Cảm ứng chạm</li></ul>', b'0', 0, 1),
(3, 'Điện thoại iPhone 15 Pro', 28990000, 3, 28120300, 'Điện thoại iPhone 15 Pro.jpg', '2023-10-09', '<h3>Thông tin sản phẩm</h3><p><strong>Đặc điểm nổi bật của iPhone 15 Pro</strong><br>•&nbsp;Chế tác bộ bộ khung viền từ chất liệu Titanium cứng cáp<br>•&nbsp;Sở hữu cấu hình mạnh mẽ bậc nhất trong ngành điện thoại<br>•&nbsp;Camera hỗ trợ chụp zoom quang hoặc 3x<br>•&nbsp;Hỗ trợ quay video chất lượng 4K cùng khả năng chống rung đỉnh cao<br>•&nbsp;Thay thế gạt rung bằng Action Button mới lạ và tiện lợi<br>•&nbsp;Chuyển đổi cổng sạc USB-C, truyền tải dữ liệu tốc độ cao</p>', '<ul><li><strong>Màn hình: OLED6.1\"Super Retina XDR</strong></li><li><strong>Hệ điều hành: iOS 17</strong></li><li><strong>Camera sau: Chính 48 MP &amp; Phụ 12 MP, 12 MP</strong></li><li><strong>Camera trước: 12 MP</strong></li><li><strong>Chip: Apple A17 Pro 6 nhân</strong></li><li><strong>RAM: 8 GB</strong></li><li><strong>Dung lượng lưu trữ: 128 GB</strong></li><li><strong>SIM: 1 Nano SIM &amp; 1 e SIM Hỗ trợ 5G</strong></li><li><strong>Pin, Sạc: 3274 mAh20 W</strong></li></ul>', b'0', 0, 6),
(4, 'Pin sạc dự phòng Polymer 10000mAh 12W AVA+ DS609A', 380000, 15, 323000, 'Pin sạc dự phòng Polymer.jpg', '2023-10-09', '<h3>Thông tin sản phẩm</h3><h3><a href=\"\">Pin sạc dự phòng Polymer 10000mAh 12W AVA+ DS609A</a> sở hữu dung lượng pin lớn chỉ trong 1 thiết kế gọn nhẹ, mang đến cho bạn những trải nghiệm tuyệt vời.</h3><p>•&nbsp;Thiết kế pin sạc dự phòng gọn chắc, gam màu sang trọng, khối lượng chỉ với 205 g, dễ dàng mang theo bất cứ đâu.</p><p>•&nbsp;Chia sẻ năng lượng từ&nbsp;<a href=\"\">pin sạc dự phòng</a> cùng lúc cho 2 thiết bị nhờ trang bị 2 cổng sạc USB (mức công suất tối đa 12 W), giúp tiết kiệm thời gian chờ sạc.</p><p>•&nbsp;Sử dụng thoải mái và thuận tiện nhờ dung lượng pin sạc dự phòng lên đến 10.000 mAh và hiệu suất sạc 60%, tương đương số lần sạc chiếc iPhone 12 từ 2 đến 3 lần tuỳ vào tình trạng pin còn lại.</p><p>•&nbsp;Sạc lại pin cho <a href=\"\">pin sạc dự phòng AVA+</a> thông qua cổng micro USB hoặc Type C với thời gian sạc khoảng 10 - 11 giờ (dùng adapter 1A) và 5 - 6 giờ (dùng adapter 2A).</p><p>•&nbsp;Sản phẩm phù hợp để sử dụng cho các thiết bị phổ biến hiện nay như: Điện thoại, tai nghe, đồng hồ thông minh,…</p>', '<ul><li><strong>Hiệu suất sạc: 60%</strong></li><li><strong>Dung lượng pin: 10000 mAh</strong></li><li><strong>Thời gian sạc đầy pin: 5 - 6 giờ (dùng Adapter 2A)10 - 11 giờ (dùng Adapter 1A)</strong></li><li><strong>Nguồn vào: Type-C: 5V - 2AMicro USB: 5V - 2A</strong></li><li><strong>Nguồn ra: USB 1: 5V - 2.4AUSB 2: 5V - 2.4A</strong></li><li><strong>Lõi pin: Polymer</strong></li><li><strong>Công nghệ/Tiện ích: Đèn LED báo hiệu</strong></li><li><strong>Kích thước: Dày 2.6 cm - Rộng 6.3 cm - Dài 9.9 cm</strong></li><li><strong>Khối lượng: 205 g</strong></li><li><strong>Thương hiệu của: Shop Minh Lợi</strong></li></ul>', b'0', 0, 1),
(5, 'Chuột Bluetooth Silent Logitech M240', 400000, 12, 352000, 'Chuột Bluetooth Silent.jpg', '2023-10-09', '<h3>Thông tin sản phẩm</h3><h3><a href=\"\">Chuột Bluetooth Silent Logitech M240</a>&nbsp;với kiểu dáng gọn gàng, gam màu đẹp mắt, kích thước vừa vặn tay cầm, kết nối ổn định cùng độ nhạy khá cao, hứa hẹn mang đến cho bạn những trải nghiệm tuyệt vời.</h3><p>•&nbsp;Màu sắc thanh lịch, khối lượng siêu gọn nhẹ chỉ 73.8 g, không chiếm quá nhiều diện tích không gian, tiện lợi bỏ vào balo hay túi xách mang theo bất cứ đâu.</p><p>•&nbsp;Thiết kế&nbsp;<a href=\"\">chuột</a>&nbsp;với đường nét sắc sảo đến từng chi tiết đem đến cho người dùng cảm giác êm tay trong quá trình sử dụng, hạn chế mỏi tay khi dùng trong thời gian dài.</p><p>• Trang bị tốc độ di chuyển khá nhanh và phản hồi cao nhờ độ phân giải lên đến 4000 DPI, bạn có thể điều chỉnh mức DPI phù hợp cho từng loại tác vụ, tối ưu trải nghiệm sử dụng.</p><p>•&nbsp;Bạn có thể dễ dàng kết nối với các thiết bị thông qua Bluetooth trong vòng 10 m, đường truyền ổn định và mượt mà.</p>', '<ul><li><strong>Tương thích: macOS (MacBook, iMac) Windows</strong></li><li><strong>Độ phân giải: 4000 DPI</strong></li><li><strong>Cách kết nối: Bluetooth</strong></li><li><strong>Độ dài dây / Khoảng cách kết nối: 10 m</strong></li><li><strong>Loại pin: 1 viên pin AA</strong></li><li><strong>Trọng lượng: 73.8 g (bao gồm hộp)</strong></li><li><strong>Thương hiệu của: Thụy Sĩ</strong></li><li><strong>Sản xuất tại: Trung Quốc</strong></li></ul>', b'0', 0, 1),
(6, 'Samsung Galaxy Z Flip5 5G', 25990000, 4, 24950400, 'Samsung Galaxy Z Flip5 5G.jpg', '2023-10-09', '<h3>Thông tin sản phẩm</h3><h3><a href=\"\">Samsung Galaxy Z Flip5</a>&nbsp;đã chính thức ra mắt vào ngày 26 tháng 7. Đây là một chiếc điện thoại thông minh có thiết kế độc đáo với màn hình gập, được trang bị bộ vi xử lý cao cấp Snapdragon 8 Gen 2 for Galaxy, RAM 8 GB, bộ nhớ trong 256 GB, camera kép 12 MP và pin 3700 mAh.</h3><ul><li><strong>ĐẶC ĐIỂM NỔI BẬT</strong><br>● Sở hữu lối thiết kế gập độc đáo - mang tính phá cách và thời thượng<br>● Hiệu năng mạnh mẽ từ chip&nbsp;Snapdragon 8 Gen 2 for Galaxy<br>● Màn hình phụ Flex Window 3.4 inch<br>● Công nghệ Flex mới - gập không kẽ hở</li></ul>', '<ul><li><strong>Màn hình: Chính: Dynamic AMOLED 2X, Phụ: Super AMOLE Chính 6.7\" &amp; Phụ 3.4\"Full HD+</strong></li><li><strong>Hệ điều hành: Android 13</strong></li><li><strong>Camera sau: 2 camera 12 MP</strong></li><li><strong>Camera trước: 10 MP</strong></li><li><strong>Chip: Snapdragon 8 Gen 2 for Galaxy</strong></li><li><strong>RAM: 8 GB</strong></li><li><strong>Dung lượng lưu trữ: 256 GB</strong></li><li><strong>SIM: 1 Nano SIM &amp; 1 eSIM Hỗ trợ 5G</strong></li><li><strong>Pin, Sạc: 3700 mAh25 W</strong></li></ul>', b'0', 0, 3),
(7, 'Samsung Galaxy Z Fold5 5G', 40990000, 20, 32792000, 'Samsung Galaxy Z Fold5 5G.jpg', '2023-10-09', '<h3>Thông tin sản phẩm</h3><h3><a href=\"\">Samsung Galaxy Z Fold5</a>&nbsp;là mẫu điện thoại cao cấp được ra mắt vào tháng 07/2023 với nhiều điểm đáng chú ý như thiết kế gập độc đáo, hiệu năng mạnh mẽ cùng camera quay chụp tốt, điều này giúp cho máy thu hút được nhiều sự quan tâm của đông đảo người dùng yêu công nghệ hiện nay.</h3><ul><li><strong>ĐẶC ĐIỂM NỔI BẬT</strong><br>● Nổi bật với thiết kế cơ chế gập độc đáo, chắc chắn và bền bỉ<br>● Cấu hình khủng với chip Snapdragon 8 Gen 2 for Galaxy<br>● Đa nhiệm linh hoạt, tối ưu hiệu suất làm việc<br>● Hoàn thiện với các chất liệu cao cấp</li></ul>', '<ul><li><strong>Màn hình: Dynamic AMOLED 2XChính 7.6\" &amp; Phụ 6.2\"Quad HD+ (2K+)</strong></li><li><strong>Hệ điều hành: Android 13</strong></li><li><strong>Camera sau: Chính 50 MP &amp; Phụ 12 MP, 10 MP</strong></li><li><strong>Camera trước: 10 MP &amp; 4 MP</strong></li><li><strong>Chip: Snapdragon 8 Gen 2 for Galaxy</strong></li><li><strong>RAM: 12 GB</strong></li><li><strong>Dung lượng lưu trữ: 256 GB</strong></li><li><strong>SIM: 2 Nano SIM hoặc 1 Nano SIM + 1 eSIM Hỗ trợ 5G</strong></li><li><strong>Pin, Sạc: 4400 mAh25 W</strong></li></ul>', b'0', 0, 3),
(8, 'OPPO Find N2 Flip 5G', 19990000, 0, 19990000, 'OPPO Find N2 Flip 5G.jpg', '2023-10-09', '<h3>Thông tin sản phẩm</h3><h3><a href=\"\">OPPO Find N2 Flip 5G</a>&nbsp;-&nbsp;chiếc điện thoại gập đầu tiên của OPPO đã được giới thiệu chính thức tại Việt Nam vào tháng 03/2023. Sở hữu cấu hình mạnh mẽ cùng thiết kế&nbsp;siêu nhỏ gọn giúp tối ưu kích thước, chiếc điện thoại sẽ&nbsp;cùng bạn nổi bật trong mọi không gian với vẻ ngoài đầy cá tính.</h3><h3>Sử dụng ngôn ngữ thiết kế gập hiện đại</h3><p>Là mẫu điện thoại gập dọc đầu tiên của OPPO, vì thế Find N2 Flip mang đến cho mình khá nhiều sự tò mò cũng như cảm hứng về phần thiết kế, điều này giúp quá trình sử dụng trở nên thú vị hơn so với đại đa số những mẫu máy thông thường khác.</p><p>Tổng quan về cái nhìn, theo mình máy trong khá dài và thon, khi mở hoàn toàn thì Find N2 Flip có kích thước lên tới 166.2 mm nhưng sau khi gập thì máy chỉ còn 85.5 mm. Lúc này điện thoại trở nên nhỏ gọn hơn, cầm nắm cũng chắc tay hơn.&nbsp;</p>', '<ul><li><strong>Màn hình: AMOLED Chính 6.8\" &amp; Phụ 3.26\"Full HD+</strong></li><li><strong>Hệ điều hành: Android 13</strong></li><li><strong>Camera sau: Chính 50 MP &amp; Phụ 8 MP</strong></li><li><strong>Camera trước: 32 MP</strong></li><li><strong>Chip: MediaTek Diversity 9000+ 8 nhân</strong></li><li><strong>RAM: 8 GB</strong></li><li><strong>Dung lượng lưu trữ: 256 GB</strong></li><li><strong>SIM: 2 Nano SIM Hỗ trợ 5G</strong></li><li><strong>Pin, Sạc: 4300 mAh44 W</strong></li></ul>', b'0', 0, 4),
(9, 'iPhone 14 Pro Max', 29990000, 11, 26691100, 'iPhone 14 Pro Max.jpg', '2023-10-09', '<h3>Thông tin sản phẩm</h3><h3><a href=\"\">iPhone 14 Pro Max</a>&nbsp;một siêu phẩm trong giới smartphone được nhà Táo tung ra thị trường vào tháng 09/2022. Máy trang bị con chip Apple A16 Bionic vô cùng mạnh mẽ, đi kèm theo đó là thiết kế hình màn hình mới, hứa hẹn mang lại những trải nghiệm đầy mới mẻ cho người dùng iPhone.</h3><h3>Thiết kế cao cấp bền bỉ</h3><p>iPhone năm nay sẽ được thừa hưởng nét đặc trưng từ người anh <a href=\"\">iPhone 13 Pro Max</a>, vẫn sẽ là khung thép không gỉ và mặt lưng kính cường lực kết hợp với tạo hình vuông vức hiện đại thông qua cách tạo hình phẳng ở các cạnh và phần mặt lưng.</p>', '<ul><li><strong>Màn hình: OLED6.7\"Super Retina XDR</strong></li><li><strong>Hệ điều hành: iOS 16</strong></li><li><strong>Camera sau: Chính 48 MP &amp; Phụ 12 MP, 12 MP</strong></li><li><strong>Camera trước: 12 MP</strong></li><li><strong>Chip: Apple A16 Bionic</strong></li><li><strong>RAM: 6 GB</strong></li><li><strong>Dung lượng lưu trữ: 128 GB</strong></li><li><strong>SIM: 1 Nano SIM &amp; 1 eSIMHỗ trợ 5G</strong></li><li><strong>Pin, Sạc: 4323 mAh20 W</strong></li></ul>', b'0', 0, 6),
(10, 'Laptop HP 15s fq2716TU i3 1115G4/8GB/512GB/Win11 (', 13690000, 2, 13416200, 'Laptop HP 15s.jpg', '2023-10-09', '<h3>Thông tin sản phẩm</h3><h3>Nếu bạn đang tìm kiếm một chiếc <a href=\"\">laptop học tập - văn phòng</a> có thể đáp ứng tất tần tật mọi nhu cầu sử dụng hàng ngày từ học tập, làm việc văn phòng đến thiết kế đồ họa cơ bản, còn chần chừ gì nữa mà không tham khảo ngay <a href=\"\">laptop HP 15s fq2716TU i3 (7C0X3PA)</a>.</h3><p>• Bộ vi xử lý <strong>Intel Core i3 1115G4</strong> đi kèm card tích hợp <strong>Intel UHD Graphics</strong> cho hiệu năng ổn định, mạnh mẽ trong khi vẫn tối ưu được mức điện năng tiêu thụ, dễ dàng cân trọn mọi tác vụ từ văn phòng với Word, Excel, PowerPoint,...</p><p>• <a href=\"\">Laptop</a> được trang bị một thanh <strong>RAM DDR4 8 GB</strong> hỗ trợ đa nhiệm trơn tru, bạn có thể mở cùng lúc nhiều tabs Chrome mà không lo máy bị tràn RAM gây giật lag. Kết hợp cùng ổ cứng <strong>SSD 512 GB</strong> nâng cao tốc độ truy xuất dữ liệu, không gian lưu trữ thoải mái cho mọi tài liệu cần thiết.</p>', '<ul><li><strong>CPU: i31115G43GHz</strong></li><li><strong>RAM: 8 GBDDR4 2 khe (1 khe 8 GB + 1 khe rời)3200 MHz</strong></li><li><strong>Ổ cứng: 512 GB SSD NVMe PCIe</strong></li><li><strong>Màn hình: 15.6\"Full HD (1920 x 1080)</strong></li><li><strong>Card màn hình: Card tích hợpIntel UHD</strong></li><li><strong>Cổng kết nối: HDMI2x SuperSpeed USB AJack tai nghe 3.5 mm1x SuperSpeed USB Type-C</strong></li><li><strong>Hệ điều hành: Windows 11 Home SL</strong></li><li><strong>Thiết kế: Vỏ nhựa</strong></li><li><strong>Kích thước, khối lượng: Dài 358.5 mm - Rộng 242 mm - Dày 17.9 mm - Nặng 1.7 kg</strong></li></ul>', b'0', 0, 5),
(11, 'Laptop MSI Gaming GF63 Thin 11UC i5 11400H/8GB/512', 18490000, 13, 16086300, 'Laptop MSI Gaming GF63.jpg', '2023-10-09', '<h3>Thông tin sản phẩm</h3><h3><a href=\"\">Laptop MSI Gaming GF63 Thin 11UC i5 11400H (1230VN)</a> là chiếc laptop gaming quốc dân trong phân khúc tầm trung nhưng hiệu năng mạnh mẽ không ngán tác vụ nào. Nổi bật với thiết kế thon gọn, tinh tế giúp cho em laptop này vượt trội so với các đối thủ cùng phân khúc sẽ đồng hành cùng bạn trong các trận game online đầy kịch tính.</h3><h3>Thiết kế gọn nhẹ bất ngờ so với một chiếc laptop gaming</h3><p>Tổng quan về thiết kế là một tone <strong>màu đen</strong> huyền bí cùng điểm nhấn xước phây ở mặt lưng và kèm đó là logo rồng đỏ mang lại sự mạnh mẽ, nam tính. Một lớp vỏ bọc ngoài bởi hợp kim <strong>nhôm</strong> chất lượng cực kì cao cấp chống được trầy xước và tăng tuổi thọ cho máy. Mặt laptop này hơi bám dấu vân tay nhưng mình cũng chỉ cần vệ sinh một chút là xong.</p>', '<ul><li><strong>CPU: i511400H2.7GHz</strong></li><li><strong>RAM: 8 GBDDR4 2 khe (1 khe 8 GB + 1 khe rời)3200 MHz</strong></li><li><strong>Ổ cứng: 512 GB SSD NVMe PCIeHỗ trợ khe cắm SATA 2.5 inch mở rộng (nâng cấp SSD hoặc HDD đều được)</strong></li><li><strong>Màn hình: 15.6\"Full HD (1920 x 1080) 144Hz</strong></li><li><strong>Card màn hình: Card rờiRTX 3050 Max-Q, 4GB</strong></li><li><strong>Cổng kết nối: HDMILAN (RJ45)USB Type-C3 x USB 3.2Jack tai nghe 3.5 mm</strong></li><li><strong>Đặc biệt: Có đèn bàn phím</strong></li><li><strong>Hệ điều hành: Windows 11 Home SL</strong></li><li><strong>Thiết kế: Vỏ kim loại</strong></li><li><strong>Kích thước, khối lượng: Dài 359 mm - Rộng 254 mm - Dày 21.7 mm - Nặng 1.86 kg</strong></li></ul>', b'0', 0, 5),
(12, 'Đồng hồ thông minh Apple Watch SE 2022 GPS 40mm', 7490000, 20, 5992000, 'Đồng hồ thông minh Apple Watch SE 2022.jpg', '2023-10-09', '<h3>Thông tin sản phẩm</h3><h3>Trong sự kiện Far Out 2022, nhà Táo Khuyết đã mang đến hàng loạt sản phẩm mới trong đó có đồng hồ thông minh <a href=\"\">Apple Watch SE 2022</a> GPS 40mm. Mẫu smartwatch giá rẻ mới nhất của Apple này hứa hẹn sẽ khiến cho các iFans đứng ngồi không yên khi sở hữu nhiều tính năng hấp dẫn.</h3><h3>Kiểu dáng cuốn hút với thiết kế đặc trưng của Apple</h3><p>Nhìn tổng thể, <a href=\"\">đồng hồ thông minh Apple Watch SE 2022</a> vẫn giữ kiểu thiết kế tương tự như thế hệ tiền nhiệm, tuy nhiên&nbsp;đã được Apple trang bị <strong>màn hình lớn hơn 30%</strong> so với phiên bản Watch 3 Series, cho bạn một không gian hiển thị lớn hơn. Tấm nền <strong>OLED</strong> cùng độ phân giải <strong>324 x 394 pixels</strong> cũng mang đến những trải nghiệm về thị giác tuyệt vời trong bất cứ điều kiện ánh sáng nào.</p>', '<ul><li><strong>Màn hình: OLED</strong></li><li><strong>Thời lượng pin: Khoảng 18 giờ (ở chế độ sử dụng thông thường)Khoảng 1.5 ngày (ở chế độ tiết kiệm pin)</strong></li><li><strong>Kết nối với hệ điều hành: iPhone 8 trở lên với iOS phiên bản mới nhất</strong></li><li><strong>Mặt: Ion-X strengthened glass40 mm</strong></li><li><strong>Tính năng cho sức khỏe: Theo dõi mức độ stress,Tính quãng đường chạy,Đếm số bước chân,Theo dõi giấc ngủ,Đo nhịp tim,Tính lượng calories tiêu thụ,Theo dõi chu kỳ kinh nguyệt,Chế độ luyện tập,Cảm biến nhiệt độ,Nhắc nhở nhịp tim cao, thấp,Gửi thông báo khi có tai nạn</strong></li></ul>', b'0', 0, 2),
(13, 'Đồng hồ thông minh HONOR Watch GS3 45.9mm Đen', 5490000, 50, 2745000, 'Đồng hồ thông minh HONOR.jpeg', '2023-10-09', '<h3>Thông tin sản phẩm</h3><h3>Mang phong cách thiết kế thanh lịch, tinh tế, hỗ trợ nhiều tính năng theo dõi sức khỏe, cùng nhiều tiện ích đi kèm,&nbsp;<a href=\"\">đồng hồ HONOR Watch GS3</a>&nbsp;sẽ là một thiết bị không thể thiếu cho các tín đồ yêu thích luyện tập và lối sống hiện đại.</h3><h3>Thiết kế thanh lịch, năng động với màn hình là điểm nhấn</h3><p><a href=\"\">Đồng hồ thông minh HONOR</a>&nbsp;mang diện mạo lịch lãm, thời trang với dáng mặt tròn cổ điển, kết hợp khung viền <strong>thép không gỉ</strong>&nbsp;mang lại sự bóng bẩy và tăng khả năng bảo vệ các chi tiết bên trong cho đồng hồ.</p>', '<ul><li><strong>Màn hình: AMOLED1.43 inch</strong></li><li><strong>Thời lượng pin: Khoảng 30 giờ khi sử dụng GPS Khoảng 14 ngày (ở chế độ cơ bản)</strong></li><li><strong>Kết nối với hệ điều hành: Android 9 trở lêniOS 11 trở lên</strong></li><li><strong>Mặt: Kính cường lực45.9 mm&nbsp;</strong></li><li><strong>Tính năng cho sức khỏe: Theo dõi mức độ stressTính quãng đường chạyĐếm số bước chânĐo nồng độ oxy (SpO2)Theo dõi giấc ngủTính lượng calories tiêu thụTheo dõi nhịp tim 24hTheo dõi nhịp thởTheo dõi sức khỏe và thể chấtNhắc nhở ít vận độngNhắc nhở nhịp tim cao, thấpTự động phát hiện chế độ tập luyệnTheo dõi nhịp tim bằng trí tuệ nhân tạo (AI)</strong></li></ul>', b'0', 0, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `img_chitietsanpham`
--

CREATE TABLE `img_chitietsanpham` (
  `id` int(11) NOT NULL,
  `idma_sp` int(11) NOT NULL,
  `hinh_chi_tiet` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `img_chitietsanpham`
--

INSERT INTO `img_chitietsanpham` (`id`, `idma_sp`, `hinh_chi_tiet`) VALUES
(15, 2, 'Tai nghe Bluetooth AirPods Pro1.jpg'),
(16, 2, 'Tai nghe Bluetooth AirPods Pro2.jpg'),
(17, 2, 'Tai nghe Bluetooth AirPods Pro3.jpg'),
(18, 2, 'Tai nghe Bluetooth AirPods Pro4.jpg'),
(19, 2, 'Tai nghe Bluetooth AirPods Pro5.jpg'),
(23, 3, 'Điện thoại iPhone 15 Pro1.jpg'),
(24, 3, 'Điện thoại iPhone 15 Pro2.jpg'),
(25, 3, 'Điện thoại iPhone 15 Pro3.jpg'),
(26, 3, 'Điện thoại iPhone 15 Pro4.jpg'),
(27, 4, 'Pin sạc dự phòng Polymer1.jpg'),
(28, 4, 'Pin sạc dự phòng Polymer2.jpg'),
(29, 4, 'Pin sạc dự phòng Polymer3.jpg'),
(30, 4, 'Pin sạc dự phòng Polymer4.jpg'),
(31, 5, 'Chuột Bluetooth Silent1.jpg'),
(32, 5, 'Chuột Bluetooth Silent2.jpg'),
(33, 5, 'Chuột Bluetooth Silent3.jpg'),
(34, 5, 'Chuột Bluetooth Silent4.jpg'),
(35, 6, 'Samsung Galaxy Z Flip5 5G1.jpg'),
(36, 6, 'Samsung Galaxy Z Flip5 5G2.jpg'),
(37, 6, 'Samsung Galaxy Z Flip5 5G3.jpg'),
(38, 6, 'Samsung Galaxy Z Flip5 5G4.jpg'),
(39, 7, 'Samsung Galaxy Z Fold5 5G1.jpg'),
(40, 7, 'Samsung Galaxy Z Fold5 5G2.jpg'),
(41, 7, 'Samsung Galaxy Z Fold5 5G3.jpg'),
(42, 7, 'Samsung Galaxy Z Fold5 5G4.jpg'),
(43, 8, 'OPPO Find N2 Flip 5G1.jpg'),
(44, 8, 'OPPO Find N2 Flip 5G2.jpg'),
(45, 8, 'OPPO Find N2 Flip 5G3.jpg'),
(46, 8, 'OPPO Find N2 Flip 5G4.jpg'),
(47, 9, 'iPhone 14 Pro Max1.jpg'),
(48, 9, 'iPhone 14 Pro Max2.jpg'),
(49, 9, 'iPhone 14 Pro Max3.jpg'),
(50, 9, 'iPhone 14 Pro Max4.jpg'),
(51, 10, 'Laptop HP 15s1.jpg'),
(52, 10, 'Laptop HP 15s2.jpg'),
(53, 10, 'Laptop HP 15s3.jpg'),
(54, 11, 'Laptop MSI Gaming GF63 Thin 11UC i51.jpg'),
(55, 11, 'Laptop MSI Gaming GF63 Thin 11UC i52.jpg'),
(56, 11, 'Laptop MSI Gaming GF63 Thin 11UC i53.jpg'),
(57, 11, 'Laptop MSI Gaming GF63 Thin 11UC i54.jpg'),
(58, 12, 'Đồng hồ thông minh Apple Watch SE 20221.jpg'),
(59, 12, 'Đồng hồ thông minh Apple Watch SE 20222.jpg'),
(60, 12, 'Đồng hồ thông minh Apple Watch SE 20223.jpg'),
(61, 13, 'Đồng hồ thông minh HONOR1.jpg'),
(62, 13, 'Đồng hồ thông minh HONOR2.jpg'),
(63, 13, 'Đồng hồ thông minh HONOR3.jpg'),
(64, 13, 'Đồng hồ thông minh HONOR4.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khach_hang`
--

CREATE TABLE `khach_hang` (
  `ma_kh` varchar(20) NOT NULL,
  `mat_khau` varchar(50) NOT NULL,
  `ho_ten` varchar(50) NOT NULL,
  `kich_hoat` int(1) NOT NULL DEFAULT 0,
  `hinh` varchar(255) NOT NULL DEFAULT 'anhdaidien.jpg',
  `email` varchar(50) NOT NULL,
  `vai_tro` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khach_hang`
--

INSERT INTO `khach_hang` (`ma_kh`, `mat_khau`, `ho_ten`, `kich_hoat`, `hinh`, `email`, `vai_tro`) VALUES
('minhloi2k4', '123', 'Minh Lợi', 0, 'chinh5.jpg', 'minhloi921819@gmail.com', 0),
('nguoi_dung', '123', 'Minh Lợi', 1, 'anhdaidien.jpg', '', 0),
('pd08035', '123', 'Minh Lợi', 0, '16.jpg', 'lointmpd08035@fpt.edu.vn', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai_hang`
--

CREATE TABLE `loai_hang` (
  `ma_loai` int(10) NOT NULL,
  `ten_loai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loai_hang`
--

INSERT INTO `loai_hang` (`ma_loai`, `ten_loai`) VALUES
(1, 'PHỤ KIỆN'),
(2, 'SMARTWATCH'),
(3, 'SAMSUNG'),
(4, 'OPPO'),
(5, 'LAPTOP'),
(6, 'IPHONE');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD PRIMARY KEY (`ma_bl`),
  ADD KEY `ma_hh` (`ma_hh`),
  ADD KEY `ma_kh` (`ma_kh`);

--
-- Chỉ mục cho bảng `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ma_kh_donhang` (`ma_kh_donhang`),
  ADD KEY `ma_sp_donhang` (`ma_sp_donhang`),
  ADD KEY `id_donhang` (`id_donhang`);

--
-- Chỉ mục cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `hang_hoa`
--
ALTER TABLE `hang_hoa`
  ADD PRIMARY KEY (`ma_hh`),
  ADD KEY `ma_loai` (`ma_loai`);

--
-- Chỉ mục cho bảng `img_chitietsanpham`
--
ALTER TABLE `img_chitietsanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idma_sp` (`idma_sp`);

--
-- Chỉ mục cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`ma_kh`);

--
-- Chỉ mục cho bảng `loai_hang`
--
ALTER TABLE `loai_hang`
  ADD PRIMARY KEY (`ma_loai`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  MODIFY `ma_bl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `hang_hoa`
--
ALTER TABLE `hang_hoa`
  MODIFY `ma_hh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `img_chitietsanpham`
--
ALTER TABLE `img_chitietsanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT cho bảng `loai_hang`
--
ALTER TABLE `loai_hang`
  MODIFY `ma_loai` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD CONSTRAINT `binh_luan_ibfk_1` FOREIGN KEY (`ma_hh`) REFERENCES `hang_hoa` (`ma_hh`),
  ADD CONSTRAINT `binh_luan_ibfk_2` FOREIGN KEY (`ma_kh`) REFERENCES `khach_hang` (`ma_kh`);

--
-- Các ràng buộc cho bảng `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  ADD CONSTRAINT `chi_tiet_don_hang_ibfk_1` FOREIGN KEY (`ma_kh_donhang`) REFERENCES `khach_hang` (`ma_kh`),
  ADD CONSTRAINT `chi_tiet_don_hang_ibfk_2` FOREIGN KEY (`ma_sp_donhang`) REFERENCES `hang_hoa` (`ma_hh`),
  ADD CONSTRAINT `chi_tiet_don_hang_ibfk_3` FOREIGN KEY (`id_donhang`) REFERENCES `don_hang` (`id`);

--
-- Các ràng buộc cho bảng `hang_hoa`
--
ALTER TABLE `hang_hoa`
  ADD CONSTRAINT `hang_hoa_ibfk_1` FOREIGN KEY (`ma_loai`) REFERENCES `loai_hang` (`ma_loai`);

--
-- Các ràng buộc cho bảng `img_chitietsanpham`
--
ALTER TABLE `img_chitietsanpham`
  ADD CONSTRAINT `img_chitietsanpham_ibfk_1` FOREIGN KEY (`idma_sp`) REFERENCES `hang_hoa` (`ma_hh`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
