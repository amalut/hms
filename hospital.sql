-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2020 at 07:41 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `email` varchar(30) NOT NULL UNIQUE,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`email`,`password`) VALUES
('admin@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `patient_id` int(30) primary key,
  `email` varchar(30) UNIQUE NOT NULL,
  `password` varchar(30) NOT NULL,
  `fullname` varchar(40) NOT NULL,
  `age` int(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `weight` int(10) NOT NULL,
  `phone_no` varchar(30) NOT NULL,
  `address` varchar(260) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='patients';

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`patient_id`,`email`,`password`,`fullname`, `age`, `gender`, `weight`, `phone_no`, `address`) VALUES
(101,'ravi@gmail.com','ravi123','Ravi K',19,'Male',49, '9876543210', 'C-175 Building,Manjeri'),
(102,'subairp@gmail.com','subair123','Subair P', 20,'Male', 53, '8774563210', 'E-105 Building,Ottapalam'),
(103,'david@gmail.com','david123', 'George David', 28,'Male', 68, '9930345643','B-202 Appartment,Calicut'),
(104,'varsha@gmail.com','varsha123', 'Varsha Menon', 35,'Female', 85, '9384585843', 'B-108 Buildingt,Mukkom'),
(105,'fathima@gmail.com','fathima123', 'Fathima', 40,'Female', 80, '7832342345', 'E-198 Appartment,Kondotty'),
(106,'vishal@gmail.com','vishal123', 'Vishal Rp', 26,'Male', 77, '9877456321', 'B-142 Appartment,Malappuram'),
(107,'sumesh@gmail.com','sumesh123', 'Sumesh Kumar', 32,'Male', 95, '9632587410', 'E-502 Building,Kannur');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `dr_id` int(30) PRIMARY KEY,
  `email` varchar(30) NOT NULL UNIQUE,
  `password` varchar(30) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `speciality` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`dr_id`,`email`, `password`, `fullname`, `speciality`) VALUES
(251,'aakash@gmail.com', 'aakash', 'DR Aakash', 'Allergist'),
(252,'anurag@gmail.com', 'anurag', 'DR Anurag', 'Dentist');

-- --------------------------------------------------------
--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `appointment_no` int(30) PRIMARY KEY,
  `patient_id` int(30) NOT NULL,
  `speciality` varchar(30) NOT NULL,
  `ap_date` varchar(30),
  `medical_condition` text DEFAULT NULL,
  `doctors_suggestion` varchar(30) DEFAULT NULL,
  `payment_amount` VARCHAR(30) DEFAULT 'Update soon',
  `payment_status` varchar(10) DEFAULT 'Not Done',
  `case_closed` varchar(10) DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`appointment_no`, `patient_id`, `speciality`,`ap_date`, `medical_condition`) VALUES
(59, 101, 'Dentist','2022-08-11','Good'),
(60, 102, 'Audiologist','2022-08-11','Bad'),
(61, 103, 'Cardiologist','2022-08-11','Good'),
(62, 104, 'Dentist','2022-08-11','Visit'),
(63, 105, 'Dentist','2022-08-11','Good'),
(64, 106, 'Allergist','2022-08-11','Good'),
(65, 107, 'Dentist','2022-08-11','Bad');

-- --------------------------------------------------------

--
-- Table structure for table `clerks`
--

CREATE TABLE `clerks` (
  `clerk_id` int(30) PRIMARY KEY,
  `email` varchar(30) NOT NULL UNIQUE,
  `password` varchar(30) NOT NULL,
  `fullname` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='stores information about clerk';

--
-- Dumping data for table `clerks`
--

INSERT INTO `clerks` (`clerk_id`,`email`, `password`, `fullname`) VALUES
(501,'prateek@gmail.com', 'prateek', 'Prateek'),
(502,'shrey@gmail.com', 'shrey', 'Shrey');

-- --------------------------------------------------------



--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `appointment_no` int(30) AUTO_INCREMENT,AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `patient_id` int(30) AUTO_INCREMENT,AUTO_INCREMENT=108;


--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `dr_id` int(20) AUTO_INCREMENT,AUTO_INCREMENT=253;


--
-- AUTO_INCREMENT for table `clerks`
--
ALTER TABLE `clerks`
  MODIFY `clerk_id` int(20) AUTO_INCREMENT,AUTO_INCREMENT=503;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
