-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2020 at 07:14 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(40) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(40) NOT NULL,
  `admin_password` varchar(40) NOT NULL,
  `admin_ph_number` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `admin_ph_number`) VALUES
(1, 'Sahran', 'sahranm129@gmail.com', '123', 702319885),
(2, 'sahran', 'sahran@gmail.com', '123', 123456789);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(100) NOT NULL,
  `brand_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'Canon '),
(2, 'Nikon'),
(3, 'Pentax'),
(4, 'Sony'),
(5, 'Olympus'),
(6, 'Leica');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `price` int(100) NOT NULL,
  `qty` int(10) NOT NULL DEFAULT '1',
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `sub_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`p_id`, `ip_add`, `price`, `qty`, `start_date`, `end_date`, `sub_total`) VALUES
(55, '::1', 2500, 1, '2020-06-06', '2020-06-09', 7500);

-- --------------------------------------------------------

--
-- Table structure for table `catogories`
--

CREATE TABLE `catogories` (
  `cat_id` int(100) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catogories`
--

INSERT INTO `catogories` (`cat_id`, `cat_title`) VALUES
(1, 'Cameras'),
(2, 'Lenses'),
(7, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(10) NOT NULL,
  `pro_id` int(100) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `payment` int(100) NOT NULL,
  `customer_id` int(100) NOT NULL,
  `qty` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `pro_id`, `start_date`, `end_date`, `payment`, `customer_id`, `qty`) VALUES
(53, 79, '2020-05-31', '2020-06-02', 2400, 20, 1),
(54, 79, '2020-05-31', '2020-06-02', 2400, 25, 1),
(55, 56, '2020-06-01', '2020-06-03', 3000, 20, 1),
(56, 56, '2020-06-01', '2020-06-03', 3000, 25, 1),
(57, 54, '2020-06-01', '2020-06-08', 10500, 20, 1),
(58, 54, '2020-06-01', '2020-06-08', 10500, 25, 1),
(59, 75, '2020-06-01', '2020-06-08', 10500, 20, 1),
(60, 75, '2020-06-01', '2020-06-08', 10500, 25, 1),
(61, 55, '2020-06-06', '2020-06-09', 7500, 29, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(100) NOT NULL,
  `product_cat` int(100) NOT NULL,
  `product_brand` int(40) NOT NULL,
  `product_title` varchar(200) NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_desc` varchar(3000) NOT NULL,
  `product_qunty` int(100) NOT NULL DEFAULT '1',
  `product_status` varchar(100) NOT NULL DEFAULT 'Available',
  `product_img1` text NOT NULL,
  `product_img2` text NOT NULL,
  `product_img3` text NOT NULL,
  `product_img4` text NOT NULL,
  `product_keyword` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_brand`, `product_title`, `product_price`, `product_desc`, `product_qunty`, `product_status`, `product_img1`, `product_img2`, `product_img3`, `product_img4`, `product_keyword`) VALUES
(54, 1, 1, 'Canon EOS 5D Mark III Body', 1500, '<p>22.3-megapixel full-frame CMOS</p>\r\n<p>14-bit A/D conversion</p>\r\n<p>Wide range ISO setting of 100-25600</p>\r\n<p>DIGIC 5+ image processor</p>\r\n<p>New 61-point high-density reticular AF, including up to 41 cross-type AF points</p>\r\n<p>EOS HD video with manual exposure control and multiple frame rates</p>\r\n<p>Selectable \"All i-frame\" or IPB compressions</p>\r\n<p>Up to 6.0 fps continuous shooting</p>\r\n<p>The Canon EOS 5D series became famous for kick-starting the DSLR video resolution, and accordingly the Canon EOS 5D Mark III is a stunningly capable video performer, capturing beautiful cinematic movies in EOS HD quality. A 22.3MP full-frame CMOS sensor is paired with the Canon DIGIC 5+ processor to ensure stunning imagery with fast operation.</p>', 1, 'Available', 'Canon_EOS_5D_MkIII_Body_223MP.jpg', 'Canon_EOS_5D_MkIII_Body_223MP_1.jpg', 'Canon_EOS_5D_MkIII_Body_223MP_2.jpg', 'Canon_EOS_5D_MkIII_Body_223MP_3.jpg', 'camera,canon'),
(55, 1, 1, 'Canon EOS 5D Mark IV Body', 2500, '<p>Capture 30-megapixels of fine detail</p>\r\n<p>Dual Pixel RAW files allow revolutionary post-shot adjustment</p>\r\n<p>61 AF points are spread over an expanded area</p>\r\n<p>AF points function with maximum apertures as small as f/8</p>\r\n<p>150,000-pixel metering sensor to ensure accurate exposures</p>\r\n<p>DIGIC 6+ processing allows for 7 fps shooting</p>\r\n<p>4K video capabilities with the ability to extract 8-megapixel stills</p>\r\n<p>GPS and IPTC metadata can be embedded</p>\r\n<p>Images can be edited, cropped, and shared using Wi-Fi and NFC</p>\r\n<p>Experience unprecedented speed and detail with the Canon EOS 5D Mark IV. Boasting a 30-megapixel sensor, a 61-point autofocus system and a 150,000-pixel metering system, the EOS 5D Mark IV will produce pin-sharp and accurate results in any shooting situation. Like its EOS 5D predecessors, it&rsquo;s fully specced for video, able to shoot 4K at 30p or Full HD at up to a super-slow 120 frames per second.</p>', 1, 'Available', 'Canon_EOS_5D_IV_Body.jpg', 'Canon_EOS_5D_IV_Body_1.jpg', 'Canon_EOS_5D_IV_Body_2.jpg', 'Canon_EOS_5D_IV_Body_4.jpg', 'camera,canon'),
(56, 1, 1, 'Canon EOS 6D Body', 1500, '<p>Newly-designed 20.2-megapixel full-frame CMOS sensor</p>\r\n<p>DIGIC 5+ image processor</p>\r\n<p>New 11-point AF with EV-3 sensitivity (center point)</p>\r\n<p>Full HD video&nbsp;</p>\r\n<p>Built-in Wi-Fi and GPS receiver</p>\r\n<p>Expand and unlock your creativity with the Canon EOS 6D. Boasting a 20.2MP full-frame CMOS sensor paired with a DIGIC 5+ image processor, the EOS 6D produces fantastic-looking images in all shooting situations, making it a truly dependable workhorse camera. Its native ISO maximumis 25,600, and this can be further expanded to 102,400, allowing you to keep on shooting in low light, and the 4.5fps burst rate means you&rsquo;ll always keep up with the action.</p>', 1, 'Available', 'Canon_EOS_6D_Body_202MP.jpg', 'Canon_EOS_6D_Body_202MP_1.jpg', 'Canon_EOS_6D_Body_202MP_2.jpg', '', 'camera,canon'),
(57, 1, 1, 'Canon EOS 7D Mk II Body', 1500, '<p>10fps continuous shooting</p>\r\n<p>65-point wide-area autofocus</p>\r\n<p>Advanced iTR focusing</p>\r\n<p>150,000-pixel metering sensor, with IR detection</p>\r\n<p>Flicker Detection</p>\r\n<p>Built for speed</p>\r\n<p>High-performance focusing for movies and Live View</p>\r\n<p>Timer shooting functions</p>\r\n<p>Built-in GPS</p>\r\n<p>Full HD with slow motion capture</p>\r\n<p>Intelligent Viewfinder II</p>\r\n<p>Robust design and customisable controls</p>\r\n<p>20.2 Megapixels</p>\r\n<p>10 frames/second</p>\r\n<p>iTR AF</p>\r\n<p>65-point all cross type AF</p>\r\n<p>Dual Pixel CMOS AF</p>\r\n<p>ISO 16,000</p>\r\n<p>150k + IR metering sensor</p>\r\n<p>Full HD 60p</p>\r\n<p>GPS</p>\r\n<p>Dual card slots</p>\r\n<p>Multiple exposure</p>\r\n<p>Clear View II LCD Screen</p>\r\n<p>Intelligent Viewfinder II</p>\r\n<p>EOS System</p>', 1, 'Available', 'Canon_EOS_7D_MkII_Body.jpg', 'Canon_EOS_7D_MkII_Body_1.jpg', 'Canon_EOS_7D_MkII_Body_2.jpg', 'Canon_EOS_7D_MkII_Body_3.jpg', 'camera,canon'),
(59, 1, 2, 'Nikon D4 Body', 2500, '<p>16.2 megapixel FX-format (full-frame) CMOS sensor</p>\r\n<p>ISO 100-12800, ext. 50-204,800</p>\r\n<p>Full HD 1080p movie recording at 30p, 25p and 24p</p>\r\n<p>Single point AF, 9-, 21- or 51-point coverage</p>\r\n<p>EXPEED 3 image processing engine</p>\r\n<p>3.2\" 922k-dot LCD monitor</p>\r\n<p>3D colour matrix metering III</p>\r\n<p>100% optical viewfinder coverage</p>\r\n<p>3 crop modes</p>\r\n<p>Storage media: two card slots (CF &amp; XQD)</p>', 1, 'Available', 'Nikon_D4_Body.jpg', 'Nikon_D4_Body_1.jpg', 'Nikon_D4_Body_2.jpg', '', 'camera,nikon'),
(60, 1, 2, 'Nikon D4s Body', 1500, '<p>Type: Single-lens reflex digital camera</p>\r\n<p>Lens mount: Nikon F</p>\r\n<p>Effective pixels: 16.2 million</p>\r\n<p>Image sensor: 36.0 mm x 23.9 mm CMOS (FX format)</p>\r\n<p>Total pixels: 16.6 million (approx.)</p>\r\n<p>Dust-reduction system: Image sensor cleaning, Image Dust Off reference data (optional Capture NX 2 software required)</p>\r\n<p>Image size (pixels): (L) 4928 x 3280, (M) 3696 x 2456, (S) 2464 x 1640, DX, (L) 3200 x 2128, (M) 2400 x 1592, (S) 1600 x 1064, 5 : 4, (L) 4096 x 3280, (M) 3072 x 2456, (S) 2048 x 1640, 1.2x, (L) 4096 x 2720, (M) 3072 x 2040, (S) 2048 x 1360</p>\r\n<p>Storage - File format: NEF (RAW): 12 or 14 bit, lossless compressed, compressed, or uncompressed; small size available (12-bit uncompressed only), TIFF (RGB), JPEG: JPEG-Baseline compliant with fine (approx. 1 : 4), normal (approx. 1 : 8), or basic (approx. 1 : 16) compression (Size priority); Optimal quality compression available, NEF (RAW)+JPEG: Single photograph recorded in both NEF (RAW) and JPEG formats</p>\r\n<p>Picture Control System: Standard, Neutral, Vivid, Monochrome, Portrait, Landscape, selected Picture Control can be modified; storage for custom Picture Controls</p>\r\n<p>Storage Media: CompactFlash (CF) (Type I, compliant with UDMA 7), XQD Type Memory</p>\r\n<p>Dual card slot: Dual card slots</p>\r\n<p>File system: DCF 2.0, DPOF, Exif 2.3, PictBridge</p>', 0, 'Available', 'Nikon_D4s_Body.jpg', 'Nikon_D4s_Body_1.jpg', 'Nikon_D4s_Body_2.jpg', '', 'camera,nikon'),
(61, 1, 2, 'Nikon D6', 1500, '<p>100 &ndash; 102,400 ISO</p>\r\n<p>14 frames per second</p>\r\n<p>4k UHD video</p>\r\n<p>Rugged weather sealing</p>\r\n<p>Full frame DSLR</p>\r\n<p>The Nikon D6 is a new flagship DSLR camera body made for high speed AF, burst rates of 14fps and 4k video recording. The rugged camera is built to withstand tough environments and is the workhorse body for sport, wildlife and press photographers.</p>\r\n<p>&nbsp;</p>\r\n<p>The camera has a 20.8 megapixel sensor and has a wide ISO range with an EXPEED 6 image processor for high image quality even in low light. 105 phase detection AF points help you track subjects across the frame when shooting an image sequence.</p>', 0, 'Available', 'Hire_Nikon_D6.jpg', 'Hire_Nikon_D6_1.jpg', '', '', 'camera,nikon'),
(62, 1, 2, 'Nikon D500 DSLR Body', 1500, '<p>New 20.9MP DX-format CMOS image sensor and EXPEED 5 image processing</p>\r\n<p>ISO range: ISO 100 to 51,200 (expandable to Hi-5, ISO 1,640,000)</p>\r\n<p>Redesigned AF system with a 153 focus points, 99 cross-type sensors and a dedicated processor</p>\r\n<p>4K Ultra High Definition (UHD) video recording and pro-grade video features</p>\r\n<p>10 fps continuous shooting for up to 200 shots in a single burst</p>\r\n<p>The Nikon D500 is the flagship of the DX-format DSLRs, and it more than earns its title. It offers the uncompromising performance of the full-frame D5 in an agile, lightweight body, thanks to its 20.9MP DX-format CMOS image sensor and EXPEED 5 image processor. Its overhauled autofocus system boasts 153 focus points, 99 of which are cross-type, and it&rsquo;s capable of hitting a maximum expanded ISO ceiling of 1,640,000.</p>', 0, 'Available', 'Nikon_D500_DSLR_Body.jpg', 'Nikon_D500_DSLR_Body_1.jpg', '', '', 'camera,nikon'),
(63, 1, 2, 'Nikon D780 Camera Body', 2500, '<p>Sensor: 24.5 Megapixel</p>\r\n<p>Video: 4k UHD</p>\r\n<p>Up to 7 fps with AF/AE</p>\r\n<p>Up to 12 fps in Silent Live View Photography mode</p>\r\n<p>Dust and Water Resistant</p>\r\n<p>Dual SD Card Slots</p>\r\n<p>Within the D780 there is a 24.5MP full-frame CMOS sensor powered by an EXPEED 6 image processor. The camera has the same 180k-pixel RGB metering sensor as the D850 and the phase detection pixels on the imaging sensor that the mirrorless Z6 pioneered.</p>\r\n<p>&nbsp;</p>\r\n<p>Compatible with our impressive range of f mount lenses the D780 is an incredibly versatile camera for photography and video, capable of recording 4k UHD footage.</p>', 0, 'Available', 'Hire_Nikon_D780_Camera_Body.jpg', 'Hire_Nikon_D780_Camera_Body_1.jpg', 'Hire_Nikon_D780_Camera_Body_2.jpg', '', 'camera,nikon'),
(64, 1, 4, 'Sony A9 mark II camera body', 2500, '<p>24.2MP Full-Frame CMOS Sensor</p>\r\n<p>693-Point Phase-Detection AF System</p>\r\n<p>Incredible speed: blackout-free continuous shooting up to 20fps</p>\r\n<p>ISO range from 100-204800</p>\r\n<p>5-axis optical in-body image stabilisation</p>\r\n<p>Supports file transfer over SSL or TLS encryption (FTPS)</p>\r\n<p>1000BASE-T Ethernet terminal, enabling gigabit communication for high-speed, stable data transfer operations</p>\r\n<p>Upgraded dust and moisture resistance</p>\r\n<p>Dual card slots for uninterrupted capture</p>\r\n<p>Compatible with the NP-FZ100 battery perfect for longer shoots</p>', 0, 'Available', 'Hire_Sony_A9_mark_II_camera_body.jpg', 'Hire_Sony_A9_mark_II_camera_body_1.jpg', 'Hire_Sony_A9_mark_II_camera_body_2.jpg', 'Hire_Sony_A9_mark_II_camera_body_3.jpg', 'camera,sony'),
(65, 1, 4, 'Sony A7R Mark IV Digital Camera Body', 2500, '<p>61 Megapixel sensor</p>\r\n<p>10 frames per second</p>\r\n<p>Deeper grip to balance g-master optics</p>\r\n<p>ISO 100-32000</p>\r\n<p>5 Axis in body image stabiliser</p>\r\n<p>Two UHS-II SD Card slots</p>\r\n<p>Sony promise unimagined subtlety from their latest high resolution body featuring a 61MP full frame sensor. The sensor of the A7R mark IV is built on a back-illuminated design giving the camera high sensitivity and low noise range of 100-32000 ISO despite a very high concentration of pixels. With pixel-shift multi-shooting enabled you can capture stunning 240MP images</p>', 0, 'Available', 'Hire_Sony_A7R_Mark_IV_Digital_Camera_Body.jpg', 'Hire_Sony_A7R_Mark_IV_Digital_Camera_Body_1.jpg', 'Hire_Sony_A7R_Mark_IV_Digital_Camera_Body_2.jpg', 'Hire_Sony_A7R_Mark_IV_Digital_Camera_Body_3.jpg', 'camera,sony'),
(66, 1, 4, 'Sony A7 III Camera Body', 2500, '<p>Newly developed back-illuminated 24.2MP full-frame Exmor R CMOS sensor to capture even the finest detail in most conditions</p>\r\n<p>Approx. 15-stops of dynamic range to showcase subtle graduations from shadows to highlights</p>\r\n<p>Impressive ISO range of 100-51,200 which is expandable to 50-204,800, allowing for noise-free low-light capture&nbsp;</p>\r\n<p>14-bit RAW capture even in silent and continuous shooting modes</p>\r\n<p>5-axis 5-step in-body image stabilisation, making it possible for users to shoot handheld at lower shutter speeds, while also providing smoother video capture</p>\r\n<p>4D Focus &ndash; The A7 Mark III features a massive 693 phase-detection, and 425 contrast detection AF points</p>', 0, 'Available', 'SONY_A7_III_DIG_CAMERA_BODY.jpg', 'SONY_A7_III_DIG_CAMERA_BODY_1.jpg', 'SONY_A7_III_DIG_CAMERA_BODY_2.jpg', 'SONY_A7_III_DIG_CAMERA_BODY_4.jpg', 'camera,sony'),
(67, 1, 3, 'Pentax K-70 Weather-Sealed DSLR Camera', 1500, '<p>24.24 effective megapixel, APS C AA filter less CMOS sensor with ISO from 100 204800</p>\r\n<p>Dustproof and weather resistant with In body &ldquo;SR&rdquo; shake reduction mechanism</p>\r\n<p>Vary angle LCD monitor with Night vision red light LCD display</p>\r\n<p>Built in Wi Fi for use with Image Sync app; SAFOX X 11 Point AF with 9 Cross Sensors</p>\r\n<p>Pixel Shift Resolution with Motion Correction AA Filter Simulator: MoreÌ reduction using \"SR\" unit and Pixel Shift Resolution with Motion Correction</p>', 0, 'Available', '91aqMa--KPL._AC_SL1500_.jpg', '71WEHDiUH1L._AC_SL1000_.jpg', '61jUaxu72KL._AC_SL1000_.jpg', '71J1SMh3gKL._AC_SL1500_.jpg', 'camera,pentex'),
(68, 1, 3, 'Pentax K-5 16.3 MP Digital SLR', 2500, '<p>16.3-megapixel CMOS sensor; 80-12800 ISO range with improved noise performance</p>\r\n<p>Body only; lenses sold separately</p>\r\n<p>Widescreen 1080p HD video at 25 FPS, with sound via built-in or external 3.5mm stereo microphone jack</p>\r\n<p>6-7fps captures fast action shots; 11-point SAFOX IX+ autofocus system with dedicated AF assist lamp and light wavelength sensor</p>\r\n<p>Large 3-inch LCD with 921,000 dots of resolution; fully weather-sealed and coldproof design</p>\r\n<p>SDXC memory card compatibility (via firmware update)</p>', 0, 'Available', '81zNWDrivuL._AC_SL1500_.jpg', '81Yc9lduUeL._AC_SL1500_.jpg', '819OVjOjyTL._AC_SL1500_.jpg', '81dbMLSvH+L._AC_SL1500_.jpg', 'camera,pentex'),
(70, 1, 5, 'Olympus OM-D E-M5 Mark III', 1500, '<p>Type: Mirrorless | Sensor: MFT | Megapixels: 20.4MP | Lens mount: NFT | Screen: 3-inch vari-angle touchscreen, 1,037,000 dots | Viewfinder: Electronic | Continuous shooting speed: 30fps (Pro Capture mode), 10fps (mechanical shutter) | Max video resolution: c4K/4K | User level: Enthusiast/Expert</p>', 0, 'Available', 'BVNcGaxsFLYsynceCNdZBD-650-80.jpg', 'kHdR5sLyKSWVpY3bQwY9S5-650-80.jpg', 'VKbge23jgaQpLWUakkgbK5-650-80.jpg', 'XxatBRKPgtWEuyreCGggK5-650-80.jpg', 'camera,olympus'),
(71, 2, 1, 'Canon CN-E 135mm T2.2 lens', 1200, '<p>Compact 135mm, T2.2 prime lens&nbsp;</p>\r\n<p>Spectacular 4K image quality&nbsp;</p>\r\n<p>Full frame image circle&nbsp;</p>\r\n<p>Industry standard manual control&nbsp;</p>\r\n<p>11 blade diaphragm for attractive blurring&nbsp;</p>\r\n<p>Designed for EF mount 35 mm and Super 35mm cameras</p>\r\n<p>The CN-E135mm T2.2 L F is a lightweight, compact prime lens for Canon EF-mount, designed specifically for video work. It provides spectacular 4K image quality and a full-frame image circle, not to mention excellent low-light performance and a fine degree of creative control. It&rsquo;s compatible with most standard accessories and matte boxes, and has an 11-bladed aperture that provides beautiful bokeh.</p>', 0, 'Available', 'Canon_CN-E_135mm_T22_lens.jpg', 'Canon_CN-E_135mm_T22_lens_1.jpg', '', '', 'lense,canon'),
(72, 2, 1, 'Canon Extender EF 1.4x III', 1200, '<p>Extends focal length by a factor of 1.4x</p>\r\n<p>Built-in microcomputer for seamless communication with camera body</p>\r\n<p>lens and extender Newly-developed Fluorine coating keeps soiling, smears and fingerprints to a minimum</p>', 0, 'Available', 'Canon_EF_14x_Extender_III.jpg', 'Canon_EF_14x_Extender_III_1.jpg', 'Canon_EF_14x_Extender_III_2.jpg', '', 'lense,canon'),
(73, 2, 1, 'Canon EF 16-35mm f2.8L III USM Lens', 1500, '<p>If you need an ultra-wide perspective and only the best will do, then the Canon EF 16-35mm f2.8L III USM is an outstanding choice. Built with the care and quality that characterises the L series, with an f/2.8 maximum aperture throughout its entire zoom range, the lens dependably produces top-quality results even in low light.</p>\r\n<p>&nbsp;</p>\r\n<p>Taking advantage of the latest advancements in Canon autofocus and optical design, the EF 16-35mm f2.8L III USM is perfect for landscapes, architecture, interiors, products, fashion and so much more. Go wider and see further with this fantastic optic.</p>', 0, 'Available', 'Canon_EF_16-35mm_f28L_III_USM_Lens.jpg', 'Canon_EF_16-35mm_f28L_III_USM_Lens_1.jpg', 'Canon_EF_16-35mm_f28L_III_USM_Lens_3.jpg', '', 'lense,canon'),
(74, 2, 2, 'Nikon TC-14E AF-S Teleconverter III', 1200, '<p>Get more reach for your shots. The Nikon TC-14E AF-S Teleconverter III provides a magnification factor of 1.4x, increasing the effective focal length of select Nikon lenses (see below for full list) by a factor of 40%. Working with both prime and zoom lenses, the Nikon TC-14E AF-S Teleconverter III is especially suited for sports, press and wildlife photographers who will often find themselves shooting at a distance.</p>', 0, 'Available', 'Nikon_TC-14E_AF-S_Teleconverter_III.jpg', 'Nikon_TC-14E_AF-S_Teleconverter_III_1.jpg', '', '', 'lense,nikon'),
(75, 2, 2, 'Nikon 19mm PC-E f4 ED', 1500, '<p>Ultra-wide-angle perspective control lens with tilt/shift capabilities&nbsp;</p>\r\n<p>First NIKKOR PC-E lens that can be tilted parallel or perpendicular to shift&nbsp;</p>\r\n<p>Tilt and shift independently and then rotate up to 90&deg; with new PC Rotation capability&nbsp;</p>\r\n<p>Designed for landscapes, cityscapes, architecture, interiors and fine art photography and filmmaking&nbsp;</p>', 0, 'Available', 'Nikon_19mm_PC-E_f4_ED.jpg', 'Nikon_19mm_PC-E_f4_ED_1.jpg', 'Nikon_19mm_PC-E_f4_ED_3.jpg', '', 'lense,nikon'),
(76, 2, 3, 'Pentax 90mm f2.8 D FA 645 Macro AW', 1200, '<p>Focal Length 90mm</p>\r\n<p>Equivalent to 35mm format Equ. to 71mm in 35mm format</p>\r\n<p>Maximum aperture F2.8</p>\r\n<p>Minimum aperture F22</p>\r\n<p>Number of Diaphragm Blades 9</p>\r\n<p>Angle of View 34&deg; (with PENTAX D-SLR camera body)</p>\r\n<p>Construction 11 elements in 9 groups</p>\r\n<p>Smallest object distance/magnification 0.413m</p>\r\n<p>Magnification 0.5x</p>\r\n<p>Filter size 67mm</p>\r\n<p>Weight 1040g</p>\r\n<p>Dimensions (Length x Diameter)</p>\r\n<p>111.6mm x 90.5</p>', 0, 'Available', 'Pentax_90mm_f28_D_FA_645_Macro_AW.jpg', 'Pentax_90mm_f28_D_FA_645_Macro_AW.jpg', '', '', 'lense,pentax'),
(77, 2, 3, 'Pentax HD DA645 28-45mm', 1500, '<p>The Pentax HD DA645 28-45mm f/4.5ED AW SR is optimised specifically for the sensor of the Pentax 654Z medium-format DSLR, with a perfectly tuned image circle and an equivalent focal length of 22-35.5mm in full-frame terms. Incorporating a number of Pentax-developed technologies, including advanced lens coating, the lens delivers images that make the most of the large high-resolution sensor of the 645Z.</p>', 0, 'Available', 'Pentax_HD_DA645_28-45mm_f45ED_AW_SR.jpg', 'Pentax_HD_DA645_28-45mm_f45ED_AW_SR.jpg', '', '', 'lense,pentax'),
(78, 2, 4, 'Sony FE 24-105mm f4 G OSS Lens', 1500, '<p>G standard zoom lens with E-mount full-frame format</p>\r\n<p>Constant F4 maximum aperture for beautiful, smooth bokeh and more control</p>\r\n<p>A one-lens solution perfect for a wide range of subjects for both stills and video</p>\r\n<p>Compact and lightweight (663g) with dust and moisture resistant design</p>\r\n<p>ED (Extra-low Dispersion) glass elements minimise chromatic aberration</p>\r\n<p>Two AA (advanced aspherical) elements for outstanding resolution</p>\r\n<p>Sony Nano AR Coating to eliminate flare and ghosting</p>\r\n<p>Direct Drive SSM for quiet, highly precise AF lens control</p>\r\n<p>Professional fingertip operation - focus hold button, manual focus ring, AF/MF switch</p>\r\n<p>0.38m minimum focusing distance</p>', 0, 'Available', 'SonyFE_24-105mm_F4_G_OSS_Lens.jpg', 'SonyFE_24-105mm_F4_G_OSS_Lens_1.jpg', '', '', 'lense,sony'),
(79, 2, 4, 'Sony 16-35mm f2.8 GM', 1200, '<p>2 x glass XA elements (extreme aspherical), 3 Aspherical and 2 ED glass (extra low dispersion) that minimize chromatic aberration and effectively control distortion</p>\r\n<p>An 11-blade circular aperture and 2 XA elements achieve smooth, beautiful bokeh as well as ultra-high resolution unique to G master lenses</p>\r\n<p>Direct Drive SSM (DDSSM) unit ensures precise, fast, quiet autofocus, with a dust and moisture resistant construction</p>\r\n<p>Nano AR Coating cuts reflections for improved clarity and contrast</p>\r\n<p>A focus hold button, manual focus ring, and AF/MF switch provide extra on-lens control for smooth, efficient operation in a wide range of situations</p>', 0, 'Available', 'Hire_SONY_16-35mm_f28_GM.jpg', 'Hire_SONY_16-35mm_f28_GM_1.jpg', 'Hire_SONY_16-35mm_f28_GM_2.jpg', '', 'lense,sony'),
(80, 2, 4, 'Sony FE 16-35mm f4 ZA ', 1200, '<p>Providing the kind of outstanding performance that is demanded by Sony&rsquo;s full-frame A7 series bodies, this E-mount 16-35mm ZEISS Vario-Tessar zoom is a versatile zoom for a huge range of shooting situations. An advanced optical design provides top-quality resolution and sharpness all the way to the edge of the image, while built-in optical image stabilisation provides superior stability and control when shooting handheld.</p>', 0, 'Available', 'Sony_FE_16-35mm_f4_ZA_OSS_Vario-Tessar_T_Lens.jpg', 'Sony_FE_16-35mm_f4_ZA_OSS_Vario-Tessar_T_Lens_1.jpg', '', '', 'lense,sony');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(100) NOT NULL,
  `user_name` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `user_nic` varchar(100) DEFAULT NULL,
  `user_phone` int(100) DEFAULT NULL,
  `user_address` varchar(100) DEFAULT NULL,
  `user_city` varchar(40) DEFAULT NULL,
  `user_state` varchar(40) DEFAULT NULL,
  `user_zip` int(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `email`, `password`, `user_nic`, `user_phone`, `user_address`, `user_city`, `user_state`, `user_zip`) VALUES
(20, 'Sahran', 'sahranm129@gmail.com', '123', '4354378976', 2147483647, 'welpothuwewa,kurunegala', 'welpothuwewa', 'kurunegala', 2234),
(21, 'Ansaf', 'ansaf@gmail.com', '123', '987654321', 2147483647, 'kekunagolla,narammala', 'kekunagolla', 'kurunegala', 4456),
(22, 'Asfer', 'asfer@gmail.com', '123', '121212121212', 954365764, 'negombo, tharapuram', 'negombo', 'negombo', 23432),
(23, 'Izrath', 'izrath@gmail.com', '123', '987654321', 723631918, 'nattandiya, chillaw', 'nattandiya', 'chillaw', 1212124),
(24, 'Rinosh', 'rinosh@gmail.com', '123', '987654321', 2147483647, 'welpothuwewa,kurunegala', 'welpothuwewa', 'kurunegala', 2234),
(25, 'Sahran', 'sahranm129@gmail.com', '123', '121212121212', 702319885, 'samagi mw, pannawa, kobeigane,kurunegala', 'Kobeigane', 'State', 60410),
(26, 'Riham Mohammed', 'riham@gmail.com', '123', '987654321', 2147483647, 'welpothuwewa,kurunegala', 'welpothuwewa', 'kurunegala', 2234),
(27, 'Azham', 'azham@gmail.com', '123', '12324', 702319885, 'samagi mw, pannawa, kobeigane,kurunegala', 'Kobeigane', 'Kurunegala', 60410),
(28, 'Rukshan', 'rukshan@gmail.com', '123', NULL, NULL, NULL, NULL, NULL, NULL),
(29, 'sahran', 'sahranm1291@gmail.com', '123', '235423647V', 702319885, 'samagi mw, pannawa, kobeigane,kurunegala', 'Kobeigane', 'Kurunegala', 60410);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `catogories`
--
ALTER TABLE `catogories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `catogories`
--
ALTER TABLE `catogories`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
