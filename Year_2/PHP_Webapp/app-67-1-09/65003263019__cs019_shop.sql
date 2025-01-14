-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2024 at 10:31 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cs019_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(6) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `product_quantity` int(4) NOT NULL,
  `product_type` varchar(50) NOT NULL,
  `product_status` varchar(50) NOT NULL,
  `product_description` text NOT NULL,
  `product_image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_quantity`, `product_type`, `product_status`, `product_description`, `product_image_path`) VALUES
(1, 'Dyson Pure Cool ™ Air Purifier Fan TP00 (White/Silver) เครื่องฟอกอากาศ ไดสัน สีขาว', 14900.00, 14, 'เครื่องฟอกอากาศ', 'Normal', '• ให้ความเย็นแบบไม่มีใบพัด ไร้แรงปะทะลม ปลอดภัยในการใช้งานและทำความสะอาดง่าย พร้อมฟอกอากาศ\n\n• ตั้งเวลาปิดเครื่องได้ ตั้งแต่ 15 นาที, 30 นาที, 45 นาที, 1 ชั่วโมง, 2 ชั่วโมง, ... , 9 ชั่วโมง\n\n• 360 Glass HEPA Filter และ Activated graphite แบบใหม่ เพิ่ม graphite 3 เท่า เพื่อช่วยฟอกแก็ส กลิ่น และไอระเหยภายในบ้าน พร้อม Tris coating ช่วยเพิ่มประสิทธิภาพในการฟอกสารฟอร์มาลดีไฮด์\n\n• กรองอากาศบริสุทธิ์ระดับ PM 0.1 (0.1 ไมครอน) ได้ 99.95%\n\n• เทคโนโลยี Air Multiplier ช่วยกระจายลมที่พุ่งตรง และนุ่มนวล\n\n• หมุนส่ายได้ 70 องศา กระจายอากาศที่กรองแล้วไปทั่วทั้งห้อง\n\n• รีโมทแบบโค้งและมีแม่เหล็ก ที่สามารถเก็บวางไว้ที่ด้านบนของเครื่อง\n\n• ปรับความแรงลม 10 ระดับ และ ปริมาณลมที่ผ่าน 412 ลิตรต่อวินาที (at Max setting)\n\n• ระดับเสียง 62 เดซิเบล (Max flow)\n\n• แรงดันไฟฟ้า 220-240 โวลต์ ความถี่ 50-60 เฮิร์ตซ์ พร้อมความยาวสายไฟ 1.8 เมตร\n\n• กำลังไฟที่ใช้ : 6W (Min setting) / 56W (Max setting)\n\n• น้ำหนัก : 3.96 กก. (เครื่อง) / 5.38 กก. (กล่อง)\n\n• ขนาด (กว้าง x ยาว x สูง) : 190 x 110 x 1,018 มม. (เครื่อง) / 219 x 219 x 1,131 มม.(กล่อง)\n\n• สินค้ารับประกัน 2 ปี', ''),
(2, 'Xiaomi 13 12GB+256GB Leica professional optical lens | รับประกัน 24 เดือน', 24900.00, 8, 'โทรศัพท์มือถือ', 'Normal', 'หน้าจอ\r\n\r\nจอแบน\r\n\r\nFHD+ 6.36\" AMOLED\r\n\r\n20:9, 2400 x 1080\r\n\r\n120Hz AMOLED\r\n\r\nAdaptiveSync\r\n\r\nความไวตอบสนองการสัมผัส: สูงสุด 240Hz\r\n\r\nความสว่าง: HBM 1200 nits (typ), ความสว่างสูงสุด 1900 nits\r\n\r\nจอแสดงผล HDR ระดับโปร\r\n\r\nDolby Vision®\r\n\r\nHDR10+\r\n\r\nช่วงสี: DCI-P3\r\n\r\nหน้าจอ TrueColor: JNCD≈ 0.32, Delta E≈ 0.36*\r\n\r\nเซ็นเซอร์ตรวจจับแสงรอบทิศทาง 360°\r\n\r\nโปรเซสเซอร์\r\n\r\nแพลตฟอร์มมือถือ Snapdragon® 8 Gen 2\r\n\r\nกระบวนการผลิตที่ประหยัดพลังงาน 4nm\r\n\r\nGPU: Qualcomm® Adreno™ GPU\r\n\r\nกล้องหลัง\r\n\r\nเลนส์ออปติคัลระดับโปรจาก Leica\r\n\r\nLEICA VARIO-SUMMICRON 1:1.8-2.2/15-75 ASPH\r\n\r\n\"กล้องหลักจาก Leica\r\n\r\n\"\r\n\r\n50MP\r\n\r\nขนาดพิกเซล 1.0μm, 4-in-1 Super Pixel ขนาด 2.0μm\r\n\r\nความยาวโฟกัสเทียบเท่า 23 มม.\r\n\r\nf/1.8\r\n\r\nHyperOIS', ''),
(3, '[New] Xiaomi Pad 6 8GB+128GB รับประกัน 15 เดือน', 10990.00, 10, 'แท็บเล็ต', 'Normal', 'ประสิทธิภาพระดับเรือธง\r\n\r\nลำโพงสี่ตัวให้เสียงสเตอริโออันดื่มด่ำ\r\n\r\nรองรับ Dolby Vision® และ Dolby Atmos®\r\n\r\nเล่นวิดีโอได้นานสูงสุด 16 ชั่วโมง*\r\n\r\nขับเคลื่อนด้วยระบบชาร์จเร็ว 33W**\r\n\r\n\"*ทดสอบในห้องปฏิบัติการภายในของ Xiaomi ผลลัพธ์จริงอาจแตกต่างออกไป\r\n\r\n**ไม่มีอะแดปเตอร์แปลงไฟมาให้ในกล่อง อะแดปเตอร์แปลงไฟ 33W และสายชาร์จจำหน่ายแยกต่างหาก และขอแนะนำให้ใช้ Xiaomi 33W Charging Combo (Type-A)\"\r\n\r\n\r\n\r\nดีไซน์\r\n\r\n\"คุณภาพระดับเรือธง \r\n\r\nส่งตรงถึงมือคุณ\"\r\n\r\nยูนิบอดี้แบบโลหะทั้งชิ้น\r\n\r\nGravity Grey\r\n\r\nGold\r\n\r\nMist blue\r\n\r\n13MP\r\n\r\nกล้องหลักด้านหลังระดับ Ultra-HD\r\n\r\nหนา 6.51 มม.\r\n\r\nหนัก 490 กรัม\r\n\r\nหน้าจอ\r\n\r\n\"หน้าจอสีสันแม่นยำพิเศษ \r\n\r\nยกระดับการสร้างผลงานระดับมืออาชีพ\"\r\n\r\nหน้าจอ 2.8K Ultra-HD\r\n\r\nอัตรารีเฟรชผันแปร 7 ระดับ สูงสุด 144Hz\r\n\r\nหน้าจอ 2.8K Ultra-HD ขนาด 11 นิ้ว พร้อม 309PPI และอัตรารีเฟรชผันแปร 7 ระดับ สูงสุด 144Hz\r\n\r\nเสริมความโดดเด่นให้ทุกรายละเอียดของภาพด้วยหน้าจอสวยสดสะดุดตาเพื่อการสื่ออารมณ์ที่สร้างสรรค์มากยิ่งขึ้น\r\n\r\n*อัตรารีเฟรชจะแตกต่างออกไปตามสถานการณ์และสับเปลี่ยนเองโดยอัตโนมัติ\r\n\r\n\r\n\r\nอุปกรณ์เสริม\r\n\r\nปลดปล่อยประสิทธิภาพไปกับคู่หูที่รู้ใจ\r\n\r\nXiaomi Smart Pen (2nd generation)\r\n\r\n\r\n\r\n*Xiaomi Smart Pen (2nd generation) ใช้ได้กับ Xiaomi Pad 5 ซีรี่ส์ และ Xiaomi Pad 6\r\n\r\n*Xiaomi Pad 6 ไม่สามารถเข้ากันได้กับ Xiaomi Smart Pen (1st generation)\r\n\r\n\r\n\r\nขนาด\r\n\r\nความยาว: 253.95 มม.\r\n\r\nความกว้าง: 165.18 มม.\r\n\r\nความหนา: 6.51 มม.\r\n\r\nน้ำหนัก: 490 กรัม\r\n\r\n\r\n\r\nโปรเซสเซอร์\r\n\r\nQualcomm® Snapdragon™ 870\r\n\r\nกระบวนการผลิต 7nm\r\n\r\nพื้นที่จัดเก็บข้อมูลและ RAM\r\n\r\n6GB+128GB, 8GB+128GB, 8GB+256GB\r\n\r\nLPDDR5 RAM + พื้นที่จัดเก็บ UFS 3.1\r\n\r\n*พื้นที่จัดเก็บและ RAM ที่ใช้ได้จะน้อยกว่าหน่วยความจำรวมเนื่องจากถูกใช้จัดเก็บระบบปฏิบัติการและซอฟต์แวร์ที่ติดตั้งมาล่วงหน้าบนอุปกรณ์\r\n\r\nหน้าจอ\r\n\r\nขนาด: จอแสดงผล 11 นิ้ว\r\n\r\nประเภทหน้าจอ: LCD\r\n\r\nความละเอียด: 2880*1800\r\n\r\n309 ppi\r\n\r\nอัตรารีเฟรช: 144Hz\r\n\r\nความสว่าง : 550nits (typ）\r\n\r\nอัตราคอนทราสต์: 1400：1\r\n\r\nมากกว่า 1 พันล้านสี\r\n\r\nรองรับ DCI-P3\r\n\r\nใบรับรองแสงสีฟ้าต่ำของ TÜV\r\n\r\nกระจก Corning® Gorilla® 3\r\n\r\nDolby Vision / Dolby Atmos\r\n\r\n\r\n\r\nกล้องถ่ายรูป\r\n\r\nกล้องหลัง: 13MP\r\n\r\nf/2.2 PDAF\r\n\r\n4k | 30fps\r\n\r\n1080p | 30fps\r\n\r\n720p | 30fps\r\n\r\nกล้องหน้า: 8 MP\r\n\r\n1.12um f/2.2\r\n\r\n1080p | 30fps\r\n\r\n720p | 30fps\r\n\r\nแบตเตอรี่และการชาร์จ\r\n\r\n8840mAh (typ) / 8640mAh(ขั้นต่ำ)\r\n\r\nชาร์จแบบมีสาย 33W (ไม่มีอะแดปเตอร์แปลงไฟมาให้ในกล่อง อะแดปเตอร์แปลงไฟ 33W และสายชาร์จจำหน่ายแยกต่างหาก และขอแนะนำให้ใช้ Xiaomi 33W Charging Combo (Type-A))\r\n\r\nรองรับ QC4 / QC3+ / QC3.0 / QC2.0 / PD3.0 / ชาร์จเร็ว PD2.0 / ชาร์จเร็ว MI FC1.0\r\n\r\nการถ่ายโอนข้อมูล\r\n\r\nUSB3.2 Gen1\r\n\r\n5Gbps\r\n\r\n* สาย USB3 ต้องซื้อแยกต่างหาก สายที่ให้มาในบรรจุภัณฑ์ไม่รองรับการถ่ายโอนข้อมูลผ่าน USB3\r\n\r\n\r\n\r\nการเชื่อมต่อ\r\n\r\nUSB Type-C\r\n\r\nWiFi 6，WiFi 5，WiFi 4 และ 802.11a / b / g\r\n\r\n2.4G WiFi | 5G WiFi\r\n\r\nBluetooth 5.2\r\n\r\nรองรับ AAC/LDAC/LHDC 3.0\r\n\r\nรองรับ IPv6\r\n\r\nไฟล์เสียงและวิดีโอ\r\n\r\nMP3, FLAC, APE, AAC, OGG, WAV, AMR, AWB\r\n\r\nรองรับ Hi-Res และ Hi-Res Wireless Audio, Dolby Atmos®\r\n\r\n3G2, AVI, DivX, TS/M2TS, MKV, WEBM, MPG, 3GP/MPEG-4, MOV,\r\n\r\nASF/WMV, HEIC/HEIF\r\n\r\nHDR 10, Dolby Vision\r\n\r\n4 ไมค์\r\n\r\n4 ลำโพง\r\n\r\nเซ็นเซอร์\r\n\r\nตัววัดความเร่ง, ไจโรสโคป, เซ็นเซอร์วัดระดับแสงโดยรอบ, เซ็นเซอร์แบบฮอลล์\r\n\r\nระบบปฏิบัติการ\r\n\r\nMIUI 14 สำหรับ Pad\r\n\r\nAndroid 13\r\n\r\n\r\n\r\nภายในกล่อง\r\n\r\nXiaomi Pad 6 / สาย USB Type-C / คู่มือการใช้งานเบื้องต้น / บัตรรับประกัน\r\n\r\n*ขนาดหน้าจอของ Xiaomi Pad 6 ใหญ่ประมาณ 11 นิ้ว ในรูปสี่เหลี่ยมผืนผ้าเมื่อวัดในแนวทแยง พื้นที่แสดงเนื้อหาจริงจะเล็กกว่าเนื่องจากดีไซน์ขอบโค้งของเครื่อง และค่าที่วัดได้จากผลิตภัณฑ์แต่ละเครื่องอาจแตกต่างกัน', ''),
(4, 'Nanyang Changdao Flipflop รองเท้าแตะช้างดาว สีเทา (Grey)', 109.00, 10, 'รองเท้าแตะแบบหนีบ', 'Normal', '- พื้นยางผลิตจากยางธรรมชาติ 100% ทำให้นุ่ม มีสปริงและความยืดหยุ่น ทนทานสูง -ผ่านกระบวนการผลิตและสูตรผสมพิเศษของนันยาง - สายยางหูหนีบ ผลิตจากยางคุณภาพสูง ทำให้ทนทาน สวมใส่สบายเท้า - ได้รับมาตราฐาน มอก. 131/2523 สำหรับรองเท้าฟองน้ำราย แรกและรายเดียวของประเทศไทย', ''),
(34, 'rrter', 4.00, 747, 'เครื่องใช้ไฟฟ้า', 'ปกติ', 'th', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
