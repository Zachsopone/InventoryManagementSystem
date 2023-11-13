-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2023 at 08:04 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer_cart`
--

CREATE TABLE `customer_cart` (
  `Customer_ID` int(11) NOT NULL,
  `Product_Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `Employee_ID` int(11) NOT NULL,
  `Employee_Name` varchar(255) NOT NULL,
  `Contact_Number` bigint(11) NOT NULL,
  `Email_Address` varchar(40) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Date_of_Birth` date NOT NULL,
  `Nationality` varchar(40) NOT NULL,
  `Civil_Status` varchar(40) NOT NULL,
  `Department` varchar(50) NOT NULL,
  `Designation` varchar(255) NOT NULL,
  `Employee_Status` varchar(40) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`Employee_ID`, `Employee_Name`, `Contact_Number`, `Email_Address`, `Address`, `Gender`, `Date_of_Birth`, `Nationality`, `Civil_Status`, `Department`, `Designation`, `Employee_Status`, `Password`) VALUES
(2, 'Agnes Daguia', 9123456789, 'agnesdagidagi@gmail.com', 'Address', 'Female', '1995-05-12', 'Filipino', 'Single', 'Sales', 'dasma', 'regular', 'agnesngapala'),
(3, 'Charlotte Linderos', 9161697812, 'djchacha@gmail.com', 'Address', 'Female', '1995-12-25', 'Filipino', 'Married', 'Collection', 'dasma', 'apprentice', 'hasimlangsapatna');

-- --------------------------------------------------------

--
-- Table structure for table `grandtotal`
--

CREATE TABLE `grandtotal` (
  `Total_Sales` double NOT NULL,
  `Total_Expenses` double NOT NULL,
  `Grand_Total` double NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grandtotal`
--

INSERT INTO `grandtotal` (`Total_Sales`, `Total_Expenses`, `Grand_Total`, `Date`) VALUES
(0, 0, 0, '2023-05-17 16:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `Product_ID` int(11) NOT NULL,
  `Product_Name` varchar(255) NOT NULL,
  `Category` varchar(20) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Price` double NOT NULL,
  `Grand_Total` double NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`Product_ID`, `Product_Name`, `Category`, `Quantity`, `Price`, `Grand_Total`, `Date`) VALUES
(1, 'Chocolate Syrup', 'Syrup', 10, 5000, 0, '2023-05-22 10:29:47'),
(2, 'Cream', 'Cream', 5, 3000, 0, '2023-05-22 10:30:13'),
(3, 'Milk', 'Milk', 10, 6000, 0, '2023-05-22 10:30:55'),
(4, 'Oreo', 'Cookies', 10, 2500, 0, '2023-05-22 10:31:24'),
(5, 'Caramel', 'Syrup', 8, 7300, 0, '2023-05-22 10:32:04'),
(6, 'Mint Syrup', 'Syrup', 8, 6200, 0, '2023-05-22 10:32:57'),
(7, 'Coffee', 'Coffee', 6, 8000, 0, '2023-05-22 10:34:01'),
(8, 'Hazelnut Syrup', 'Syrup', 9, 8000, 0, '2023-05-22 10:34:45'),
(9, 'Strawberry Syrup', 'Syrup', 7, 6500, 0, '2023-05-22 10:35:26');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `Product_ID` int(11) NOT NULL,
  `Product_Name` varchar(40) NOT NULL,
  `Price` double(100,2) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Product_Image` blob NOT NULL,
  `Ingredients1` int(11) NOT NULL,
  `Ingredients2` int(11) NOT NULL,
  `Ingredients3` int(11) NOT NULL,
  `Ingredients4` int(11) NOT NULL,
  `Ingredients5` int(11) NOT NULL,
  `Cup` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`Product_ID`, `Product_Name`, `Price`, `Description`, `Product_Image`, `Ingredients1`, `Ingredients2`, `Ingredients3`, `Ingredients4`, `Ingredients5`, `Cup`) VALUES
(1, 'Rocky Choco', 69.00, '', 0x526f636b7963686f636f2e706e67, 78912478, 9124789, 1356078, 3701082, 35699812, 'T'),
(2, 'Rocky Choco', 79.00, '', 0x526f636b7963686f636f2e706e67, 9821372, 97812897, 7127049, 97814879, 13909872, 'G'),
(3, 'Rocky Choco', 89.00, '', 0x526f636b7963686f636f2e706e67, 8791393, 90619834, 7812478, 78918790, 78168042, 'V'),
(4, 'Rocky Choco', 99.00, '', 0x526f636b7963686f636f2e706e67, 80910978, 98714897, 7890127, 78124734, 812489613, 'HC'),
(5, 'Rocky Choco', 109.00, '', 0x526f636b7963686f636f2e706e67, 7817809, 987192, 8713568, 78963091, 9801365, 'FL'),
(6, 'Minty Choco', 69.00, '', 0x4d696e747963686f636f2e706e67, 9138758, 9716593, 8973569, 92856920, 9802358, 'T'),
(8, 'Minty Choco', 79.00, '', 0x4d696e747963686f636f2e706e67, 9086135, 37986012, 9813465, 9162359, 1879325, 'G'),
(9, 'Minty Choco', 89.00, '', 0x4d696e747963686f636f2e706e67, 98635098, 97235690, 9136508, 91723569, 91782390, 'V'),
(10, 'Mocha', 69.00, '', 0x4d6f6368612e706e67, 89061359, 96185023, 18973902, 8971698, 8973569, 'T'),
(11, 'Mocha', 79.00, '', 0x4d6f6368612e706e67, 7891356, 9823812, 89734091, 1897351, 8723712, 'G'),
(12, 'Mocha', 89.00, '', 0x4d6f6368612e706e67, 78589021, 82736902, 2937568, 9235918, 1093857, 'V'),
(13, 'Hazelnut', 69.00, '', 0x48617a656c6e75742e706e67, 8791756, 8971897, 92395714, 8972315, 9198125, 'T'),
(14, 'Hazelnut', 79.00, '', 0x48617a656c6e75742e706e67, 6718906, 8919680, 91357809, 98071342, 78178092, 'G'),
(15, 'Hazelnut', 89.00, '', 0x48617a656c6e75742e706e67, 23578951, 81346712, 89135789, 9781780, 97814781, 'V');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `Sales_ID` int(11) NOT NULL,
  `Product_ID` int(11) NOT NULL,
  `Product_Name` varchar(255) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `SubTotal` double NOT NULL,
  `Discount` double NOT NULL,
  `Total` double NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer_cart`
--
ALTER TABLE `customer_cart`
  ADD PRIMARY KEY (`Customer_ID`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`Employee_ID`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`Product_ID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`Product_ID`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`Sales_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `Employee_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `Product_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `Product_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `Sales_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_Product_ID_fr` FOREIGN KEY (`Product_ID`) REFERENCES `products` (`Product_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
