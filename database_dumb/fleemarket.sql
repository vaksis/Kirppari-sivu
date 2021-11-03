-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 27.05.2020 klo 10:00
-- Palvelimen versio: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fleemarket`
--

-- --------------------------------------------------------

--
-- Rakenne taululle `admin`
--

CREATE TABLE `admin` (
  `adminid` int(11) NOT NULL,
  `username` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Vedos taulusta `admin`
--

INSERT INTO `admin` (`adminid`, `username`, `email`, `password`) VALUES
(1, 'testiadmin', 'testi.admin@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Rakenne taululle `fleemarket`
--

CREATE TABLE `fleemarket` (
  `marketid` int(11) NOT NULL,
  `img` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `duration` decimal(10,0) NOT NULL,
  `startingtime` decimal(10,0) NOT NULL,
  `carslot` int(11) NOT NULL,
  `blanket` int(11) NOT NULL,
  `isactive` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Vedos taulusta `fleemarket`
--

INSERT INTO `fleemarket` (`marketid`, `img`, `description`, `date`, `duration`, `startingtime`, `carslot`, `blanket`, `isactive`) VALUES
(1, 'https://cdn.pixabay.com/photo/2014/07/31/23/37/motorbike-407186_960_720.jpg', 'tama kirpputori tapahtuma jarjestetaan autotallissa', '2020-04-16', '6', '15', 15, 20, 1),
(2, '', 'Tama on kirpputori', '2020-06-01', '5', '15', 16, 12, 0);

-- --------------------------------------------------------

--
-- Rakenne taululle `product`
--

CREATE TABLE `product` (
  `productid` int(11) NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `userid` int(11) NOT NULL,
  `categoryid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Vedos taulusta `product`
--

INSERT INTO `product` (`productid`, `img`, `price`, `description`, `category`, `userid`, `categoryid`) VALUES
(1, 'https://cdn.pixabay.com/photo/2015/01/19/13/51/car-604019_960_720.jpg', '8000', 'auto', 'car', 5, 5),
(2, 'https://image.shutterstock.com/z/stock-photo-black-t-shirt-clothes-on-isolated-white-background-599532212.jpg', '18', 't-paita', 'vaatteet', 6, 7),
(3, 'https://cdn.pixabay.com/photo/2015/04/20/13/17/work-731198_960_720.jpg', '1000', 'tietokone', 'tietokoneet', 7, 6);

-- --------------------------------------------------------

--
-- Rakenne taululle `productcategory`
--

CREATE TABLE `productcategory` (
  `categoryid` int(11) NOT NULL,
  `categoryname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `imagineurl` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Vedos taulusta `productcategory`
--

INSERT INTO `productcategory` (`categoryid`, `categoryname`, `imagineurl`, `description`) VALUES
(5, 'car audiR8', 'audi.jpg', 'this is good audi r 8'),
(6, 'tietokoneet', 'pc.jpg', 'this is very good pc'),
(7, 'vaatteet', 'paita.png', 'this is mens t shirt');

-- --------------------------------------------------------

--
-- Rakenne taululle `reservation`
--

CREATE TABLE `reservation` (
  `reservationid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `type` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `slotnumber` int(11) NOT NULL,
  `marketid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Vedos taulusta `reservation`
--

INSERT INTO `reservation` (`reservationid`, `userid`, `type`, `slotnumber`, `marketid`) VALUES
(26, 10, 'carslot', 14, 1),
(27, 10, 'balnket', 2, 1),
(28, 10, 'carslot', 13, 1);

-- --------------------------------------------------------

--
-- Rakenne taululle `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `username` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Vedos taulusta `user`
--

INSERT INTO `user` (`userid`, `username`, `email`, `password`) VALUES
(5, 'veeti', 'tasti@gmail.com', '12334'),
(6, 'mikko', 'mikko.testi@gmail.com', '1234'),
(7, 'aku', 'aku.ankka@gmail.com', '1234'),
(10, 'vaksis', 'Veetixx8@gmail.com', '$2y$10$g13dRvwva8wvyAqwS.Su5uYmngkqmgr7qkfBEe44e2eFAqhblpbha'),
(12, 'miika', 'miika@email.com', '$2y$10$73BWMz.nv/ashg23Sm/aV.Ih8lnvWOvHdMOZXdbqPGCXKu0BzdmGi'),
(16, 'mila', 'milla@gmail.com', '$2y$10$M0HIKoAEHi2h7v3Iwqvd6.uT38gqzGP7HM1ytzhiLaNXM21.l//bC'),
(17, 'ohto', 'ohto.koskinen@gmail.com', '$2y$10$AaHOCW3h3saU1m/7gj7moubiLZs0YUCYIp1c8Txu6G7r36Jv2lnae'),
(18, 'kia', 'kia@gmail.com', '$2y$10$aeJ7X4y4yIiPvEWEo4OR7e0oqfaEGwvQvmXggV.1evmiP0o5BRYcq'),
(19, 'kiksu', 'kiksu@gmail.com', '$2y$10$JGxRNTNPV9rot7ZA9A1/t.2Q9eQ2NoPILtsiTzPOGS3cgg5frC.my');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `fleemarket`
--
ALTER TABLE `fleemarket`
  ADD PRIMARY KEY (`marketid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productid`),
  ADD KEY `userid` (`userid`),
  ADD KEY `categoryid` (`categoryid`);

--
-- Indexes for table `productcategory`
--
ALTER TABLE `productcategory`
  ADD PRIMARY KEY (`categoryid`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reservationid`),
  ADD KEY `userid` (`userid`),
  ADD KEY `marketid` (`marketid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fleemarket`
--
ALTER TABLE `fleemarket`
  MODIFY `marketid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `productcategory`
--
ALTER TABLE `productcategory`
  MODIFY `categoryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reservationid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Rajoitteet vedostauluille
--

--
-- Rajoitteet taululle `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`categoryid`) REFERENCES `productcategory` (`categoryid`);

--
-- Rajoitteet taululle `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`marketid`) REFERENCES `fleemarket` (`marketid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
