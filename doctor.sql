-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2019 at 11:48 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doctor`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `docid` varchar(10) NOT NULL,
  `userid` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `timeslot` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`docid`, `userid`, `date`, `timeslot`) VALUES
('doc2', 'pati1', '2019-11-08', '10:30:00'),
('doc1', 'pati2', '2019-11-06', '10:30:00'),
('doc9', 'pati1', '2019-11-18', '10:00:00'),
('doc10', 'pati1', '2019-11-21', '10:00:00'),
('doc8', 'pati1', '2019-11-21', '12:30:00'),
('doc8', 'pati1', '2019-12-05', '12:30:00'),
('doc10', 'pati1', '2019-11-28', '10:00:00'),
('doc10', 'pati1', '2019-11-28', '10:15:00'),
('doc9', 'pati1', '2019-12-02', '10:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `confirm`
--

CREATE TABLE `confirm` (
  `docid` varchar(10) NOT NULL,
  `date` varchar(15) NOT NULL,
  `count` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `confirm`
--

INSERT INTO `confirm` (`docid`, `date`, `count`) VALUES
('doc1', '2019-11-26', '0'),
('doc2', '2019-11-26', '0'),
('doc1', '2019-11-18', '0'),
('doc2', '2019-11-27', '0'),
('doc1', '2019-11-25', '0'),
('doc1', '2019-11-20', '0'),
('doc1', '2019-12-2', '3'),
('doc2', '2019-11-8', '1'),
('doc2', '2019-11-29', '0'),
('doc1', '2019-11-6', '1'),
('doc1', '2019-11-11', '0'),
('doc3', '2019-11-11', '0'),
('doc3', '2019-11-9', '1'),
('doc3', '2019-12-7', '1'),
('doc1', '2019-11-12', '0'),
('doc7', '2019-12-12', '0'),
('doc10', '2019-11-20', '1'),
('doc9', '2019-11-18', '1'),
('doc4', '2019-11-30', '0'),
('doc5', '2019-11-19', '0'),
('doc6', '2019-11-18', '0'),
('doc6', '2019-11-19', '0'),
('doc10', '2019-11-21', '1'),
('doc8', '2019-11-21', '1'),
('doc8', '2019-11-28', '0'),
('doc8', '2019-12-5', '1'),
('doc9', '2019-12-23', '0'),
('doc10', '2019-12-12', '0'),
('doc10', '2019-11-28', '2'),
('doc6', '2019-12-2', '1'),
('doc9', '2019-12-2', '1'),
('doc4', '2019-12-30', '0'),
('doc2', '2019-12-9', '1');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `deptid` varchar(10) NOT NULL,
  `dname` varchar(50) NOT NULL,
  `dimage` varchar(30) NOT NULL,
  `dtext` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`deptid`, `dname`, `dimage`, `dtext`) VALUES
('dept1', 'cardiology', 'cardiac.png', 'Cardiology is a medical specialty and a branch of internal medicine concerned with disorders of the heart.It deals with the diagnosis and treatment of such conditions as congenital heart defects, coronary artery disease,electrophysiology, heart failure and valvular heart disease. Subspecialties of the cardiology field include cardiac electrophysiology, echocardiography, interventional cardiology and nuclear cardiology.\r\n'),
('dept2', 'neurology', 'neuro.png', 'Neurology is the branch of medicine that deals with disorders of the nervous system, which include the brain, blood vessels, muscles and nerves. The main areas of neurology are: the autonomic, central and peripheral nervous systems. A physician who works in the field of neurology is called a neurologist; a neurosurgeon treats neurological disorders via surgery.\r\n'),
('dept3', 'Gynecology', 'gynecology.png', 'Gynaecology or gynecology is the medical practice dealing with the health of the female reproductive systems and the breasts. Outside medicine, the term means \"the science of women\". A branch of medicine that specializes in the care of women during pregnancy and childbirth and in the diagnosis and treatment of diseases of the female reproductive organs. It also specializes in other womens health issues, such as menopause, hormone problems, contraception (birth control), and infertility.'),
('dept4', 'Orthopedic', 'ortho.png', 'Orthopedics is a medical specialty that focuses on the diagnosis, correction, prevention, and treatment of patients with skeletal deformities - disorders of the bones, joints, muscles, ligaments, tendons, nerves and skin. These elements make up the musculoskeletal system. '),
('dept5', 'Dermatology', 'dermatology.png', 'Dermatology is the branch of medicine dealing with the skin. It is a specialty with both medical and surgical aspects. Dermatology involves the study, research, diagnosis, and management of any health conditions that may affect the skin, fat hair, nails, and membranes. A dermatologist is the health professional who specializes in this area of healthcare.'),
('dept6', 'Nephrology', 'nephrology.png', 'Nephrology is a specialty of medicine and pediatric medicine that concerns itself with the kidneys: the study of normal kidney function and kidney disease, the preservation of kidney health, and the treatment of kidney disease, from diet and medication to renal replacement therapy.');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `docid` varchar(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `dimage` varchar(30) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `qualification` varchar(60) NOT NULL,
  `position` varchar(30) NOT NULL,
  `days` varchar(50) NOT NULL,
  `fromtime` time NOT NULL,
  `totime` time NOT NULL,
  `deptid` varchar(10) NOT NULL,
  `count` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`docid`, `name`, `email`, `dimage`, `phone`, `address`, `dob`, `gender`, `qualification`, `position`, `days`, `fromtime`, `totime`, `deptid`, `count`) VALUES
('doc1', 'Ravi Chandra J B', 'ravichandra@gmail.com', 'doc1.jpeg', '9874563299', 'banashankari 3rd stage,bangalore-560070', '1980-07-01', 'male', 'MBBS,FASS(USA), Diploma of Fellowship, FRCS(Glasg)', 'Senior Consultant', 'Monday,Tuesday,Wednesday,Thursday', '10:30:00', '13:30:00', 'dept1', '12'),
('doc10', 'Vijaya Gowri Bandaru', 'vijaya@gmail.com', 'vijaya.jpeg', '9875632145', 'Dollars colony,bangalore', '1988-02-18', 'female', 'MBBS, DDVL, DNB', 'Senior Consultant', 'Wednesday,Thursday,Friday', '10:00:00', '12:30:00', 'dept5', '8'),
('doc2', 'Prakruthi', 'prakruthi@gmail.com', 'prakruthi.jpeg', '8965231478', 'BEVANATHA(V)MALLANAYAKANA HALLI(p)', '1983-12-15', 'female', 'MBBS,FASS(USA)', 'Consultant', 'Monday,Tuesday,Wednesday', '10:30:00', '12:30:00', 'dept2', '8'),
('doc3', 'Harshitha B', 'harshitha@gmail.com', 'harshitha.jpg', '9874563215', 'Mahalakshmi Layout, Bangalore', '1994-12-22', 'female', 'MBBS', 'Consultant', 'Monday,Wednesday,Thursday,Saturday', '09:30:00', '13:30:00', 'dept1', '16'),
('doc4', 'Sheela Chakravarthy', 'sheela@gmail.com', 'sheela.png', '9874563214', 'Bannerghatta Road, Bangalore', '1980-10-16', 'female', ' MBBS, MD', 'Consultant', 'Monday,Friday,Saturday', '14:30:00', '16:30:00', 'dept3', '8'),
('doc5', 'Sharada Shekar', 'sharada@gmail.com', 'Sharada.jpg', '8745632192', 'Mahalakshmin Layout, Bangalore', '1976-08-11', 'female', 'MBBS, MRCP (UK) MRCP (Ire)', 'Senior Consultant', 'Tuesday,Wednesday,Thursday', '10:00:00', '13:00:00', 'dept3', '12'),
('doc6', 'Chandrashekar P', 'chandra@gmail.com', 'chandra.jpg', '8745632156', 'Jayanagar 7th block,Bangalore', '1985-11-14', 'male', 'MBBS,MS (Orthopaedics)(USA)', 'Senior Consultant & HOD', 'Monday,Tuesday,Wednesday', '10:00:00', '12:00:00', 'dept4', '8'),
('doc7', 'Shiva Kumar R', 'shiva@gmail.com', 'shiva.jpeg', '8974563215', 'Indiranagar, Bangalore', '1988-12-16', 'male', 'MD, DNB, DM, Fellowship in Epilepsy', 'Senior Consultant - Neurology ', 'Wednesday,Thursday,Friday', '13:30:00', '15:30:00', 'dept2', '8'),
('doc8', 'Banarji B.H', 'banarji@gmail.com', 'banarji.jpeg', '8523146974', 'Gandhi Nagar,Netakallapa circle, Bangalore', '1982-10-13', 'male', 'MS (Orthopaedics), FASM,FASS', 'Senior Consultant', 'Thursday,Friday,Saturday', '12:30:00', '14:30:00', 'dept4', '8'),
('doc9', 'Laxman F Mavarkar', 'laxman@gmail.com', 'laxman.jpg', '9632587415', 'jayanagar 5th block,bangalore', '1986-09-19', 'male', 'MBBS, MD(Dermatology)', 'visiting consultant', 'Monday,Tuesday', '10:00:00', '13:00:00', 'dept5', '12');

-- --------------------------------------------------------

--
-- Table structure for table `doctorlogin`
--

CREATE TABLE `doctorlogin` (
  `docid` varchar(10) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `psword` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctorlogin`
--

INSERT INTO `doctorlogin` (`docid`, `uname`, `psword`) VALUES
('doc1', 'ravichandra@gmail.com', 'ravi'),
('doc2', 'gvhindukumari@gmail.com', 'gvhindu'),
('doc3', 'harshitha@gmail.com', 'harshitha'),
('doc4', 'sheela@gmail.com', 'sheela'),
('doc5', 'sharada@gmail.com', 'sharada'),
('doc6', 'chandra@gmail.com', 'chandra'),
('doc7', 'shiva@gmail.com', 'shiva'),
('doc8', 'banarji@gmail.com', 'banarji'),
('doc9', 'laxman@gmail.com', 'laxman'),
('doc10', 'vijaya@gmail.com', 'vijaya');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `userid` varchar(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phoneno` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(60) NOT NULL,
  `dob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`userid`, `name`, `email`, `phoneno`, `gender`, `address`, `dob`) VALUES
('pati1', 'Hindu Kumari G V', 'gvhindukumari@gmail.com', '9449614617', 'female', 'Bengaluru', '1998-07-07'),
('pati2', 'Nithyashree H C', 'nithyahc1998@gmail.com', '9482486534', 'female', 'Bengaluru', '1998-09-15');

-- --------------------------------------------------------

--
-- Table structure for table `userlogin`
--

CREATE TABLE `userlogin` (
  `userid` varchar(10) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `psword` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlogin`
--

INSERT INTO `userlogin` (`userid`, `uname`, `psword`) VALUES
('pati1', 'gvhindukumari@gmail.com', 'gvhindu'),
('pati2', 'nithyahc1998@gmail.com', 'nithya');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD KEY `docid` (`docid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `confirm`
--
ALTER TABLE `confirm`
  ADD KEY `docid` (`docid`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`deptid`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`docid`),
  ADD KEY `deptid` (`deptid`);

--
-- Indexes for table `doctorlogin`
--
ALTER TABLE `doctorlogin`
  ADD KEY `docid` (`docid`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `userlogin`
--
ALTER TABLE `userlogin`
  ADD KEY `userid` (`userid`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`docid`) REFERENCES `doctor` (`docid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `patient` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `confirm`
--
ALTER TABLE `confirm`
  ADD CONSTRAINT `confirm_ibfk_1` FOREIGN KEY (`docid`) REFERENCES `doctor` (`docid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `doctor`
--
ALTER TABLE `doctor`
  ADD CONSTRAINT `doctor_ibfk_1` FOREIGN KEY (`deptid`) REFERENCES `department` (`deptid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `doctorlogin`
--
ALTER TABLE `doctorlogin`
  ADD CONSTRAINT `doctorlogin_ibfk_1` FOREIGN KEY (`docid`) REFERENCES `doctor` (`docid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `userlogin`
--
ALTER TABLE `userlogin`
  ADD CONSTRAINT `userlogin_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `patient` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
