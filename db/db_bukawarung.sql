-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2021 at 09:40 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bukawarung`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `admin_telp` varchar(20) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`admin_id`, `admin_name`, `username`, `password`, `admin_telp`, `admin_email`, `admin_address`) VALUES
(1, 'Society Lab Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', '081298227199', 'societylab@gmail.com', 'Jalan Daan Mogot KM.11, RT.1/RW.4, Kedaung Kali Angke, Cengkareng, RT.1/RW.4, Kedaung Kali Angke, Kecamatan Cengkareng, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11710');

-- --------------------------------------------------------

--
-- Table structure for table `tb_category`
--

CREATE TABLE `tb_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_category`
--

INSERT INTO `tb_category` (`category_id`, `category_name`) VALUES
(11, 'Men Wear'),
(12, 'Women Wear');

-- --------------------------------------------------------

--
-- Table structure for table `tb_product`
--

CREATE TABLE `tb_product` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_description` text NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `product_status` tinyint(1) NOT NULL,
  `product_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_product`
--

INSERT INTO `tb_product` (`product_id`, `category_id`, `product_name`, `product_price`, `product_description`, `product_image`, `product_status`, `product_created`) VALUES
(22, 11, 'Smile Tee', 80000, 'T-shirt bahan cotton combed 30s berwarna hitam dengan ukuran oversize.', 'smile.jpeg', 1, '2021-06-17 06:21:05'),
(23, 11, 'Emotional Tee', 90000, 'T-shirt bahan cotton combed 30s berwarna putih dengan ukuran oversize.', 'emotional.jpeg', 1, '2021-06-17 06:22:16'),
(24, 11, 'Good Surfing Tee', 75000, 'T-shirt bahan cotton combed 30s berwarna cream dengan ukuran oversize.', 'good surfing.jpeg', 1, '2021-06-17 06:22:50'),
(25, 11, 'Pocket Short Pants ', 100000, 'Celana dengan kantong yang menarik.', 'shortpant.jpeg', 1, '2021-06-17 06:23:47'),
(26, 11, 'Corduroy Long', 120000, 'Celana bahan corduroy yang cocok untuk ootd mu.', 'conduroy.jpeg', 1, '2021-06-17 06:24:46'),
(27, 11, 'Pocket Long Pants', 150000, 'Celana panjang dengan kantong di kedua sisi.', 'longpants.jpeg', 1, '2021-06-17 06:25:25'),
(28, 12, 'Powerpuff Girls Tee', 75000, 'T-shirt dengan design Powerpuff Girls yang menggemaskan!', 'powerpuff.jpeg', 1, '2021-06-17 06:26:23'),
(29, 12, 'Astronomy Tee', 80000, 'Choose your favorite astronomy objects!', 'astronomy.jpeg', 1, '2021-06-17 06:27:03'),
(30, 12, 'A Beautiful Girl Flashirt', 90000, 'A Beautiful Girl flashirt to all beautiful girls out there!', 'my lover.jpeg', 1, '2021-06-17 06:29:32'),
(31, 12, 'Goth Pants', 200000, 'Long pants with goth design.', 'gothicpants.jpeg', 1, '2021-06-17 06:30:24'),
(32, 12, 'Jogger Pants', 120000, 'Celana panjang dari campuran tenunan viscose. Pinggang tinggi dengan smocking elastis, saku di jahitan samping, dan kaki lebar dan lurus.', 'joggerpants.jpeg', 1, '2021-06-17 06:31:03'),
(33, 12, 'Jogger Cut Pants', 150000, 'Celana panjang dari campuran tenunan viscose. Pinggang tinggi dengan smocking elastis, dan kaki lebar dan lurus.', 'cutpants.jpeg', 1, '2021-06-17 06:31:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tb_category`
--
ALTER TABLE `tb_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_category`
--
ALTER TABLE `tb_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
