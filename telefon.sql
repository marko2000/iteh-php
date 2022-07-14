-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2022 at 13:22 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `telefon`
--

-- --------------------------------------------------------

--
-- Table structure for table `ocene`
--

CREATE TABLE `ocene` (
  `ocena_id` int(11) NOT NULL,
  `ocena_kriterijum` varchar(60) NOT NULL,
  `telefon_opis` text NOT NULL,
  `telefon_ocena` varchar(60) NOT NULL,
  `telefon_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ocene`
--

INSERT INTO `ocene` (`ocena_id`, `ocena_kriterijum`, `telefon_opis`, `telefon_ocena`, `telefon_id`) VALUES
(1, 'Uopsteno', '\'<p style=\\\'text-align: justify;\\\'>Fantastican telefon…. zverski brz sa mocnim hardware-om, izuzetnog kvaliteta i prelep na oko. Ovo je ozbiljan telefon, koji je vise za poslovno koriscenje, a manje za zafrkanciju. Ako ste skloni cestom igranju sa podesavanjima, ovo nije telefon za vas. Ima dosta opcija za odabir vasih licnim postavki, ali ne u smislu glupiranja po meni-ju. Ono sto dobijate sa njim je ono sto cini ovaj telefon jako skupim, u odnosu na druge proizvodjace…..bezbednost, kvalitet, vrhunske kamere, odlicna baterija, prelep izgled, jednostavnost sistema i mogucnost sinhronizacije preko iCloud-a sa ostalim Apple uredjajima.</p>\'', '8', 1),
(2, 'Uopsteno', '\'<p style=\\\"text-align: justify;\\\">Fantasticne performanse, ogroman pregledan displej,odličan za upotrebu u poslovne svrhe ali veoma moćan za zabavu,igre,internet. Ukratko rečeno,džepni kućni bioskop. Veoma jednostavan i upotrebljiv za sve generacije( od 5 do 85 godina :) malo sale ali veoma jednostavan i predobar telefon...</p>\'', '10', 4);

-- --------------------------------------------------------

--
-- Table structure for table `telefoni`
--

CREATE TABLE `telefoni` (
  `telefon_id` int(11) NOT NULL,
  `telefon_naziv` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `telefoni`
--

INSERT INTO `telefoni` (`telefon_id`, `telefon_naziv`) VALUES
(1, 'iPhone Pro Max 13 128GB'),
(2, 'iPhone SE 2022 64GB'),
(3, 'Samsung Galaxy Note 2022'),
(4, 'Samsung Galaxy Z-Fold');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ocene`
--
ALTER TABLE `ocene`
  ADD PRIMARY KEY (`ocena_id`),
  ADD KEY `telefon_id` (`telefon_id`);

--
-- Indexes for table `telefoni`
--
ALTER TABLE `telefoni`
  ADD PRIMARY KEY (`telefon_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ocene`
--
ALTER TABLE `ocene`
  MODIFY `ocena_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `telefoni`
--
ALTER TABLE `telefoni`
  MODIFY `telefon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ocene`
--
ALTER TABLE `ocene`
  ADD CONSTRAINT `ocene_ibfk_1` FOREIGN KEY (`telefon_id`) REFERENCES `telefoni` (`telefon_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
