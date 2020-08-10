-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Aug 10, 2020 at 11:36 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `AdminID` varchar(100) NOT NULL,
  `AdminName` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Mobile` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `imgname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`AdminID`, `AdminName`, `Email`, `Mobile`, `Password`, `Address`, `imgname`) VALUES
('A10007', 'Admin', 'admin@example.com', '5564783922', 'admin', 'Kandivali, Mumbai-400101', 'AdminPic.png'),
('F10004', 'Faculty', 'faculty@example.com', '8874632551', 'hello123', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `bid` int(100) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Author` varchar(100) NOT NULL,
  `Edition` varchar(100) NOT NULL,
  `Status` varchar(100) NOT NULL,
  `Quantity` int(100) NOT NULL,
  `Department` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bid`, `Name`, `Author`, `Edition`, `Status`, `Quantity`, `Department`) VALUES
(1, 'Principles of Electronics', 'V. K. Mehta, Rohit Mehta', '3rd', 'Available', 8, 'Electronics'),
(2, 'The Complete Reference C++', 'Herbert Schildt', '4th', '<p style=\"color:yellow; background-color:red; text-align:center;\">Not Available</p>', 0, 'Computer'),
(3, 'Data Structure', 'Seymour Lipschutz', '4th', 'Available', 6, 'Computer'),
(4, 'Digital Login and Computer Design', 'M. Morris Mano', '2nd', 'Available', 9, 'Electronics, Computer'),
(5, 'Mechanical Vibrations', 'S. S. Rao', '6th', 'Available', 20, 'Mechanical'),
(6, 'Circuit Theory Analysis and Synthesis', 'Abhijit Chakrabarti', '7th', 'Available', 15, 'Electrical '),
(7, 'Artificial Intelligence A Modern Approach', 'Peter Norvig, Stuart Russell', '3rd', 'Available', 5, 'Computer , IT');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `ID` int(11) NOT NULL,
  `Comment` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`ID`, `Comment`) VALUES
(1, 'the pages are interactive, so ass all the resourses'),
(2, 'the pages are interactive, so as all the resourses, thank you'),
(3, 'Good System'),
(4, 'Good System');

-- --------------------------------------------------------

--
-- Table structure for table `issue_book`
--

CREATE TABLE `issue_book` (
  `StudentID` varchar(100) NOT NULL,
  `bid` int(100) NOT NULL,
  `approve` varchar(100) NOT NULL,
  `issuedate` varchar(100) NOT NULL,
  `returndate` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `issue_book`
--

INSERT INTO `issue_book` (`StudentID`, `bid`, `approve`, `issuedate`, `returndate`) VALUES
('S1005', 4, 'Yes', '07-08-2020', '14-08-2020'),
('S1002', 2, 'Yes', '08-08-2020', '15-08-2020'),
('S1001', 2, '<p style=\"color:yellow; background-color:green; text-align:center\">Returned</p>', '01-08-2020', '07-08-2020'),
('S1002', 5, '<p style=\"color:yellow; background-color:green; text-align:center\">Returned</p>', '01-08-2020', '07-08-2020'),
('S1005', 2, 'Yes', '08-08-2020', '15-08-2020'),
('S1005', 3, '<p style=\"color:yellow; background-color:green; text-align:center\">Returned</p>', '01-08-2020', '07-08-2020'),
('S1003', 1, '<p style=\"color:yellow; background-color:green; text-align:center\">Returned</p>', '01-08-2020', '07-08-2020'),
('S1007', 3, '', '', ''),
('S1005', 4, '', '', ''),
('S1003', 7, '<p style=\"color:yellow; background-color:green; text-align:center\">Returned</p>', '01-08-2020', '07-08-2020');

-- --------------------------------------------------------

--
-- Table structure for table `returned_fine`
--

CREATE TABLE `returned_fine` (
  `StudentID` varchar(100) NOT NULL,
  `BookID` varchar(100) NOT NULL,
  `Returned_Day` varchar(100) NOT NULL,
  `Days_Delayed` int(50) NOT NULL,
  `Amount_Paid` double NOT NULL,
  `Status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `returned_fine`
--

INSERT INTO `returned_fine` (`StudentID`, `BookID`, `Returned_Day`, `Days_Delayed`, `Amount_Paid`, `Status`) VALUES
('S1003', '1', '10-08-2020', 3, 30, 'Paid'),
('S1003', '7', '10-08-2020', 3, 30, 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `student_reg`
--

CREATE TABLE `student_reg` (
  `StudentID` varchar(100) NOT NULL,
  `FullName` varchar(100) NOT NULL,
  `Mobile` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_reg`
--

INSERT INTO `student_reg` (`StudentID`, `FullName`, `Mobile`, `Email`, `Password`, `Address`) VALUES
('S1001', 'Amal Mehta', '9876789544', 'amal.mehta@example.com', 'amal123', ''),
('S1002', 'Neha Mishra', '7783647263', 'neha@example.com', 'neha123', ''),
('S1003', 'Nivedita Mishra', '8874556372', 'nidhi@example.com', 'nidhi123', ''),
('S1004', 'Sanjana Mishra', '9167953344', 'sanjana@example.com', 'sanjana', ''),
('S1005', 'Mansi Mistry', '9167951008', 'mansi@example.com', 'mansi123', 'Mumbai'),
('S1006', 'Sumer Dhillon', '8733456211', 'sumer@example', 'sumer123', ''),
('S1007', 'Tanie Brar', '8766234411', 'tanie@example.com', 'tanie123', 'Cardiff, UK');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`AdminID`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `student_reg`
--
ALTER TABLE `student_reg`
  ADD PRIMARY KEY (`StudentID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `bid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
