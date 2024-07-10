-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2023 at 11:52 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `malutipharmacy`
--

-- --------------------------------------------------------

--
-- Table structure for table `consultation`
--

CREATE TABLE `consultation` (
  `Consultation_Id` int(8) NOT NULL,
  `Corncerns` varchar(100) NOT NULL,
  `Description` varchar(200) NOT NULL,
  `Date` date NOT NULL,
  `Respond` varchar(200) DEFAULT NULL,
  `Patient_Id` int(11) NOT NULL,
  `Pharmasist_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `consultation`
--

INSERT INTO `consultation` (`Consultation_Id`, `Corncerns`, `Description`, `Date`, `Respond`, `Patient_Id`, `Pharmasist_ID`) VALUES
(10, 'headache', 'sharp pain above eyes', '2023-04-10', 'buy 50g paracetamols from our pharmacy and drink 2g three times a day', 1, 8),
(11, 'sore throat', 'my throat is sore when i talk and i cough alot', '0000-00-00', 'drink hot water and buy allegex medication', 1, 8),
(22, 'Limping foot', 'my foot becomes lose when I take a step', '2023-04-04', 'Buy aspirin tablets from our store ', 1, 15);

-- --------------------------------------------------------

--
-- Table structure for table `medical_records`
--

CREATE TABLE `medical_records` (
  `Record_number` int(50) NOT NULL,
  `Patient_Id` int(50) NOT NULL,
  `Pharmacists_ID` int(8) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Surmane` varchar(50) NOT NULL,
  `Contact_Number` int(8) NOT NULL,
  `Location` varchar(100) NOT NULL,
  `Date` date NOT NULL,
  `Concern` varchar(50) NOT NULL,
  `Respond` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medical_records`
--

INSERT INTO `medical_records` (`Record_number`, `Patient_Id`, `Pharmacists_ID`, `Name`, `Surmane`, `Contact_Number`, `Location`, `Date`, `Concern`, `Respond`) VALUES
(21, 1, 8, 'Nthekeleng', 'Rangoako', 56789909, 'ha tsolo', '2023-04-27', 'sore throat', 'drink hot water and buy allegex medication'),
(22, 1, 8, 'Nthekeleng', 'Rangoako', 56789900, 'ha tsolo', '2023-04-19', 'sore throat', 'drink hot water and buy allegex medication');

-- --------------------------------------------------------

--
-- Table structure for table `medication`
--

CREATE TABLE `medication` (
  `Medication_Id` int(200) NOT NULL,
  `Image_name` varchar(100) NOT NULL,
  `Medication_name` varchar(200) NOT NULL,
  `Price` int(100) NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medication`
--

INSERT INTO `medication` (`Medication_Id`, `Image_name`, `Medication_name`, `Price`, `Quantity`) VALUES
(3, 'cepacol.jpg', 'Cepacol', 65, 180),
(4, 'cinnamol.jpg', 'Cinnamol', 21, 78),
(22122, 'vivitrol.jpg', 'vivitrol', 56, -42);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Id` int(8) NOT NULL,
  `Order_Id` int(8) NOT NULL,
  `Medication_Id` int(11) NOT NULL,
  `Quantity` int(50) NOT NULL,
  `Delivery_type` varchar(50) NOT NULL,
  `Location` varchar(50) DEFAULT NULL,
  `Kilometers` int(100) DEFAULT NULL,
  `Order_Date` date NOT NULL,
  `Total_Price` int(11) NOT NULL,
  `Status` varchar(30) NOT NULL,
  `Patient_Id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`Id`, `Order_Id`, `Medication_Id`, `Quantity`, `Delivery_type`, `Location`, `Kilometers`, `Order_Date`, `Total_Price`, `Status`, `Patient_Id`) VALUES
(10, 1, 22122, 5, 'Delivery', 'ha thetsane', 21, '2023-04-26', 285, 'Delivered', 1),
(11, 2, 22122, 1, 'Physical Collection', '', 0, '2023-04-27', 56, 'Delivered', 1);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `Patient_ID` int(8) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Surname` varchar(50) NOT NULL,
  `Gender` varchar(20) NOT NULL,
  `Contact_Number` int(8) NOT NULL,
  `Email_address` varchar(100) NOT NULL,
  `Location` varchar(200) NOT NULL,
  `Password` int(8) NOT NULL,
  `Pharmacists_ID` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`Patient_ID`, `Username`, `Name`, `Surname`, `Gender`, `Contact_Number`, `Email_address`, `Location`, `Password`, `Pharmacists_ID`) VALUES
(1, 'Ntheki', 'Nthekeleng', 'Rangoako', 'Female', 56789900, 'nthekeleng.rangoako@gmail.com', 'ha tsolo', 1234, 8),
(6, 'Unathi', 'Unathi', 'Lenkoe', 'Female', 51985318, 'unathi.lenkoe@bothouniversity.com', 'Mazenod', 1234, 8);

-- --------------------------------------------------------

--
-- Table structure for table `pharmacists`
--

CREATE TABLE `pharmacists` (
  `Pharmacists_ID` int(8) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(8) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Surname` varchar(100) NOT NULL,
  `Gender` varchar(20) NOT NULL,
  `Email_Address` varchar(200) NOT NULL,
  `Contact_number` int(8) NOT NULL,
  `Qualification` varchar(100) NOT NULL,
  `Admin_ID` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pharmacists`
--

INSERT INTO `pharmacists` (`Pharmacists_ID`, `Username`, `Password`, `Name`, `Surname`, `Gender`, `Email_Address`, `Contact_number`, `Qualification`, `Admin_ID`) VALUES
(8, '', '', 'Siyabonga', 'Robi', 'Male', 'siya.robi@gmail.com', 56789989, 'Bachelors In chemistry', 4),
(9, '', '', 'Boniswa', 'Lenkoe', 'Female', 'bonnieEel@gmail.com', 580011666, 'Bachelors In chemistry', 4),
(15, '', '', 'Belle', 'Lenkoe', 'Female', 'bellelenkoe@gmail.con', 54433321, 'Phd in pharmacy', 4);

-- --------------------------------------------------------

--
-- Table structure for table `system_administrators`
--

CREATE TABLE `system_administrators` (
  `Admin_ID` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(8) NOT NULL,
  `Email_Address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `system_administrators`
--

--
-- Indexes for dumped tables
--

--
-- Indexes for table `consultation`
--
ALTER TABLE `consultation`
  ADD PRIMARY KEY (`Consultation_Id`),
  ADD KEY `Patient_Id` (`Patient_Id`,`Pharmasist_ID`),
  ADD KEY `Pharmasist_ID` (`Pharmasist_ID`);

--
-- Indexes for table `medical_records`
--
ALTER TABLE `medical_records`
  ADD PRIMARY KEY (`Record_number`),
  ADD KEY `Patient_Id` (`Patient_Id`,`Pharmacists_ID`),
  ADD KEY `Pharmacists_ID` (`Pharmacists_ID`);

--
-- Indexes for table `medication`
--
ALTER TABLE `medication`
  ADD PRIMARY KEY (`Medication_Id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Medication_id` (`Patient_Id`),
  ADD KEY `orders_ibfk_2` (`Medication_Id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`Patient_ID`),
  ADD KEY `Pharmacists_ID` (`Pharmacists_ID`);

--
-- Indexes for table `pharmacists`
--
ALTER TABLE `pharmacists`
  ADD PRIMARY KEY (`Pharmacists_ID`),
  ADD KEY `Admin_ID` (`Admin_ID`);

--
-- Indexes for table `system_administrators`
--
ALTER TABLE `system_administrators`
  ADD PRIMARY KEY (`Admin_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `medical_records`
--
ALTER TABLE `medical_records`
  MODIFY `Record_number` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `Patient_ID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pharmacists`
--
ALTER TABLE `pharmacists`
  MODIFY `Pharmacists_ID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `system_administrators`
--
ALTER TABLE `system_administrators`
  MODIFY `Admin_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `consultation`
--
ALTER TABLE `consultation`
  ADD CONSTRAINT `consultation_ibfk_1` FOREIGN KEY (`Patient_Id`) REFERENCES `patient` (`Patient_ID`),
  ADD CONSTRAINT `consultation_ibfk_2` FOREIGN KEY (`Pharmasist_ID`) REFERENCES `pharmacists` (`Pharmacists_ID`);

--
-- Constraints for table `medical_records`
--
ALTER TABLE `medical_records`
  ADD CONSTRAINT `medical_records_ibfk_1` FOREIGN KEY (`Patient_Id`) REFERENCES `patient` (`Patient_ID`),
  ADD CONSTRAINT `medical_records_ibfk_2` FOREIGN KEY (`Pharmacists_ID`) REFERENCES `pharmacists` (`Pharmacists_ID`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`Patient_Id`) REFERENCES `patient` (`Patient_ID`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`Medication_Id`) REFERENCES `medication` (`Medication_Id`);

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `patient_ibfk_1` FOREIGN KEY (`Pharmacists_ID`) REFERENCES `pharmacists` (`Pharmacists_ID`);

--
-- Constraints for table `pharmacists`
--
ALTER TABLE `pharmacists`
  ADD CONSTRAINT `pharmacists_ibfk_1` FOREIGN KEY (`Admin_ID`) REFERENCES `system_administrators` (`Admin_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
